<?php 
$_SESSION["Stations"]="";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $trainID=$_POST["TrainID"];


    try {
        require_once "dbh.inc.php";

        $query="SELECT s.StationName FROM trainstations ts JOIN station s ON ts.StationID = s.StationID WHERE ts.TrainID = ?;";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$trainID]);
        $result= $stmt->fetchAll();
        $_SESSION["Stations"]=$result;       
       header("location:../listStation.php?success");
        die();
    } catch (PDOException $e) {
       header("location:../listStation.php?failed");
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("location:../login.php");
}
