<?php

function random_char($string){
    $length = strlen($string);
    $position = mt_rand(0,$length-1);
    return($string[$position]);
}

function random_string($charset_string, $length){
    $return_string = random_char($charset_string);
    for ($n=1; $n<$length;$n++){
        $return_string.= random_char($charset_string);
    }
    return($return_string);
}

function genera_hash($longitud){
    mt_srand(floatval(microtime()*1000000));
    $charset="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    return(random_string($charset, $longitud));
}

echo "Es un hash de 24 caracteres ".genera_hash(24);
?>