<?php

$server="localhost";
$dbuser="root";
$dbpass="";
$dbname="prueba";

$db=new mysqli($server,$dbuser,$dbpass,$dbname);

if($db->connect_errno>0){
    die("No fue posible conectarse a la base de datos. Error: ".$db->connect_error);
} 