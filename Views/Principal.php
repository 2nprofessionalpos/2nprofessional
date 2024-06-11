<?php
session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
    header("location: ../index.html");
	exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<?php require_once("Head.php"); ?>
<body>
<?php require_once("Header.php"); ?>
<!--Header Desktop-->
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php require_once("Navegation.php"); ?>
        <!-- Cuerpo -->
        <!-- Cuerpo -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content-principal">
            <!-- Content Principal-->
        </main>
    </div>
</div>

<?php require_once("Footer.php"); ?>

</body>
</html>