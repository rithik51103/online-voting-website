<?php
session_start();
include('Connect.php');
$UID = $_GET['UID'];
$email = $_SESSION['em'];
$query1 = "SELECT isVoted FROM project where `email`= '$email' ";
$result1 = mysqli_query($connection, $query1);
if ($result1) {
    while ($data1 = mysqli_fetch_assoc($result1)) {
        if ($data1['isVoted'] == 0) {
            $query = "SELECT vote FROM add_candidate where `UID` = '$UID' ";
            $result = mysqli_query($connection, $query);
            while ($data = mysqli_fetch_assoc($result)) {

                $vote = $data['vote'];
                $vote++;
                $que = "UPDATE `add_candidate` SET `vote`=$vote WHERE `UID`= $UID";
                $que2 = "UPDATE `project` SET `isVoted`=1 WHERE `email`='$email' ";

                $result3 = mysqli_query($connection, $que);
                $result4 = mysqli_query($connection, $que2);
                if ($result3 && $result4) {
                    header("Location: displaycandidatestud.php");
                }
            }
        } else {
            header("Location: displaycandidatestud.php?error= already voted");
        }
    }

}


?>