<?php
session_start();
include "../backend/connect.php";
$id=$_GET["id"];
$_SESSION["id"]=$id;
$stmt = $conn->prepare('SELECT * FROM `categories`');
$stmt->execute();
$res = $stmt->setFetchMode(PDO::FETCH_ASSOC);


$sql = $conn->prepare("SELECT * FROM `categories` WHERE `id`='$id'");
$sql->execute();
$arrSql = $sql->fetchAll(PDO::FETCH_ASSOC);



?>
<html lang="en">
<head>
    <title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../sidebar-01/css/style.css">

</head>
<body>

<div class="aa">
    <form action="update_data.php" method="get">
        <input type="text" value="<?php echo $arrSql[0]['name']; ?>" name="category" class="ml-3 mb-2">
        <button type="submit" name="submit" data-id="" class="sub">Submit</button>
    </form>
</div>


</body>
</html>




