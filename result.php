<?php
//1 is result is published 0 is not published
include 'Connect.php';
error_reporting(0);
session_start();
if ($_SESSION['Admin'] == "") {
  header("Location: Admin_login.php?error= Login required");
}
$isResultPublished;
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Result</title>
  <style>
    .popup {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
      background-color: #f0f0f0;
      border: 1px solid #ccc;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      z-index: 9999;
    }

    .close {
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
    }

    /* Animation for pop-up box */
    @keyframes slideUp {
      0% {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0.8);
      }

      100% {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
      }
    }

    @keyframes slideDown {
      0% {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
      }

      100% {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0.8);
      }
    }
  </style>
</head>
<script>
  function closePopup() {
    var popup = document.getElementById('popupBox');
    popup.style.animation = 'slideDown 0.5s ease';

    setTimeout(function () {
      popup.style.display = 'none';
    }

      , 500);
  }

  setTimeout(function () {
    closePopup();
  }

    , 3000);
</script>

<body>
  <?php if (isset($_GET['error'])) { ?>
    <div id="popupBox" class="popup">
      <span class="close" onclick="closePopup()">x</span>
      <?php echo $_GET['error']; ?>
    </div>
  <?php } ?>
  <?php include"Admin_Header.php" ?>
  <form method="post">
    <label for="res">Enter the transaction Password to view result : </label>
    <input type="Password" name="tspswd" required> <br>
    <button name=result1>
      <?php
      $que = "SELECT * FROM `settings`";
      $re = mysqli_query($connection, $que);
      while ($data = mysqli_fetch_assoc($re)) {
        if ($data['IsResultPublished'] == '1') {
          $isResultPublished = 1;
          echo "remove result";
        } else {
          echo "publish result";
          $isResultPublished = 0;
        }
      }
      ?></button>
  </form>
  <?php
  if ($isResultPublished == 1)
    include 'resultdisplay.php';
  ?>
</body>

</html>
<?php

if (isset($_POST["result1"])) {
  $ps = $_POST['tspswd'];
  $email = $_SESSION['Admin'];
  $query = "SELECT `Email`, `Password`, `Trans_passwd` FROM `admin_login` WHERE `Email` = '$email' AND `Trans_passwd`= $ps";
  $res = mysqli_query($connection, $query);
  $c = mysqli_num_rows($res);
  if ($c > 0) {
    if ($isResultPublished == 0) {
      $query_for_setting = "UPDATE `settings` SET `IsResultPublished`='1' where 1";
    } else {
      $query_for_setting = "UPDATE `settings` SET `IsResultPublished`='0' where 1";
    }
    mysqli_query($connection, $query_for_setting);
    header("Location: result.php");
  } else {
    header("Location: result.php?error= Wrong Pass");
  }
}

?>