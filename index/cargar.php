<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar adopcion</title>
</head>
<!-- formulario "cargar gato" -->
<body>
     <form action="" method="post">
        <input type="text" name="nombre" placeholder="Ingresa su nombre"><br><br>
        <input type="text" name="apellido" placeholder="Ingresa su apellido"><br><br>
        <input type="number" name="edad" placeholder="Ingresa su edad"><br><br>
        <input type=""  name="genero" placeholder=""><br><br>
        <input type=""  name="foto" placeholder=""><br><br>
        <input type=""  name="estado_Medico" placeholder=""><br><br>
        <input type="text" name="direccion" placeholder="Ingresa tu dirección"><br><br>
        <input type="number" name="telefono" placeholder="Ingresa tu teléfono"><br><br>
        <input type="text" name="historia" placeholder="cuenta su historia "><br>
        <input type=""  name="castracion" placeholder=""><br><br>
        <input type="submit" value="Guardar datos">
    </form>

    <?php  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre 	= $_POST["nombre"];
        $apellidos 	= $_POST["apellidos"];
        $edad 		= $_POST["edad"];
        $genero;
        $foto;
        $estado_Medico;
        $direccion 	= $_POST["direccion"];
        $telefono 	= $_POST["telefono"];
        $historia   = $_POST["historia"];
        $castracion;

        $fp = fopen("datos.txt", "a");
        fwrite($fp, $nombre . "," . $apellidos . "," . $edad . "," . $direccion . "," . $telefono . "\n");
        fclose($fp);

        echo "Los datos se han guardado correctamente en el archivo datos.txt.";
    }
    ?>
</body>
</html>