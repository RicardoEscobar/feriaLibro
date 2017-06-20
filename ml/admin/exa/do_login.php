<?php
require ("connection.php");
//Variables
$user=$_POST["user"];
$pass=md5($_POST["pass"]);
//Query
$sql="select * from usuario where id_user='$user'";
$result = $db->query($sql);
if($result->num_rows>0){
    $row=$result->fetch_array(MYSQLI_ASSOC);
    if($row["pass_user"]==$pass){
        session_start();
        $_SESSION["loggedin"]=true;
        $_SESSION["username"]=$user;
        $_SESSION["fullname"]=$row["nom_user"];
        $_SESSION["start"]=time();
        $_SESSION["expire"]=$_SESSION["start"]+5*60;
        echo "Bienvenido ".$_SESSION["fullname"]." serás redirigido al panel de control";
        ?>
        <meta http-equiv="refresh" content="3;url=panel.php">
        <?php
    } else{
        echo "Contraseña incorrecta";
        ?>
        <meta http-equiv="refresh" content="3;url=form_login.php">
        <?php
    }
}else{
    echo "Nombre de usuario incorrecto";
    ?>
    <meta http-equiv="refresh" content="3;url=form_login.php">
    <?php
}
?>