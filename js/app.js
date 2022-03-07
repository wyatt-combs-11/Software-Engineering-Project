const mysql = require('mysql');

const con = mysql.createConnection({ 
    host: 'localhost',
    user: 'root',
    password: 'root',
    database: "software",
})

con.connect((err) => {
    if (err) {
        console.log(err);
        console.log("Error in connection");
        return;

    }
    console.log("Sucessfully connected");
});

let me;

con.query("SELECT * FROM login", (err, rows) => {
    if (err) {
        console.log(err);
    }
    console.log(rows[0].userName);
    me = rows[0].userName;
})

const http = require('http')
const fs = require('fs')

const server = http.createServer((req, res) => {
  res.writeHead(200, { 'content-type': 'text/html' })
  fs.createReadStream('app.html').pipe(res)
})


server.listen(process.env.PORT || 3000)


// const http = require('http');

// const hostname = '127.0.0.1';
// const port = 3000;

// const server = http.createServer((req, res) => {
//   res.statusCode = 200;
//   res.setHeader('Content-Type', 'text/plain');
//   res.end(me);
// });

// server.listen(port, hostname, () => {
//   console.log(`Server running at http://${hostname}:${port}/`);
// });


con.end((err) => {

});