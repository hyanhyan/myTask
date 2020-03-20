<?php
include "../backend/connect.php";
require_once "../frontend/front.php";
$products = $conn->query("SELECT `products`.*, `categories`.`name`,`models`.`title`  
                                        FROM `products`
                                            LEFT JOIN `categories` ON products.category_id=categories.id
                                            LEFT JOIN `models` ON products.model_id=models.id");
$products->execute();
$arr = $products->fetchAll(PDO::FETCH_ASSOC);
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


    <style>

        .btn {
            background-color: #846459;
            border: 1px solid black;
            text-decoration: none;
            color: white;
            padding: 6px 12px;
            text-align: center;
            font-size: 16px;
            margin: 4px 2px;
            opacity: 0.6;
            transition: 0.3s;
        }
    </style>
</head>

<body>
<form">
<label for="search">Search product name</label>
<br>
<input type="search" id="prSearch" name="search">
</form>
<div id="content" class="p-4 p-md-5">

    <div class="all">
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2>Product <b>Details</b></h2></div>
                        <div class="col-sm-4">
                            <a href="newProduct.php" class="add-new"><i class="fa fa-plus"></i> Add New
                                product<a>
                        </div>
                    </div>
                </div>
                <table style="width:140%"
                       class="table table-bordered" id="table_data">
                    <thead>
                    <tr>
                        <th style="width:20%">Id</th>
                        <th style="width:20%">Name</th>
                        <th style="width:20%">Category</th>
                        <th style="width:20%">Model</th>
                        <th style="width:20%">IsNew</th>
                        <th style="width:20%">Price</th>
                        <th style="width:20%">Image</th>
                        <th style="width:20%">Desc</th>
                        <th style="width:20%">Created date</th>
                        <th style="width:20%">Updated date</th>
                        <th style="width:20%">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    /*foreach ($arr as $k => $v) {

                        ?>

                        <tr>
                        <td><?php echo $v["id"] ?></td>
                    <td><?php echo $v["prName"] ?></td>
                    <td><?php echo $v["name"] ?></td>
                    <td><?php echo $v["title"] ?></td>
                    <td><?php echo $v["is_New"] ?></td>
                    <td><?php echo $v["price"] ?></td>
                    <td><?php echo $v["image_path"] ?></td>
                    <td><?php echo $v["description"] ?></td>
                    <td><?php echo $v["created_date"] ?></td>
                    <td><?php echo $v["update_date"] ?></td>


                    <td style="display: flex">
                        <a href="../editProduct.php?id=<?=$v['id'] ?>" class="edit" title="Edit"
                           data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="clear" style="color:#E34724"  title="Delete" data-toggle="tooltip"><i
                                    class="material-icons">&#xE872;</i></a>
                    </td>
                    </tr>
                    <?php
                    }*/

                    if(isset($_GET['pages']) && !empty($_GET['pages'])){
                    $currentPage = $_GET['pages'];
                    }else{
                    $currentPage = 1;
                    }

                    $offset = 10;
                    $sql = "SELECT count(*) FROM `products`";
                    $result = $conn->prepare($sql);
                    $result->execute();
                    $number_of_rows = $result->fetchColumn();
                    // echo $number_of_rows;
                    $count=ceil($number_of_rows/$offset);
                    $startFrom = ($currentPage * $offset) - $offset;
                    $firstPage=1;
                    $nextPage = $currentPage + 1;
                    $previousPage = $currentPage - 1;

                    foreach ($arr as $v) {
                    ?>

                    <tr>

                        <td><?php echo $v["id"] ?></td>
                        <td><?php echo $v["prName"] ?></td>
                        <td><?php echo $v["name"] ?></td>
                        <td><?php echo $v["title"] ?></td>
                        <td><?php echo $v["is_New"] ?></td>
                        <td><?php echo $v["price"] ?></td>
                        <td><?php echo $v["image_path"] ?></td>
                        <td><?php echo $v["description"] ?></td>
                        <td><?php echo $v["created_date"] ?></td>
                        <td><?php echo $v["update_date"] ?></td>



                        <td style="display: flex">
                            <a href="editProduct.php?id=<?= $v['id'] ?>&category_id=<?=$v['category_id']?>&model_id=<?=$v['model_id']?>" class="edit" title="Edit"
                               data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a style="color:#E34724" class="clear" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>

                    <?php
                    }
                    ?>

                    </tbody>
                </table>
                <?php

                echo "
                <button class='btn'><a href='addProductinfo.php?pages=1'>First</a></button>
                <button class='btn'><a href='addProductinfo.php?pages=" .($currentPage-1)."'>Previous</a></button>";
                for($currentPage=1;$currentPage <= $count;$currentPage++) {
                    echo "
                       
<button class='btn'><a href='?addProductinfo?pages=$currentPage'>$currentPage</a></button>";
                }
                echo "<button class='btn'><a href='addProductinfo.php?pages=".($currentPage+1)."'>Next</a></button>
<button class='btn'><a href='addProductinfo.php?pages=$count'>Last</a></button>";

                ?>


                        <?php

                   /* if(isset($_GET['page-no']) && !empty($_GET['page-no'])){
                        $currentPage = $_GET['page-no'];
                    }else{
                        $currentPage = 1;
                    }

                    $offset = 10;
                    $sql = "SELECT count(*) FROM `categories`";
                    $result = $conn->prepare($sql);
                    $result->execute();
                    $number_of_rows = $result->fetchColumn();
                    echo $number_of_rows;
                    $count=ceil($number_of_rows/$offset);
                    $startFrom = ($currentPage * $offset) - $offset;
                    $firstPage=1;
                    $nextPage = $currentPage + 1;
                    $previousPage = $currentPage - 1;
                    $sel = $conn->query("SELECT * FROM `categories` LIMIT $startFrom,$offset");
                    $sel->execute();
                    $arr=$sel->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($arr as $v) {
                        ?>
                        <tr>
                            <td><?php echo $v["id"] ?></td>
                            <td><?php echo $v["name"] ?></td>
                            <td><?php echo $v["created_date"] ?></td>
                            <td><?php echo $v["update_date"] ?></td>


                            <td>
                                <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                <a href="../edit.php?id=<?= $v['id'] ?>" class="edit" title="Edit"
                                   data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                <a class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <?php
                for($currentPage=1;$currentPage <= $count;$currentPage++) {
                    echo "
                        <ul class='d-inline-block'>
<li><a href='?page-no=$currentPage'>$currentPage</a></li></ul>
";



                }
                ?>
                <ul class='d-inline-block'>
                    <?php

                    if ($currentPage = 1) {
                        echo "<li><a href='?page-no=1'>First Page</a></li>";
                    } ?>

                    <li <?php if ($currentPage < 1) {
                        echo "class='disabled'";
                    } ?>>
                        <a <?php if ($currentPage > 1) {
                            echo "href='?page-no=$previousPage'";
                        } ?>>Previous</a>
                    </li>

                    <li <?php if ($currentPage > $count) {
                        echo "class='disabled'";
                    } ?>>
                        <a <?php if ($currentPage < $count) {
                            echo "href='?page-no=$nextPage'";
                        } ?>>Next</a>
                    </li>

                    <?php if ($currentPage < $count) {
                        echo "<li><a href='?page-no=$count'>Last</a></li>";
                    }?>
                </ul>
*/
                   ?>

            </div>
        </div>
    </div>
</div>
<script src="../js/index.js"></script>
<script src="../js/jquery-3.4.1.min.js"></script>

</body>
</html>