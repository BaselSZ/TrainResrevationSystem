<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $fname=$_POST["Fname"];
    $minit=$_POST["Minit"];
    $lname=$_POST["Lname"];
    $role=$_POST["role"];
    $email=$_POST["email"];

    try {
        require_once "dbh.inc.php";

        $query="INSERT INTO users (Fname, Minit, Lname, role, username, password, email) VALUES (?,?,?,?,?,?,?) ;" ;

        $stmt = $pdo->prepare($query);

        $stmt->execute([$fname, $minit, $lname, $role, $username, $password, $email]);

        $pdo=null;
        $stmt=null;
        
        header("location:../login.php");

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("location:../login.php");
}