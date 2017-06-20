<?php require("connection.php"); 
//recibe datos
$id=$_POST["id"];

$sql="delete from contacto where id_contacto=$id";

$result=$db->query($sql);    

?>

<!DOCTYPE html> <!-- para configurar html5 -->
<html>
    <head>
        <title>Eliminar contacto :: Formulario</title>
        <link href="estilos4.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Eliminar contacto</h1>
        <?php
        if($result){ //$resul es lo mismo que $resul==true
        ?> 
        <p>Su contacto fue eliminado exitosamente.</p>
        <?php
        }else{
        ?>
        <p>No se pudo eliminar el contacto. Error: </p>
        <?php
        }
        ?>
    </body>
</html>