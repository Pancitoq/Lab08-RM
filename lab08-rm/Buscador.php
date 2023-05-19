<?php

$conn = mysqli_connect("localhost", "root", "usbw", "eval02");

if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

if (isset($_GET['busqueda'])) {
    $busqueda = $_GET['busqueda'];

    // Consulta SQL para buscar coincidencias en la base de datos
    $query = "SELECT * FROM producto WHERE nombre LIKE '%$busqueda%' OR Descripcion LIKE '%$busqueda%'";
    $result = mysqli_query($conn, $query);

    // Mostrar los resultados de la búsqueda
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Resultados de la búsqueda:</h2>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>Nombre: " . $row['Nombre'] . "</p>";
            echo "<p>Descripción: " . $row['Descripcion'] . "</p>";
            echo "<p>Stock: " . $row['Stock'] . "</p>";
            echo "<p>Precio de venta: " . $row['PrecioVenta'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "<p>No se encontraron resultados.</p>";
    }
}

mysqli_close($conn);
?>

<form action="" method="GET">
    <input type="text" name="busqueda" placeholder="Buscar productos">
    <input type="submit" value="Buscar">
</form>
