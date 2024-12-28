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
        $query2="SELECT departure_time, arrival_time FROM train WHERE TrainID = ?;";

        $stmt2 = $pdo->prepare($query2);
        $stmt2->execute([$trainID]);
        $result=$stmt2->fetch(PDO::FETCH_ASSOC);
        var_dump($result);
        header("location:../bookStaff.php?success(".$result["departure_time"].")to(".$result["arrival_time"].")");
        die();
    } catch (PDOException $e) {
        header("location:../bookStaff.php?failed");
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("location:../login.php");
}
