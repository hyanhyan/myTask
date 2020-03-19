<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ='user';

try {
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$table = 'CREATE TABLE IF NOT EXISTS `users`(
id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR (255) NOT NULL,
password VARCHAR(255) NOT NULL,
cookie_key VARCHAR(255) NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)';
$conn->exec($table);
$categories = "CREATE TABLE IF NOT EXISTS `categories` (
id INT(5) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
 created_date  DATE,
update_date DATE
)";
//$conn->exec($categories);

/*$cat = $conn->prepare("INSERT INTO `categories` (`name`,`created_date`,`update_date`)
 VALUES ('Audio', now(), now())");
$cat->execute();*/

$model = "CREATE TABLE IF NOT EXISTS `models` (
    id INT(5)  AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    category_id INT(11) NOT NULL, 
    created_date  DATETIME,
    update_date TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP
    )";
//$conn->exec($model);

$product = "CREATE TABLE IF NOT EXISTS `products` (
    id INT(5)  AUTO_INCREMENT PRIMARY KEY,
    prName VARCHAR(255),
    category_id INT(11) NOT NULL, 
    model_id INT(11) NOT NULL, 
    is_New tinyint(1),
    price INT(20),
    image_path VARCHAR(100),
    description VARCHAR(255),
    created_date  DATETIME,
    update_date TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP
    )";
//$conn->exec($product);

$alt = "ALTER TABLE products
ADD FOREIGN KEY (category_id) REFERENCES categories(id)";
//$conn->exec($alt);

$a = "ALTER TABLE products
ADD FOREIGN KEY (model_id) REFERENCES models(id)";
//$conn->exec($a);

$alter = "ALTER TABLE models 
ADD FOREIGN KEY (category_id) REFERENCES categories(id)";
//$conn->exec($alter);


//$product = $conn->prepare("INSERT INTO `products` (`id`, `prName`, `category_id`, `model_id`, `is_New`, `price`, `image_path`, `description`, `created_date`, `update_date`) VALUES ('1', 'Iphone11 ProMAx', '1', '1', '1', '610000', NULL, 'Three camera,display 6.5D', NOW(), NOW()");
//$product->execute();
//$product = $conn->prepare("INSERT INTO `products` (`id`, `prName`, `category_id`, `model_id`, `is_New`, `price`, `image_path`, `description`, `created_date`, `update_date`) VALUES ('2', 'Iphone11 ProMAx', '1', '1', '1', '610000', NULL, 'Three camera,display 6.5D', now(), now()");
//$product->execute();
//$mod = $conn->prepare("INSERT INTO `models` (`title`, `category_id`, `created_date`,`update_date`)
// VALUES
//  ('Earphones', '3', now(), now(),
//  'Earphones', '4', now(), now(),
//  'Earphones', '5', now(), now(),
//  'Earphones', '6', now(), now(),
//  'Earphones', '7', now(), now(),
//  'Earphones', '8', now(), now(),
//  'Earphones', '9', now(), now(),
//  'Earphones', '10', now(), now(),
//  'Earphones', '11', now(), now(),
//  'Earphones', '12', now(), now(),
//  'Earphones', '13', now(), now(),
//  'Earphones', '14', now(), now(),
//  'Earphones', '15', now(), now(),
//  'Earphones', '16', now(), now(),
//
//
//
//    )
// ");
//$mod->execute();


/*
$name = "admin";
$password = "admin1234";
$query = $conn->prepare(" INSERT INTO `users`(`name`,`password`)
 VALUES ('$name','$password')");
$query->execute();
*/




