<?php
Include('connection.php');
        if(isset($_GET['res'])&&isset($_GET['name'])&&isset($_GET['price'])&&isset($_GET['is'])) {
            $id=$_GET['is'];

            if(isset($_SESSION["shopping_cart"]))
            {
                $_SESSION['cart']="Hello";
                $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
                if(!in_array($_GET["is"], $item_array_id))
                {
                    $count = count($_SESSION["shopping_cart"]);
                    $item_array = array(
                        'item_id'               =>     $_GET["is"],

                        'res_name'          =>     $_GET['res'],
                        'item_quantity'          =>     1,
                        'item_name'               =>     $_GET['name'],
                        'item_price'          =>     $_GET['price']

                    );
                    $_SESSION["shopping_cart"][$count] = $item_array;
                }
                else
                {
                    echo '<script>alert("Item Already Added")</script>';
                }
            }
            else
            {
                $item_array = array(
                    'item_id'               =>     $_GET["is"],
                    'res_name'          =>     $_GET['res'],
                    'item_quantity'          =>     1,

                    'item_name'               =>     $_GET['name'],



                    'item_price'          =>     $_GET['price']

                );
                $_SESSION["shopping_cart"][0] = $item_array;
            }
            Include('display_cart.php');

        }
        else{

        }
