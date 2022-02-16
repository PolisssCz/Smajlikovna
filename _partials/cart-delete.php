<?php
//connect to database
require_once '../_inc/config.php';
//errors
$id =get_id(); 
if ( ! $id) show_404();
// delete data from database
$database->delete("cart", [
    "cart_id" => $id
]);
die("$id");