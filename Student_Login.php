<?php
session_start();
error_reporting(0);
if ($_SESSION['em'] != "") {
  header("Location: Student_Dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    body {
      background-color: #7e40c1;
      font-family: 'Poppins', sans-serif;
    }

    .signup-box {
      width: 360px;
      height: 620px;
      margin: auto;
      background-color: white;
      border-radius: 3px;
    }

    .login-box {
      width: 360px;
      height: 280px;
      margin: auto;
      border-radius: 3px;
      background-color: white;
    }

    h1 {
      text-align: center;
      padding-top: 15px;
    }

    h4 {
      text-align: center;
    }

    form {
      width: 300px;
      margin-left: 20px;
    }

    form label {
      display: flex;
      margin-top: 20px;
      font-size: 18px;
    }

    form input {
      width: 100%;
      padding: 7px;
      border: none;
      border: 1px solid gray;
      border-radius: 6px;
      outline: none;
    }

    input[type="button"] {
      width: 320px;
      height: 35px;
      margin-top: 20px;
      border: none;
      background-color: #49c1a2;
      color: white;
      font-size: 18px;
    }

    p {
      text-align: center;
      padding-top: 20px;
      font-size: 15px;
    }

    .para-2 {
      text-align: center;
      color: white;
      font-size: 15px;
      margin-top: -10px;
    }

    .para-2 a {
      color: #49c1a2;
    }
  </style>
</head>

<body>
  <div class="login-box">
    <h1>Login</h1>
    <?php if (isset($_GET['error'])) { ?>
      <span class="error">
        <?php echo $_GET['error']; ?>
      </span>
    <?php } ?>
    <form action="Login_Validation.php" method="post">
      <label>Email</label>
      <input type="email" placeholder="Email" name="email" required />
      <label>Password</label>
      <input type="password" placeholder="Password" name="pass" required />
      <button type="submit" name="sub">submit</button>
    </form>
  </div>
  <p class="para-2">
    Not have an account? <a href="Student_SignUP.php">Sign Up Here</a>
  </p>
</body>

</html>