<?php
session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
    header("location: ../index.html");
	exit;
}
?>
<div class="table-responsive">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bienvenido <?php echo $_SESSION['user_name']; ?></h1>
    </div>
    <div class="p-5 mb-2 mt-4 bg-light rounded-3 w-100">
        <div class="container-fluid py-5">
            <p class="col-md-8 fs-4">Bienvenido al sistema 2N + PROFESSIONAL</p>
        </div>
    </div>
</div>

