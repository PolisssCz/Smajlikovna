<!DOCTYPE html>
<?php 
    require_once '../_inc/config.php';
    $last_page = $_SERVER['HTTP_REFERER'];
?>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>👮‍♂️👩‍👩‍👧‍👦👮‍♂️ StrangeSmiley 👮‍♂️👩‍👩‍👧‍👦👮‍♂️</title>

    <link href="../assets/css/normalize.css" rel="stylesheet"/>
    <link href="../assets/css/oops.css" rel="stylesheet" />

    <script> 
       var base_url = '<?php echo $base_url ?>';
    </script> 

</head>
<body>
    <header class="logo"> </header> 
    <h1>Oops!</br>👩‍👩‍👧‍👦👮‍♀️</h1>
    <p>The page you are looking for can't be found.</p>
    <strong>Error code 404</strong>
    <br/><br/>
    <?php echo "<a href=\"$last_page\">Go back!!</a>"?>
</body>
</html>

