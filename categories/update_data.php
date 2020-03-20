<?php
session_start();
include "../backend/connect.php";
$name=$_GET['category'];
$id=$_SESSION['id'];


$update = $conn->prepare ("UPDATE categories SET name='$name' WHERE id='$id'");
$update->execute();

header("Location: addinfo.php");




