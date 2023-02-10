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
        if(!$this->isPost()) {
            return $this->render('menu', ['products' => $this->productRepository->getProducts()]);
        }
        $idProduct = $_POST['product_id'];
        $idUser = $_COOKIE["id_user"];
        $this->checkIfLoggedIn();
        $this->cartRepository->addCartItem($idProduct, $idUser);
        header("Location: {$this->url}/cart");
        return;

    }



}