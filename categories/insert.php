<?php
include "../backend/connect.php";
$name= $_POST["name"];

if(isset ($_POST['add'])) {
    $query = $conn->prepare(" INSERT INTO `categories` (`name`,`created_date`,`update_date`)  VALUES ('$name', now(), now())");

    $query->execute();
    header("Location: addinfo.php");
}



