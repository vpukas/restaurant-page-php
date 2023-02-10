<?php

class CartItemDTO
{
    private $idProduct;
    private $productName;
    private $productImg;
    private $productPrice;
    private $idCart;
    private $idUser;

    /**
     * @param int $idProduct
     * @param string $productName
     * @param float $productPrice
     * @param string $productImg
     * @param int $idCart
     * @param int $idUser
     */
    public function __construct(int $idProduct, string $productName,
                                float $productPrice, string $productImg,
                                int $idCart, int $idUser)
    {
        $this->idProduct = $idProduct;
        $this->productName = $productName;
        $this->productPrice = $productPrice;
        $this->productImg = $productImg;
        $this->idCart = $idCart;
        $this->idUser = $idUser;
    }

    /**
     * @return int
     */
    public function getIdProduct(): int
    {
        return $this->idProduct;
    }

    /**
     * @param int $idProduct
     */
    public function setIdProduct(int $idProduct): void
    {
        $this->idProduct = $idProduct;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     */
    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }

    /**
     * @return string
     */
    public function getProductImg(): string
    {
        return $this->productImg;
    }

    /**
     * @param string $productImg
     */
    public function setProductImg(string $productImg): void
    {
        $this->productImg = $productImg;
    }

    /**
     * @return int
     */
    public function getIdCart(): int
    {
        return $this->idCart;
    }

    /**
     * @param int $idCart
     */
    public function setIdCart(int $idCart): void
    {
        $this->idCart = $idCart;
    }

    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     */
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return float
     */
    public function getProductPrice(): float
    {
        return $this->productPrice;
    }

    /**
     * @param float $productPrice
     */
    public function setProductPrice(float $productPrice): void
    {
        $this->productPrice = $productPrice;
    }



}