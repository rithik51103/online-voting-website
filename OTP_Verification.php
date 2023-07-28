<?php
session_start();
if($_SESSION['email']=="")
{
    header("Location: studentlogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>OTP verification</title>
</head>

<body>
    <div class="otp">
        <?php if (isset($_GET['error'])) { ?>
            <span class="error">
                <?php echo $_GET['error']; ?>
            </span>
        <?php } ?>
        <form action="validateotp.php" method="post">
            <h1>OTP VERIFICATION</h1>
            <label for="otpfield ">Enter OTP</label>
            <input id="otpfield" name="OtpByUser" type="number">
            <button type="submit" name="signup">signUP</button>
            <br>
        </form>
    </div>
</body>

</html>
