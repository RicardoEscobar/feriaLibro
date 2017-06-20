<?php
include("inc/funciones.php");
$catalog=full_catalog_array();

$pageTitle="Catálogo completo";
$section=null;

include("inc/header.php");

?>

<div class="section catalog page">
	
	<div class="wrappercat">
	
		<h1><?php echo $pageTitle; ?></h1>
		<center>
		<ul class="items">
			<?php
				$categories=array_category($catalog,$section);
				foreach($categories as $id) {
					echo delete_item($id,$catalog[$id]);
				}
			?>
		</ul>
	</center>
	</div>
	
</div>

<?php 
include("inc/footer.php");
?>