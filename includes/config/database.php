<?php

//Conexion a base de datos

function conectarDB() : mysqli {  //Retorna una conexion de mysqli
    $db = new mysqli('localhost', 'root', '', 'gimnasio');

    if(!$db){                           //En caso de error, imprime mensaje, pero continua la ejecucion del codigo.
        echo "Fallo en la conexión";
        exit; //Hace que las siguientes lineas no se ejecuten. Si hay un error. Para evitar revelar informacion personal o sensible.
    } 

    return $db;  //Retorna una instancia de la conexión
}