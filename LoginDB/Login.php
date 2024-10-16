<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "logindb");

// Verificar la conexión
if ($conn->connect_error) {
    die(json_encode(["success" => false, "Mensaje" => "Error de conexión"]));
}

// Obtenemos los datos del cuerpo de la solicitud
$data = json_decode(file_get_contents("php://input"), true);
$userEmail = $data['UserEmail'] ?? null;
$userPw = $data['UserPw'] ?? null;

// Verifica que los datos existen
if (!$userEmail || !$userPw) {
    echo json_encode(["success" => false, "Mensaje" => "Datos incompletos"]);
    exit;
}

// Busca  el correo en la base de datos
$result = $conn->query("SELECT UserPw FROM newuser WHERE UserEmail = '$userEmail'");
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(["success" => $row['UserPw'] === $userPw]);
} else {
    echo json_encode(["success" => false, "Mensaje" => "Email no encontrado"]);
}

// Cerrar la conexión
$conn->close();
?>
