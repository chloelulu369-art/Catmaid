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
        <input type="text" name="nombre" placeholder="Ingresa nombre del gato"><br><br>
        <input type="text" name="apellido" placeholder="Ingresa apellido del gato (opcional)"><br><br>
        <input type="number" name="edad" placeholder="Ingresa edad del gato"><br><br>
        <input type=""  name="genero" placeholder="ingrese genero del gato"><br><br>
        <input type=""  name="foto" placeholder="cargue una foto del gato"><br><br>
        <input type="text"  name="estado_Medico" placeholder="ingrese historial medico del gato, en caso de no tener, porfavor visite a un veterinarix"><br><br>
        <input type="text" name="direccion" placeholder="Ingresa tu dirección"><br><br>
        <input type="number" name="telefono" placeholder="Ingresa tu teléfono"><br><br>
        <input type="text" name="historia" placeholder="cuenta la historia del gato"><br>
        <input type=""  name="castracion" placeholder=""><br><br>
        <input type="submit" value="Guardar datos">
    </form>

    <?php  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre 	= $_POST["nombre"];
        $apellidos 	= $_POST["apellidos"];
        $edad 		= $_POST["edad"];
        $genero 	= $_POST["genero"];
        $foto       = $_POST["foto"];
        $estado_Medico = $_POST["estado_Medico"];
        $direccion 	= $_POST["direccion"];
        $telefono 	= $_POST["telefono"];
        $historia   = $_POST["historia"];
        $castracion = $_POST["castracion"];

        $fp = fopen("datos.txt", "a");
        fwrite($fp, $nombre . "," . $apellidos . "," . $edad . "," . $direccion . "," . $telefono . "\n");
        fclose($fp);

        echo "Los datos se han guardado correctamente en el archivo datos.txt.";
    }
    ?>
</body>
</html>