
<?php
include "backend/connect.php";

$id = $_POST['id'];


$delete = $conn->prepare("DELETE FROM `models` WHERE `id`='$id'");
$delete->execute();

echo 1;