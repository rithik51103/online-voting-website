<?php
include('Connect.php');
session_start();
if ($_SESSION['em'] == '') {
    header("Location: Student_Login.php?error=Login first");
}
$query = "SELECT UID ,fstname, course, image FROM add_candidate";
$result = mysqli_query($connection, $query);
$email = $_SESSION['em'];

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display</title>
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

    <?php include "Student_header.php"; ?>
    <?php if (isset($_GET['error'])) { ?>
        <div id="popupBox" class="popup">
            <span class="close" onclick="closePopup()">x</span>
            <?php echo $_GET['error']; ?>
        </div>
    <?php } ?>
    <?php
    $query_vote = "SELECT isVoted FROM project where `email`= '$email' ";
    $result_vote = mysqli_query($connection, $query_vote);
    if ($result_vote) {
        while ($data_vote = mysqli_fetch_assoc($result_vote)) {
            if ($data_vote['isVoted'] == 0) {
                echo "<h1 style='color:red;' >NOT VOTED YET</h1>";
            } else {
                echo "<h1 style='color:green;' >VOTED</h1>";
            }
        }
    } else {
        echo "else";
    }
    ?>
    <div class=dis>
        <h1>Voting area</h1>
        <div class=display>
            <table border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>course</th>
                    <th>image</th>
                    <th>opertion</th>
                </tr>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    $sn = 1;
                    while ($data = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $sn; ?>
                            </td>
                            <td>
                                <?php echo $data['fstname']; ?>
                            </td>
                            <td>
                                <?php echo $data['course']; ?>
                            </td>
                            <td><img src="./image/<?php echo $data['image']; ?>" height="100px" width="100px"></td>

                            <td><a href='vote.php?UID=<?php echo $data["UID"]; ?>'>Vote</td>
                        <tr>

                            <?php
                            $sn++;

                    }
                } else { ?>
                <tr>
                    <td colspan="8">No data found</td>
                </tr>

                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>