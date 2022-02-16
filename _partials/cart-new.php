<?php
//connect to database
require_once '../_inc/config.php';

$cart = $database->select('cart', ['user_ip','item_id']);
$stack = array();
// create an array of product ids that the current IP address has in the cart
for ($i = 0; $i < count($cart); $i++) { 
    if ($cart[$i]['user_ip'] != $user_ip){
        continue;
    }else{
        array_push($stack, ''.$cart[$i]['item_id'].'');
    } 
}

//errors
$id =post_id();
$quantity = post_qty();
if( $quantity == false ){
    show_404();
}

/* 
*** check if the request came from our website
*** when the product is not in the cart = add product to cart. 
*** When the product is in the cart = list exists. 
*/
if ( can_add() && ! in_array($id, $stack))
{
    // select data from database
    $product = $database->get("products", [
        "product_img",
        "product_title",
        "product_price",
        "product_priceD",
        "id"
    ], [
        "id" => $id
    ]);
    //add the selected product to the cart
    $database->insert("cart", [
        "product_img" => "$product[product_img]",
        "product_title" => "$product[product_title]",
        "product_price" => "$product[product_price]",
        "product_priceD" => "$product[product_priceD]",
        "item_id" => "$product[id]",
        "product_quantity" => $quantity,
        "user_ip" => $_POST['user_ip']
    ]);
    $new_id = $database->id();
    if ($new_id){
        die ("success");
    }
}else{
    die ("exists");
}