<?php


if(isset($_SESSION['shopping_cart'])){
    echo "<form action='cart_orders.php' method='post'>";
    foreach($_SESSION['shopping_cart'] as $k=>$v) {
        $total=0;
        $_SESSION['count']=count($_SESSION['shopping_cart']);

    }
    $res = array_unique(array_column($_SESSION['shopping_cart'],'res_name'));
    foreach($_SESSION['shopping_cart'] as $k=>$v) {
        echo"<tr style='font-size: larger' class='rs'>";
        foreach ($v as $v1 => $v2) {



//                    if($v1=="res_name"){
//                        if($res==$v2){
//                            echo '<thead><tr><th colspan="2"><div class="cart__restaurant-name">';
//                            echo '<div class="rest_name"><span>'.$v2;
//                            echo"<div style='color:green'>".$total."</div>";
//                            echo '</span>';
//                            $res="new";
//                        }
//                    }
            if($v1=="item_id"){
                $id=$v2;
            }
            if($v1=="item_name"){
                echo "<td class='w-30'style='border-bottom: 1px solid #E7E7E7;'>";

                echo'</div></div>'.$v2."</td>";
            }
            if($v1=="item_quantity"){
                $quantity=0;
                $quantity=$v2;
                echo "<td class='w-10'style='border-bottom: 1px solid #E7E7E7;'>";
                echo'<div class="num__add-remove display-none" style>';
                echo'<div class="pointer" style="position: relative">';
                echo'<div style="display: flex; -ms-flex-pack: distribute;
                        justify-content: space-around;">';
                echo"<a> <span> <i class='bi bi-dash' id='is' style='display: none'></i></span></a></div></div>";

                echo $v2."x</td>";

            }
            if($v1=="item_price"){
                $price=0;
                $price=$quantity*$v2;
                echo "<td class='w-10'style='border-bottom: 1px solid #E7E7E7;'>";
                echo$v2."<i class='bi bi-x' style='color: red'onclick='removeItem(\"$id\")'></i>"."</td>";
                $total=$total+$price;
            }


        }

        echo"</tr>";
    }

    echo'<tr style="border-style: none"><td style="border-style: none; opacity: 0.5">TOTAL</td>
                  <td style="color:green;
                  margin-bottom: 20%;border-style: none; margin-left: 10%">'.$total."</td></tr></table>";
    echo"<input type='hidden' value='$total' name='total'>";
    if($total>1000){
        echo'<div class="col-md-12 text-center" style="margin-bottom: 10%">';
        echo"<input class='btn btn-success' 
                type='submit' name='checkout' value='PROCEED TO CHECKOUT' style='margin-top: 30%'>";
        echo'</div>';
}

}

else{
    echo "<div class='text-center'><img src='Images/cart-empty.png' width='80%'></div><br>";
    echo "<div class='text-center' style='margin-bottom: 10%'>Empty cart</div>";
    $_SESSION['count']=0;
}
echo'</form>';
