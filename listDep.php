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
            <h2 id="form-title">view dependents</h2>
            <?php


            $fullUrl ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "success")==true){
                echo "<h2 style='color:green'>";
                echo "dependets traviling today are:";
                echo "</h2>";

                foreach ($_SESSION["dep"] as $station) {
                    echo "<h2 style='color:black'>";
                    echo $station['Name'] . "<br>"; // Echo each station name
                    echo "</h2>";

                }
                
            }
                else if(strpos($fullUrl, "failed")==true){
                    echo "<h1 style='color:red'>there is no stations</h1>";
                }
                
                 ?>
            <form id="myForm" action="includes/listDep.inc.php" method="POST">
                
                <div class="input-field">
                </div>
                
                <button type="submit" id="login-btn" >List</button>
            </form>

			
            
</body>
</html>
