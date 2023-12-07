<?php
$servidor = "localhost";
$usuario = "root";
$contraseña =  "ElñPiero7298";
$base_de_datos = "dbsistemakfc";

$conexion = mysqli_connect($servidor,$usuario,$contraseña,$base_de_datos);

if(!$conexion){
die("Conexion fallida" . mysqli_connect_error());
}

?>