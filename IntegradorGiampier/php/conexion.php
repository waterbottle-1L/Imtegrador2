<?php
$servidor = "localhost:3308";
$usuario = "root";
$contraseña =  "";
$base_de_datos = "dbsistemakfc";

$conexion = mysqli_connect($servidor,$usuario,$contraseña,$base_de_datos);

if(!$conexion){
die("Conexion fallida" . mysqli_connect_error());
}

?>