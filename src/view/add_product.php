<?php

use MyApp\model\assets\Connection;

require __DIR__ . '/../../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/master.css">
    <title>Product List</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Product Add</h1>
            <div id="btn-container">
                <button id="save-btn">Save</button>
                <button id="cancel-btn">Cancel</button>
            </div>
        </div>
        <hr>
        <form action="../controller/FormSubmit.php" id="product_form">
            <div class="sku">
                <label for="sku">SKU</label>
                <input id="sku" name="sku" type="text" autocomplete="off" class="inputs">
            </div>

            <div class="name">
                <label for="name">Name</label>
                <input id="name" name="name" type="text" autocomplete="off" class="inputs">
            </div>
            <div class="price">
                <label for="price">Price ($)</label>
                <input id="price" name="price" type="text" class="inputs">
            </div>
            <div class="type">
                <label id="type" for="productType">Type Switcher</label>
                <select id="productType" name="productType" class="inputs">
                    <option value="DVD">DVD</option>
                    <option value="Book">Book</option>
                    <option value="Furniture">Furniture</option>
                </select>
            </div>

            <section id="DVD">
                <div class="size">
                    <label for="size">Size (MB)</label>
                    <input id="size" name="size" type="text" class="inputs">
                </div>
                <span>Please Provide size in MB.</span>
            </section>

            <section id="Book" style="display: none;">
                <div class="weight">
                    <label for="weight">Weight (KG)</label>
                    <input id="weight" name="weight" type="text" class="inputs">
                </div>
                <span>Please, provide weight in Kilograms.</span>
            </section>

            <section id="Furniture" style="display: none;">
                <div class="height">
                    <label for="height">Height (CM)</label>
                    <input id="height" name="height" type="text" class="inputs">
                </div>
                <div class="width">
                    <label for="width">Width (CM)</label>
                    <input id="width" name="width" type="text" class="inputs">
                </div>
                <div class="length">
                    <label for="length">Length (CM)</label>
                    <input id="length" name="length" type="text" class="inputs">
                </div>
                <span>Please provide dimensions in HxWxL format.</span>
            </section>
            <div class="error"></div>

        </form>

    </div>
    <div class="footer">
        <hr>
        <span>Scandiweb Test assignment</span>
    </div>

</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../controller/scripts/addProduct.js"></script>