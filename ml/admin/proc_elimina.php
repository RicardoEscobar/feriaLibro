<?php 
require("inc/connection.php");
$pageTitle="Eliminar elemento";
include("inc/header.php");
//Recibir datos
$id=$_POST["id"];
$img=$_POST["img"];

unlink("../".$img);

//Construir y ejecutar el query
$query = "delete from media where media_id = $id";
$result=$db->query($query);

$query2 = "delete from books where media_id = $id";
$result2=$db->query($query2);

$query3 = "delete from media_people where media_id = $id";
$result3=$db->query($query3);
?>
    <div class="section catalog page">
        <h1>Eliminacion del elemento.</h1>
        <?php
        if($result){ //$resul es lo mismo que $resul==true
        ?> 
        <h2>El elemento fue eliminado exitosamente.</h2><center><img src="../img/palomita.png"></center>
        <?php
        }else{
        ?>
        <p>No se pudo eliminar el elemento. Error: Solicitar ayuda a programador.</p>
        <?php
        }
        ?>
    </div>
<?php 
include("inc/footer.php");
?>