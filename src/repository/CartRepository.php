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

    public function addCartItem($idProduct, $idUser) {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO public.cart_items(id_user, id_product, create_date, is_active)
        VALUES (?,?,?,?)');
        $stmt->execute([
            $idUser,
            $idProduct,
            date('Y-m-d H:i:s'),
            true,
        ]);
    }

    public function deleteCartItem($idCart) {
        $stmt = $this->database->connect()->prepare('
        DELETE FROM cart_items where id_cart = :id_cart');
        $stmt->bindParam('id_cart', $idCart, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function addOrder($idUser, $totalCost, $address, $notes) {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO public.orders(address, total_cost, notes, id_user, order_time)
        VALUES (?,?,?,?,?)');
        $stmt->execute([$address, $totalCost, $notes, $idUser, date('Y-m-d H:i:s')]);
        $this->setCartItemsInactive($idUser);
    }

    public function setCartItemsInactive($idUser) {
        $stmt=$this->database->connect()->prepare('
        UPDATE cart_items SET is_active = false WHERE id_user = :id_user');
        $stmt->bindParam('id_user', $idUser, PDO::PARAM_INT);
        $stmt->execute();
    }
}