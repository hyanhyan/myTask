<?php
include "../backend/connect.php";

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
<form action="" method="post" id="add_details">
    <input type="text" name="name" class="form-control">
    <label>All categories</label>
    <select type="text" name="select" style="width:220px; height: 30px;">
        <option value="" disabled selected>Choose your category</option>
        <?php foreach ($arrCategory as $item): ?>
        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" name="submit" id="add" class="btn btn-success">
</form>


<?php


if (isset($_POST['submit'])){
    if (!empty($_POST['name'] && $_POST['select'])){

        $name = $_POST['name'];
        $option = $_POST['select'];

        $insert_models = $conn->prepare("INSERT INTO `models` (`title`, `category_id`, `created_date`, `update_date`) 
                                                      VALUES ('$name', '$option', now(), now())");
        $insert_models->execute();

        header("Location: addmodelinfo.php");

    }
}
?>
<script src="../js/index.js"></script>
<script src="../js/jquery-3.4.1.min.js"></script>


</body>
</html>