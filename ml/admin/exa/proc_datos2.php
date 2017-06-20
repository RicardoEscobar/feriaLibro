<?php
    $nom = $_POST["nombre"];
    $sex = $_POST["sexo"];

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Datos :: procesamiento</title>
        <meta charset="utf-8">
        <link href="estilo.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Datos</h1>
        <p>Hola, soy <?php 
            echo $nom." y me gusta la música: \n <ul>";
            foreach($_POST["musica"] as $selected){
                echo "<li>".$selected;
            };
            echo "</ul>"?>
        </p>
    </body>
</html>