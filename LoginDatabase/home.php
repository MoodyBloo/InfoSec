<?php
    session_start();

    include("config.php");
    if(!isset($_SESSION['valid'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-=UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p>Logo</p>
        </div>

        <div class="right-links">

        <?php

        $id = $_SESSION['id'];
        $query = mysqli_query($con,"SELECT * FROM users WHERE iD=$id");

        while($result = mysqli_fetch_assoc($query)){
            $res_studentNumber = $result['studentNumber'];
            $res_firstName = $result['firstName'];
            $res_middleInitial = $result['middleInitial'];
            $res_lastName = $result['lastName'];
            $res_courseEnrolled = $result['courseEnrolled'];
            $res_statusEnrolled = $result['enrollStatus'];
        }

        echo "<a href='edit.php?studentNumber=$res_studentNumber'>Change Profile</a>";
        ?>

            <a href="logout.php"><button class="btn">Logout</button></a>
        </div>
    </div>
    <main>

        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello<b><?php $res_lastName;?></b>, <b><?php echo $res_firstName; ?></b> <b><?php echo $res_middleInitial; ?></b>  Welcome</p>
                </div>
                <div class="box">
                    <p>Your Student Number is <b><?php echo $res_studentNumber; ?>.</p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p>And your course is <b><?php echo $res_courseEnrolled; ?></b>.</p>
                </div>
                <div class="box">
                    <p>And you are <b><?php echo $res_statusEnrolled; ?></b>.</p>
                </div>
            </div>
        </div>

    </main>
</body>
</html>