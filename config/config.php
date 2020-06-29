<?php

/*Datos de conexion a la base de datos*/
define('DB_HOST', 'us-cdbr-east-02.cleardb.com'); //DB_HOST:  generalmente suele ser "127.0.0.1"
define('DB_USER', 'bb0805d6e34696'); //Usuario de tu base de datos
define('DB_PASS', '32bf8d2b'); //Contraseña del usuario de la base de datos
define('DB_NAME', 'heroku_f78719c0da11124'); //Nombre de la base de datos

$con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$con) {
    @die("<h2 style='text-align:center'>!Imposible conectarse a la base de datos! </h2>" . mysqli_error($con));
}
if (@mysqli_connect_errno()) {
    @die("Conexión falló: " . mysqli_connect_errno() . " : " . mysqli_connect_error());
}
