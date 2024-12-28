<?php 
$_SESSION["LF"]="";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){


    try {
        require_once "dbh.inc.php";

       $query="SELECT 
    t.TrainID, 
    t.capacity,
    COUNT(r.SeatNumber) AS occupied_seats,
    (COUNT(r.SeatNumber) / t.capacity) * 100 AS load_factor_percentage
FROM 
    Train t
JOIN 
    Reservation r ON t.TrainID = r.TrainID
WHERE 
    r.SeatNumber != -1  -- Seat is occupied
GROUP BY 
    t.TrainID, t.capacity;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result= $stmt->fetchAll();
        var_dump($result);
        $_SESSION["LF"]=$result; 
        header("location:../ALF.php?success");
        die();
    } catch (PDOException $e) {
        header("location:../ALF.php?failed");
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("location:../login.php");
}
