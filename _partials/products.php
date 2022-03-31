<?php 

use Product\Product;

/* 
 ** Collecting data from a database, and storing it in a variable.
*/
$products = $database->select('products', ['id','product_img','product_title','product_info','product_price', 'product_priceD','product_class']);
    $cart = $database->select('cart', ['user_ip','item_id']);
    $in_cart = array();

/*  
 *** Display the number of items in the basket.
*/
for ($i = 0; $i < count($cart); $i++) { 
    // if the IP does not equal the IP, do not display item
    if ($cart[$i]['user_ip'] != $user_ip){
        continue;
    }else{
        array_push($in_cart, ''.$cart[$i]['item_id'].'');
    }
}
?>
<!-- 
    *** Extract of products from the database => TO MAIN PAGE <= ***
-->
<ul class="products">
    <?php for ($i = 0; $i < count($products); $i++) {
        $item = new Product( $products[$i]['id'], $products[$i]['product_img'], $products[$i]['product_title'], $products[$i]['product_info'], $products[$i]['product_price'], $products[$i]['product_priceD'], $products[$i]['product_class'] );

        echo '<li data-quantity="1" class="box animate__animated animate__backInUp '. $item->getClass() .'">'; 
            // If the product is in the cart, leave the title highlighted
            if (in_array(''. $item->getId() .'', $in_cart))
            {
                echo'<h2 class="product-title added">'. $item->getTitle() .'</h2>';
            }

            echo'<h2 class="product-title">'. $item->getTitle() .'</h2>';
            echo'<img class="product-img" src="'. $item->getImg() .'" alt="Smile">';
            echo'<div class="content">';
                echo'<h3>Emoji Meaning</h3>';
                echo'<p class="product-info">';
                    echo''. $item->getInfo() .'';
                echo'</p>';
            echo'</div>';
            echo'<p class="packed animate__animated animate__flipInY">Add to Cart</p>';
            echo'<form class="button btn-packed" id="add-cart-'. $item->getId() .'" action="'. $base_url .'/_partials/cart-new.php" method="POST">';
                echo'<button type="button" class="reduce">';
                    echo'<svg width="24" height="24" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd"><path d="M0 12v1h23v-1h-23z"></path></svg>';
                echo'</button>';
                echo'<input class="add-button" type="submit" value="Add"><input type="text" class="Qvalue" name="data-quantity" value="1">';
                echo'<input class="data" type="hidden" name="id" value="'. $item->getId() .'">';
                echo'<input class="user_ip" type="hidden" name="user_ip" value="'.$user_ip.'">';
                echo'<button type="button" class="increment">';
                    echo'<svg width="24" height="24" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd"><path d="M11 11v-11h1v11h11v1h-11v11h-1v-11h-11v-1h11z"></path></svg>';
                echo'</button>';
            echo'</form>';
            echo'<h3 class="product-price"> '. $item->getFinalPrice() .'</h3>';
        echo'</li>';
        
    }?>
</ul>