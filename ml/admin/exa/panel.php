<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true){
    $now = time();
    if($now>$_SESSION["expire"]) {
        session_destroy();
        echo "Su sesión ha expirado. Por favor inicie nuevamente sesión";
        ?>
        <meta http-equiv="refresh" content="3;url=form_login.php">
        <?php
    }
} else {
    echo "No tiene derechos para acceder a este sitio. Por favor inicie sesión";
    ?>
    <meta http-equiv="refresh" content="3;url=form_login.php">
    <?php
}
?>