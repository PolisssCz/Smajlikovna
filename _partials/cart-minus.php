<?php
//connect to database
require_once '../_inc/config.php';
//errors
$id =get_id(); 
if ( ! $id) show_404();
//update item
if ( $id > 0){
    $affected = $database->update('cart', 
    [ 'product_quantity[-]' => 1 ], 
    [ 'cart_id' => $id ]
    );
    // success
    if ( $affected ) {
        redirect('cart.php');
    };
}else{
    show_404();
};