<?php
require 'conexion.php';

if(isset($_POST['login'])){
$correo = $_POST['correo'];
$contraseña = $_POST['password'];

$sql = "SELECT * FROM usuario WHERE email = '$correo' and password = '$contraseña'";

$resultado = mysqli_query($conexion, $sql);

$numero_registros = mysqli_num_rows($resultado);

if($numero_registros !=0 ){
//echo "Inicio de sesion exitoso .Bienvenido". $correo . "!"  ;
header("Location: index.php");
exit();

}else{
    //echo "Credenciales invalidas. Por favor, verifica tu nombre de usuario y/o contraseña." ."<br>";
    //echo "Error: ".$sql."<br>". mysqli_error($conexion);
    header("Location: ../Login.html");
exit();
}
}


?>