<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require('PHPMailer/Exception.php');
    require('PHPMailer/SMTP.php');
    require('PHPMailer/PHPMailer.php');

    if(isset($_POST["fButton"])){
        $name=$_POST["txt_name"];
        $email=$_POST["txt_email"];
        $telefono=$_POST["txt_tel"];
        $comment=$_POST["txt_comment"];

        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'cafejairo7@gmail.com';                     //SMTP username
            $mail->Password   = 'ekjsfiwatyjgqxvf';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('cafejairo7@gmail.com', 'Cafe');
            $mail->addAddress("cafejairo7@gmail.com");     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Contacto';
            $mail->Body    = "Nombre: $name <br> Email: $email <br> Telefono: $telefono <br> Message: $comment <br> <img src= 'https://cafeselcriollo.com/wp-content/uploads/2022/01/beneficios-del-cafe-en-grano_.jpg'>";
        
            $mail->send();
            echo "<script>alert('Mensaje enviado')</script>";
            echo "<script>window.location.href='contacto.php'</script>";
        } catch (Exception $e) {
            echo "<script>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</script>";
        }
    }
    ?>
<!DOCTYPE html>
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
                    <a href="index.php" class="logo">
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
        <h1 class="margin--1">Dejanos tus dudas o comentarios</h1>
        <div class="contenedor contenedor-form">
            <form class="form" action="" method="post">
                <div class="input">
                    <label for="txt_name">Nombre</label>
                    <input type="txt" name="txt_name" id="txt_name">
                </div>
                <div class="input">
                    <label for="txt_email">Correo</label>
                    <input type="email" name="txt_email" id="txt_email">
                </div>
                <div class="input">
                    <label for="txt_tel">Teléfono</label>
                    <input type="tel" name="txt_tel" id="txt_tel">
                </div>
                <div class="input">
                    <label for="txt_comment">Comentarios</label>
                    <textarea name="txt_comment" id="txt_comment" cols="30" rows="10"></textarea>
                </div>
                <div class="button--form">
                    <button name="fButton"class="button primary--button button--formSesion">Enviar</button>
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
