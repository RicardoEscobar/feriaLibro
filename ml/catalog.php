<?php
include("inc/functions.php");
$catalog=full_catalog_array();

$pageTitle="Catálogo completo";
$section=null;
if(isset($_GET['cat'])) {
	$full_catalog="<a href='catalog.php'>Catálogo completo</a> &gt; ";
	if($_GET['cat']=="books") {
		$pageTitle="$full_catalog Catálogo de libros";
		$section="books";
	} elseif($_GET['cat']=="movies") {
		$pageTitle="$full_catalog  Catálogo de películas";
		$section="movies";
	} else {
		$pageTitle="$full_catalog Catálogo musical";
		$section="music";
	}
}
include("inc/header.php");

?>

<div class="section catalog page">
	
	<div class="wrapper">
	
		<h1><?php echo $pageTitle; ?></h1>
		<ul class="items">
			<?php
				$categories=array_category($catalog,$section);
				foreach($categories as $id) {
					echo get_item_html($id,$catalog[$id]);
				}
			?>
		</ul>
	
	</div>
	
</div>

<?php 
include("inc/footer.php");
?>