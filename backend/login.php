<?php


session_start();
include "../backend/connect.php";
$name = $_POST['name'];
$password = $_POST['pass'];

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if(isset($_POST['submit'])) {

    $stmt = $conn->query("SELECT * FROM `users` WHERE `name` = '$name' AND `password` = '$password'");
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $id = ($arr[0]["id"]);
    if ($arr) {

        $_SESSION['name'] = $name;
        $_SESSION['id'] = $id;
        $_SESSION['authorized']=true;

        if (!empty($_POST["check"])) {
            $key = generateRandomString();
            setcookie("name", $name, time() + 3600,"/");
            setcookie("cookie_key", $key, time() + 3600,"/");
            $sql = "UPDATE `users` SET `cookie_key`='$key' WHERE id={$id}";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

        }
        header("location: ../frontend/signIn.php");
    } else {
        echo 'sxal e';
        header("Location: ../frontend/login.php");
    }
}
