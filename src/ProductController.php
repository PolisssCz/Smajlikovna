<?php
/*-----*/
namespace Product;
/*-----*/
abstract class ProductController
{
    protected $id;
    protected $product_img;
    protected $product_title;
    protected $product_info;
    protected $product_price;
    protected $product_priceD;
    protected $product_class;

    public function __construct($id, $product_img, $product_title, $product_info, $product_price, $product_priceD, $product_class)
    {
        $this->id               = $id;
        $this->product_img      = $product_img;
        $this->product_title    = $product_title;
        $this->product_info     = $product_info;
        $this->product_price    = $product_price;
        $this->product_priceD   = $product_priceD;
        $this->product_class    = $product_class;
    }

    abstract public function getId();
    abstract public function getImg();
    abstract public function getTitle();
    abstract public function getInfo();
    abstract public function getClass();
    abstract public function getPrice();
    abstract public function getDecimal();
    abstract public function getFinalPrice();
}