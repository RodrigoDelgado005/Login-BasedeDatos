<?php
// Configuración de la base de datos
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "logindb"; 

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("La conexión fallo: " . $conn->connect_error);
}
echo "Conexión exitosa a la base de datos";

// Cerrar conexión
$conn->close();
?>
