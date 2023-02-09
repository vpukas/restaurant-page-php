<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Product.php';
class ProductRepository extends Repository
{
    public function getProducts(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM products;
        ');
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($products as $product) {
            $result[] = new Product($product['id_product'], $product['name'], $product['price'], $product['img']);
        }
        return $result;
    }
}