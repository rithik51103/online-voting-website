<?php


session_start();
$id = $_GET['id'];
if ($id == 0) {
    unset($_SESSION['Admin']);
    session_destroy();
    header("location: Admin_login.php?error= Logout Successful");
}
if ($id == 1) {
    unset($_SESSION['em']);
    session_destroy();
    header("location: Student_Login.php?error= Logout Successful");
}

?>