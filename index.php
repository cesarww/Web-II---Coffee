<?php
function desplegar_blog(){
    $conn = mysqli_connect("localhost","root","","cafe");
    if($conn){
        $qry = "SELECT * FROM Blog";
        $qry_result = mysqli_query($conn,$qry);
        $str = "";
        while($row = mysqli_fetch_array($qry_result)){
            $str .= "<article class='entry'>";
            $str .= "<div class='entry__img'>";
            $str .= " <img src='".$row["Imagen"]."' alt='imagen blog'>";
            $str .= "</div>";
            $str .= " <div class='entry__content'>";
            $str .= "<h4 class='no-margin'>Tipos de Granos de Café</h4>";
            $str .= "<p>".$row["Descripcion"]."</p>";
            $str .= "<a href='entrada.php?correo_usr=".$_GET["correo_usr"]." && id_entrada=".$row["IdBlog"]." ' class='button primary--button'>Leer entrada</a>";
            $str .= "</div>";
            $str .= " </article>";
        }
    }
    return $str;
}

function desplegar_cursos(){
    $conn = mysqli_connect("localhost","root","","cafe");
    $qry = "SELECT * FROM Cursos";
        $qry_result = mysqli_query($conn,$qry);
        $str = "";
        while($row = mysqli_fetch_array($qry_result)){
            $str .= "<li class='curses-widget'>";
            $str .= "<h4 class='no-margin'>".$row["Nombre"]."</h4>";
            $str .= "<p class='curses-widget__label'>Precio:";
            $str .= "<span class='curses-widget__info'>".$row["Precio"]."</span>";
            $str .= "</p>";
            $str .= "<p class='curses-widget__label'>Cupo:";
            $str .=  "<span class='curses-widget__info'>" . $row["Cupo"]."</span>";
            $str .= " </p>";
            $str .= "<a href='cursos.php?correo_usr=".$_GET["correo_usr"]."' class='button secondary--button'>Más infromación</a>";
            $str .= "</li>";
        }
        echo $str;
}
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Coffe Blog</title>
        <link rel="preload" href="styles/normalize.css" as="style">
        <link rel="stylesheet" href="styles/normalize.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
        <link rel="preload" href="styles/styles.css" as="style">
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <header class="header">
            <div class="contenedor">
                <div class="bar">
                    <a href="index.html" class="logo">
                        <h1 class="logo__name no-margin centrar-texto">Blog<span class="logo__bold">DeCafé</span></h1>
                    </a>
                    <nav class="navbar">
                        <a href="inicio_sesion.html" class="navbar__link" target="_blank">Iniciar Sesión</a>
                        <a href="nosotros.html" class="navbar__link" target="_blank">Nosotros</a>
                        <a href="cursos.php" class="navbar__link">Cursos</a>
                        <a href="contacto.html" class="navbar__link">Contacto</a>
                    </nav>
                </div><!--bar-->
            </div>

            <div class="header__texto">
                <h2 class="no-margin">Blog de café con consejos y cursos</h2>
                <p class="no-margin">Aprender de los expertos con las mejores recetas y consejos</p>
            </div>
            
        </header>

        <div class="contenedor main-content">
            <main>
                <h3>Nuestro blog</h3>
                <?php
                
                    if(isset($_GET["correo_usr"])){
                        if($_GET["correo_usr"] == "admin@admin")
                        echo desplegar_blog();
                        echo "<a href='crear_blog.php' class='button primary--button button--formSesion'>Crear Entrada</a>";
                    }
                    else{
                        echo desplegar_blog();
                    }
                
                ?>
            </main>
            <aside class="sidebar">
                <ul class="curses no-padding">
                    <h3>Nuestros Cursos y Talleres</h3>
                    <?php

                        if(isset($_GET["correo_usr"])){
                            echo desplegar_cursos();
                        }

                    ?>
                </ul>
            </aside>

        </div><!--.contenedor .main-content-->

        <footer class="footer">
            <div class="contenedor">
                <div class="bar">
                    <a href="index.html" class="logo">
                        <h1 class="logo__name no-margin centrar-texto">Blog<span class="logo__bold">DeCafé</span></h1>
                    </a>
                    <nav class="navbar">
                        <a href="nosotros.html" class="navbar__link" target="_blank"> Nosotros</a>
                        <a href="cursos.html" class="navbar__link">Cursos</a>
                        <a href="contacto.html" class="navbar__link">Contacto</a>
                    </nav>
                </div><!--bar-->
            </div>
        </footer>

    </body>
</html>
