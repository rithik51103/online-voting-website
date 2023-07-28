<?php
session_start();
include_once 'Connect.php';
$otp = $_POST['OtpByUser'];
if (isset($_POST['signup'])) {
    $email = $_SESSION['email'];
    $querry = "SELECT `otp` FROM `otpregistration` WHERE `email`='$email' ";
    $run = mysqli_query($connection, $querry);
    while ($row = $run->fetch_assoc()) {
        if ($row['otp'] == $otp) {
            $querryverify = "UPDATE `project` SET `isEmailVerified`='1' where `Email`='$email'";
            mysqli_query($connection, $querryverify);
            session_unset();
            session_destroy();
            header("Location: Student_Login.php");
        } else {
            header("Location: OTP_Verification.php?error=Wrong otp");
        }
    }
}
?>