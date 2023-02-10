<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Product.php';
require_once __DIR__.'/../repository/ProductRepository.php';

class ProductController extends AppController
{
    private $productRepository;

    public function __construct()
    {
        parent::__construct();
        $this->productRepository = new ProductRepository();
    }
    public function menu()
    {
        if(!$this->isPost()) {
            return $this->render('menu', ['products' => $this->productRepository->getProducts()]);
        }
        if(!isset($_COOKIE["id_user"]) || $_COOKIE['id_role'] == 2) {
            header("Location: {$this->url}/login");
            return;
        }
    }



}