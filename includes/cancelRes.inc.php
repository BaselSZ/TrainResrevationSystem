<?php 

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $resID=$_POST["resID"];


    try {
        require_once "dbh.inc.php";

        $query="DELETE FROM reservation WHERE ReservationID = ?;";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$resID]);
        header("location:../cancelRes.php?success");
        die();
    } catch (PDOException $e) {
        header("location:../cancelRes.php?failed");
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("location:../login.php");
}
