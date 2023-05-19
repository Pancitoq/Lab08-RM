<?php
include("ConexionBD.php");

$conexion = Conectar();

$A = $_REQUEST['id'];
$sql = "DELETE FROM producto WHERE IdProducto='$A'";
$query = mysqli_query($conexion,$sql);

if ($query){
    header("location: index.php");
}
?>