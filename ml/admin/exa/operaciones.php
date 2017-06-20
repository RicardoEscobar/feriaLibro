<?php
require("connection.php");
$sql ="select * from contacto";
$result=$db->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Operaciones con contactos</title>
        <link href="estilo.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Primer query</h1>
        <table>
            <tr>
                <th>Nombre(s)</th>
                <th>Apellidos</th>
                <th>E-mail</th>
                <th>Celular</th>
                <th>Operaciones</th>
            </tr>
            <?php 
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row["nom_contacto"]; ?></td>
                <td><?php echo $row["ape_contacto"]; ?></td>
                <td><?php echo $row["email_contacto"]; ?></td>
                <td><?php echo $row["cel_contacto"]; ?></td>
                <td><a href="form_elimina.php?id=<?php echo $row["id_contacto"];?>">Eliminar</a> | <a href="form_modifica.php?id=<?php echo $row["id_contacto"];?>"> Modificar</a> | <a href="proc_consulta.php?id=<?php echo $row["id_contacto"];?>">Consultar</a></td>
            </tr> 
                <?php
                }
            }
            ?>
           
        </table>
    </body>
</html>