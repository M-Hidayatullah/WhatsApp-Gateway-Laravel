const ddb = require('./database')();
const configs = require('./configs');
const fs = require('fs');
let rimraf = require("rimraf");
let QRCode = require('qrcode');
const validUrl = require('valid-url');
const { Client, List, Buttons, MessageMedia, LocalAuth } = require('whatsapp-web.js');
const client = new Client({
    authStrategy: new LocalAuth(),
    args: ['--no-sandbox'],
    puppeteer: {
        executablePath: configs.chromePath,
    }
});
const request = require('request');
const app = require('express')();
const http = require('http').createServer(app);
const bodyParser = require('body-parser');
const { text } = require('body-parser');
const io = require('socket.io')(http, {
    cors: { origin: "*" }
});

app.use(bodyParser.json());

function WAConnect() {
    client.on('qr', qr => {
        QRCode.toDataURL(qr, { errorCorrectionLevel: 'H' }, function (err, url) {
            io.emit('ready_qr', { qrnya: url });
        });
        console.log('qr ready to scan!');
    });

    client.on('ready', () => {
        io.emit('on_ready_qr', { message: 'Client is ready', description: `Hello ${client.info.pushname} Whatsapp is connected to ${client.info.wid.user}` });
        ddb.updateClient(client.info.wid.user);
        console.log('client is ready!');
    });

}

client.on('disconnected', (reason) => {
    io.emit('on_ready_qr', { message: 'Client not ready, scan please!', description: "Please scan!" });
    console.log('Client was logged out', reason);
    client.initialize();
});

io.on('connection', async function (socket) {
    if (await client.getState() == 'CONNECTED') {
        try {
            io.emit('on_ready_qr', { message: 'Client is ready', description: `Hello ${client.info.pushname} Whatsapp is connected to ${client.info.wid.user}` });
        } catch (error) {
            rimraf('./.wwebjs_auth', {
                disableGlob: false
            }, function (er) {
                client.destroy();
                io.emit('on_ready_qr', { message: 'Client not ready, scan please!', description: "Please scan!" });
                console.log('Reconect, auth failure!');
                client.initialize();
            });
        }
    } else {
        io.emit('on_ready_qr', { message: 'Client not ready, scan please!', description: "Please scan!" });
    }
    socket.on('rdy', (data) => {
        if (data === 'scan') {
            WAConnect();
        } else {
            client.destroy();
            io.emit('on_ready_qr', { message: 'Client not ready, scan please!', description: "Please scan!" });
            console.log('Disconnect from web!');
            client.initialize();
        }
    });

    socket.on('wa_sender', (data) => {
        load(data);
    });

});

// ---------------
const timer = ms => new Promise(res => setTimeout(res, ms));
async function load(data) {
    // for (let i = 0; i < length; i++) {
        
        const getNomerByProdi =  await client.getContacts(data.number);
            if (!getNomerByProdi) {
            io.emit('status_sender', { status: 'error', message: 'Gagal! Nomor tidak terdaftar di whatsapp: ' + data.number});
    //pengiriman image
        }else {
            if (data.type === 'image') {
                const base64 = fs.readFileSync(__dirname + '/web/storage/app/public/upload/' + data.image, "base64");
                const media = new MessageMedia(`image/${data.ext}`, base64);
                
                client.sendMessage(`${data.number}@c.us`, media, { caption: data.caption });
                console.log('status_sender', { status: 'success', message: 'Whatsapp terkirim: ' + data.number});
                io.emit('status_sender', { status: 'success', message: 'Whatsapp terkirim: ' + data.number});
                // fs.unlinkSync(__dirname + '/web/storage/app/public/upload/' + data.image);

    // pengiriman document
        } else if (data.type === 'document') {
                const media = MessageMedia.fromFilePath(__dirname + '/web/storage/app/public/upload/' + data.document);

                client.sendMessage(`${data.number}@c.us`, media);
                console.log('status_sender', { status: 'success', message: 'Whatsapp terkirim: ' + data.number});
                io.emit('status_sender', { status: 'success', message: 'Whatsapp terkirim: ' + data.number});
                // fs.unlinkSync(__dirname + '/web/storage/app/public/upload/' + data.document);
                
    // pengiriman text
        } else {
                client.sendMessage(`${data.number}@c.us`, data.pesan);
                console.log('status_sender', { status: 'success', message: 'Whatsapp terkirim: ' + data.number});
                io.emit('status_sender', { status: 'success', message: 'Whatsapp terkirim: ' + data.number});
                // break;
            }
            
        }
        
        await timer(configs.delaySender);
    }
    
// }









client.initialize();
http.listen(configs.port);