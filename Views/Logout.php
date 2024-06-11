<?php 
session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
    header("location: ../index.html");
	exit;
}

unset($_SESSION['user_login_status']); 
session_unset();
session_destroy();
header("locatio: ../Middleware/User/User.js")
exit;
?>
