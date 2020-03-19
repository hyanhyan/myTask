<?php
session_start();
include "../backend/connect.php";
include "../backend/login.php";

if(isset($_COOKIE['cookie_key'])) {
    setcookie("name", $name, time() - 3600,"/");
    setcookie("cookie_key", $key, time() - 3600,"/");

    $sql = "UPDATE `users` SET `cookie_key`='NULL'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

}else{
    echo "false";
}
if (isset($_SESSION['authorized'])){
    unset($_SESSION['authorized']);
}


header("location: ../frontend/login.php");
