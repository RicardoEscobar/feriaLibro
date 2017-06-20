<?php
include("inc/connection.php");
$pageTitle="Modifica Formato";
include("inc/header.php");

?>
<div class="section catalog page">
	
	<div class="wrappercat">
	    <link href="css/estilo.css" type="text/css" rel="stylesheet">
	    <h1>Modifica el formato seleccionado</h1>
		<center>
				<form action="proc_formato_alta.php" method="post" id="alta" enctype="multipart/form-data">
				<table>
				<tr>
					<th>Formato </th>
					<td><input type="text" name="form" id="form"></td>
				</tr>
				<tr>
					<th>Categoria </th>
					<td><select name="categoria">
                           <option></option>
                            <?php
                            $sql = "select DISTINCT category from formatos";
                            $result = $db->query($sql);
                            while($row=$result->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row["category"]; ?>" ><?php echo utf8_encode($row["category"]); ?></option>
                                <?php
                            }
                            ?>
                        </select></td>
				</tr>
				<tr>
				<tr>
                    <td></td>
                   <td>
                    <input type="submit" value="Enviar">
                    <input type="button" value="Cancelar" onclick="location.href='pre_alta.php'">
                </td>
            </tr>
				</table>
                </form>
        </center>
			</div>
		</div>
	</div>
<?php 
include("inc/footer.php");
?>