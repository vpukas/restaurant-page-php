<?php

class Cart
{
    private $idCart;
    private $idUser;
    private $idProduct;
    private $createDate;

    /**
     * @param $idCart
     * @param $idUser
     * @param $idProduct
     * @param $createDate
     */
    public function __construct($idCart, $idUser, $idProduct, $createDate)
    {
        $this->idCart = $idCart;
        $this->idUser = $idUser;
        $this->idProduct = $idProduct;
        $this->createDate = $createDate;
    }

    /**
     * @return mixed
     */
    public function getIdCart()
    {
        return $this->idCart;
    }

    /**
     * @param mixed $idCart
     */
    public function setIdCart($idCart): void
    {
        $this->idCart = $idCart;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getIdProduct()
    {
        return $this->idProduct;
    }

    /**
     * @param mixed $idProduct
     */
    public function setIdProduct($idProduct): void
    {
        $this->idProduct = $idProduct;
    }

    /**
     * @return mixed
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param mixed $createDate
     */
    public function setCreateDate($createDate): void
    {
        $this->createDate = $createDate;
    }




}