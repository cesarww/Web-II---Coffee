<?php
function desplegar_cursos_usuario($correo_usr){
    $conn = mysqli_connect("localhost","root","","cafe");
    if($conn){
        $qry = "SELECT * FROM Cursos";
        $qry_result = mysqli_query($conn,$qry);
        $str = "";
        $curso = 0;
        while($row = mysqli_fetch_array($qry_result)){
          $curso = $row['Cupo'];
          if($curso >= 1){
            $str .= "<div class='curse'>";
            $str .= "<div class='curse__image'>";
            $str .=   "<img src='".$row['Imagen']."' alt='imagen curso'>";
            $str .= "</div>";
            $str .= "<div class='curse__information'>";
            $str .= "<h4 class='no-margin'>".$row['Nombre']."</h4>";
            $str .= "<p class='curses__label'>Precio:";
            $str .= "<span class='curses__info'> ".$row['Precio']."</span>";
            $str .= "</p>";
            $str .= "<p class='curses__label'>Cupo:";
            $str .= "<span class='curses__info'> ".$row['Cupo']."</span>";
            $str .= "</p>";
            $str .= "<p class='curse__description'>".$row['Descripcion']."";
            $str .= "</p>";
            $str .= "<a href='?correo_usr=".$correo_usr."&id_curse=".$row["IdCurso"]."' class='button primary--button button--formSesion'>Registrarse al Curso</a>";
            $str .= "</div><!--.curse__information-->";
            $str .= "</div><!--.curse-->";
          }
        }
    }
    return $str;
}

function registrarse_curso($id_usuario){
  $conn = mysqli_connect("localhost","root","","cafe");
  if($conn){
    $qry = "call registrarse_curso(".$_GET["id_curse"].",".$id_usuario.");";
    $qry_result = mysqli_query($conn,$qry);
  }
}

function id_usuario(){
  $conn = mysqli_connect("localhost","root","","cafe");
  if($conn){
    $qry = "select IdUsuario from Usuarios where Correo = '".$_GET["correo_usr"]."' ";
    $qry_result = mysqli_query($conn,$qry);
    $id_usuario = 0;
    while( $row = mysqli_fetch_assoc($qry_result)){
      $id_usuario = $row['IdUsuario'];
    }
  }
  return $id_usuario;
}

if(isset($_GET["id_curse"])){
  registrarse_curso(id_usuario());
}

function desplegar_cursos_admin($correo_usr){
  $conn = mysqli_connect("localhost","root","","cafe");
  if($conn){
      $qry = "SELECT * FROM Cursos";
      $qry_result = mysqli_query($conn,$qry);
      $str = "";
      while($row = mysqli_fetch_array($qry_result)){
          $str .= "<div class='curse'>";
          $str .= "<div class='curse__image'>";
          $str .=   "<img src='".$row['Imagen']."' alt='imagen curso'>";
          $str .= "</div>";
          $str .= "<div class='curse__information'>";
          $str .= "<h4 class='no-margin'>".$row['Nombre']."</h4>";
          $str .= "<p class='curses__label'>Precio:";
          $str .= "<span class='curses__info'> ".$row['Precio']."</span>";
          $str .= "</p>";
          $str .= "<p class='curses__label'>Cupo:";
          $str .= "<span class='curses__info'> ".$row['Cupo']."</span>";
          $str .= "</p>";
          $str .= "<p class='curse__description'>".$row['Descripcion']."";
          $str .= "</p>";
          $str .= "</div><!--.curse__information-->";
          $str .= "</div><!--.curse-->";
      }
  }
  return $str;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Coffe Blog</title>
    <link rel="preload" href="styles/normalize.css" as="style" />
    <link rel="stylesheet" href="styles/normalize.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="preload" href="styles/styles.css" as="style" />
    <link rel="stylesheet" href="styles/styles.css" />
  </head>
  <body>
    <header class="header header-form">
      <div class="contenedor">
          <div class="bar">
              <a href="index.html" class="logo">
                  <h1 class="logo__name no-margin centrar-texto">Blog<span class="logo__bold">DeCafé</span></h1>
              </a>
              <nav class="navbar">
                  <a href="inicio_sesion.php" class="navbar__link" target="_blank">Iniciar Sesión</a>
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
    

    <div class="contenedor">
      <h3 class="centrar-texto"> Nuestros Próximos Cursos y Talleres</h3>

    <?php
        if(isset($_GET['correo_usr'])){
            if($_GET['correo_usr'] == "admin@admin"){
              echo "<a href='crear_curso.php' class='button primary--button button--formSesion'>Crear Curso</a>";
              echo desplegar_cursos_admin($_GET['correo_usr']);
            }
            else{
              echo desplegar_cursos_usuario($_GET["correo_usr"]);
            }
          }
    ?>
          
    </div>
    <!--.contenedor -->
    
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
