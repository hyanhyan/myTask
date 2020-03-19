<?php
include "../backend/connect.php";
require_once "../front.php";

$models = $conn->query("SELECT `models`.*, `categories`.`name`  
                                        FROM `models`
                                            LEFT JOIN `categories` ON models.category_id=categories.id");
$models->execute();
$arr = $models->fetchAll(PDO::FETCH_ASSOC);

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
<div id="content" class="p-4 p-md-5">

    <div class="all">
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2>Model <b>Details</b></h2></div>
                        <div class="col-sm-4">
                            <a href="../new_model.php" class="add-new"><i class="fa fa-plus"></i> Add New
                                model<a>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered" id="table_data">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Created date</th>
                        <th>Updated date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    /*foreach ($arr as $v):?>
<tr>
<td><?php echo $v["id"] ?></td>
<td><?php echo $v["title"] ?></td>
<td><?php echo $v["name"] ?></td>
<td><?php echo $v["created_date"] ?></td>
<td><?php echo $v["update_date"] ?></td>                      <td>
<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
<a href="../editModel.php?id=<?= $v['id'] ?>" class="edit" title="Edit"
data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
<a class="del" title="Delete" data-toggle="tooltip"><i
class="material-icons">&#xE872;</i></a>
</td>
</tr>
<?php endforeach;?>*/


                    if(isset($_GET['page']) && !empty($_GET['page'])){
                        $currentPage = $_GET['page'];
                    }else{
                        $currentPage = 1;
                    }

                    $offset = 10;
                    $sql = "SELECT count(*) FROM `models`";
                    $result = $conn->prepare($sql);
                    $result->execute();
                    $number_of_rows = $result->fetchColumn();
                   // echo $number_of_rows;
                    $count=ceil($number_of_rows/$offset);
                    $startFrom = ($currentPage * $offset) - $offset;
                    $firstPage=1;
                    $nextPage = $currentPage + 1;
                    $previousPage = $currentPage - 1;
                    $sel = $conn->query("SELECT  `models`.*, `categories`.`name`  
                                        FROM `models`
                                            LEFT JOIN `categories` ON models.category_id=categories.id
LIMIT $startFrom,$offset");
                    $sel->execute();
                    $arr=$sel->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($arr as $v) {
                        ?>

                        <tr>
                            <td><?php echo $v["id"] ?></td>
                            <td><?php echo $v["title"] ?></td>
                            <td><?php echo $v["name"] ?></td>
                            <td><?php echo $v["created_date"] ?></td>
                            <td><?php echo $v["update_date"] ?></td>


                            <td>
                                <a href="../editModel.php?id=<?= $v['id'] ?>&category_id=<?=$v['category_id']?>" class="edit" title="Edit"
                                   data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                <a style="color:#E34724" class="del" title="Delete" data-toggle="tooltip"><i
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
                <button class='btn'><a href='addmodelinfo.php?page=1'>First</a></button>
                <button class='btn'><a href='addmodelinfo.php?page=".($currentPage-1)."'>Previous</a></button>";
                for($currentPage=1;$currentPage <= $count;$currentPage++) {
                    echo "
                       
<button class='btn'><a href='addmodelinfo.php?page=$currentPage'>$currentPage</a></button>";
                }
                echo "<button class='btn'><a href='addmodelinfo.php?page=".($currentPage+1)."'>Next</a></button>
<button class='btn'><a href='addmodelinfo.php?page=$count'>Last</a></button>";

                    ?>

                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>

<script src="../index.js"></script>
<script src="../jquery-3.4.1.min.js"></script>
</body>
</html>