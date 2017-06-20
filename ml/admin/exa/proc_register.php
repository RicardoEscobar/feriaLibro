<?php
require("connection.php");
//Recibir variables
$user=$_POST["username"];
$name=$_POST["fullname"];
$pass=$_POST["userpass"];
$pass2=$_POST["userpass2"];
$email=$_POST["email"];

//Verifica passwords
if($pass!==$pass2){
    $errorpass=true;
} else{
    $errorpass=false;
    $pass=md5($pass);
}
//Construimos query
$sql="insert into usuario values ('$user','$name','$pass','$email')";
$result=$db->query($sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Alta de usuarios :: Formulario</title>
        <link href="estilo.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Alta de usuario</h1>
        <?php 
            if($errorpass){
        ?>
        <p>Las contraseñas no coinciden.</p>
        <p>Regresar al <a href="javascript:history.back();">Formulario</a></p>
        <?php
            } elseif ($result) { // $result es lo mismo que $result == true
                ?><p>Su contacto fue agregado exitosamente.</p>
        <?php
            }else {
                ?>
                <p>No se pudo agregar el contacto.</p>
        <?php
            }
        ?>
    </body>
</html>