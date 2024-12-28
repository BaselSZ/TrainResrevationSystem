<?php 

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $seatnumber=$_POST["seatnumber"];
    $resID=$_POST["resID"];

    try {
        require_once "dbh.inc.php";

        $query="SELECT SeatNumber FROM reservation WHERE ReservationID = ?;";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$resID]);
        $result= $stmt->fetch(PDO::FETCH_ASSOC);
        if($result["SeatNumber"] != -1){
           header("location:../promote.php?notwait");
        }else if($result["SeatNumber"] == -1){
            $query2="UPDATE reservation SET SeatNumber = ? WHERE ReservationID = ?;";
            $stmt2 = $pdo->prepare($query2);
            $stmt2->execute([$seatnumber,$resID]);
            header("location:../promote.php?success");
        }
        die();
    } catch (PDOException $e) {
        header("location:../promote.php?failed");
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("location:../login.php");
}
