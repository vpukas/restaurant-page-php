<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Cart.php';
require_once __DIR__.'/../dtos/CartItemDTO.php';
class CartRepository extends Repository
{
    public function getCartItemsForCurrentUser(int $idUSer): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT p.id_product, p.name, p.price, p.img, c.id_cart, c.id_user FROM cart_items c
            JOIN products p on p.id_product=c.id_product where c.id_user = :id_user and c.is_active=true;
        ');
        $stmt->bindParam("id_user", $idUSer, PDO::PARAM_INT);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($items as $item) {
            $result[] = new CartItemDTO($item['id_product'], $item['name'], $item['price'], $item['img'], $item['id_cart'], $item['id_user']);
        }
        return $result;
    }

    public function getTotalCartCostByUserId(int $idUser) :float {
        $stmt = $this->database->connect()->prepare('
        SELECT ac.sum FROM active_carts ac where ac.id_user = :id_user');
        $stmt->bindParam("id_user", $idUser, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_COLUMN);
    }
}