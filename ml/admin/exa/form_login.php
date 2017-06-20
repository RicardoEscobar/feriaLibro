<!DOCTYPE html>
<html>
    <head>
        <title>Iniciar sesión :: Contactos</title>
        <link href="estilo.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Iniciar sesión</h1>
        <form action="do_login.php" method="post">
            <table>
                <tr>
                    <td>Usuario:</td>
                    <td><label for="user"><input type="text" name="user" id="user"></label></td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td><label><input type="password" name="pass" id="pass"></label></td>
                </tr>
                <tr>
                    <td colspan="2" ><div class="centrado">
                        <input type="submit" value="Ingresar">
                        <input type="reset" value="Limpiar">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">¿Nuevo? <a href="form_register.php">Regístrate</a></td>
                </tr>
                <tr>
                    <td colspan="2">¿Olvidadizo? <a href="form_retrievepass.php">Recupera tu contraseña.</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>