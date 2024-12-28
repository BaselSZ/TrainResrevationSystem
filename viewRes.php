<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign-In -Haramain Train</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <header>
            <h1 id="header-text"></h1>
        </header>

        <section class="login-form">
            <h2 id="form-title">view reservation</h2>
            <?php

        $currentTime = date("H:i:s");
        $currentSeconds = strtotime($currentTime) - strtotime("00:00:00");
        $departureSeconds = strtotime($_SESSION["TrainTime"]["departure_time"]) - strtotime("00:00:00");

        $timeDifference = $departureSeconds - $currentSeconds;

        if ($timeDifference > 0 && $timeDifference < 18000) {
            echo "<script>alert('Warning: Your train departs in less than 3 hours!');</script>";
        } elseif ($timeDifference <= 0) {
            echo "<script>alert('Warning: The train has already departed!');</script>";
        }

            $fullUrl ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "success")==true){
                echo "<h1 style='color:green'>";
                echo  "Reservation ID: ".$_SESSION["resDetails"]["ReservationID"];
                echo  "<br />SeatNumber: ".$_SESSION["resDetails"]["SeatNumber"];
                echo  "<br /> User ID: ".$_SESSION["resDetails"]["user_id"];
                echo  " <br />Train ID: ".$_SESSION["resDetails"]["TrainID"];
                echo  " <br />From: ".$_SESSION["TrainTime"]["departure_time"];
                echo  " <br />To: ".$_SESSION["TrainTime"]["arrival_time"];
                echo  "</h1>";
                if($_SESSION["resDetails"]["SeatNumber"]==-1){
                    echo  "<h2 style='color:red'> ";
                    echo  "an email has been sent to ".$_SESSION["email"]."to complete payment ";
                    echo  "</h2>";

                }
            }
                else if(strpos($fullUrl, "failed")==true){
                    echo "<h1 style='color:red'>there is no reservation</h1>";
                }
                
                 ?>
            <form id="myForm" action="includes/viewRes.inc.php" method="POST">
                
                <div class="input-field">
                </div>
                
                <button type="submit" id="login-btn" >View</button>
            </form>

			
            
</body>
</html>
