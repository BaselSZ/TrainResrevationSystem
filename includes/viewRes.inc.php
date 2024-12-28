<?php 
$_SESSION["resDetails"]="";
$_SESSION["TrainTime"]="";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){


    try {
        require_once "dbh.inc.php";

        $query="SELECT * FROM reservation WHERE user_id = ?;";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$_SESSION["ID"]]);
        $result= $stmt->fetch(PDO::FETCH_ASSOC);
        if($result==false){
            header("location:../viewRes.php?failed");
        }
        $resID=$result["ReservationID"];
        $_SESSION["resDetails"]=$result;

        $query2="SELECT departure_time, arrival_time FROM train WHERE TrainID = ?;";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->execute([$result["TrainID"]]);
        $result2= $stmt2->fetch(PDO::FETCH_ASSOC);
        $_SESSION["TrainTime"]=$result2;
        
        header("location:../viewRes.php?success");
        die();
    } catch (PDOException $e) {
        header("location:../viewRes.php?failed");
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("location:../login.php");
}
