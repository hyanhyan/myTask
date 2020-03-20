<?php
session_start();
include "../backend/connect.php";
$id=$_GET["id"];
$_SESSION["id"]=$id;
$cat=$_GET['category_id'];
$stmt = $conn->prepare('SELECT * FROM `models`');
$stmt->execute();
$res = $stmt->setFetchMode(PDO::FETCH_ASSOC);


$sql = $conn->prepare("SELECT * FROM `models` WHERE `id`='$id'");
$sql->execute();
$arrSql = $sql->fetchAll(PDO::FETCH_ASSOC);

$category = $conn->prepare("SELECT * FROM `categories`");
$category->execute();
$arrCategory = $category->fetchAll(PDO::FETCH_ASSOC);

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
    <form action="update_model.php" method="get" id="add_details">
        <select type="text" name="select" style="width:220px; height: 30px;">
            <?php


            foreach ($arrCategory as $k => $v) {

                $name = $v['name'];
                $id = $v['id'];
                $sel = $_GET['select'];

                ?>
                <option value="<?php echo $id; ?>" <?php if ($cat == $id) echo 'selected'; ?>><?php echo $name; ?></option>
                <?php
            }
            ?>
        </select>
        <input type="text" value="<?php echo $arrSql[0]['title']; ?>" name="model" class="ml-3 mb-2 form-control">
        <button type="submit" name="submit" data-id="" class="sub">Submit</button>
    </form>
</div>

<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/index.js"></script>


</body>
</html>





