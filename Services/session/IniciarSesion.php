<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.SERVICES_PATH."session/Login.php");

$login = new Login();
$value = $login->isUserLoggedIn();

if ($login->isUserLoggedIn() == true) {
    header("location: ../../Views/Principal.php");
} else {
    if (!isset($_SESSION))
    {
        session_start();
        session_destroy();
    }
?>
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Titan del Oriente</title>
    <link href="../../Assets/css/ionicons/icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../../Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Assets/css/normalize.css">
    <link rel="stylesheet" href="../../Assets/css/style.css">
</head>
<body>
    <!-- Main -->
    <div class="container container--login d-flex justify-content-center align-items-center ">
        <section class="section-banner">
            <img src="../../Assets/img/login_bg.jpg" alt="Imagen de fondo login" class="section__background">    
        </section>
        <section class="section-form d-flex justify-content-center align-items-center flex-column ">
            <header class="header">
                <img src="../../Assets/img/logo.png" alt="Logo Titan del Oriente" class="header__logo">
            </header>
            <form method="post" action="IniciarSesion.php"  class="form">
            <?php
				// show potential errors / feedback (from login object)
				if (isset($login)) {
					if ($login->errors) {
						?>
						<div class="alert alert-danger alert-dismissible" role="alert">
						    <strong>Error!</strong> 
						
						<?php 
						foreach ($login->errors as $error) {
							echo $error;
						}
						?>
						</div>
						<?php
					}
					if ($login->messages) {
						?>
						<div class="alert alert-success alert-dismissible" role="alert">
						    <strong>Aviso!</strong>
						<?php
						foreach ($login->messages as $message) {
							echo $message;
						}
						?>
						</div> 
						<?php 
					}
				}
				?>
                <div class="form__input">
                    <input type="text" name="username" id="username" placeholder="Usuario" class="input__user" autocomplete="off">
                    <ion-icon name="person-outline"></ion-icon>
                </div>
                <div class="form__input">
                    <input type="password" name="password" id="password" placeholder="Contraseña" class="input__password" autocomplete="off">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                </div>
                <div class="content--btn d-flex justify-content-center">
                    <button type="submit" class="form__button" id="login" name="login">
                    <span class="button__text">Ingresar</span>
                    <ion-icon class="button__icon" name="log-in-outline"></ion-icon>
                </button>
                </div>
            </form>
            
            <!--Footer-->
            <footer class="footer">
                <img src="../../Assets/img/logo-secondary.jpg" class="footer__img--login" alt="Logo de Tecno Byte PC">
            </footer>
        </section>
    </div>
    <script src="../../Assets/js/bootstrap.min.js"></script>
    <script src="../../Assets/js/ionicons/ionicons.esm.js" type="module"></script>
    <script nomodule src="../../Assets/js/ionicons/ionicons.js"></script>
</body>
</html>

<?php
}
?>