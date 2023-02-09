<?php

class Product
{
    private $idProduct;
    private $name;
    private $price;
    private $img;

    /**
     * @param $idProduct
     * @param $name
     * @param $price
     * @param $img
     */
    public function __construct($idProduct = null, $name, $price, $img)
    {
        $this->idProduct = $idProduct;
        $this->name = $name;
        $this->price = $price;
        $this->img = $img;
    }

    /**
     * @return mixed|null
     */
    public function getIdProduct()
    {
        return $this->idProduct;
    }

    /**
     * @param mixed|null $idProduct
     */
    public function setIdProduct($idProduct): void
    {
        $this->idProduct = $idProduct;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img): void
    {
        $this->img = $img;
    }



}