<!DOCTYPE html>
<?php require_once '_inc/config.php' ?>
<html lang="en">
<head>
    <?php $page_name = basename($_SERVER['SCRIPT_NAME'], '.php');
    if ($page_name == 'index') $page_name = 'All';?>
    
    <meta charset="utf-8" />
    <title>👩‍👩‍👧‍👦 Smajlíkovna‍ 👩‍👩‍👧‍👦 <?=ucfirst($page_name)?></title>
    <meta name="description" content="https://smajlikovna.php5.cz/assets/img/logo.png 💉 smajlíkovna, každý si tu najde smajlíka. Smajlíkovna vždy pro naše úsměvy ❕">
    <meta property="og:image" content="https://smajlikovna.php5.cz/assets/img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="assets/css/normalize.css" rel="stylesheet"/>
    <link href="assets/css/StyleSheet1.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />

    <script> 
       var base_url = '<?php echo $base_url ?>';
    </script>
</head>
<body>
    <div id="backgroundTop"></div>
    <header>
            <?php echo"<a class=\"cart-link\" href=\"$base_url/cart.php\" >Go to Cart</a>";?> 
        <?="<a href=\"$base_url/cart.php\" class=\"cart-icon group\">";?>
            <svg> 
                <circle class="grow" cx="8.5" cy="19" r="1.5"></circle>
                <circle class="grow" cx="18.5" cy="19" r="1.5"></circle>
                <path class="grow" d="M19.6176 16.5h-11.73a1.0007 1.0007 0 01-.9873-.8398L5.0956 4.5H3a1 1 0 010-2h2.9468a1.0007 1.0007 0 01.9873.8398l.2461 1.5215H21a.999.999 0 01.9898 1.1416l-1.3823 9.6387a.9992.9992 0 01-.9898.8584zm-10.8789-2h10.0122l1.0952-7.6387H7.5034z"></path>
            </svg> 
            <?php
                echo "<span class=\"scope\">$count_cart</span>";
            ?>
        </a>

        <div class="logo"> </div> 
        
        <section class="info-bar group">
            <div class="group a-container">
                <ul class="group top personal">
                    <li><i class="fa fa-phone"></i><a href="tel:+421900111222"><strong>+</strong>421&nbsp;900&nbsp;111&nbsp;222</a></li>
                    <li><i class="fa fa-envelope"></i><a href="mailto:smajlik@smajl.com">smajlik<strong>@</strong>smajl.com</a></li>
                </ul>
                <ul class="group top info"> 
                    <?php 
                        echo "<li class=\"first-info\"><a href=\"$base_url/_partials/404.php\">About us</a></li>";
                        echo "<li><a href=\"$base_url/_partials/404.php\">Dispensing points</a></li>";
                        echo "<li><a href=\"$base_url/_partials/404.php\">Feedback</a></li>"
                    ?>
                </ul>
            </div>
        </section> 
    </header>
    <main class="a-container group">
        <nav>
            <h2 class="menu">
                Category
            </h2>
            <ul class="menu group">
                <!-- automatic addition of category and links to navigation. Just add the file to the main folder. For example: new category "convenient.php" -->
                <?php
                // find out the name of the files
                $file = glob('*.php');
                //create a list of all files
                foreach( $file as $key => $pages ){
                    //delete unwanted files
                    if ($pages == 'cart.php') continue;
                    //rename
                    $page = basename($pages, '.php');
                    
                    /* if ($page == 'index') $page = 'All'; */

                    //keep the file name and save the changes
                    $rename[] = "$page/$pages";  
                    //after all changes, "-number" delete unwanted files = (count($file)"-number")
                    if ( count($rename) == (count($file)-1) ) {
                        //sort names in navigation alphabetically
                        sort($rename);
                        foreach ($rename as $key => $value) {
                            $name_and_pages = explode('/', $value);
                            //dump to list
                            if ( $page_name == $name_and_pages[0] ){
                                echo '<li id="nav-'.$key.'"><a class="select" href="'.$base_url.'/'.$name_and_pages[1].'">'.ucfirst($name_and_pages[0]).'</a></li>';
                            }else {
                                echo '<li id="nav-'.$key.'"><a href="'.$base_url.'/'.$name_and_pages[1].'">'.ucfirst($name_and_pages[0]).'</a></li>';
                            }
                        }
                    }
                }
                ?>
            </ul>
        </nav>