<?php 
include("inc/funciones.php");
require("inc/connection.php");
$pageTitle="Agregar elemento";
include("inc/header.php");

global $id;
global $genre_id;
global $people_id;

//Recibir datos
$nombre=$_POST["nombre"];
$categ=$_POST["categoria"];
$genre=$_POST["genero"];
$formato=$_POST["formato"];
$anio=$_POST["año"];

if($categ == "Books"){
$autor=$_POST["autor"];
$edit=$_POST["editorial"];
$isbn=$_POST["isbn"];
}else
if($categ == "Movies"){
$direc=$_POST["director"];
$escr=$_POST["escritor"];
$stars=$_POST["elenco"];
}else
if($categ == "Music"){
$artista=$_POST["artista"];}

$img=$_FILES['imagen']['name']; 

$ruta = "img/media/" . $_FILES['imagen']['name'];
$diruta = "../".$ruta;
$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $diruta);

$sql1 = "select  * from media";
$result1 = $db->query($sql1);
//Construir y ejecutar el query
while($row=$result1->fetch_assoc()){
    if($row["title"]==$nombre && $row["category"]==$categ) {
        ?>
        <div class="section catalog page">
        <h1>Nuevo elemento.</h1>
        <h2>Este elemento ya existe.</h2>
        <p><a href="pre_alta.php">Regresar.</a> --- <a href="modificar.php?id=<?php echo $row["media_id"];?>">Modificar.</a></p>
        </div>
        <?php
        exit;
    }
}

$sql = "select  * from genres";
$result = $db->query($sql);
//Construir y ejecutar el query
while($row=$result->fetch_assoc()){
    if($row["genre"]==$genre){
        $genre_id=$row["genre"];
    }
}
$query = "insert into media values (null,'$nombre','$ruta','$genre','$formato','$anio','$categ')";
$result1=$db->query($query);

$sql1 = "select  * from media";
$result1 = $db->query($sql1);
//Construir y ejecutar el query
while($row=$result1->fetch_assoc()){
    if($row["title"]==$nombre){
        $id=$row["media_id"];
    }
}

if($categ == "Books"){
    $sql2 = "insert into books values ('$id','$edit','$isbn')";
    $result2 = $db->query($sql2);
alta_and_media_people($autor,$id,"author");
}else
if($categ == "Movies"){
alta_and_media_people($stars,$id,"star");
alta_and_media_people($direc,$id,"director");
alta_and_media_people($escr,$id,"writer");
}else{
alta_and_media_people($artista,$id,"artist");
}

?>
    <div class="section catalog page">
        <h1>Nuevo elemento agregado.</h1>
        <?php
        if($result1){ //$resul es lo mismo que $resul==true
        ?> 
        <h2>El elemento fue almacenado exitosamente.</h2><center><img src="../img/palomita.png"></center>
        <?php
        }else{
        ?>
        <p>No se completo la carga del elemento. Error: Solicitar ayuda a programador.</p>
        <?php
        }
        ?>
    </div>
<?php 
include("inc/footer.php");
?>