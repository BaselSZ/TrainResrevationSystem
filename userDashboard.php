<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>usrerDashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="login-container">

    <h1 style="color:black;">welcome user : <?php echo $_SESSION["Fname"]?></h1>
    <?php
    echo $_SESSION["loginStatus"];
    ?>
    <a href="searchTrain.php">
    <button style="margin: 2px;"onclick="">Search for Trains</button>
    </a>
    <a href="viewRes.php">
    <button style="margin: 2px;"onclick="">View Reservation details</button>
    </a>
    <a href="searchTrain.php">
    <button style="margin: 2px;"onclick="">Current active trains</button>
    </a>
    <a href="login.php">
    <button style="margin: 2px;" onclick="">log out</button>
    </a>
</div>
</body>
</html>