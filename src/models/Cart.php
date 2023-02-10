<?php

class Cart
{
    private $idCart;
    private $idUser;
    private $idProduct;
    private $createDate;

    private $isActive = true;

    /**
     * @param int $idCart
     * @param int $idUser
     * @param int $idProduct
     * @param $createDate
     * @param bool $isActive
     */
    public function __construct(int $idCart, int $idUser, int $idProduct, $createDate, bool $isActive)
    {
        $this->idCart = $idCart;
        $this->idUser = $idUser;
        $this->idProduct = $idProduct;
        $this->createDate = $createDate;
        $this->isActive = $isActive;
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

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }




}