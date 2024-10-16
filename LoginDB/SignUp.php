<?php
// Configuración de la base de datos
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "logindb"; 

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtiene datos del cuerpo de la solicitud
$data = json_decode(file_get_contents("php://input"), true);

// Valida que los datos existen
if (isset($data['UserName'], $data['UserEmail'], $data['UserPw'])) {
    $userName = $data['UserName'];
    $userEmail = $data['UserEmail'];
    $userPw = $data['UserPw'];

    // Validar el formato del email
    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["Mensaje" => "Formato de correo electrónico no válido."]);
        exit();
    }

    // Validar la longitud de la contraseña
    if (strlen($userPw) < 6) {
        echo json_encode(["Mensaje" => "La contraseña debe tener al menos 6 caracteres."]);
        exit();
    }

    // Verifica si el nombre de usuario o el correo electrónico ya existen
    $stmt = $conn->prepare("SELECT * FROM newuser WHERE UserName = ? OR UserEmail = ?");
    $stmt->bind_param("ss", $userName, $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["Mensaje" => "El nombre de usuario o el correo electrónico ya están registrados."]);
    } else {
        $stmt = $conn->prepare("INSERT INTO newuser (UserName, UserEmail, UserPw) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $userName, $userEmail, $userPw);
        
        if ($stmt->execute()) {
            echo json_encode(["Mensaje" => "Ya podes comenzar a usar nuestra app."]);
        } else {
            echo json_encode(["Mensaje" => "Error al registrar: " . $stmt->error]);
        }
    }


    $stmt->close();
} else {
    // Si faltan datos
    echo json_encode(["Mensaje" => "Datos incompletos"]);
}

$conn->close();
?>
