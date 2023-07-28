<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ritik";

$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection) {
    echo "connection not stablish";
}
?>