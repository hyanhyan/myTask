<?php
include "../backend/connect.php";
$name=$_POST['text'];
$sql = $conn->query("SELECT * FROM `categories` WHERE name LIKE '$name%'");
$sql->execute();
$arr=$sql->fetchAll(PDO::FETCH_ASSOC);
foreach ($arr as $v) {
    ?>
    <tr>
        <td><?php echo $v["id"] ?></td>
        <td><?php echo $v["name"] ?></td>
        <td><?php echo $v["created_date"]?></td>
        <td><?php echo $v["update_date"] ?></td>


        <td>
            <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
            <a href="edit.php?id=<?= $v['id'] ?>" class="edit" title="Edit"
               data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
            <a class="delete" title="Delete" data-toggle="tooltip"><i
                    class="material-icons">&#xE872;</i></a>
        </td>
    </tr>
    <?php
}
?>

