<?php
include("conexion.php");
session_start();
if(isset($_SESSION['id_usuario'])) {
	header("Location: Elige.php");
}
//Login
if(!empty($_POST)) {
   $usuario = mysqli_real_escape_string($conexion,$_POST['user']);
   $password = mysqli_real_escape_string($conexion,$_POST['pass']);
   $password_encriptada = sha1($password);
   $sql = "SELECT idusuarios FROM usuarios 
                  WHERE usuario = '$usuario' AND password = '$password_encriptada' ";
   $resultado = $conexion->query($sql);
   $rows = $resultado->num_rows;
   if($rows > 0){
   	$row = $resultado->fetch_assoc();
   	$_SESSION['id_usuario'] = $row["idusuarios"];
   	header("Location: Elige.php");//nombre de la pagina
   }else{
   	    echo "<script>
               alert('Usuario o Password Incorrecto');
               window.location = 'Login.php';
    	</script>";

   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayCode</title>
    <link rel="stylesheet" type="text/css" href="Login.css">
</head>
<body>
    <div class="box">
        <span  class="borderLine"></span>
        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
            <h2>Iniciar Sesion</h2>
            <div class="inputBox">
                <input type="text" name="user" class="form-control" required="required">
                <span>Usuario</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="pass" required="required">
                <span>Contraseña</span>
                <i></i>
            </div>
            <div class="links">
                <a href="Recuperar.html">¿Olvidaste Tu Contraseña?</a>
                <a href="Register.php">¿No Tienes Cuenta?</a>
            </div>
            <input type="submit" value="Ingresar">
        </form>
    </div>
</body>
</html>