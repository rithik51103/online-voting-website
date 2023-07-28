<?php
session_start();
if ($_SESSION['em'] == '') {
  header("Location: Student_Login.php?error=Login first");
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Student Dashboard</title>
  <style>
    /* General styles */
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Header styles */
    header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    h1 {
      margin: 0;
    }

    /* Navigation styles */
    nav {
      background-color: #f1f1f1;
      padding: 10px;
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      text-align: center;
    }

    li {
      display: inline-block;
    }

    a {
      display: block;
      padding: 10px 20px;
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }

    a:hover {
      background-color: #ddd;
    }

    /* Content styles */
    #welcome {
      padding: 20px;
    }

    /* Responsive styles */
    @media screen and (max-width: 600px) {
      h1 {
        font-size: 24px;
      }

      a {
        padding: 8px 16px;
      }

      #welcome {
        font-size: 14px;
        font-size: 3rem;
        margin-bottom: 20px;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
        color: black;
      }
    }
  </style>
</head>

<body>
  <?php include "Student_header.php"; ?>
  <script>
    function showContent(contentId) {
      // Hide all content sections
      var contentSections = document.getElementsByClassName("content-section");
      for (var i = 0; i < contentSections.length; i++) {
        contentSections[i].style.display = "none";
      }

      // Show the selected content section
      document.getElementById(contentId).style.display = "block";
    }


  </script>
</body>

</html>