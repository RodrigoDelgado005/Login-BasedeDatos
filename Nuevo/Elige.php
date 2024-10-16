<?php
include("conexion.php");
session_start();
if(!isset($_SESSION['id_usuario'])) {
	header("Location: Login.php");
}
$iduser = $_SESSION['id_usuario'];

$sql = " SELECT idusuarios, Nombre FROM usuarios 
               WHERE idusuarios = '$iduser' ";
        
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elige que aprender</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand.lg navbar-dark bg-dark fixed-top ">

        <div class="container">
        <a href="Inicio.html" class="navbar-brand"> <span class="text-primary">Language</span>Code</a>
        <nav class="navbar">
            <div class="user-dropdown">
                <a href="#" class="user-toggle">
                    <span class="user-info">
                    <i class="fas fa-user"></i>
                        <div class="position-text-small">
                            <small>Bienvenid@</small>
                        </div>
                        <div class="position-text">
                            <?php echo utf8_decode($row['Nombre']); ?>
                        </div> 
                        
                    </span>
                    <i class="ace-icon fa fa-caret-down"></i>
                </a>
                <ul class="user-menu ">
                    <li>
                        <a href="#">
                            <i class="ace-icon fa fa-user"></i>
                            Perfil
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="salir.php">
                            <i class="ace-icon fa fa-power-off"></i>
                            Salir
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </nav>
    
    <div class="welcome-container text-center mt-5">
        <h1>Bienvenido a tu Aventura en el Código</h1>
        <h2>Empieza con alguno de estos códigos </h2>
    </div>
<div class="box">
    <div class="container2 mt-5">
        <div class="column">
            <h3>HTML</h3>
            <!--Tiene que ir asi asi se muestra a la izquierda el texto-->
            <!--el css tiene que ir aca xq sino el bootstrap no se cambia-->
            <textarea id="htmlCode" class="form-control" style="width: 300px; height: 375px; text-align: left; resize: none; overflow: hidden;" readonly >&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
&lt;title&gt;Page Title&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;

&lt;h1&gt;This is a&lt;/h1&gt;
&lt;p&gt;This is a &lt;/p&gt;

&lt;/body&gt;
&lt;/html&gt;             
            </textarea>
            <div class="text-center">
             <a class="btn btn-dark" href="LanguageCode-HTML.php" target="_blank">HTML</a>
            </div>
        </div>
        <div class="column">
            <h3>CSS</h3>
            <textarea id="cssCode" class="form-control" style="width: 300px; height: 375px; text-align: left; resize: none; overflow: hidden;" readonly>
body {
  background-color: lightblue;
}

h1 {
  color: white;
  text-align: center;
}

p {
  font-family: verdana;
  font-size: 20px;
}</textarea>
            <div class="text-center">
             <a class="btn btn-dark" href="LanguageCode-HTML.php" target="_blank">CSS</a>
            </div>
        </div>
        <div class="column">
            <h3>JavaScript</h3>
            <textarea id="jsCode" class="form-control" style="width: 300px; height: 375px; text-align: left; resize: none; overflow: hidden;" readonly> &lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;body&gt;

&lt;h2&gt;My First JavaScript&lt;/h2&gt;

&lt;button type="button"
onclick="document.getElementById('demo').innerHTML = Date()"&gt;
Click me .&lt;/button&gt;
&lt;p id="demo"&gt;&lt;/p&gt;

&lt;/body&gt;
&lt;/html&gt;</textarea>
<div class="text-center">
             <a class="btn btn-dark" href="LanguageCode-HTML.php" target="_blank">JAVA</a>
            </div>
        </div>
    </div>
</div>

<!--FOOTER-->
<div class="container-fluid mt-5">
        <div class="row p-5  bg-dark text-white">
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="container">
                    <div class="navbar-dark navbar-brand">
                      <p href="#" class="navbar-brand"> <span class="text-primary">Language</span>Code</p>
                      <div class="mb-2 ">
                        <i class="bi bi-twitter text-white mx-1 "></i>
                        <i class="bi bi-facebook text-white mx-1 "></i>
                        <i class="bi bi-linkedin text-white mx-1 "></i>
                        <i class="bi bi-instagram text-white mx-1 "></i>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <p class="h5 mb-3">Cursos</p>
                <div class="mb-2">
                 <a class="text-secondary text-decoration-none" href="#">Hyper Text Markup Language</a>
                </div>
                <div class="mb-2">
                 <a class="text-secondary text-decoration-none" href="#">Cascading Style Sheets</a>
                </div>
                <div class="mb-2">
                 <a class="text-secondary text-decoration-none" href="#">JavaScript</a>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <p class="h5 mb-3">Links</p>
                <div class="mb-2">
                 <a class="text-secondary text-decoration-none" href="#">Terminos & Condiciones</a>
                </div>
                <div class="mb-2">
                 <a class="text-secondary text-decoration-none" href="#">Politica de Privacidad</a>
                </div>
                <div class="mb-2">
                 <a class="text-secondary text-decoration-none" href="#">Accesos</a>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <p class="h5 mb-3">Contacto</p>      
                <div class="mb-2">         
                 <a class="text-secondary text-decoration-none" href="#">Twitter</a>
                </div>
                <div class="mb-2">         
                 <a class="text-secondary text-decoration-none" href="#">Facebook</a>
                </div>
                <div class="mb-2">         
                 <a class="text-secondary text-decoration-none" href="#">Instagram</a>
                </div>
            </div>
        </div>
    </div>


    
</body>
</html>