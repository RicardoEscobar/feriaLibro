<?php
    $t = $_POST["facto"];
    $resultado = 1;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Estructuras de control ::  Factorial</title>
        <meta charset="utf-8">
        <link href="estilo.css" type="text/css" rel="stylesheet">
    </head>
    <body class="factorial">
        <h1 class="titulo">Factorial</h1>
        <p class="listatablas">
            <?php for($n=1; $n<=$t; $n++){
                $resultado = $resultado * $n;}
            echo "El factorial de $t ! es $resultado";
            ?>
        </p>
    </body>
</html>