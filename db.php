<?php

//Se inicia una sesion del cual pueda saber el archivo pueda 
//saber que tiene una variable almacenada y asi mandar mensaje:

session_start();

        $conn= mysqli_connect( //Se guarda en una variable (conn)
            'localhost',//En esta parte parte indica donde esta la base de datos (local en este caso)
            'root',
            '',//contaseña
            'php-mysql-crud'//nombre de la base de datos creado en MySql xampp
        );

        //Comprobar si esta conectado
        /*if (isset($conn))
        {
            echo 'DB is connect';
        }*/

?>