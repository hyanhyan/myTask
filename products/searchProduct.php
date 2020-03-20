<?php
include "../backend/connect.php";
$search=$_POST['txt'];
$category = $conn->prepare("SELECT * FROM `categories`");
$category->execute();
$arrCatgory = $category->fetchAll(PDO::FETCH_ASSOC);

$product = $conn->prepare("SELECT * FROM `models`");
$product->execute();
$arrProduct = $product->fetchAll(PDO::FETCH_ASSOC);

$sql = $conn->query("SELECT * FROM `products` WHERE prName LIKE '$search%'");
$sql->execute();
$arr=$sql->fetchAll(PDO::FETCH_ASSOC);

foreach ($arr as $k => $v) {
    ?>
      <tr>
          <td><?php echo $v["id"] ?></td>
<td><?php echo $v["prName"] ?></td>
<td><?php echo $arrCatgory[0]["name"] ?></td>
<td><?php echo $arrProduct[0]["title"] ?></td>
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
