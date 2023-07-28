<?php
if (isset($_POST["result1"])) {
    $ps = $_POST['tspswd'];
    $email = $_SESSION['Admin'];
    $query = "SELECT `Email`, `Password`, `Trans_passwd` FROM `admin_login` WHERE `Email` = '$email' AND `Trans_passwd`= $ps";
    $res = mysqli_query($connection, $query);
    $c = mysqli_num_rows($res);
    if ($c > 0 && $isResultPublished == 0) {
        $query_for_setting = "UPDATE `settings` SET `IsResultPublished`='1' where 1";
        include 'resultdisplay.php';
    } else {
        $query_for_setting = "UPDATE `settings` SET `IsResultPublished`='0' where 1";
    }
    mysqli_query($connection, $query_for_setting);
}
?>