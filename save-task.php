<?php

    //llamamos a db.php porque el archivo llama al MySql
    include ("db.php");

    if(isset($_POST['save-task']))//Colocar el mismo nombre que name y del archivo donde esta 
    {
        //En esta parte se muestran los datos del formulario llenado en index.php
        $title=$_POST['title'];
        $description=$_POST['description'];
        //echo $title;
        //echo $description;

        //Se guarda en una variable consulta para gaurdar un dato dentro de Mysql
        $query= "INSERT INTO task(title,description) VALUES ('$title', '$description')";
        //En esta parte es donde se guarda la variable query con "conn"
        //Que es para subir a la tabla
        $result=mysqli_query($conn,$query);
        if(!$result)
        {
            die("Query Failed");

        }
        //Aqui es donde se guarda el mensaje 
        //ni bien se de cuenta que hay un archivo
        $_SESSION['message']='Task Saved succesfully';
        $_SESSION['message-type']='success';
        //echo 'saved';
        //Se redireciona a index.php
        header("Location: index.php");

    }
?>