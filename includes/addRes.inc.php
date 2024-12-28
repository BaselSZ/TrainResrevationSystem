<?php 

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $seatnumber=$_POST["seatnumber"];
    $trainID=$_POST["trainID"];
    $userID=$_POST["userID"];


    try {
        require_once "dbh.inc.php";

        $query="INSERT INTO reservation (SeatNumber, TrainID, user_id) VALUES (?, ?, ?);";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$seatnumber, $trainID, $userID]);
        header("location:../addRes.php?success");
        die();
    } catch (PDOException $e) {
        header("location:../addRes.php?failed");
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("location:../login.php");
}
