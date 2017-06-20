<?php
require("connection.php");
//Recibir datos
$id=$_POST["id"];
$nom=$_POST["nom"];
$ape=$_POST["ape"];
$email=$_POST["email"];
$cel=$_POST["cel"];
$fijo=$_POST["fijo"];
$sexo=$_POST["sexo"];
$cd=$_POST["ciudad"];
$edo=$_POST["edo"];

//Construir el query
$sql="update contacto set nom_contacto='$nom', ape_contacto='$ape', email_contacto='$email', cel_contacto='$cel', fix_contacto='$fijo', sex_contacto='$sexo', cd_contacto='$cd', edo_contacto=$edo where id_contacto=$id";
$result=$db->query($sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Modificar contacto :: procesamiento</title>
        <link href="estilo.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Modificar contacto</h1>
        <?php 
            if ($result) { // $result es lo mismo que $result == true
                ?><p>Su contacto fue modificado exitosamente.</p>
        <?php
            }else {
                ?>
                <p>No se pudo modificar el contacto. Error: </p>
        <?php
            }
        ?>
    </body>
</html>