<html>
<head>
    <title>Iniciar sesión :: Contactos</title>
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    </head>
<body>
    <center><img src="../img/sesion.png"></center>
    <center><h1>Iniciar sesión</h1>
    <form action="do_login.php" method="post">
    <table>
        <tr>
            <td>Usuario</td>
            <td><label for="user"><input type="text" name="user" id="user"></label></td>
        </tr>
        <tr>
            <td>Contraseña</td>
            <td><label for="pass"><input type="password" name="pass" id="pass"></label></td>
        </tr>
        <tr>
            <td colspan="2"><div class="centrado">
                <input type="submit" value="Ingresar">
                <input type="reset" value="Limpiar">
                </div>
            </td>
        </tr>
    </table>
    </form>
    </center>
    </body>
</html>