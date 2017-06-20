<?php
include("inc/connection.php");
$pageTitle="Modifica Formato";
include("inc/header.php");
$id=$_GET["id"];

$sql2 = "select * from formatos where format_id='$id'";
$result2 = $db->query($sql2);
while($row=$result2->fetch_assoc()){
if($row["format_id"]==$id){
$gen=$row["format"];
$cat=$row["category"];
}
}

?>
<div class="section catalog page">
	
	<div class="wrappercat">
	    <link href="css/estilo.css" type="text/css" rel="stylesheet">
	    <h1>Modifica el formato seleccionado</h1>
		<center>
				<form action="proc_formato_modifica.php" method="post" id="alta" enctype="multipart/form-data">
				<table>
				<tr>
					<th>Formato </th>
					<td><input type="text" name="form" id="form" value="<?php echo $gen; ?>"></td>
				</tr>
				<tr>
				    <th>Categoria </th>
					<td><select name="categoria">
                           <option></option>
                            <?php
                            $sql = "select DISTINCT category from formatos";
                            $result = $db->query($sql);
                            while($row=$result->fetch_assoc()){
                                if($row["category"]!=$cat){
                                ?>
                                <option value="<?php echo $row["category"]; ?>" ><?php echo utf8_encode($row["category"]); ?></option>
                                <?php
                                }else{
                                ?>
                                <option value="<?php echo $gen ?>" selected="selected" ><?php echo utf8_encode($row["category"]); ?></option>
                                <?php
                                }
                            }
                            ?>
                        </select></td>
				</tr>
				<tr>
                    <td></td>
                   <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" value="Enviar">
                    <input type="button" value="Cancelar" onclick="location.href='formato.php'">
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