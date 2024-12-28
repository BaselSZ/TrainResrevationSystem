<?php
session_start(); 
function removeSubstring($string, $substring) {
    return str_replace($substring, '', $string);
}
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
            <h2 id="form-title">Assign staff to a train</h2>
            <?php
            $fullUrl ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "success")==true){
                $SN=removeSubstring($fullUrl,"http://localhost/DatabaseProj/bookStaff.php?success");
                echo "<h1 style='color:green'>Assigned succefully From ".$SN."</h1>";
            }
                else if(strpos($fullUrl, "failed")==true){
                    echo "<h1 style='color:red'>key constraint violation-not assigned</h1>";
                }
                 ?>
            <form id="myForm" action="includes/bookStaff.inc.php" method="POST">
                
                <div class="input-field">
                    <label for="username" id="username-label">seat number</label>
                    <input type="text" id="username" name="seatnumber" placeholder="Enter seat number" required>
                </div>
                <div class="input-field">
                    <label for="username" id="username-label">train ID</label>
                    <input type="text" id="username" name="trainID" placeholder="Enter trainID" required>
                </div>
                <div class="input-field">
                    <label for="password" id="password-label">staff userID</label>
                    <input type="password" id="password" name="userID" placeholder="Enter userID " required>
                </div>
                <button type="submit" id="login-btn" >Add</button>
            </form>

			
            
</body>
</html>
