<?php

use MyApp\model\assets\Connection;

require __DIR__ . '/../../vendor/autoload.php';
?>
<div class="container">
    <div class="header">
        <h1>Product List</h1>
        <div id="btn-container">
            <button id="add-product-btn">ADD</button>
            <button id="delete-product-btn">MASS DELETE</button>
        </div>
    </div>
    <hr>
    <div class="product-list">
        <form id="delete-form" method="POST" action="src/controller/DeleteSubmit.php">
            <?php
            $db = new Connection();
            $products = $db->getProducts();
            $db->displayProducts($products);
            ?>
        </form>
    </div>
</div>
<div class="footer">
    <hr>
    <span>Scandiweb Test assignment</span>
</div>