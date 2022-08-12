<?php
function Registro(){
    $conn = mysqli_connect("localhost","root","","cafe");
    if($conn){
        $q = "select Contraseña, Correo, count(*) as cantidad "
        . " from Usuarios where Correo = '".$_POST["txt_email"]."' and Contraseña = '".$_POST["txt_passw"]."';";
        $a = mysqli_query($conn,$q);
    
        $bdMensaje = 0;
        while($f = mysqli_fetch_assoc($a)){
            $bdMensaje = $f["cantidad"];
        }
    }return $bdMensaje;
}

if(isset($_POST["txt_email"]) && $_POST["txt_passw"]){
    if(Registro() == 1){
        echo "<script>window.location.href='index.php?correo_usr=".$_POST["txt_email"]."'</script>";
    }
    else{
        echo "<script>alert('Datos incorrectos')</script>";
    }
}

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio de Sesion</title>
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body class="no-margin">
        <header class="header header-form">
            <div class="contenedor">
                <div class="bar">
                    <a href="index.php" class="logo">
                        <h1 class="logo__name no-margin centrar-texto">Blog<span class="logo__bold">DeCafé</span></h1>
                    </a>
                    <nav class="navbar">
                        <a href="#" class="navbar__link" target="_blank">Iniciar Sesión</a>
                        <a href="nosotros.php" class="navbar__link" target="_blank">Nosotros</a>
                        <a href="cursos.php" class="navbar__link">Cursos</a>
                        <a href="contacto.php" class="navbar__link">Contacto</a>
                    </nav>
                </div><!--bar-->
            </div>

            <div class="header__texto">
                <h2 class="no-margin">Blog de café con consejos y cursos</h2>
                <p class="no-margin">Aprender de los expertos con las mejores recetas y consejos</p>
            </div>
        </header>


        <div class="contenedor contenedor-form">
            <form class="form" action="" method="post" name="fInicio_Sesion">
                <div class="input">
                    <label for="txt_email">Correo</label>
                    <input type="email" name="txt_email" id="txt_email">
                </div>
                <div class="input">
                    <label for="txt_passw">Contraseña</label>
                    <input type="password" name="txt_passw" id="txt_passw">
                </div>
                <div class="button--form">
                    <button class="button primary--button button--formSesion">¡Iniciar Sesión!</button>
                </div>
            </form>
            <div class="register">
                <a class="button" href="registro.php">Registrarse</a>
            </div>
        </div>


        <footer class="footer">
            <div class="contenedor">
              <div class="bar">
                <a href="index.php" class="logo">
                  <h1 class="logo__name no-margin centrar-texto">
                    Blog<span class="logo__bold">DeCafé</span>
                  </h1>
                </a>
                <nav class="navbar">
                  <a href="nosotros.html" class="navbar__link">Nosotros</a>
                  <a href="cursos.html" class="navbar__link">Cursos</a>
                  <a href="contacto.html" class="navbar__link">Contacto</a>
                </nav>
              </div>
              <!--bar-->
            </div>
          </footer>
    </body>
</html>
