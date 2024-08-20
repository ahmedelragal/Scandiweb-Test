<?php

namespace MyApp\model\products;

require __DIR__ . '/../../../vendor/autoload.php';


use PDO;

abstract class Product
{
    protected $conn;
    protected $table_name = "products";

    protected $sku;
    protected $name;
    protected $price;

    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
    }
    public function getSku()
    {
        return $this->sku;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getPrice()
    {
        return $this->price;
    }

    abstract public function save();
    abstract public function displayProduct();
}
