<?php
require("connection.php");
//variables
$user = $_POST["username"];
$email = $_POST["email"];
if(!empty($user)){
    $sql="select * from usuario where user='$user''";
    $res1 = $db->query($sql1);
    if($res1->num_rows==1){
        echo "Enviar correo";
    }else{
        $msg = "No existe el usuario";
    }
}else{
    if(!empty($email)){
        $sql2 = "select * from usuario where email_user='$email'";
        $res2 = $db->query($sql2);
        if($res2->num_rows==1){
            echo "Enviar correo";
        } else{
            $msg="No existe el correo electrónico";
        }
    } else{
        echo "Proporcione algún dato";
        ?>
        <meta http-equiv="refresh" content="3;URL='form_retrievepass.php'">
        <?php
    }
}

?>