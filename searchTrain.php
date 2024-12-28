<?php session_start();
function removeSubstring($string, $substring) {
    return str_replace($substring, '', $string);
}
 function displayTrain(){
    $rowCount =count($_SESSION["TrainResult"]);
        if ($rowCount > 0) {
            foreach ($_SESSION["TrainResult"] as $row) {
                echo "<li class='list-item'>";
                echo "<div><strong>" . $row['Name_English'] . "</strong></div>";
                echo "<div>Capacity: " . $row['capacity'] . "</div>";
                echo "<div>Departs: " . $row['departure_time'] . "</div>";
                echo "<div>Arrives: " . $row['arrival_time'] . "</div>";
                echo "<div> 
                <form id='myForm' action='includes/bookTrain.inc.php' method='POST'>
                <input type='hidden' name='trainIDD' value='".$row['TrainID']."'>
                <input type='hidden' name='capacity' value='".$row['capacity']."'>
                <button type='submit' id='book-btn'>book</buton>
                </form></div>";
                echo "</li>";
            }
        } else {
            echo "<li class='list-item'>No trains available</li>";
        }
 }
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>usrerDashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Styling for ListView */
        .list-view {
            list-style: none;
            margin: 0;
            padding: 0;
            width: 80%;
            margin: auto;
        }
        .list-item {
            padding: 15px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            background: #f9f9f9;
            color:black;
            transition: all 0.3s;
        }
        .list-item:hover {
            background: #f1f1f1;
            transform: scale(1.02);
        }
        .list-item strong {
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center;color:black;">Train List</h1>
    <form id="myForm" action="includes/searchTrain.inc.php" method="POST">
                <div class="input-field">
                    <label for="username" id="trainquery-label">search for a train by name (type * to show all)</label>
                    <input type="text" id="trainquery" name="trainquery" placeholder="Enter name of the train" required>
                </div>
                <button type="submit" id="search-btn" >search</button>
            </form>
    <ul class="list-view">
        <?php
        $fullUrl ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if(strpos($fullUrl, "booking=success")==true){
            $SN=removeSubstring($fullUrl,"http://localhost/DatabaseProj/searchTrain.php?booking=success");
            echo "<h1 style='color:green'>booked succefully and your seat number is ".$SN."</h1>";
            displayTrain();
        }else if(strpos($fullUrl, "booking=failed")==true){
            echo "<h1 style='color:red'>booking failed (you will be waitlisted)</h1>";
            displayTrain();
        }else{
            displayTrain();
        }
        die();
        ?>
    </ul>
    
</body>
</html>