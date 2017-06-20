<?php
include("inc/functions.php");
$catalog=full_catalog_array();

$pageTitle="Biblioteca multimedia personal";
include("inc/header.php");
?>

		<div class="section catalog random">
			<div class="wrapper">
				<h2>¿Me permite sugerirle esto?</h2>
				<ul class="items">
					<?php
						$random = array_rand($catalog,4);
						foreach($random as $id) {
							echo get_item_html($id,$catalog[$id]);
						}
					?>
				</ul>
			</div>
		</div>

<?php 
include("inc/footer.php");
?>