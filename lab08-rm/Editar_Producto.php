<?php
// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "usbw", "eval02");

// Verificar la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener el ID del producto a editar
$id = $_GET['id'];

// Obtener los datos actuales del producto
$query = "SELECT * FROM producto WHERE IdProducto = $id";
$resultado = mysqli_query($conn, $query);
$Producto = mysqli_fetch_assoc($resultado);

// Comprobar si se envió el formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los nuevos datos del formulario
    $Nombre = $_POST['Nombre'];
    $Descripcion = $_POST['Descripcion'];
    $Stock = $_POST['Stock'];
    $PrecioVenta = $_POST['PrecioVenta'];

    // Actualizar los datos del producto en la base de datos
    $query = "UPDATE producto SET Nombre = '$Nombre', Descripcion = '$Descripcion', Stock = $Stock, PrecioVenta = $PrecioVenta WHERE IdProducto = $id";
    if (mysqli_query($conn, $query)) {
        echo "Producto actualizado correctamente";
        // Redireccionar a la página de lista de productos o mostrar un mensaje de éxito
    } else {
        echo "Error al actualizar el producto: " . mysqli_error($conn);
    }
    if ($query){
        header("location: index.php");
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form method="POST">
        <label for="Nombre">Nombre:</label>
        <input type="text" name="Nombre" value="<?php echo $Producto['Nombre']; ?>"><br><br>
        
        <label for="Descripcion">Descripción:</label>
        <input type="text" name="Descripcion" value="<?php echo $Producto['Descripcion']; ?>"><br><br>
        
        <label for="Stock">Stock:</label>
        <input type="number" name="Stock" value="<?php echo $Producto['Stock']; ?>"><br><br>
        
        <label for="PrecioVenta">Precio de Venta:</label>
        <input type="number" step="0.01" name="PrecioVenta" value="<?php echo $Producto['PrecioVenta']; ?>"><br><br>
        
        <input type="submit" value="Guardar cambios">
    </form>
</body>
</html>

