<!DOCTYPE html>
<html>
    <head>
        <title>Recuperar contraseña :: Formulario</title>
        <link href="estilo.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Recuperar contraseña</h1>
        <p>Proporcione el nombre de usuario o el correo electrónico para recuperar su contraseña.</p>
        <form action="proc_retrievepass.php" method="post">
            <table>
                <tr>
                    <td>Usuario: </td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Recuperar">
                    <input type="button" value="Cancelar" onclick="location.href='form_login.php'"></td>
                </tr>
            </table>
        </form>
    </body>
</html>