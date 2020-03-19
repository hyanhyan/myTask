<?php
ob_start();
include "backend/connect.php";

$product = $conn->prepare("SELECT * FROM `models`");
$product->execute();
$arrProduct = $product->fetchAll(PDO::FETCH_ASSOC);


$category = $conn->prepare("SELECT * FROM `categories`");
$category->execute();
$arrCatgory = $category->fetchAll(PDO::FETCH_ASSOC);
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
<div class="container">
<form action="" method="post" id="add_details">
    <label for="enterName">Enter model name</label>
    <input type="text" name="name" class="form-control">
    <input type="radio" id="new" name="new" value="1">
    <label for="new">New</label><br>
    <input type="radio" id="new" name="new" value="0">
    <label for="new">Not new</label><br><br>
    <label>All products</label>
    <select type="text" name="sel" style="width:220px; height: 30px;">
        <option value="" disabled selected>Choose your model</option>
        <?php foreach ($arrProduct as $item):?>
        <option value="<?= $item['id'] ?>"><?= $item['title'] ?></option>
        <?php endforeach; ?>
    </select>
    <select type="text" name="select" style="width:220px; height: 30px;">
        <option value="" disabled selected>Choose your product</option>
        <?php foreach ($arrCatgory as $i):?>
            <option value="<?= $i['id'] ?>"><?= $i['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="enterPrice">Enter model price</label>
    <input type="text" name="price" class="form-control">
    <label for="enterpath">Enter model image path</label>
    <input type="text" name="img" class="form-control">
    <label for="enterDesc">Enter model description</label>
    <input type="textarea" name="desc" class="form-control">
    <input type="submit" name="submit" id="add" class="btn btn-success">
</form>
</div>

<?php


if (isset($_POST['submit'])){
    if (!empty($_POST['name'] && $_POST['select'] && $_POST['sel'])){

        $name = $_POST['name'];
        $option = $_POST['select'];
        $mod=$_POST['sel'];
        $new=$_POST['new'];
        $price=$_POST['price'];
        $img=$_POST['img'];
        $desc=$_POST['desc'];


        $insert_products = $conn->prepare("INSERT INTO `products` (`prName`,`is_New`, `category_id`,`model_id`,`price`,`image_path`,`description`,`created_date`, `update_date`) 
                                                      VALUES ('$name', '$new','$option','$mod','$price','$img','$desc', now(), now())");
        $insert_products->execute();

        header("Location: frontend/addProductinfo.php");


    }

}

?>
<script src="sidebar-01/js/popper.js"></script>
<script src="sidebar-01/js/bootstrap.min.js"></script>
<script src="sidebar-01/js/main.js"></script>
<script src="sidebar-01/js/bootstrap.min.js"></script>

</body>
</html>
<?php
ob_flush();