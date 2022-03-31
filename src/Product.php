<?php
/*-----*/
namespace Product;
/*-----*/
class Product extends ProductController
{
    public function getId()
    {
        return $this->id;
    } 

    public function getImg()
    {
        return $this->product_img;        
    } 

    public function getTitle()
    {
        return $this->product_title;        
    } 

    public function getInfo()
    {
        return $this->product_info;        
    } 
    public function getClass()
    {
        return $this->product_class;        
    }

    public function getPrice()
    {
        return $this->product_price;        
    } 

    public function getDecimal()
    {
        return $this->product_priceD;        
    } 


    public function getFinalPrice()
    {
        // Adjustment of cents.
        if ( $this->getDecimal() === null){
            $product_priceD = '00';
        }else{
            $product_priceD = ''. $this->getDecimal() .'';
        };

        // Total amount per product.
        $item_price = ''. $this->getPrice() .'.'. $product_priceD .'' ;
        
        // Mumber format.
        $price_format = number_format( $item_price, 2,"," ," " );

        return "$price_format Kč";
    }
}