<?php 
$_SESSION["loyal"]="";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $class=$_POST["class"];


    try {
        require_once "dbh.inc.php";

    //$query="SELECT r.ReservationID FROM Reservation r JOIN Dependent d ON r.user_id = d.user_id WHERE d.DependentID = ?;";
       $query="SELECT u.user_id, u.Fname, l.class, r.SeatNumber
        FROM users u
        JOIN Loyalty l ON u.user_id = l.user_id
        JOIN Reservation r ON u.user_id = r.user_id
        WHERE l.class = ?  -- Replace 'Gold' with the desired loyalty class
        AND r.SeatNumber = -1;";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$class]);
        $result= $stmt->fetchAll();
        var_dump($result);
        $_SESSION["loyal"]=$result; 
        if($_SESSION["loyal"]==null){
            header("location:../WLP.php?failed");
        }else{
       header("location:../WLP.php?success");}
        die();
    } catch (PDOException $e) {
       header("location:../WLP.php?failed");
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("location:../login.php");
}
