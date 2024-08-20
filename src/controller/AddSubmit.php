<?php

use MyApp\model\assets\Connection;
use MyApp\model\products\Book;
use MyApp\model\products\Products;
use MyApp\model\products\Dvd;
use MyApp\model\products\Furniture;

require __DIR__ . '/../../vendor/autoload.php';

$db = new Connection();
$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$type = $_POST['type'];
$height = $_POST['height'];
$width = $_POST['width'];
$length = $_POST['length'];
$weight = $_POST['weight'];
$size = $_POST['size'];
if ($type == "Book") {
    $product = new Book($db->getConnection());
    $product->setSku($sku);
    $product->setName($name);
    $product->setPrice($price);
    $product->setWeight($weight);
    echo $product->save();
} else if ($type == "Furniture") {
    $product = new Furniture($db->getConnection());
    $product->setSku($sku);
    $product->setName($name);
    $product->setPrice($price);
    $product->setHeight($height);
    $product->setWidth($width);
    $product->setLength($length);
    echo $product->save();
} else if ($type == "DVD") {
    $product = new Dvd($db->getConnection());
    $product->setSku($sku);
    $product->setName($name);
    $product->setPrice($price);
    $product->setSize($size);
    echo $product->save();
} else {
    echo "sqlfailure";
}
