<?php
    
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'db_final');

    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    if(!$db){
        die("imposible conectarse: ".mysqli_error($db));
    }
    
    #verificacion de error de conexion a la base de datos
    if (mysqli_connect_errno()) {
        die("Conexión falló: ".mysqli_connect_errno()." : ".mysqli_connect_error());
    }

?>