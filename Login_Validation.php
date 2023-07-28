<?php
session_start();
include_once('Connect.php');
$email=$_POST['email'];
$pass=$_POST['pass'];
$query="SELECT * FROM `PROJECT` WHERE `Email`='$email'";
$result=mysqli_query($connection,$query);
if($result->num_rows==0)
{
    header("Location: Student_Login.php?error=Email Not Regestered");
    exit();
}
while($run=$result->fetch_assoc())
{
  if($run['Email']==$email&&$run['password']==$pass){
    $_SESSION['em']=$email;
    header("Location: Student_Dashboard.php");
  }
  else{
    header("Location: Student_Login.php?error=Wrong password");

  }
}
?>