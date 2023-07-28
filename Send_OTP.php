<?php
session_start();
include_once 'Connect.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



$fname = $_POST['fname'];
$rollno = $_POST['rollno'];
$course = $_POST['course'];
$semester = $_POST['semester'];
$email = $_POST['email'];
$password = $_POST['password'];
$otp = $_POST['otp'];

// echo "fname= $fname <br> rollno = $rollno <br> course= $course <br>semester=  $semester <br>email= $email <br> password= $password <br> otp= $otp<br> ";
$query = "Select * from project where email='$email' ";
$validate = mysqli_query($connection, $query);
while ($rows = $validate->fetch_assoc()) {
  if ($rows['isEmailVerfied'] == 1) {
    header("Location: Student_SignUP.php?error=Email already Exist");
    exit();
  } else {
    $otpquerry = "DELETE FROM `otpregistration` where `email`='$email'";
    $userquery = "DELETE FROM `PROJECT` WHERE `Email`='$email'";
    mysqli_query($connection, $otpquerry);
    mysqli_query($connection, $userquery);
  }
}
$otp = rand(111111, 999999);
$otpquery = "INSERT INTO `otpregistration`(`email`, `otp`) VALUES ('$email','$otp')";
$instquery = "INSERT INTO `project` VALUES ('$rollno','$fname','$course','$semester','$email','$password','0')";
$runotp = mysqli_query($connection, $otpquery);
$runn = mysqli_query($connection, $instquery);
//sending mail
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'vyomdubeykp@gmail.com';
$mail->Password = 'bmfpwyipilskmold';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;


$mail->setFrom('vyomdubeykp@gmail.com');
$mail->addAddress(($_POST['email']));
$mail->isHTML((true));



$mail->Subject = "OTP VERIFICATION";
$mail->Body = "OTP for verifcation is " . $otp;
$mail->send();
$_SESSION['email'] = $email;
header("Location: OTP_Verification.php");

?>