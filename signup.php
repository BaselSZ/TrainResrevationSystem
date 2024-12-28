<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign-Up - Haramain Train</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="signup-container">
        <header>
            <h1 id="header-text">Haramain Train</h1>
        </header>

        <section class="signup-form">
            <h2 id="form-title">Sign-Up</h2>
            <form action="includes/signup.inc.php" method="post">
                <div class="input-field">
                    <label for="email" id="email-label">First name</label>
                    <input type="text" id="fname" name="Fname" placeholder="Enter your First name" required>
                </div>
                <div class="input-field">
                    <label for="email" id="email-label">middle initial</label>
                    <input type="text" id="minit" name="Minit" placeholder="Enter your middle initial" required>
                </div>
                <div class="input-field">
                    <label for="email" id="email-label">last name</label>
                    <input type="text" id="lname" name="Lname" placeholder="Enter your last name" required>
                </div>
                <div class="input-field">
                    <label for="email" id="email-label">role</label>
                    <input type="text" id="role" name="role" placeholder="Enter your role" required>
                </div>
                <div class="input-field">
                    <label for="email" id="email-label">email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <!-- Username Field -->
                <div class="input-field">
                    <label for="username" id="username-label">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>

                <!-- Password Field -->
                <div class="input-field">
                    <label for="password" id="password-label">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" id="signup-btn">Sign Up</button>
            </form>

            <div class="signin-link">
                <p id="signin-text" style="color:black">Already have an account? <a href="login.php">Sign In</a></p>
            </div>
        </section>
    </div>

    <script>
        // Handling Sign-Up Form Validation
        document.getElementById('signup-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Get form data
            const email = document.getElementById('email').value;
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;

            // Check if passwords match
            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }

            // If validation passes, redirect to Sign-In page
            window.location.href = 'signin.html'; // Redirect to Sign-In page after successful Sign-Up
        });
    </script>
</body>
</html>

