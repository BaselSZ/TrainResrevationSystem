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
            <h2 id="form-title">view load factor</h2>
            <?php


            $fullUrl ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "success")==true){
                echo "<h2 style='color:green'>";
                echo "load factors are:";
                echo "</h2>";
                foreach ($_SESSION["LF"] as $station) {
                    $load=100*$station['occupied_seats']/($station['capacity']+$station['occupied_seats']);
                    echo "<h2 style='color:black'> TrainID: ".$station['TrainID']." | Load factor: ".$load."%</h2>";
                    

                }
                
            }
                else if(strpos($fullUrl, "failed")==true){
                    echo "<h1 style='color:red'>failed</h1>";
                }
                
                 ?>
            <form id="myForm" action="includes/ALF.inc.php" method="POST">
                
        
                
                <button type="submit" id="login-btn" >calculate load factor</button>
            </form>

			
            
</body>
</html>
