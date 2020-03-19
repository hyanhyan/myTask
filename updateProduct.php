<?php

session_start();
include "backend/connect.php";
$name = $_GET['product'];
$id = $_SESSION['id'];
$msel = $_GET['select'];
$sel=$_GET['sel'];


$update = $conn->prepare("UPDATE products SET prName='$name',category_id='$sel',model_id='$msel'  WHERE id='$id'");
$update->execute();

header("Location: frontend/addProductinfo.php");