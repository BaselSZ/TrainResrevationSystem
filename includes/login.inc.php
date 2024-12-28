<?php 

session_start();
$_SESSION["loginStatus"]="";
$_SESSION["username"]="";
$_SESSION["Fname"]="";
$_SESSION["role"]="";
$_SESSION["ID"]="";
$_SESSION["email"]="";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username=$_POST["username"];
    $password=$_POST["password"];


    try {
        require_once "dbh.inc.php";

        $query="SELECT * FROM users WHERE username=:username;";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $result= $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($result["password"]==$password);
        $_SESSION["loginStatus"]=$result["password"];
        $_SESSION["username"]=$result["username"];
        $_SESSION["ID"]=$result["user_id"];
        $_SESSION["Fname"]=$result["Fname"];
        $_SESSION["role"]=$result["role"];
        $_SESSION["email"]=$result["email"];
        $pdo=null;
        $stmt=null; 
        if($result["password"]==$password){
            $_SESSION["loginStatus"]="login success";
            if($_SESSION["role"]=="staff"){
                header("location:../staffDashboard.php");
            }else{
                header("location:../userDashboard.php");
            }
        }else{
            $_SESSION["loginStatus"]="login failed";
            header("location:../login.php?login=failed");
        }

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("location:../login.php");
}
