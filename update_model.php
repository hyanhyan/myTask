<?php
session_start();
include "backend/connect.php";
$name=$_GET['model'];
$id=$_SESSION['id'];
$sel=$_GET['select'];
$cat=$_GET['category_id'];



$update = $conn->prepare ("UPDATE models SET title='$name',category_id='$sel' WHERE id='$id'");
$update->execute();

header("Location: frontend/addmodelinfo.php");