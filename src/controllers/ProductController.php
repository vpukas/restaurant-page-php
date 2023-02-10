<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Product.php';
require_once __DIR__.'/../repository/ProductRepository.php';
require_once __DIR__.'/../repository/CartRepository.php';

class ProductController extends AppController
{
    private $productRepository;
    private $cartRepository;

    public function __construct()
    {
        parent::__construct();
        $this->productRepository = new ProductRepository();
        $this->cartRepository = new CartRepository();
    }
    public function menu()
    {
        if(!isset($_COOKIE["id_user"]) || $_COOKIE['id_role'] == 2) {
            header("Location: {$this->url}/login");
            return;
        }
        if(!$this->isPost()) {
            return $this->render('menu', ['products' => $this->productRepository->getProducts()]);
        }
        $idProduct = $_POST['product_id'];
        $idUser = $_COOKIE["id_user"];
        $this->cartRepository->addCartItem($idProduct, $idUser);
        header("Location: {$this->url}/cart");
        return;

    }



}