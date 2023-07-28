<?php
include('Connect.php');

// $fn='khare';
$fn = $_GET['fname'];

$query = "DELETE FROM add_candidate WHERE UID  ='$fn'";
$result = mysqli_query($connection, $query);
if ($result)
    header("Location: Add_Candidate.php?done= deleted");
else {
    header("Location: Add_Candidate.php?done= data not deleted");
} ?>