<?php
include("conexion.php");
//Registrar usuario
if(isset($_POST["ingresar"])){
	$nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
	$correo = mysqli_real_escape_string($conexion,$_POST['correo']);
	$usuario = mysqli_real_escape_string($conexion,$_POST['user']);
	$password = mysqli_real_escape_string($conexion,$_POST['pass']);
	$password_encriptada = sha1($password); 
	$sqluser = "SELECT idusuarios FROM usuarios 
	                    WHERE usuario = '$usuario' ";
    $resultadouser = $conexion->query($sqluser);
    $filas= $resultadouser->num_rows;
    if($filas > 0){
    	echo "<script>
               alert('El usuario ya existe');
               window.location = 'Register.php';
    	</script>";
    }else{
    	$sqlusuario = "INSERT INTO usuarios(Nombre,Correo,Usuario,Password)
    	VALUES ('$nombre','$correo','$usuario','$password_encriptada')";
    	$resultadousuario = $conexion->query($sqlusuario);
    	if ($resultadousuario) { 
    		echo"<script>
    		alert('Registro Exitoso');
               window.location = 'Login.php';
            </script>";
    	}else{
    		echo"<script>
    		alert('error al registrarse');
               window.location = 'Register.php';
            </script>";
    	}
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayCode</title>
    <link rel="stylesheet" type="text/css" href="Register.css">
</head>
<body>
    <div class="box">
        <span  class="borderLine"></span>
        <form action="<?php  $_SERVER["PHP_SELF"]; ?>" method="POST">
            <h2>Registrate</h2>
            <div class="inputBox">
                <input type="text" name="nombre" class="form-control" required="required">
                <span>Nombre</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" name="correo" class="form-control" required="required">
                <span>Email</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" name="user" class="form-control" required="required">
                <span>Usuario</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="pass" class="form-control" required="required">
                <span>Contraseña</span>
                <i></i>
            </div>
            <div class="links">
                <a href="Login.php">¿Ya tienes Cuenta?</a>
            </div>
            <input type="submit" name="ingresar" value="Ingresar">
        </form>
    </div>
    
</body>
</html>