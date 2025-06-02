<?php
// Conexión a la base de datos
$con = mysqli_connect('localhost', 'root', '', 'formulario') 
    or die('Error al conectar a la base de datos.');

// Sanitizar entradas
$nombre = mysqli_real_escape_string($con, $_POST['nombre']);
$telefono = mysqli_real_escape_string($con, $_POST['telefono']);
$calificacion_sabor = intval($_POST['calificacion_sabor']);
$opinion_variedad = mysqli_real_escape_string($con, $_POST['opinion_variedad']);
$producto_favorito = mysqli_real_escape_string($con, $_POST['producto_favorito']);

// Validación básica
if ($nombre === "" || $telefono === "" || $calificacion_sabor < 1 || $calificacion_sabor > 10 || 
    $opinion_variedad === "" || $producto_favorito === "") {
    die("Datos inválidos.");
}

// Insertar en la tabla
$sql = "INSERT INTO resultado (
          nombre, telefono, calificacion_sabor, opinion_variedad, producto_favorito
        ) VALUES (
          '$nombre', '$telefono', $calificacion_sabor, '$opinion_variedad', '$producto_favorito'
        )";

if (!mysqli_query($con, $sql)) {
    die("Error al guardar los datos: " . mysqli_error($con));
}

mysqli_close($con);

// Redirección
echo "<script>alert('¡Gracias por tu participación!'); window.location.href = 'index.html';</script>";
?>
