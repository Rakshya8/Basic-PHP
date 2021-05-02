<?php
Include('connection.php');
$id=$_SESSION['food_id'];
$input=$_GET['id'];
$sql="select * from restaurant";
$rows=mysqli_query($connection,$sql);
while ($ress=mysqli_fetch_assoc($rows)){
    $res_name=$ress['name'];
}
$sql="select * from category where id in (select category_id from foods where restaurant_id='$id')";
$result=mysqli_query($connection,$sql);
while ($row=mysqli_fetch_assoc($result)){
    $cat=$row['id'];
    echo'<p id='.$row['name'].' style="padding: 0.8rem;background-color: #FBF9F9;border-bottom: 1px solid #E7E7E7;
                                              display: block;font-size: 0.75rem;font-weight: 400;text-transform: uppercase;
                                              margin-bottom: 0;color: #9F1D22">'.$row['name'].'</p>';
    $query="select * from foods where restaurant_id='$id' 
                                                and category_id='$cat' and name like '%$input%' or '%$input' or'$input%'";
    $array=mysqli_query($connection,$query);
    while($res=mysqli_fetch_assoc($array)){
        $price=$res['price'];
        $name=$res['name'];
        $is= $res['id'];
        echo'<ul class="nav flex-column menu__items">';
        echo'<li class="d-flex justify-content-between" style="cursor: pointer;
                                                    padding: 0.8rem;
                                                    border-bottom: 1px solid #E7E7E7;
                                                    -webkit-transition: 0.2s all ease-in;
                                                    transition: 0.2s all ease-in; margin-bottom: 1rem"><p name="price">'.$res['name']."</p>";
        echo '<div style="min-width: 6rem;text-align: right;">';
        echo'<span id="price" value="'.$res['price'].'">'.$res['price'].'</span>';
        echo"<span><i class='bi bi-plus-circle'  onclick='cart(\"$price\",\"$name\",\"$res_name\",\"$is\")'
                                                 style='margin-left: 2%; color: #00A145;font-size: 110%; font-weight: 100 '></i></span>";
        echo '</li>';
        echo'</ul>';
    }

}
?>