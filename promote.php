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
            <h2 id="form-title">promote waitlisted passanger</h2>
            <?php
            $fullUrl ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "success")==true){
                echo "<h1 style='color:green'>changed succefully</h1>";}
                else if(strpos($fullUrl, "notwait")==true){
                    echo "<h1 style='color:red'>user is not Waitlisted</h1>";
                }
                 ?>
            <form id="myForm" action="includes/promote.inc.php" method="POST">
                
                <div class="input-field">
                    <label for="username" id="username-label">reservation ID</label>
                    <input type="text" id="username" name="resID" placeholder="Enter reservation ID" required>
                </div>
                <div class="input-field">
                    <label for="username" id="username-label">new seat number</label>
                    <input type="text" id="username" name="seatnumber" placeholder="Enter new seat number" required>
                </div>
                <button type="submit" id="login-btn" >Add</button>
            </form>

			
            
</body>
</html>
