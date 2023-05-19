<?php
function Conectar(){
    $xc = mysqli_connect("localhost","root","usbw","eval02");
    return $xc;
    die();
}

function Desconectar($xc){
    mysqli_close($xc);
}
?>