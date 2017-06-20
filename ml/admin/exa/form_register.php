<?php
require("connection.php");

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Alta de usuarios :: Formulario</title>
        <link href="estilo.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Alta de usuario</h1>
        <form action="proc_register.php" method="post">
            <table>
                <tr>
                    <td>Usuario: </td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Nombre: </td>
                    <td><input type="text" name="fullname"></td>
                </tr>
                <tr>
                    <td>Contraseña: </td>
                    <td><input type="password" name="userpass"></td>
                </tr>
                <tr>
                    <td>Verificar: </td>
                    <td><input type="password" name="userpass2"></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Agregar">
                        <input type="reset" value="Limpiar">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>