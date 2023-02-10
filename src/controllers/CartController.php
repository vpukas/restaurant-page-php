<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Cart.php';
require_once __DIR__.'/../dtos/CartItemDTO.php';
require_once __DIR__.'/../repository/CartRepository.php';

class CartController extends AppController
{
    private $cartRepository;

    public function __construct()
    {
        parent::__construct();
        $this->cartRepository = new CartRepository();
    }
    public function cart()
    {
        $this->checkIfLoggedIn();
        if(!$this->isPost()) {
            $idUser = $_COOKIE['id_user'];
            $this->render('cart', ['items' => $this->cartRepository->getCartItemsForCurrentUser($idUser),
                'totalPrice' => $this->cartRepository->getTotalCartCostByUserId($idUser)]);
        }

        $idCart = $_POST['id_cart'];
        $this->cartRepository->deleteCartItem($idCart);
        @header("Location: {$this->url}/cart");
    }

    public function order() {
        $this->checkIfLoggedIn();
        $idUser = $_COOKIE['id_user'];
        if(!$this->isPost()) {
            $this->render('cart', ['items' => $this->cartRepository->getCartItemsForCurrentUser($idUser),
                'totalPrice' => $this->cartRepository->getTotalCartCostByUserId($idUser)]);
        }
        $address = $_POST['address'];
        $notes = $_POST['notes'];
        $cost = $_POST['total_cost'];
        $this->cartRepository->addOrder($idUser, $cost, $address, $notes);
        header("Location: {$this->url}/cart");
        return;
    }


}