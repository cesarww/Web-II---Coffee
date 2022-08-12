<?php
    function crear_blog(){
        $conn = mysqli_connect("localhost","root","","cafe");
        if($conn){
            $qry = "call InsertarBlog('".$_POST["txt_titulo"]."','".$_POST["txt_imagen"]."','".$_POST["txt_comment"]."') ;";
            $qry_result = mysqli_query($conn,$qry);
        }
    }

    if(isset($_POST["txt_titulo"])){
        crear_blog();
    }
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body class="no-margin">
        <header class="header header-form">
            <div class="contenedor">
                <div class="bar">
                    <a href="index.html" class="logo">
                        <h1 class="logo__name no-margin centrar-texto">Blog<span class="logo__bold">DeCafé</span></h1>
                    </a>
                    <nav class="navbar">
                        <a href="#" class="navbar__link" target="_blank">Iniciar Sesión</a>
                        <a href="nosotros.html" class="navbar__link" target="_blank">Nosotros</a>
                        <a href="cursos.php?usr='admin@admin'" class="navbar__link">Cursos</a>
                        <a href="contacto.html" class="navbar__link">Contacto</a>
                    </nav>
                </div><!--bar-->
            </div>

            <div class="header__texto">
                <h2 class="no-margin">Blog de café con consejos y cursos</h2>
                <p class="no-margin">Aprender de los expertos con las mejores recetas y consejos</p>
            </div>
        </header> 
        <div class="contenedor contenedor-form">
            <form class="form" action="" method="post" id="fBlog">
                <div class="input">
                    <label for="txt_titulo">Titulo de la Nueva Entrada</label>
                    <input type="text" name="txt_titulo" id="txt_titulo">
                </div>
                <div class="input">
                    <label for="txt_imagen">Imagen de la Nueva Entrada</label>
                    <input type="text" name="txt_imagen" id="txt_imagen">
                </div>
                <div class="input">
                    <label for="txt_comment">Descripción</label>
                    <textarea name="txt_comment" id="txt_comment" cols="30" rows="10"></textarea>
                </div>
                <div class="button--form">
                    <button class="button primary--button button--formSesion">¡Crear Nueva Entrada!</button>
                </div>
            </form>
        </div>

        <footer class="footer">
            <div class="contenedor">
              <div class="bar">
                <a href="index.html" class="logo">
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
