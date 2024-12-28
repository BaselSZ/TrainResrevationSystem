<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>staffDashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="login-container">

    <h1 style="color:black;">welcome staff member: <?php echo $_SESSION["Fname"]?></h1>
    <?php
    echo $_SESSION["loginStatus"];
    ?>
    <a href="addRes.php">
    <button style="margin: 2px;"onclick="">Add Reservation</button>
    </a>
    <a href="editRes.php">
    <button style="margin: 2px;"onclick="">Edit Reservation</button>
    </a>
    <a href="cancelRes.php">
    <button style="margin: 2px;"onclick="">Cancel Reservation</button>
    </a>
    <a href="bookStaff.php">
    <button style="margin: 2px;"onclick="">Assign Staff to a Train</button>
    </a>
    <a href="promote.php">
    <button style="margin: 2px;"onclick="">Promote a waitlisted passenger. </button>
    </a>
    <a href="listStation.php">
    <button style="margin: 2px;" onclick="">List stations</button>
    </a>
    <a href="WLP.php">
    <button style="margin: 2px;" onclick="">Waitlisted loyalty passengers</button>
    </a>
    <a href="ALF.php">
    <button style="margin: 2px;" onclick="">Average load factor</button>
    </a>
    <a href="listDep.php">
    <button style="margin: 2px;" onclick="">List of dependents</button>
    </a>
    <a href="login.php">
    <button style="margin: 2px;" onclick="">log out</button>
    </a>
</div>
</body>
</html>