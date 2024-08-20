<?php

use MyApp\model\assets\Connection;

require __DIR__ . '/../../vendor/autoload.php';



$db = new Connection();
echo "1";
if (isset($_POST['deleteCheckbox'])) {
    echo "2";
    $products = $_POST['deleteCheckbox'];
    $sql = $db->getConnection()->prepare('DELETE FROM products WHERE sku = ?');
    foreach ($products as $sku) {
        echo "3";
        $sql->bindParam(1, $sku);
        $sql->execute();
    }
    header("Location: ../../");
}
