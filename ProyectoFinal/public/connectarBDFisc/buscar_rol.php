<?php

include_once 'conexionFisc.php';
//$nombrep = "8-978-876";
$nombrep = $_GET['cedula'];

$consulta = "select cedula,id_rol_usuario from usuario where cedula = '$nombrep'";
$resultado = $conexion->query($consulta);

while($fila=$resultado->fetch_array()){
    $usuarios[] = array_map('utf8_encode', $fila);
}

echo json_encode($usuarios);
$resultado -> close();

?>