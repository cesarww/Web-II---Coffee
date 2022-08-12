<?php
    function crear_curso(){
        $conn = mysqli_connect("localhost","root","","cafe");
        if($conn){
            $qry = "call InsertarCursos('".$_POST["txt_nombreCurso"]."',".$_POST["txt_price"].",'".$_POST["txt_cupo"]."', "
            . " '".$_POST["txt_img"]."','".$_POST["txt_comment"]."') ;";
            $qry_result = mysqli_query($conn,$qry);
        }
    }

    if(isset($_POST["txt_nombreCurso"])){
        crear_curso();
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
            <form class="form" action="" method="post" id="fRegistro" name="fRegistro">
                <div class="input">
                    <label for="txt_nombreCurso">Nombre del Curso</label>
                    <input type="text" name="txt_nombreCurso" id="txt_nombreCurso">
                </div>
                <div class="input">
                    <label for="txt_price">Precio</label>
                    <input type="number" name="txt_price" id="txt_price">
                </div>
                <div class="input">
                    <label for="txt_cupo">Cupo</label>
                    <input type="txt" name="txt_cupo" id="txt_cupo">
                </div>
                <div class="input">
                    <label for="txt_img">Link de la imagen</label>
                    <input type ="text" name="txt_img" id="txt_img"></input>
                </div>
                <div class="input">
                    <label for="txt_comment">Descripción</label>
                    <textarea name="txt_comment" id="txt_comment" cols="30" rows="10"></textarea>
                </div>
                <div class="button--form">
                    <button class="button primary--button button--formSesion">¡Crear Curso!</button>
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
