<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true ){
    $now= time();
    if($now>$_SESSION["expire"]){
        session_destroy();
        echo "Su sesión ha expirado. Por favor inicide nuevamente sesión.";
        ?>
    <meta http-equiv="refresh" content="3;url=index.php">
<?php
    }
    }else{
        echo "No tiene derechos para acceder a este sitio. Por favor inicie sesión.";
        ?>
    <meta http-equiv="refresh" content=".5;url=error.html">
<?php
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $pageTitle; ?></title>
	<link href="css/normalize.css" rel="stylesheet" type="text/css">
	<link href="css/sesion.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="header">
	<div class="wrapper">
		<h1 class="branding-title">Modo Administrador de la Biblioteca multimedia personal de JM</h1>
		<ul class="nav">
            <li class="alta"><a href="pre_alta.php">Nuevo</a></li>
            <li class="formatos"><a href="formato.php">Formatos</a></li>
			<li class="books"><a href="catlib.php">Libros</a></li>
			<li class="movies"><a href="catpeli.php">Películas</a></li>
			<li class="music"><a href="catmus.php">Música</a></li>
		</ul>
		<ul class="sesion">
		    <li class="sesion">
		    <?php
                session_destroy();
                ?>
		    <a href="index.php"><br>Cerrar sesión</a></li>
		</ul>

	</diV>
</div>
<div id="content"> <!-- inicio del contenido -->