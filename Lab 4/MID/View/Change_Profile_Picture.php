<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            box-sizing: border-box;
        }

        .row {
            display: flex;
        }

        .column {
            flex: 50%;
            padding: 10px;
            height: 50%;
        }
    </style>
</head>

<body>
    <?php
    session_start();

    include 'Header.php'; ?>
    <?php


    if (isset($_SESSION['email'])) {
        include 'Student_Top_Menu_Bar.php';

        echo '<div class="row">';
        echo '<span style = "display:inline-block; width:36%; height:100%; text-align:left">';
        echo '<div class="column" >';
        include 'Student_Menu.php';
        echo '</div>';
        echo '</span>';
        echo '<div class="column" >';
        echo '<span style = "display:inline-block; width:100%;text-align:left; height: 40%;">';
        echo '<h3 align="" style = "display:inline-block; width:200px;text-align:right;">PROFILE PICTURE</h3><br />';
        echo '<form action="../Controller/uploadPicController.php" method="post" enctype="multipart/form-data">';
        if (isset($_SESSION['profilePic'])) {
            echo '<img src="Uploads/';
            echo $_SESSION['profilePic'];
            echo ' " alt="Profile picture" height=150px width:150px>';
        } else {
            echo '<img src="Uploads/Dummy.png" width="20%" height="20% alt="Profile picture">';
        }
        echo '<br><br>';
        echo '<input type="file" name="fileToUpload" id="fileToUpload">';
        echo '<br><br>';
        echo '<input type="submit" value="Submit" name="submit">';
        echo '</div>';
        echo '</div>';
    } else {
        $msg = "error";
        header("location:Login.php");
    }

    ?>

    <?php include 'Footer.php'; ?>
</body>

</html>