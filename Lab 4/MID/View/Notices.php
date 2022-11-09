<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mid Project</title>
    
    </style>
</head>

<body>
    <?php
    session_start();
    
     include 'Header.php'; ?> 
            
    

    

    <form method="post">

        Go back to : <a href="Student_Home.php">Home</a><br><br>
        <fieldset>
            <legend><b>Notice Board</b></legend><br>
            

                <a href="Notice1.php">AIUB Job Fair 2022</a><br><br>

                <a href="Notice2.php">AIUB Premier League (APL-T10) 2022</a><br><br>
                
                
       
        </fieldset>
        

        <?php include 'Footer.php'; ?>
</body>

</html>