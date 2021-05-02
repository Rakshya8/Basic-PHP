<?php
Include'connection.php';
if(!empty($_SESSION["shopping_cart"])) {
    $id= $_GET['id'];
    foreach($_SESSION["shopping_cart"] as $key => $value) {
        if ($key == $id) {
            unset($_SESSION["shopping_cart"][$key]);
            Include('display_cart.php');

        }
    }
}

        if(empty($_SESSION["shopping_cart"])){
            unset($_SESSION["shopping_cart"]);
            unset($_SESSION['cart']);
        }


