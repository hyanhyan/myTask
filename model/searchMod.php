<?php
include "../backend/connect.php";
$searchName=$_POST['text'];

$category = $conn->prepare("SELECT * FROM `categories`");
$category->execute();
$arrCatgory = $category->fetchAll(PDO::FETCH_ASSOC);


    $sql = $conn->query("SELECT * FROM `models` WHERE title LIKE '$searchName%'");
$sql->execute();
$arr=$sql->fetchAll(PDO::FETCH_ASSOC);

foreach ($arr as $k => $v) {

    ?>
    <tr>
        <td><?php echo $v["id"] ?></td>
        <td><?php echo $v["title"] ?></td>
        <td><?php echo $arrCatgory[0]["name"] ?></td>
        <td><?php echo $v["created_date"] ?></td>
        <td><?php echo $v["update_date"] ?></td>


        <td>
            <a href="editModel.php?id=<?= $v['id'] ?>&category_id=<?= $v['category_id'] ?>" class="edit" title="Edit"
               data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
            <a style="color:#E34724" class="del" title="Delete" data-toggle="tooltip"><i
                        class="material-icons">&#xE872;</i></a>
        </td>
    </tr>
<?php
}?>




