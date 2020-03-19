<?php
session_start();
$id=$_GET["id"];
$_SESSION["id"]=$id;
$cat=$_GET['category_id'];

include "backend/connect.php";
$sql = $conn->prepare("SELECT * FROM `models`");
$sql->execute();
$arrSql = $sql->fetchAll(PDO::FETCH_ASSOC);

$category = $conn->prepare("SELECT * FROM `categories`");
$category->execute();
$arrCategory = $category->fetchAll(PDO::FETCH_ASSOC);

$products = $conn->prepare("SELECT * FROM `products`  WHERE `id`='$id'");
$products->execute();
$arrProducts = $products->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="sidebar-01/css/style.css">
    <script src="sidebar-01/js/jquery-3.4.1.min.js"></script>
</head>
<body>

<div class="aa">
    <form action="updateProduct.php" method="get" id="add_details">
        <select type="text" name="select" style="width:220px; height: 30px;">
            <?php

           /* $pr = $conn->query("SELECT `products`.*, `categories`.`name`,`models`.`title`
                                        FROM `products`
                                            LEFT JOIN `categories` ON products.category_id=categories.id
                                            LEFT JOIN `models` ON products.model_id=models.id");
            $pr->execute();*/
            foreach ($arrSql as $k => $v) {

                $name = $v['title'];
                $mid = $v['id'];
                $mod=$_GET['model_id'];
                ?>
                <option value="<?php echo $mid; ?>" <?php if ($mod == $mid) echo 'selected'; ?>><?php echo $name; ?></option>

                <?php
            }
            ?>
        </select>
        <select type="text" name="sel" style="width:220px; height: 30px;">
            <?php

           /* $pr = $conn->query("SELECT `products`.*, `categories`.`name`,`models`.`title`
                                        FROM `products`
                                            LEFT JOIN `categories` ON products.category_id=categories.id
                                            LEFT JOIN `models` ON products.model_id=models.id");
            $pr->execute();*/
            foreach ($arrCategory as $k => $x) {

                $cname=$x['name'];
                $id = $x['id'];
                $sel = $_GET['sel'];
                ?>
                <option value="<?php echo $id; ?>" <?php if ($cat == $id) echo 'selected'; ?>><?php echo $cname; ?></option>
                <?php
            }
            ?>
        </select>
        <input type="text" value="<?php echo $arrProducts[0]['prName']; ?>" name="product" class="ml-3 mb-2 form-control">
        <button type="submit" name="submit" data-id="" class="sub">Submit</button>
    </form>
</div>

<script src="sidebar-01/js/popper.js"></script>
<script src="sidebar-01/js/bootstrap.min.js"></script>
<script src="sidebar-01/js/main.js"></script>
<script src="sidebar-01/js/bootstrap.min.js"></script>

</body>
</html>





