    const mysql = require('mysql')

    const express = require("express")

    const app = express

    const conexion = mysql.createConnection({
        host    : "localhost",
        user    : "root"     ,
        password: ""         ,
        database: "infraharx"
    });

    conexion.connect((err)=>{
        if(err) throw err
        console.log('la conexion funciona')
    })

    app.get('/data',(req,res)=>{
        connection.query("SELECT * FROM actualizacionmejoramantenimietos",(error,results)=>{
            if(error)throw error;
            res.json(results);
        });
    });

    conexion.query("SELECT `IdMejora`, `Aspecto`, `Descripcion`, `Beneficios`,`TipoMantenimiento`, `Frecuencia`, `MesPropuesto`, `AnnoPropuesto`, `Prioridad`, `Costo`, DATE_FORMAT(`UltimaActualizacion`, '%d-%m-%Y') AS UltimaActualizacion, `HaSidoPlaneado` FROM `actualizacionmejoramantenimietos` ORDER BY `UltimaActualizacion` ASC;", (err,rows)=>{
        if(err) throw err
        console.log('los datos se han obtenido con exito')
        console.log(rows)

    })

    conexion.end()

