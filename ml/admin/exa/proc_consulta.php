<?php
require("connection.php");
$id = $_GET["id"];
//Construir el query
$sql="select * from contacto where id_contacto=$id";
$result=$db->query($sql);
$row = $result->fetch_row();

function getEstado($edo){
    $sql2="select nom_edo from estado where id_edo=".$edo;
    $result2 = $db->query($sql2);
    $row2=$result2->fetch_row();
    return $row2[0];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Consulta de contacto</title>
        <link href="estilo.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Consulta de contacto</h1>
        <table>
            <tr>
                <td>Nombre:</td>
                <td><strong><?php echo $row[1] ?></strong></td>
            </tr>
            <tr>
                <td>Apellidos:</td>
                <td><strong><?php echo $row[2] ?></strong></td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td><strong><?php echo $row[3] ?></strong></td>
            </tr>
            <tr>
                <td>Celular:</td>
                <td><strong><?php echo $row[4] ?></strong></td>
            </tr>
            <tr>
                <td>Teléfono:</td>
                <td><strong><?php echo $row[5] ?></strong></td>
            </tr>
            <tr>
                <td>Sexo:</td>
                <td><strong><?php echo $row[6] ?></strong></td>
            </tr>
            <tr>
                <td>Ciudad:</td>
                <td><strong><?php echo $row[7] ?></strong></td>
            </tr>
            <tr>
                <td>Estado:</td>
                <td><strong><?php getEstado($row[8]); ?></strong></td>
            </tr>

        </table>
    </body>
</html>