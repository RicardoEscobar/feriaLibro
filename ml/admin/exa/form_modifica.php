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
    echo $row2[0];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Modificar de contacto</title>
        <link href="estilo.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Consulta de contacto</h1>
        <form action="proc_modifica.php" method="post">
            <table>
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="nom" value="<?php echo $row[1]; ?>"></td>
                </tr>
                <tr>
                    <td>Apellidos:</td>
                    <td><input type="text" name="ape" value="<?php echo $row[2]; ?>"></td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td><input type="text" name="email" value="<?php echo $row[3]; ?>"></td>
                </tr>
                <tr>
                    <td>Celular:</td>
                    <td><input type="text" name="cel" value="<?php echo $row[4]; ?>"></td>
                </tr>
                <tr>
                    <td>Teléfono:</td>
                    <td><input type="text" name="tel" value="<?php echo $row[5]; ?>"></td>
                </tr>
                <tr>
                    <td>Sexo:</td>
                    <td><select name="sexo">
                        <option value="F" <?php echo ($row[6]=="F") ? "selected" : "" ?> >Femenino</option>
                        <option value="M" <?php echo ($row[6]=="M") ? "selected" : "" ?> >Masculino</option>
                        <option value="O" <?php echo ($row[6]=="O") ? "selected" : "" ?> >Otro</option>
                        <?php echo $row[6]; ?>">
                        </select></td>
                </tr>
                <tr>
                    <td>Ciudad:</td>
                    <td><input type="text" name="ciudad" value="<?php echo $row[7]; ?>"></td>
                </tr>
                <tr>
                    <td>Estado:</td>
                    <td><select name="edo">
                        <?php
                        $sql2="select * from estado";
                        $result2 = $db->query($sql2);
                        while ($row2=$result2->fetch_assoc()){
                        ?>
                            <option value="<?php echo $row2["id_edo"]; ?>" <?php echo $row2["id_edo"]==$row[8] ? "selected" : ""; ?>>
                            <?php echo $row2["nom_edo"]; ?></option>
                        <?php
                        }
                        ?>
                        </select></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
                        <input type="submit" value="Modificar">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>