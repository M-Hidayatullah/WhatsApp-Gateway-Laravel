const mysql = require('mysql');
const configs = require('./configs');

const con = mysql.createConnection({
    host: configs.db.host,
    user: configs.db.user,
    password: configs.db.pass,
    database: configs.db.db
});

function updateClient(clientNumber) {
    const sql = "UPDATE settings SET `value` = '" + clientNumber.substr(2) + "' WHERE name = 'wa_number'";
    con.query(sql, (err, result) => {
        if (err) throw err;
    });
}


module.exports = function () {
    return {
        getAllPhone: function (callback) {
            const sql = "SELECT * FROM list_contacts";
            con.query(sql, (err, result) => {
                if (err) throw err;
                callback(null, result);
            });
        },
        // callbackReceiveMessage,
        updateClient
        // callbackResponseMessages
    }
}