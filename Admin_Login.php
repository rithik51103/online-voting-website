<?php
error_reporting(0);
session_start();
if ($_SESSION['Admin'] != "") {
    header("Location: Admin_Dashboard.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewpoint" content="width=device-width, initial-scaler=1.0">
    <title>sign In and sign Up Form - Easy Tutorials</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/f6f54f75a2.js" crossorigin="anonymous"></script>
<style>
    
</style>
</head>

<body>
    <div class="container">
        <div class="form-box">
            <h1 id="title">Sign up</h1>
            <form method="post">
                <?php if (isset($_GET['error'])) { ?>
                    <span class="error">
                        <?php echo $_GET['error']; ?>
                    </span>
                <?php } ?>
                <div class="input-group">
                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-user"></i>
                        <input type="email" placeholder="email" name="email">
                    </div>
                    <form>
                        <div class="input-group">
                            <div class="input-field" id="nameField">
                                <i class="fa-solid fa-user"></i>
                                <input type="password" placeholder="password" name="pswd">
                            </div>
                            <p>Lost password <a href="#">Click Here!</a></p>
                        </div>
                        <div class="btn-field">
                            <button type="submit" id="Signinbtn" name="sub1">Sign in</button>
                            </button>
                        </div>
                    </form>
                </div>
        </div>
</body>

</html>
<?php
//to connect with database
include 'Connect.php';
//for verification 
if (isset($_POST['sub1'])) {
    $email = $_POST['email'];
    $pass = $_POST['pswd'];
    $query = "Select * from admin_login where Email='$email' and password='$pass'";
    $res = mysqli_query($connection, $query);
    $c = mysqli_num_rows($res);
    if ($c > 0) {
        $_SESSION['Admin'] = $email;
        header("Location: Admin_Dashboard.php");
    } else {
        header("Location: Admin_Login.php?error= Wrong Credentials");
    }
}