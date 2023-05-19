<?php

include('ConexionBD.php');

$Nombre = $_POST['Nombre'];
$Descripcion = $_POST['Descripcion'];
$Stock =$_POST['Stock'];
$PrecioVenta =$_POST['PrecioVenta'];

$conexion = Conectar();

$query = $conexion->prepare("INSERT INTO producto (Nombre, Descripcion, Stock, PrecioVenta) VALUES (?, ?, ?, ?)");
$query ->bind_param('ssss', $Nombre, $Descripcion, $Stock, $PrecioVenta);
$msg = '';
if ($query ->execute()){
    header("location: index.php");
    $msg = 'Producto registrado';
}
else{
    $msg= 'No se pudo registrar al Producto';
}

Desconectar($conexion)
?>

