<?php require("connection.php"); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Alta de contacto :: formulario</title>
        <link href="estilo.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Alta de contacto</h1>
        <form action="proc_alta.php" method="post">
            <p><label for="nom">Nombre del contacto</label><br>
                <input type="text" name="nom" id="nom"></p>
            <p><label for="ape">Apellido(s) del contacto</label><br>
                <input type="text" name="ape" id="ape"></p>
            <p><label for="email">E-mail del contacto</label><br>
                <input type="text" name="email" id="email"></p>
            <p><label for="cel">Celular del contacto</label><br>
                <input type="text" name="cel" id="cel"></p>
            <p><label for="fijo">Teléfono del contacto</label><br>
                <input type="text" name="fijo" id="fijo"></p>
            <p><label for="sexo">Sexo del contacto</label><br>
                <input type="radio" name="sexo" id="sexo" value="F">Femenino<br>
                <input type="radio" name="sexo" id="sexo" value="M">Masculino<br>
                <input type="radio" name="sexo" id="sexo" value="O">Otro</p>
            <p><label for="cd">Ciudad del contacto</label><br>
                <input type="text" name="cd" id="cd"></p>
            <p><label for="edo">Estado del contacto</label><br>
                <select name="edo">
                    <?php
                    $sql = "select * from estado";
                    $result = $db->query($sql);
                    while($row=$result->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row["id_edo"]; ?>"><?php echo utf8_encode($row["nom_edo"]); ?></option>
                        <?php
                        
                    }
                    ?>
                    
                </select></p>
            <input type="submit" value="Agregar">
        </form>
    </body>
</html>