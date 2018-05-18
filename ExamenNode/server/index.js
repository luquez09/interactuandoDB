
const http = require('http'),
    path = require('path'),
    Routing = require('./rutas.js'),
    express = require('express'),
    bodyParser = require('body-parser');

const PORT = 3000
const app = express()
const Server = http.createServer(app)

app.use(express.static('client'))
app.use(bodyParser.json())
app.use(bodyParser.urlencoded({ extended: true }))
app.use('/events', Routing)

Server.listen(PORT, function () {
    console.log('Servidor conectado en el puerto ' + PORT)
})
