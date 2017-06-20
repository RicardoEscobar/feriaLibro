<?php
require("inc/connection.php");

$user=$_POST["user"];
$pass=md5($_POST["pass"]);

$sql="select * from admin where username='$user'";

$result=$db->query($sql);
if($result->num_rows>0){
    $row=$result->fetch_array(MYSQLI_ASSOC);
    if($row["password"] == $pass){
        session_start();
        $_SESSION["loggedin"]=true;
        $_SESSION["username"]=$user;
        $_SESSION["fullname"]=$row["fullname"];
        $_SESSION["start"]=time();
        $_SESSION["expire"]=$_SESSION["start"]+5*120;
        
        ?>
        <html style="background: url(../img/bienvenida.jpg) no-repeat center; margin: 310px ;">
                <div style="background-color: white; " >
                   <center>
                   <br>
                   <h1 style="font-family: 'Anton', sans-serif;">BIENVENIDO</h1>
                    <?php
                    echo "".utf8_encode($_SESSION["fullname"])." serás redirigido al panel de control.";
                    ?>
                    <br>
                    <br>
                    </center>
                </div>
        </html>        
    <meta http-equiv="refresh" content="3;url=catalogo.php">
    
    <?php
    }else{
        ?>
        <html style="margin: 310px ;">
            <div style="background-color: white; " >
            <center>
            <br>
            <h1 style="font-family: 'Anton', sans-serif;">Oh!! Oh!!</h1>
              <p style=" color: red; font-size: 22px; font-family: 'Anton', sans-serif;">
               <?php
                echo "Contraseña incorrecta.";
                ?>
                </p>
            <br>
            <br>
        </center>
        </div>
        </html>        
        
    <meta http-equiv="refresh" content="3;url=index.php">
    
    <?php
    }}else{
    ?>
    
    <html style="margin: 310px ;">
        <div style="background-color: white;" >
            <center>
            <br>
            <h1 style="font-family: 'Anton', sans-serif;">Oh!! Oh!!</h1>
            <p style=" color: blue; font-size: 22px; font-family: 'Anton', sans-serif;">
                <?php
                echo "Nombre de usuario incorrecto.";
                ?>
            </p>
            <br>
            <br>
            </center>
        </div>
    </html>
    
    <meta http-equiv="refresh" content="3;url=index.php">
    <?php
    }
?>