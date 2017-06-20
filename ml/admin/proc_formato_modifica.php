<?php require("inc/connection.php");
$pageTitle="Modificar formato";
include("inc/header.php");
//Recibir datos
$id=$_POST["id"];
$formato=$_POST["form"];
$cambio;

//Construir y ejecutar el query
$sql = "select  * from formatos";
    $result = $db->query($sql);
    while($row=$result->fetch_assoc()){
        if($row["format_id"]==$id){
           $cambio=$row["format"];
        }
    }

$sql1 = "select  * from formatos";
    $result1 = $db->query($sql1);
    while($row=$result1->fetch_assoc()){
        if($row["format"]==$formato){
           $query = "delete from formatos where format_id = $id";
            $result2=$db->query($query);
        }else{
            $query = "update formatos set format='$formato' where format_id='$id'";
            $result3=$db->query($query);
        }
    }

$query1 = "update media set format='$formato' where format='$cambio'";
$result4=$db->query($query1);

?>
    <div class="section catalog page">
        <h1>Modificación del elemento.</h1>
        <?php
        if($result){ //$resul es lo mismo que $resul==true
        ?> 
        <h2>El elemento fue modificado exitosamente.</h2><center><img src="../img/palomita.png"></center>
        <?php
        }else{
        ?>
        <p>No se pudo modificar el elemento. Error: Solicitar ayuda a programador.</p>
        <?php
        }
        ?>
    </div>
<?php 
include("inc/footer.php");
?>