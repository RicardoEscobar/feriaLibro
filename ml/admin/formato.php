<?php
include("inc/connection.php");
$pageTitle="Tipos de Formato";

include("inc/header.php");

$sql ="select * from formatos order by category";
$result=$db->query($sql);
?>

<div class="section catalog page">
	
	<div class="wrappercat">
	    <link href="css/estilo.css" type="text/css" rel="stylesheet">
		<h1><?php echo $pageTitle; ?></h1>
		<div class="breadcrumbs">
			</div>
		<center>
           <table>
            <tr>
                <th>Formatos</th>
                <th>Categorias</th>
                <th>Accion</th>
            </tr>
            <?php 
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row["format"]; ?></td>
                <td><?php echo $row["category"]; ?></td>
                <td><a href="form_formato_modifica.php?id=<?php echo $row["format_id"];?>">Modificar</a></td>
            </tr> 
                <?php
                }
            }
            ?>
           
        </table>
        </center>
	</div>
	
</div>

<?php 
include("inc/footer.php");
?>