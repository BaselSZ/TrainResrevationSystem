<?php 
session_start();
$_SESSION["TrainResult"]="";



if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $trainquery=$_POST["trainquery"];
    

    try {
        require_once "dbh.inc.php";
        if($trainquery=="*"){
        $query="SELECT * FROM Train;" ;

        $stmt = $pdo->prepare($query);

        $stmt->execute();
        $_SESSION["TrainResult"]= $stmt->fetchAll();
        var_dump($_SESSION["TrainResult"]);
        $pdo=null;
        $stmt=null;
        header("location:../searchTrain.php");

        die();
        }else{

        $query="SELECT * FROM Train WHERE Name_English LIKE ? " ;

        $stmt = $pdo->prepare($query);

        $stmt->execute(["%$trainquery%"]);
        $_SESSION["TrainResult"]= $stmt->fetchAll();
        var_dump($_SESSION["TrainResult"]);
        $pdo=null;
        $stmt=null;
        header("location:../searchTrain.php");

        die();
        }
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("location:../login.php");
}