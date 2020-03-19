<?php
include "backend/connect.php";

$id = $_POST['id'];


$del = $conn->prepare("DELETE FROM `categories` WHERE `id`='$id'");
$del->execute();

echo 1;