<?php
// Datos de conexión
$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "formacion_integral";

// Crear conexión
$conn = new mysqli($servidor, $usuario, $password, $bd);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>