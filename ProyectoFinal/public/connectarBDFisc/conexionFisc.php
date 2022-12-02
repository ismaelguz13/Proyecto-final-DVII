<?php
$hostname='localhost';
$database='fisc';
$username='root';
$password='';

//echo "<h1>Conectado<h1>";

$conexion=new mysqli($hostname,$username,$password,$database);
if($conexion->connect_errno){
    echo "<h1>Lo sentimos no puedemos conectarlo<h1>";
}else{
  // echo "<h1>Conectado<h1>"; 
}
?>