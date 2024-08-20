<?php

namespace MyApp\model\products;

require __DIR__ . '/../../../vendor/autoload.php';

use MyApp\model\products\Product;
use PDO;
use PDOException;

class Book extends Product
{
    private $weight;

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
    public function getWeight()
    {
        return $this->weight;
    }

    public function save()
    {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE sku = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->sku);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            // SKU Already Exists    
            return "sku";
        } else {
            $query = "INSERT INTO " . $this->table_name . " (sku, name, price, type, weight) VALUES (:sku, :name, :price, :type, :weight)";
            $stmt = $this->conn->prepare($query);

            $type = 'Book';
            $stmt->bindParam(':sku', $this->sku);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':price', $this->price);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':weight', $this->weight);

            if ($stmt->execute()) {
                return "success";
            } else {
                return "sqlfailure";
            }
        }
    }
    public function displayProduct()
    {
        $price = number_format((float)$this->getPrice(), 2, '.', '');
        echo <<< PRODUCT
            <div class='product'>
                <input class='delete-checkbox' type='checkbox' name='deleteCheckbox[]' value={$this->getSku()}>
                <span class='p-sku'>{$this->getSku()}</span>
                <span class = 'p-name'>{$this->getName()}</span>
                <span class = 'p-price'>{$price} $</span>
                <span class = 'p-weight'>Weight: {$this->getWeight()} KG</span> 
            </div>
PRODUCT;
    }
}
