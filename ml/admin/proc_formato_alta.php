<?php require("inc/connection.php");
$pageTitle="Modificar formato";
include("inc/header.php");
//Recibir datos
$formato=$_POST["form"];
$categ=$_POST["categoria"];

//Construir y ejecutar el query
$sql = "select  * from formatos";
    $result = $db->query($sql);
    while($row=$result->fetch_assoc()){
        if($row["format"]==$formato && $row["category"]==$categ){
           ?>
            <div class="section catalog page">
            <h1>Nuevo elemento.</h1>
            <h2>Este formato ya existe.</h2>
            <center><p><a href="pre_alta.php">Regresar</a>    ----    <a href="form_formato_modifica.php?id=<?php echo $row["format_id"];?>">Modificar</a></p></center>
            </div>
            <?php
            exit;
        }
    }
$query1 = "insert into formatos values (null,'$formato','$categ')";
$result4=$db->query($query1);

?>
    <div class="section catalog page">
        <h1>Nuevo elemento agregado.</h1>
        <?php
        if($result){ //$resul es lo mismo que $resul==true
        ?> 
        <h2>El elemento fue agregado exitosamente.</h2><center><img src="../img/palomita.png"></center>

        <?php
        }else{
        ?>
        <p>No se pudo agregar el elemento. Error: Solicitar ayuda a programador.</p>
        <?php
        }
        ?>
    </div>
<?php 
include("inc/footer.php");
?>