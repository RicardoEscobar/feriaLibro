<?php
include("inc/funciones.php");
$catalog=full_catalog_array();

if(isset($_GET["id"])) {
	$id=filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);
	$item=single_item_array($id);
}

if(empty($item)) {
	header("location: catalogo.php");
	exit;
}

$pageTitle="Catálogo completo";
$section=null;

include("inc/header.php");

?>

	<div class="section catalog page">
	<h1>Detalles</h1>
		<div class="wrappercat">
			<div class="breadcrumbs">
			
			</div>
			<div class="media-picture">
				<span><img src="../<?php echo $item["img"]; ?>" title="<?php echo $item["title"]; ?>"></span>
			</div>
			<div class="media-details">
				<h1><?php echo $item["title"]; ?></h1>
				<table>
				<tr>
					<th>Categoría</th>
					<td><?php echo $item["category"]; ?></td>
				</tr>
				<tr>
					<th>Género</th>
					<td><?php echo $item["genre"]; ?></td>
				</tr>
				<tr>
					<th>Formato</th>
					<td><?php echo $item["format"]; ?></td>
				</tr>
				<tr>
					<th>Año</th>
					<td><?php echo $item["year"]; ?></td>
				</tr>
				<?php if(strtolower($item["category"])=="books") { ?>
				<tr>
					<th>Autores</th>
					<td><?php echo implode(", ",$item["author"]); ?></td>
				</tr>
				<tr>
					<th>Editorial</th>
					<td><?php echo $item["publisher"]; ?></td>
				</tr>
				<tr>
					<th>ISBN</th>
					<td><?php echo $item["isbn"]; ?></td>
				</tr>
				<?php } else if(strtolower($item["category"])=="movies") {?>
				<tr>
					<th>Director</th>
					<td><?php echo implode(", ",$item["director"]); ?></td>
				</tr>
				<tr>
					<th>Escritores</th>
					<td><?php echo implode(", ",$item["writer"]); ?></td>
				</tr>
				<tr>
					<th>Elenco</th>
					<td><?php echo implode(", ",$item["star"]); ?></td>
				</tr>
				<?php } else if(strtolower($item["category"])=="music") { ?>
				<tr>
					<th>Artista</th>
					<td><?php echo implode(", ",$item["artist"]); ?></td>
				</tr>
				<?php } ?>
				</table>
			</div>
		</div>
	
	</div>

<?php 
include("inc/footer.php");
?>