<?php

$n1 = $_POST["num1"];
$n2 = $_POST["num2"];
$cal = $_POST["calif"];
$num = $_POST["num"];

if($n1>$n2) {
    $msj = "$n1 es el mayor";
} elseif($n2>$n1){
    $msj = "$n2 es el mayor";
} else {
    $msj = "Son iguales";
}

switch($cal) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        $texto = "Pésima";
        break;
    case 6:
        $texto = "Deficiente";
        break;
    case 7:
        $texto = "Regular";
        break;
    case 8:
        $texto = "Buena";
        break;
    case 9:
        $texto = "Muy buena";
        break;
    case 10:
        $texto = "Excelente";
        break;
}




?>

<!DOCTYPE html>
<html>
    <head>
        <title>Estructuras de control :: Procesamiento</title>
        <meta charset="utf-8">
        <link href="estilo.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <h1>Estructuras de control</h1>
        <h2>Uso de if</h2>
        <p><?php echo $msj; ?></p>
        <h2>Uso de switch</h2>
        <p>A la calificación <?php echo $cal; ?> le corresponde una calificación cualitativa <strong><?php echo $texto; ?></strong></p>
        <h2>Uso de while</h2>
        <p>Los números pares entre 1 y <?php echo $num; ?> son: </p>
        <p><?php $n = 2;
                while($n <= $num){
                echo "$n <br>";
                $n = $n+2;
                }
            ?>
        </p>
    </body>
</html>