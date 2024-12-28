<?php 

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $seatnumber=$_POST["seatnumber"];
    $trainID=$_POST["trainID"];
    $userID=$_POST["userID"];
    $resID=$_POST["resID"];


    try {
        require_once "dbh.inc.php";

        $query="UPDATE reservation SET SeatNumber = ?, TrainID = ?, user_id = ? WHERE ReservationID = ?;";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$seatnumber, $trainID, $userID ,$resID]);
        header("location:../editRes.php?success");
        die();
    } catch (PDOException $e) {
        header("location:../editRes.php?failed");
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("location:../login.php");
}
