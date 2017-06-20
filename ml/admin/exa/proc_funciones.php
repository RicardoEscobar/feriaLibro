<?php

$temp = $_POST["temp"];
$tipo = $_POST["tipo"];

function convertirTemp($t,$c){
    if($c=="c2f"){
        $conv = $t*9/5 + 32;
        $msg = "$t centrígrados equivalen a $conv fahrenheit";
    }
    else {
        $conv = ($t-32)*5/9;
        $msg = "$t fahrenheit equivalen a $conv centígrados";
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
        <h1>Funciones</h1>
        <p><?php echo convertirTemp($temp,$tipo) ?>. Yo puedo reutilizar el código, por ejemplo, si tienes un termómetro que sólo
        mide grados Fahrenheit y quieres saber si tienes fiebre de 38.5 grados centígrados o más, pues lo conviertes directamente:
        <?php echo convertirTemp(); ?></p>
    </body>
</html>