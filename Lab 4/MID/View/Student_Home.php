<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>Mid Project</title>
   
</head>

<body>

    <?php
    session_start();
    include 'Header.php';
    ?>

    <span style="display:inline-block; width:100%;text-align:left; height: 40%;">


        <?php
        $msg = '';
        if (isset($_SESSION['email'])) {
            include '../View/Student_Top_Menu_Bar.php';

            
            
           
            
            
            echo "<h2> Hello, " . $_SESSION['name'] . "</h2>";

             include 'Student_Menu.php';
            echo '</div>';
            echo '</div>';
        } else {
            $msg = "Error";
            header("location:Login.php");
        }

        ?>
    </span>
    <?php include 'Footer.php'; ?>

</body>

</html>