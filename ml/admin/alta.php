<?php
include("inc/connection.php");
$pageTitle="Agregar elemento";
include("inc/header.php");
$tipo=$_POST["tipo"];
if($tipo == "Formato"){
    header('Location: form_formato_alta.php');
}
?>
<link href="css/estilo.css" type="text/css" rel="stylesheet">

	<div class="section catalog page">
	<h1>Formulario para Agregar un nuevo elemento a MediaLibrary</h1>
		<div class="wrappercat2">
			<div class="breadcrumbs">
			</div>
			<div class="media-details">
				<form action="proc_alta.php" method="post" id="alta" enctype="multipart/form-data">
				<table>
				<tr>
					<th>Nombre:</th>
					<td><input type="text" name="nombre" id="nombre"></td>
				</tr>
				<tr>
					<th>Categoría</th>
					<td><input name="categoria" readonly="readondly" value=<?php echo $tipo; ?>></td>
				</tr>
				<tr>
					<th>Género</th>
					<td><select name="genero">
                           <option></option>
                            <?php
                            $sql = "select  * from genres where genre_id in (select genre_id from media where category = '$tipo')";
                            $result = $db->query($sql);
                            while($row=$result->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row["genre_id"]; ?>" ><?php echo utf8_encode($row["genre"]); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
				</tr>
				<tr>
					<th>Formato</th>
					<td><select name="formato">
                           <option></option>
                            <?php
                            $sql = "select * from formatos where category = '$tipo'";
                            $result = $db->query($sql);
                            while($row=$result->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row["format"]; ?>" ><?php echo utf8_encode($row["format"]); ?></option>
                                <?php
                            }
                            ?>
                        </select></td>
				</tr>
				<tr>
					<th>Año</th>
					<td><input type="text" name="año" id="año"></td>
				</tr>
				<?php if(strtolower($tipo)=="books") { ?>
				<tr>
					<th>Autores</th>
					<td><input type="text" name="autor" id="autor"></td>
				</tr>
				<tr>
					<th>Editorial</th>
					<td><input type="text" name="editorial" id="editorial"></td>
				</tr>
				<tr>
					<th>ISBN</th>
					<td><input type="text" name="isbn" id="isbn"></td>
				</tr>
				<?php } else if(strtolower($tipo)=="movies") {?>
				<tr>
					<th>Director</th>
					<td><input type="text" name="director" id="director"></td>
				</tr>
				<tr>
					<th>Escritores</th>
					<td><input type="text" name="escritor" id="escritor"></td>
				</tr>
				<tr>
					<th>Elenco</th>
					<td><input type="text" name="elenco" id="elenco"></td>
				</tr>
				<?php } else if(strtolower($tipo)=="music") { ?>
				<tr>
					<th>Artista</th>
					<td><input type="text" name="artista" id="artista"></td>
				</tr>
				<?php } ?>
				<tr>
					<th>imagen:</th>
					<td><input type="file" name="imagen" id="imagen" /></td>
				</tr>
				
				<tr>
                    <td></td>
                   <td>
                    <input type="submit" value="Siguiente">
                    <input type="button" value="Cancelar" onclick="location.href='pre_alta.php'">
                </td>
            </tr>
				</table>
                </form>
			</div>
		</div>
	
	</div>

<?php 
include("inc/footer.php");
?>