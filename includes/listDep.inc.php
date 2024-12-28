<?php 
$_SESSION["dep"]="";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $trainID=$_POST["TrainID"];


    try {
        require_once "dbh.inc.php";

    //$query="SELECT r.ReservationID FROM Reservation r JOIN Dependent d ON r.user_id = d.user_id WHERE d.DependentID = ?;";
       $query=" SELECT DISTINCT d.DependentID, d.Name, d.Relationship, d.user_id FROM Dependent d INNER JOIN Reservation r ON d.user_id = r.user_id;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result= $stmt->fetchAll();
        $_SESSION["dep"]=$result;       
       header("location:../listDep.php?success");
        die();
    } catch (PDOException $e) {
       header("location:../listDep.php?failed");
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("location:../login.php");
}
