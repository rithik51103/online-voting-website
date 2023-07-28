<?php
include "Connect.php";
error_reporting(0);

$msg = "";

// If submit button is clicked ...
if (isset($_POST['submitimg'])) {

    $uid = $_POST["uid"];
    $name = $_POST["fstname"];
    $course1 = $_POST["cors"];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    // $folder = "image/" . $filename;
    $vote = 0;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $allowedExtensions = ['jpg', 'png'];
    // echo "$extension";
    // Get all the submitted data from the form
    if (in_array($extension, $allowedExtensions)) {
        $newFilename = uniqid() . '.' . $extension;
        $folder = "image/" . $newFilename;

        // Move the uploaded file to the destination
        if (move_uploaded_file($tempname, $folder)) {
            $sql1 = "INSERT INTO add_candidate VALUES ('$uid','$name','$course1','$newFilename','$vote')";
            mysqli_query($connection, $sql1);
            header("Location: Add_Candidate.php?add= candidate added");
        } else {
            header("Location: Add_Candidate.php?add= Failed");

        }

        // Code to handle allowed file types goes here
    } else {
        header("Location: Add_Candidate.php?add= Wrong extensions");
    }


    // Execute query

    // Now let's move the uploaded image into the folder: image
    // if (move_uploaded_file($tempname, $folder)) {
    // } else {
    // }

}
?>