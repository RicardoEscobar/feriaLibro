<?php
    //$arreglo = array(2=>1,10=>3,22=>5,100=>7,9);
    /*$arreglo = array(
        "nombre"=>"Erick",
        "apllidos"=>"Suarez Valenzuela"
        "edad"=>20,
        "sexo"=>"masculino"
    );
    

    foreach($arreglo as $indice => $valor){
        echo $indice.":".$valor."\n\r";
    }

    echo var_dump($arreglo);*/

    $matriz = array(
        array(2,0,1),
        array(3,0,0),
        array(5,1,1)
    );

    foreach($matriz as $x=>$otroarreglo){
        foreach($otroarreglo as $y => $valor){
            echo $matriz[$x][$y]."\t";
        }
        echo "\n\r";
    }

    $otramatriz = array(
        "frutas"=>array(
            "a"=>"naranja",
            "b"=>"manzana"
            "c"=>"plátano"
            "d"=>"melocotón"),
        "hobbies"=>array(
            1=>"leer","correr","ir al gym","jugar consolas"),
        "SO"=>array(
            "windows" => "windows 10";
            "linux" => "CentOS",
            "unix" => "FreeBSD"
        )
    );

    echo var_dump($otramatriz);
?>