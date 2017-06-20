<?php

//Establecer conexión (use database)

$conexion = new mysqli("localhost","erick","235658Eri","prueba");

if($conexion->connect_errno>0){
    die("No fue posible conectarse a la base de datos. Error: ".$conexion->connect_error);
} 

$sql="select * from estado";
$result=$conexion->query($sql);

echo "Número de filas: ".$result->num_rows;

$result->free();

$sql="select * from contacto";
$result=$conexion->query($sql);

echo "Numero de filas: ".$result->num_rows;
echo "\n\r";

while($row=$result->fetch_assoc()){
    echo $row["nom_contacto"]."\n\r";
}

?>