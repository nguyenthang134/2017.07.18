<?php
/**
 * Created by PhpStorm.
 * User: thang
 * Date: 7/18/17
 * Time: 4:52 PM
 */
require 'database.php';

$category_id = $_GET['category_id'];
if(!isset($category_id)){
    $category_id = 1;
}

$query = "SELECT * FROM categories WHERE categoryID =  $category_id";
$category = $db -> query($query);
$category = $category -> fetch();
$category_name = $category['categoryName'];

$query = "SELECT * FROM categories ORDER BY categoryID";
$categories = $db -> query($query);

$query = "SELECT * FROM products WHERE categoryID = $category_id ORDER BY productID";
$products = $db -> query($query);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Guitar Shop</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div id="page">
        <div id="main">
            <h1>Product List</h1>
        </div>
        <div id="sidebar">
            <h2>Categories</h2>
            <ul class="nav">
                <?php foreach ($categories as $category): ?>
                <li>
                    <a href="?category_id= <?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
        <div id="content">
            <h2><?php echo $category_name; ?></h2>
            <table>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th class="right">Price</th>
                </tr>
                <?php foreach ($products as $product):?>
                <tr>
                    <td><?php echo $product['productCode']; ?></td>
                    <td><?php echo $product['productName']; ?></td>
                    <td class="right"><?php echo $product['listPrice']; ?></td>
                </tr>
                <?php endforeach;?>
            </table>
        </div>
        <div id="footer"></div>
    </div>
</body>
</html>
