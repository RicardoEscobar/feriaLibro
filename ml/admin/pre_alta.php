<?php
include("inc/funciones.php");
$pageTitle="Agregar elemento";
include("inc/header.php");

?>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
	<div class="section catalog page">
	<h1>¿Que tipo elemento desea agregar en MediaLibrary?</h1>
		<div class="wrappertab">
           <form action="alta.php" method="post">
           <center>
       <table>
           <tr>
            <td><div id="cat"><br><label><input type="radio" name="tipo" id="tipo" value="Books"> LIBRO</label></div></td>
                <td><div id="cat"><br><label><input type="radio" name="tipo" id="tipo" value="Movies"> PELICULA</label></div></td>
               <td><div id="cat"><br><label><input type="radio" name="tipo" id="tipo" value="Music"> MUSICA</label></div></td>
               <td><div id="cat"><br><label><input type="radio" name="tipo" id="tipo" value="Formato"> FORMATO</label></div></td>
            </tr>
            <tr>
            <td></td>
            <td><input type="submit" value="Continuar"></td>
            <td><input type="button" value="Cancelar" onclick="location.href='catalogo.php'"></td>
            <td></td>
            </tr>
            </table>
            </center>
            </form>
		</div>
	
	</div>

<?php 
include("inc/footer.php");
?>
