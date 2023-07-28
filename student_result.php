<?php
include "Connect.php";
session_start();
if ($_SESSION['em'] == '') {
    header("Location: Student_Login.php?error= Login first");
}
include "Student_Header.php";
$que = "SELECT * FROM `settings`";
$re = mysqli_query($connection, $que);
while ($data = mysqli_fetch_assoc($re)) {
    if ($data['IsResultPublished'] == '1') {
        include "resultdisplay.php";
    } else {
        echo "<h1>Result is not published</h1>";
    }
}
?>