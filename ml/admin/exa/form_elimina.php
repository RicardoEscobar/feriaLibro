<?php
require("connection.php");
$id = $_GET["id"];
//Construir el query
$sql="select * from contacto where id_contacto=".$id;
$result=$db->query($sql);
$row = $result->fetch_row();

function getEstado($edo){
    $sql2="select nom_edo from estado where id_edo=".$edo;
    $result2 = $db->query($sql2);
    $row2=$result2->fetch_row();
    return "dsd";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Eliminar contacto</title>
        <link href="estilo.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Elminar contacto</h1>
        <form action="proc_elimina.php" method="post">
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
                <td><strong><?php 
                    $sql2="select nom_edo from estado where id_edo =".$row[8];
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_row();
                    echo $row2[0]; ?>
                    </strong></td>
            </tr>
            <tr>
                <td>¿Desea borrarlo?</td>
                <td>
                    <input type="hidden" name="id" value="<?php $row[0]; ?>">
                    <input type="submit" value="Sí">
                    <input type="button" value="No" onclick="location.href='operaciones.php'">
                </td>
            </tr>

        </table>
        </form>
    </body>
</html>