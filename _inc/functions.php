<?php
function get_id(){
    if ( ! isset($_GET['id']) || empty($_GET['id']) ){
        return false;
    }
    $id = $_GET['id'];
    
    if ( ! $id ){
        return false;
    }

    return $id;
}

function post_id(){
    if ( ! isset($_POST['id']) || empty($_POST['id']) ){
        return false;
    }
    $id = $_POST['id'];

    if ( ! $id ){
        return false;
    }
    return $id;
}

function post_qty(){
    if ( ! isset($_POST['data-quantity']) || empty($_POST['data-quantity']) )
    {
        return false;
    }
    $quantity = $_POST['data-quantity'];

    if( $quantity <= 0) {
        return false;
    }
    return $quantity;
}

function show_404()
{
    header("HTTP/1.1 404 Not Found");
    include_once "404.php";
    die();
}

function redirect ( $page ){
    global $base_url;

    $page = ltrim($page, '/');

    header("location: $base_url/$page");
    die();
}

// check if the request came from our website
function can_add() {
    global $base_url;
    $trim = explode( "$base_url", $_SERVER['HTTP_REFERER']);
    if ( $_SERVER['HTTP_REFERER'] === "$base_url"."$trim[1]" ) return true;
}