const Router = require('express').Router();
var MongoClient = require('mongodb').MongoClient;

var url = 'mongodb://localhost/agenda';
var dbo;
MongoClient.connect(url, function (err, db) {
    if (err) throw err;
    dbo = db.db("agenda");
    var usuario = {userId:1,
         name:'luquez', 
         pass:'clave', 
         correo:'correo',
        nacimiento:'1996-11-09'}

    dbo.collection("usuario").insertOne(usuario, function (err, result) {
        if (err) throw err;
        console.log("usuario registrado");
    });
});
/*Obtener un usuario por su id, para poder inciar seccion*/
Router.post('/login', function (req, res) {
    var mail = req.body.email;
    var passw = req.body.passUser;
    
    dbo.collection("usuario").findOne({correo:mail, pass:passw}, function (err, result) {
        if (err){
            var resp;
            resp = {respuesta:'No se encuentra en la base de datos.'}
            res.json(resp)
        }else{
            var respuesta = { idusuario: result.userId, respuesta: 'Validado' };
            res.json(respuesta);
        }       
    });
});

/**Insertar eventos en la base de datos */
Router.post('/new', function (req, res) {
    /**Realizamos la toma de datos del usuario */
    
        let evento = {
            id: Math.floor(Math.random() * 100),
            usuid: req.body.idusuario,
            title: req.body.title,
            start: req.body.start,
            hStart: req.body.startH,
            hEnd: req.body.endH,
            end: req.body.end,
            allDay: req.body.diaCompleto
        }
    console.log("Ingreso: "+ evento);
    dbo.collection("eventos").insertOne(evento, function (err, result) {
        if (err) throw err;
        console.log("Evento registrado");
        res.send('Evento registrado');
    });
});

//Validar que solo traiga los eventos del usuario
Router.get('/todo', (req, res)=>{
    var userid = req.body.usu;
    dbo.collection('eventos').find({usuid:userid}).toArray( (err,result)=>{
        if (err) throw err;
        console.log(result);
        
        res.send(result);
    })
});


//Validar que elimine olo los eventos del usuario segun 
//el inicio de seccion y el codigo del evento que se manda
Router.post('/delete/:id', (req,res)=>{
    let idevento = parseInt(req.params.id)
    dbo.collection('eventos').deleteMany({ id:idevento }, function (err, obj) {
        if (err) throw err;

        res.send('Elemento elimindo');
    });
});

Router.post('/update',(req, resp )=>{
    try {

        var evstart = req.body.start;
        //var evend = req.body.end;
        var newEvent = { $set: {start: evstart}};
        var mykey = req.body.ideve;
        mykey = parseInt(mykey);
        dbo.collection("eventos").updateOne({id:mykey}, newEvent, function (err) {
            if (err) {
                resp.status(500)
                resp.json(err)
            }
            resp.send('Evento Actualizado');

        });
    } catch (error) {
        resp.send(e.message);
    }
});

module.exports = Router