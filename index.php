<?php
//session_start();
//
//$name = $_COOKIE['name'];
//$key = $_COOKIE['cookie_key'];
//if ($_SESSION['authorized'] && $_SESSION['authorized'] == true) {
////    header("Location: signIn.php");
//
//    echo "sesion";
//} else {
//    if (isset($_COOKIE['cookie_key']) && isset($_COOKIE['name'])) {
//        if ($stmt = $conn->query("SELECT * FROM `users` WHERE `name` = '$name' AND `cookie_key` = '$key'")) {
//            $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//            if ($arr) {
//                echo "Cookei";
////                header("Location: signIn.php");
//
//            } else {
//                header("location: login.php");
//            }
//
//
//        }
//
//    } else {
//        header("location: login.php");
//    }
//
//}