<?php

// aplicacion que solicite 5 numeros enteros y calcular el promedio de estos numeros

$num1 = $_POST["num1"];
$num2 = $_POST["num2"];
$num3 = $_POST["num3"];
$num4 = $_POST["num4"];
$num5 = $_POST["num5"];



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio uno :: Procesamiento</title>
        <meta charset="utf-8">
        <link href="estilo.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <h1>Calcular</h1>
        <form action="aplicacion.php" method="post">
            <p>Ingrese 5 números:</p>
            <p><label for="nom">Número 1: </label><br>
                <input type="text" name="num1" id="num1" value="<?php echo $num1; ?>"></p>
            <p><label for="nom">Número 2: </label><br>
                <input type="text" name="num2" id="num2" value="<?php echo $num2; ?>"></p>
            <p><label for="nom">Número 3: </label><br>
                <input type="text" name="num3" id="num3" value="<?php echo $num3; ?>"></p>
            <p><label for="nom">Número 4: </label><br>
                <input type="text" name="num4" id="num4" value="<?php echo $num4; ?>"></p>
            <p><label for="nom">Número 5: </label><br>
                <input type="text" name="num5" id="num5" value="<?php echo $num5; ?>"></p>
            <input type="submit" value="Enviar datos">
        </form>
        
        <p>Promedio Total: <?php echo ($num1 + $num2 + $num3 + $num4 + $num5)/5; ?></p>
    </body>
</html>