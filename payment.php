<?php
session_start(); 
function removeSubstring($string, $substring) {
    return str_replace($substring, '', $string);
}
$fullUrl ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$cap=removeSubstring($fullUrl,"http://localhost/DatabaseProj/payment.php?");
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
            <h1 id="header-text">check up</h1>
        </header>

        <section class="login-form">
            <h2 id="form-title">payment details</h2>
            
            
                <div class="input-field">
                    <label for="username" id="username-label">card number</label>
                    <input type="text" id="card-number" name="username" placeholder="Enter your card number" required>
                </div>
                <div class="input-field">
                    <label for="password" id="password-label">Exp date</label>
                    <input type="text" id="exp-date" name="password" placeholder="Enter your Exp date" required>
                    <label for="password" id="password-label">CVV</label>
                    <input type="text" id="cvv" name="password" placeholder="Enter your CVV" required>

                </div>
                <button type="submit" id="login-btn" onclick=validateCardDetails() >confirm</button>
                <script>
        function validateCardDetails() {
            // Get the input values
            const cardNumber = document.getElementById("card-number").value.trim();
            const expDate = document.getElementById("exp-date").value.trim();
            const cvv = document.getElementById("cvv").value.trim();

            // Regular expression for MM/YY format
            const expDateRegex = /^(0[1-9]|1[0-2])\/\d{2}$/;

            // Validate card number (12 digits)
            if (!/^\d{12}$/.test(cardNumber)) {
                alert("Card number must be exactly 12 digits.");
                return false;
            }

            // Validate expiration date
            if (!expDateRegex.test(expDate)) {
                alert("Expiration date must be in MM/YY format.");
                return false;
            }

            // Validate CVV (3 digits)
            if (!/^\d{3}$/.test(cvv)) {
                alert("CVV must be exactly 3 digits.");
                return false;
            }

            // If all validations pass
            alert("Payment information is valid.");
            const cap = "<?php echo $cap; ?>"; 
            window.location.href = "searchTrain.php?booking=success"+cap;
            return true;
        }
    </script>
       

</body>
</html>
