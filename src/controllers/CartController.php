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
        $url = "http://$_SERVER[HTTP_HOST]";
        if(isset($_COOKIE["id_user"])) {
            $idUser = $_COOKIE['id_user'];
            $this->render('cart', ['items' => $this->cartRepository->getCartItemsForCurrentUser($idUser),
                                            'totalPrice' => $this->cartRepository->getTotalCartCostByUserId($idUser)]);
        }
        else {
            header("Location: {$url}/login");
        }
    }


}