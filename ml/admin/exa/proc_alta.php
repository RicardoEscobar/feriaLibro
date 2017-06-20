<?php 
require("connection.php");

//Recibir datos
$nom=$_POST["nom"];
$ape=$_POST["ape"];
$email=$_POST["email"];
$cel=$_POST["cel"];
$fijo=$_POST["fijo"];
$sexo=$_POST["sexo"];
$cd=$_POST["cd"];
$edo=$_POST["edo"];

//Construir y ejecutar el query
$query = "insert into contacto values (NULL,'$nom','$ape','$email','$cel','$fijo','$sexo','$cd',$edo)";
$result=$db->query($query);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Alta de contacto :: procesamiento</title>
        <link href="estilo.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Alta de contacto</h1>
        <?php 
            if ($result) { // $result es lo mismo que $result == true
                ?><p>Su contacto fue agregado exitosamente.</p>
        <?php
            }else {
                ?>
                <p>No se pudo agregar el contacto. Error: </p>
        <?php
            }
        ?>
    </body>
</html>