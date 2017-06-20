<?php
include("inc/funciones.php");
include("inc/connection.php");
$catalog=full_catalog_array();

if(isset($_GET["id"])) {
	$id=filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);
	$item=single_item_array($id);
}

if(empty($item)) {
	header("location: catalogo.php");
	exit;
}

$pageTitle="Modificar elemento";
$section=null;

$tipo=$item["category"];
include("inc/header.php");

?>

	<div class="section catalog page">
	<h1>¿Seguro que desea Modificar este elemento de MediaLibrary?</h1>
		<div class="wrappercat">
			<div class="breadcrumbs">
			</div>
			<div class="media-picture">
				<span><img src="../<?php echo $item["img"]; ?>" title="<?php echo $item["title"]; ?>"></span>
			</div>
			<div class="media-details">
				<form action="proc_modifica.php" method="post" enctype="multipart/form-data">
				<table>
				<tr>
					<th>Nombre</th>
					<td> <input name="nombre" id="nombre" type="text" value="<?php echo $item["title"]; ?>"></td>
				</tr>
				<tr>
					<th>Categoría</th>
					<td> <input name="categoria" readonly="readondly" value="<?php echo $item["category"]; ?>"></td>
				</tr>
				<tr>
					<th>Género</th>
					<td><select name="genero">
                            <?php
                            $gen;
                            $sql2 = "select * from media where media_id='$id'";
                            $result2 = $db->query($sql2);
                            while($row=$result2->fetch_assoc()){
                                if($row["media_id"]==$id){
                                $gen=$row["genre_id"];    
                                }
                            }
                        
                            $sql = "select * from genres where genre_id in (select genre_id from media where category = '$tipo')";
                            $result = $db->query($sql);
                            while($row=$result->fetch_assoc()){
                                if($row["genre_id"]!=$gen){
                                ?>
                                <option value="<?php echo $row["genre_id"]; ?>" ><?php echo utf8_encode($row["genre"]); ?></option>
                                <?php
                                }else{
                                ?>
                                <option value="<?php echo $gen ?>" selected="selected" ><?php echo utf8_encode($row["genre"]); ?></option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
				</tr>
				<tr>
					<th>Formato</th>
					<td><select name="formato">
                            <?php
                            $gen;
                            $sql2 = "select * from media where media_id='$id'";
                            $result2 = $db->query($sql2);
                            while($row=$result2->fetch_assoc()){
                                if($row["media_id"]==$id){
                                $format=$row["format"];    
                                }
                            }
                        
                            $sql = "select format from formatos where category = '$tipo'";
                            $result = $db->query($sql);
                            while($row=$result->fetch_assoc()){
                                if($row["format"]!=$format){
                                ?>
                                <option value="<?php echo $row["format"]; ?>" ><?php echo utf8_encode($row["format"]); ?></option>
                                <?php
                                }else{
                                ?>
                                <option value="<?php echo $format ?>" selected="selected" ><?php echo utf8_encode($row["format"]); ?></option>
                                <?php
                                }
                            }
                            ?>
                        </select></td>
				</tr>
				<tr>
					<th>Año</th>
					<td> <input name="año" id="año" type="text" value="<?php echo $item["year"]; ?>"></td>
				</tr>
				<?php if(strtolower($item["category"])=="books") { ?>
				<tr>
					<th>Autores</th>
					<td> <input name="autor" id="autores" type="text" value="<?php echo implode(", ",$item["author"]); ?>"></td>
				</tr>
				<tr>
					<th>Editorial</th>
					<td> <input name="editorial" id="editorial" type="text" value="<?php echo $item["publisher"]; ?>"></td>
				</tr>
				<tr>
					<th>ISBN</th>
					<td> <input name="isbn" id="isbn" type="text" value="<?php echo $item["isbn"]; ?>"></td>
				</tr>
				<?php } else if(strtolower($item["category"])=="movies") {?>
				<tr>
					<th>Director</th>
					<td> <input name="director" id="director" type="text" value="<?php echo implode(", ",$item["director"]); ?>"></td>
				</tr>
				<tr>
					<th>Escritores</th>
					<td> <input name="escritor" id="escritor" type="text" value="<?php echo implode(", ",$item["writer"]); ?>"></td>
				</tr>
				<tr>
					<th>Elenco</th>
					<td> <input name="elenco" id="elenco" type="text" value="<?php echo implode(", ",$item["star"]); ?>"></td>
				</tr>
				<?php } else if(strtolower($item["category"])=="music") { ?>
				<tr>
					<th>Artista</th>
					<td> <input name="artista" id="artista" type="text" value="<?php echo implode(", ",$item["artist"]); ?>"></td>
				</tr>
				<?php } ?>
				<tr>
					<th>Imagen </th>
					<td><input type="file" name="imagen" id="imagen" value="<?php echo $item["img"]; ?>"/></td>
				</tr>
				<tr>
               <td></td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" value="Siguiente">
                    <input type="button" value="Cancelar" onclick="location.href='javascript:history.back(-1);'">
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