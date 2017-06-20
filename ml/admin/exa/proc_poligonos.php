<?php

$valor1 = $_POST["valor1"];
$valor2 = $_POST["valor2"];
$valor3 = $_POST["valor3"];
$tipo = $_POST["tipo"];



function area($v1,$v2,$v3,$t){
    if($t=="cuadrado"){
        $area = $v1*$v1;
        $msg = "El área del cuadrado es de $area";
    }
    elseif ($t=="recta"){
        $area = $v1*$v2;
        $msg = "El área del rectángulo es de $area";
    }
    elseif ($t=="triangulo"){
        $area = ($v1*$v2)/2;
        $msg = "El área del triángulo es de $area";
    }
    elseif ($t=="circulo"){
        $area = 3.1416*($v1*$v1);
        $msg = "El área del rectángulo es de $area";
    }
    elseif ($t=="poligono"){
        $area = (($v1*$v3)*$v2)/2;
        $msg = "El área del polígono de $v3 lados es de $area";
    }
    return $msg;
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Funciones ::  Procesamiento</title>
        <meta charset="utf-8">
        <link href="estilo.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <h1>Área</h1>
        <p><?php echo area($valor1,$valor2,$valor3,$tipo) ?></p>
    </body>
</html>