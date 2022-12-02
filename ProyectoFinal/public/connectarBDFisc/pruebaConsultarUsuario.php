<?php


$hostname='localhost';
$database='fisc';
$username='root';
$password='';

$variableu=$_POST['cedula'];
$variablep=$_POST['clave'];

//Creamos la conexión
 $conexion = new mysqli($hostname, $username, $password, $database);

if($conexion->connect_errno)
{
    echo "errorcin";
}
   //mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

$sentencia = $conexion->prepare("SELECT * FROM usuario WHERE cedula=? AND clave=?");
$sentencia->bind_param('ss',$variableu,$variablep);
$sentencia->execute(); 

$resultado = $sentencia->get_result();
if($fila = $resultado->fetch_assoc()){
    echo json_encode($fila,JSON_UNESCAPED_UNICODE);
}
$sentencia->close();
$conexion->close();

?>