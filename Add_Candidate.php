<?php
include 'Connect.php';
session_start();
if ($_SESSION['Admin'] == "") {
    header("Location: Admin_login.php?error= Login required");
}
$query = "SELECT UID, fstname, course, image FROM add_candidate";
$result = mysqli_query($connection, $query);
?>
<html lang="en">

<head>
    <title>Add candidate</title>
    <style>
        .display {
            /* background-color: burlywood; */
            display: flex;
            /* transform: translate(25vh,15vw); */
            border-radius: 5vh;

        }

        .dis {
            display: inline-block;
            transform: translate(50vh, 10vw);
            /* background-color: violet; */
        }

        #main {
            padding: 1vw;
            display: flex;
            flex-direction: row;
        }

        #block-1,
        #block-2 {
            padding: 5vh 10vw;
            border: 1px solid black;
            font-size: 30px;
        }

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
    // function Del(str) {
    //     <?php
    //     $name = '${str}';
    //     echo '<script>alert(' . $name . ')</script>';
    //     // Your PHP code to store the value in 'name' variable
    //     // ...
    //     // Header("Location: delete.php?fname= $name");
    //     // Execute the PHP code by making an AJAX request to a PHP script
    //     ?>
    // }


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
    <?php if (isset($_GET['done'])) { ?>
        <div id="popupBox" class="popup">
            <span class="close" onclick="closePopup()">x</span>
            <?php echo $_GET['done']; ?>
        </div>
    <?php } ?>
    <?php if (isset($_GET['add'])) { ?>
        <div id="popupBox" class="popup">
            <span class="close" onclick="closePopup()">x</span>
            <?php echo $_GET['add']; ?>
        </div>
    <?php } ?>
    <?php
    include 'Admin_header.php';

    echo '<div id="main">
        <div id="block-1">
            <form method="post" enctype="multipart/form-data" action="Add_Candidate_php.php">

            <label for="uid"> UID : </label>
            <input type="TEXT" name="uid" id="uid" required> <br><br>
                <label for="fstname"> Name : </label>
                <input type="text" name="fstname" id="fstname" required> <br><br>
                <label>Choose your course:</label>
                <select name="cors" id="course" required>
                    <option value="course">Select course</option>
                    <option value="bca">BCA</option>
                    <option value="b.sc">B.Sc</option>
                    <option value="mca">MCA</option>
                    <option value="m.sc">M.Sc</option>
                </select><br><br>
                <label for="img">Upload image</label>
                <input type="file" name="uploadfile" accept=".jpg, .png, .jpeg" > <br><br>
                <input type="submit" name="submitimg" id="submit"  >
            </form>
        </div>
        <div id="block-2">
            <div class=display>
                <table border="1" cellspacing="0" cellpadding="10">
                    <tr>
                        <th>S.N</th>
                        <th>UID</th>
                        <th>Full Name</th>
                        <th>course</th>
                        <th>image</th>
                        <th>opertion</th>
                    </tr>';
    ?>
    <?php
    if (mysqli_num_rows($result) > 0) {
        $sn = 1;
        while ($data = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
            <td>
            " . $sn . " 
            </td>
            <td>
            " . $data['UID'] . " 
                </td>
                <td>
                     " . $data['fstname'] . "
                </td>
                <td>
                     " . $data["course"] . "
                </td>
                <td><img src=./image/" . $data['image'] . " height='100px' width='100px'></td>

                <td> <a href='delete.php?fname=" . $data['UID'] . "'>delete </a> </td>
            </tr> ";
            $sn++;
        }
    } else {
        echo '
    <tr>
    <td colspan="8">No data found</td>
    </tr>
    ';

    }
    ?>
</body>

</html>