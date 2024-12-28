<?php 
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $trainID=$_POST["trainIDD"];
    $capacity=$_POST["capacity"];

    try {
        require_once "dbh.inc.php";
        if($capacity>0){
            
            $query="INSERT INTO reservation (SeatNumber, TrainID, user_id) VALUES (?,?,?) ;
                    UPDATE Train SET capacity = capacity - 1 WHERE TrainID = $trainID;" ;
                    $stmt = $pdo->prepare($query);

                    $stmt->execute([$capacity, $trainID, $_SESSION["ID"]]);
            
                    $pdo=null;
                    $stmt=null;
                    header("location:../payment.php?".$capacity);
        }else{
            $query="INSERT INTO reservation (SeatNumber, TrainID, user_id) VALUES (?,?,?) ;" ;
            $capacity=-1;
            $stmt = $pdo->prepare($query);

        $stmt->execute([$capacity, $trainID, $_SESSION["ID"]]);

        $pdo=null;
        $stmt=null;
        header("location:../searchTrain.php?booking=failed");
        }

        
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("location:../login.php");
}