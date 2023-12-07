<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";
$port = "3306"; //Cambiar acá el puerto
// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname, $port);
// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}/* else {
    echo "Conectado con exito";
} */
?>