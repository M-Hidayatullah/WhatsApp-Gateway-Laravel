```
const configs = {
    port: 3000, // port server default 3000
    isReceiveMessage: true, // direkomendasikan true
    delaySender: 5000, // 1000 = 1 detik (direkomendasikan lebih dari 10 detik untuk menjaga akun tetap aman)
    webhook_url: 'http://localhost/restful/index.php', // url webhook
    chromePath: 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe', // lokasi google chrome (wajib)
    db: {
        host: 'localhost',
        user: 'root',
        pass: '',
        db: 'wajs1'
    } // details database
}

module.exports = configs;
```

soon
