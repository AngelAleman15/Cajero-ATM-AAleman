<?php
// Configuración de la base de datos
$host = 'localhost';
$dbname = 'Tarjetas';
$username = 'root';
$password = '';

// Crear conexión MySQLi
$mysqli = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Configurar charset UTF-8
$mysqli->set_charset("utf8");

// Variable global para usar en otros archivos
$connection = $mysqli;
?>
