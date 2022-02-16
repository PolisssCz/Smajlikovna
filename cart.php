<?php
//connect to database
require_once '_inc/config.php';
$page_name = basename($_SERVER['SCRIPT_NAME'], '.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>👩‍👩‍👧‍👦 Smajlík(o)vna 👩‍👩‍👧‍👦 <?=ucfirst($page_name)?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="assets/css/normalize.css" rel="stylesheet" />
    <link href="assets/css/cart.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<nav class="group cart">
    <header>
        <h1>Your cart</h1>
        <p>
            "I say let the world go to hell, but I should always buy smileys."
        </p>
        <p>
            ― Fyodor Dostoyevsky, Notes from Underground
        </p>
    </header>
    <main class="cart-container">
        <section class="empty" style="display:none">
            <p>No more twinkies ! </p>
        </section>
        <ul class="cart">
            <!-- collecting data from a database, and storing it in a variable -->
            <?php $data = $database->select('cart', ['cart_id','item_id','user_ip','product_img','product_title','product_price', 'product_priceD', 'product_quantity']);
            // extracting data from the database
            for ($i = 0; $i < count($data); $i++)
            {
                // if the IP does not equal the IP, do not display item
                if ($data[$i]['user_ip'] != $user_ip){
                    continue;
                }
                // product price adjustment
                // adjustment of cents
                if ($data[$i]['product_priceD'] === null){
                    $product_priceD = '00';
                }else{
                    $product_priceD = ''.$data[$i]['product_priceD'].'';
                };
                // total amount per product
                $quantity = $data[$i]['product_quantity'];
                $item_price = ''. $data[$i]['product_price'] .'.'. $product_priceD .'' ;
                $total_item_price = $item_price * $quantity;
                // extract of products from the database => to cart contents <=
                echo'<li id="id-'. $data[$i]['cart_id'] .'" class="product" data-price="'. $item_price .'" data-quantity="'. $quantity .'">';
                    echo'<div class="product-preview">';
                        echo'<div class="thumbnail">';
                            echo'<img class="image" src="'. $data[$i]['product_img'] .'">';
                        echo'</div>';
                        echo'<div class="product-paper">';
                            echo'<div class="product-name">';
                                echo''. $data[$i]['product_title'] .'';
                            echo'</div>';
                            echo'<div class="product-price">';
                                echo''. number_format($total_item_price,2 ,"," ,".") .' Kč';
                            echo'</div>';
                        echo'</div>';
                    echo'</div>';
                    echo'<div class="product-quantity">';
                        echo'<span>x'. $quantity .'</span>';
                    echo'</div>';
                    echo'<div class="product-interactions">';   
                        echo'<a class="button plus" href="_partials/cart-plus.php/?id='. $data[$i]['cart_id'] .'&quantity='. ($quantity + 1) .'">+</a>';
                        echo'<a class="button minus" href="_partials/cart-minus.php/?id='. $data[$i]['cart_id'] .'&quantity='. ($quantity - 1) .'">-</a>';
                        echo'<a class="button del" href="_partials/cart-delete.php/?id='. $data[$i]['cart_id'] .'"></a>';
                    echo'</div>';
                echo'</li>';
            } ?>
        </ul>
    </main>

    <table class="bill">
        <tr class="subtotal">
            <td class="label">
            Subtotal :
            </td>
            <td class="value">
            Kč
            </td>
        </tr>
        <tr class="salestax">
            <td class="label">
            Sales tax : 
            </td>
            <td class="value">
            21% %
            </td>
        </tr>
        <tr>
            <td class="label">
            Shipping :
            </td>
            <td class="value">
            1.500 Kč
            </td>
        </tr>
        <tr class="total">
            <td class="label">
            Total :
            </td>
            <td class="value">
            Kč
            </td>
        </tr>
    </table>
    <section class="actions">
        <?php 
            echo "<a href=\"$base_url/_partials/404.php\" class=\"big-button go\">
                Get them !
            </a>";
        ?>
    </section> 
    <section class="actions">
        <?php 
            echo "<a href=\"$base_url/all.php\" class=\"big-button return\">
                Return to shop
            </a>";
        ?>
    </section>
</nav>
<footer class="logof"> </footer> 

<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/cart.js"></script>
