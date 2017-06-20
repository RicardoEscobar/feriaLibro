<?php
    $t = $_POST["tabla"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Estructuras de control :: Tablas</title>
        <meta charset="utf-8">
        <link href="estilo.css" type="text/css" rel="stylesheet">
    </head>
    <body class="tablas">
        <h1 class="titulo">Tabla de multiplicar: </h1>
        <ul class="listatablas">
                <?php for($n=1; $n<=10; $n++){
                echo "<li>$t x $n = ".($t*$n)."</li><br>";
                }?>
        </ul>
    </body>
</html>