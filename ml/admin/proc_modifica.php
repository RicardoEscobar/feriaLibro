<?php 
include("inc/funciones.php");
require("inc/connection.php");
$pageTitle="Modificar elemento";
include("inc/header.php");
//Recibir datos
$id=$_POST["id"];

$nombre=$_POST["nombre"];
$categ=$_POST["categoria"];
$genre=$_POST["genero"];
$formato=$_POST["formato"];
$anio=$_POST["año"];

if($categ == "Books"){
$autor=$_POST["autor"];
$edit=$_POST["editorial"];
$isbn=$_POST["isbn"];
    
$query = "update books set publisher='$edit', isbn='$isbn' where media_id='$id'";
$result=$db->query($query);
modifica_and_media_people($autor,$id,"author");
}else
if($categ == "Movies"){
$direc=$_POST["director"];
$escr=$_POST["escritor"];
$stars=$_POST["elenco"];
modifica_and_media_people($direc,$id,"director");
modifica_and_media_people($escr,$id,"writer");
modifica_and_media_people($stars,$id,"star");
}else
if($categ == "Music"){
$artista=$_POST["artista"];
modifica_and_media_people($artista,$id,"artist");
}

$img=$_FILES['imagen']['name']; 
if($img){
$ruta = "img/media/" . $_FILES['imagen']['name'];
$diruta = "../".$ruta;
$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $diruta);
    
$query = "update media set img='$ruta' where media_id='$id'";
$result=$db->query($query);
}

$query2 = "update media set title='$nombre', genre_id='$genre', format='$formato', year='$anio' where media_id='$id'";
$result2=$db->query($query2);
?>
   
    <div class="section catalog page">
        <h1>Modifiación del elemento.</h1>
        <?php
        if($result2){ //$resul es lo mismo que $resul==true
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