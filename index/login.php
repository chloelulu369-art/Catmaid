<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
     <form action="" method="post">
        <input type="text" name="nombre" placeholder="Ingresa tu nombre"><br><br>
        <input type="text" name="apellidos" placeholder="Ingresa tu apellido"><br><br>
        <input type="number" name="edad" placeholder="Ingresa tu edad"><br><br>
        <input type="text" name="direccion" placeholder="Ingresa tu dirección"><br><br>
        <input type="text" name="telefono" placeholder="Ingresa tu teléfono"><br><br>
        <input type="submit" value="Guardar datos">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre 	= $_POST["nombre"];
        $apellidos 	= $_POST["apellidos"];
        $edad 		= $_POST["edad"];
        $direccion 	= $_POST["direccion"];
        $telefono 	= $_POST["telefono"];

        $fp = fopen("datos.txt", "a");
        fwrite($fp, $nombre . "," . $apellidos . "," . $edad . "," . $direccion . "," . $telefono . "\n");
        fclose($fp);

        echo "Los datos se han guardado correctamente en el archivo datos.txt.";
    }
    ?>
    <sql>
        insert into usuarios (nombre, clave) values ();
    </sql>
</body>
</html>