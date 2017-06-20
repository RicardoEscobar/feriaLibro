<?php

// Recibir las variables

$nombre = $_POST["nom"];
$sexo = $_POST["sexo"];



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio uno :: Procesamiento</title>
        <meta charset="utf-8">
        <link href="estilo.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <h1>Paso de datos vía formulario</h1>
        <p>Estos son los datos que se recibieron del formulario:</p>
        <ul>
            <li>Nombre: <strong><?php echo $nombre; ?></strong></li>
            <li>Sexo: <strong><?php echo $sexo; ?></strong></li>
        </ul>
    </body>
</html>