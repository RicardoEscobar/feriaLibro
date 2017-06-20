<?php

// formulario que solicite: nombre, apellidos, edad, hobbies (textarea)

$nombre = $_POST["nom"];
$apellidos = $_POST["ape"];
$edad = $_POST["edad"];
$hobbie = $_POST["hobbie"];

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Formulario</title>
        <meta charset="utf-8">
        <link href="estilo.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <h1>Datos</h1>
        <p>Hola, soy <?php echo $nombre; ?> <?php echo $apellidos; ?>, tengo <?php echo $edad; ?> años y me gusta <?php echo $hobbie; ?></p>
    </body>
</html>