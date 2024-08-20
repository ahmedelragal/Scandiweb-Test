<?php


namespace MyApp\model\assets;

use MyApp\model\products\Book;
use MyApp\model\products\Products;
use MyApp\model\products\Dvd;
use MyApp\model\products\Furniture;
use MyApp\model\products\Product;


require __DIR__ . '/../../../vendor/autoload.php';


use PDO;
use PDOException;

class Connection
{
    private $host = "localhost";
    private $db_name = "scandiwebtest";
    private $username = "root";
    private $password = "";

    // private $host = "sql110.infinityfree.com";
    // private $db_name = "if0_37140177_scandiwebtest";
    // private $username = "if0_37140177";
    // private $password = "UA77SfBAxM3wNXG";
    public $conn;
    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            print("Connection Error: " . $exception->getMessage());
        }
    }
    public function getConnection()
    {
        return $this->conn;
    }
    public function getProducts()
    {

        $query = $this->conn->query("SELECT * FROM products");
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        $products = [];

        foreach ($rows as $row) {
            switch ($row['type']) {
                case 'DVD':
                    $product = new DVD($this->conn);
                    $product->setSku($row['sku']);
                    $product->setName($row['name']);
                    $product->setPrice($row['price']);
                    $product->setSize($row['size']);
                    break;
                case 'Book':
                    $product = new Book($this->conn);
                    $product->setSku($row['sku']);
                    $product->setName($row['name']);
                    $product->setPrice($row['price']);
                    $product->setWeight($row['weight']);
                    break;
                case 'Furniture':
                    $product = new Furniture($this->conn);
                    $product->setSku($row['sku']);
                    $product->setName($row['name']);
                    $product->setPrice($row['price']);
                    $product->setHeight($row['height']);
                    $product->setWidth($row['width']);
                    $product->setLength($row['length']);
                    break;
                default:
                    continue 2;
            }
            $products[] = $product;
        }
        return $products;
    }

    public function displayProducts($products)
    {

        foreach ($products as $product) {
            $product->displayProduct();
        }
    }
}
