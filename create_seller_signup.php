<?php
include 'database/db_controller.php';
$email = $_POST["email"];
$pass = $_POST["pass"];
$address = $_POST["address"];
$repass = $_POST["repass"];
$pattern = "/\S{8,}/i";
$res = "";

if(preg_match($pattern, $pass)){
    $res = "Choose a Strong Password";

}
if($repass != $pass){
    $res = "Passwords don't match";
    
}
else{
    $stmt = $con->prepare("INSERT INTO seller(email,password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $pass);
    $stmt -> execute();
    $res = "You may Login";
    sleep(3);
    header("Location: sellerlogin.php");
    
}
