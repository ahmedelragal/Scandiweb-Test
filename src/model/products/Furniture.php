<?php

namespace MyApp\model\products;

require __DIR__ . '/../../../vendor/autoload.php';

use MyApp\model\products\Product;
use PDO;
use PDOException;

class Furniture extends Product
{
    private $height;
    private $width;
    private $length;

    public function setHeight($height)
    {
        $this->height = $height;
    }
    public function getHeight()
    {
        return $this->height;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }
    public function getWidth()
    {
        return $this->width;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }
    public function getLength()
    {
        return $this->length;
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

            $query = "INSERT INTO " . $this->table_name . " (sku, name, price, type, height, width, length) VALUES (:sku, :name, :price, :type, :height, :width, :length)";
            $stmt = $this->conn->prepare($query);

            $type = 'Furniture';
            $stmt->bindParam(':sku', $this->sku);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':price', $this->price);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':height', $this->height);
            $stmt->bindParam(':width', $this->width);
            $stmt->bindParam(':length', $this->length);

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
                <span class = 'p-dimensions'>Dimension: {$this->getHeight()}x{$this->getWidth()}x{$this->getLength()}</span> 
            </div>
PRODUCT;
    }
}
