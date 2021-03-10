<?php
    include("config.php");
    session_start();

    if(isset($_POST["signUpBTN"])){
        #verificamos que ninguno de los campos nombre, descripcion y precio esten vacios 
        if (empty($_POST["usernameUp"]) || empty($_POST["mailUp"]) || empty($_POST["passwordUp"])) {
            echo "Error, complete los campos";
        } else{
            #Guardamos el contenido del formulario en variables locales
            $name = $_POST["usernameUp"];
            $mail = $_POST["mailUp"];
            $pass = $_POST["passwordUp"];

            mysqli_select_db($db,DB_DATABASE) or die ("No se encuentra la BBDD");
            mysqli_set_charset($db,"utf8");

            #Guardamos la instruccion sql en la variable insertar
            $query = "INSERT INTO users (user_Name, user_Mail, user_Pass) VALUES ('$name','$mail','$pass')";

            #Enviamos la instruccion a la BBDD para que sea ejecutada
            $result = mysqli_query($db,$query);
            
            if ($result == false) {
                echo("Error");
            }

            mysqli_close($db);

            header("location: ../index.php");
        }
    }

?>