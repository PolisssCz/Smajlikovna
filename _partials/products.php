 
 <!-- collecting data from a database, and storing it in a variable -->
  <?php $products = $database->select('products', ['id','product_img','product_title','product_info','product_price', 'product_priceD','product_class']);
        $cart = $database->select('cart', ['user_ip','item_id']);
        $id = array_column($cart, 'item_id');
        $id_product = array_column($products, 'id');
        $stack = array();
        for ($i = 0; $i < count($cart); $i++) { 
            // if the IP does not equal the IP, do not display item
            if ($cart[$i]['user_ip'] != $user_ip){
                continue;
            }else{
                array_push($stack, ''.$cart[$i]['item_id'].'');
            }
        }
    ?>
        <ul class="products">
            <?php
                // extracting data from the database
                for ($i = 0; $i < count($products); $i++)
                {
                    // product price adjustment
                    // adjustment of cents
                    if ($products[$i]['product_priceD'] === null){
                        $product_priceD = '00';
                    }else{
                        $product_priceD = ''.$products[$i]['product_priceD'].'';
                    };
                    // total amount per product
                    $item_price = ''. $products[$i]['product_price'] .'.'. $product_priceD .'' ;
                    // extract of products from the database => to main page <=
                    echo '<li data-quantity="1" class="box animate__animated animate__backInUp '. $products[$i]['product_class'] .'">';
                    // If the product is in the cart, leave the title highlighted
                    if (in_array(''. $products[$i]['id'] .'', $stack))
                    {
                        echo'<h2 class="product-title added">'. $products[$i]['product_title'] .'</h2>';
                    }
                    echo'<h2 class="product-title">'. $products[$i]['product_title'] .'</h2>';
                    echo'<img class="product-img" src="'. $products[$i]['product_img'] .'" alt="Smile">';
                        echo'<div class="content">';
                            echo'<h3>Emoji Meaning</h3>';
                            echo'<p class="product-info">';
                                echo''. $products[$i]['product_info'] .'';
                            echo'</p>';
                        echo'</div>';
                        echo'<p class="packed animate__animated animate__flipInY">Add to Cart</p>';
                        echo'<form class="button btn-packed" id="add-cart-'. $products[$i]['id'] .'" action="'.$base_url.'/_partials/cart-new.php" method="POST">';
                            echo'<button type="button" class="reduce">';
                                echo'<svg width="24" height="24" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd"><path d="M0 12v1h23v-1h-23z"></path></svg>';
                            echo'</button>';
                            echo'<input class="add-button" type="submit" value="Add"><input type="text" class="Qvalue" name="data-quantity" value="1">';
                            echo'<input class="data" type="hidden" name="id" value="'. $products[$i]['id'] .'">';
                            echo'<input class="user_ip" type="hidden" name="user_ip" value="'.$user_ip.'">';
                            echo'<button type="button" class="increment">';
                              echo'<svg width="24" height="24" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd"><path d="M11 11v-11h1v11h11v1h-11v11h-1v-11h-11v-1h11z"></path></svg>';
                            echo'</button>';
                        echo'</form>';
                        echo'<h3 class="product-price"> '. number_format( $item_price, 2,"," ," " ) .' Kč</h3>';
                    echo'</li>';
                }
            ?>
        </ul>