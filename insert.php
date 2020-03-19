<?php
include "backend/connect.php";


/*$data = array(
  $name= $_POST["name"],

);*/

$name= $_POST["name"];

if(isset ($_POST['add'])) {
    $query = $conn->prepare(" INSERT INTO `categories` (`name`,`created_date`,`update_date`)  VALUES ('$name', now(), now())");

    $query->execute();
    header("Location: frontend/addinfo.php");
}



/*if ($statement->execute($data)) {
    $output = array(
        'name' => $_POST['name'],

    );

    echo json_encode($output);
}*/


