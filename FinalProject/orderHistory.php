<?php
Include('connection.php');
$id=$_SESSION['uid'];
$sql="select * from orders where user_id='$id'";
echo'<div class="col-md-9 order-history spinner" style="position: relative;in-height: 4rem;">';
echo'<div class="row">';
echo'<div class="col-md-6">';
echo'<div clas="row">';

echo'<h3 class="small-title" style="display: inline-block;
    font-weight: 700;
    font-size: 0.75rem;
    color: #4A4A4A;
    text-transform: uppercase;
    margin-bottom: 0.5rem;
    line-height: 1.1;">Order History</h3>';

echo '<ul class="order-history__list" style="list-style: none;
    margin: 0;
    padding: 0;
    font-size: 1rem;">';
echo'<li style="border-top: 1px solid #E7E7E7;
    padding: 1rem 0.5rem 0;
    display: inline-block;
    width: 100%;"> <P class="small" style="line-height: 1.6;font-size: 80%;
    font-weight: 300;"> CURRENT ORDERS</li></P>';
$result=mysqli_query($connection,$sql);
echo'<table>';
echo '<th style="padding: 0.8rem;
    background-color: #FBF9F9;
    border-bottom: 1px solid #E7E7E7;
    font-size: 0.75rem;
    font-weight: 400;
    text-transform: uppercase;
    margin-bottom: 0;
    color: #9F1D22;">Order Date</th>';
echo '<th style="padding: 0.8rem;
    background-color: #FBF9F9;
    border-bottom: 1px solid #E7E7E7;
    font-size: 0.75rem;
    font-weight: 400;
    text-transform: uppercase;
    margin-bottom: 0;
    color: #9F1D22;"> Total</th>';
while($row=mysqli_fetch_assoc($result)){
    if($row>0){
        echo"<tr>";
        echo'<td class="w-25 justify-content-between" style="cursor: pointer; padding: 0.8rem; border-bottom: 1px solid #E7E7E7; -webkit-transition: 0.2s all ease-in; transition: 0.2s all ease-in; margin-bottom: 1rem">'.$row['date'].'</td>';
        echo '<td class="w-25" style="margin-bottom: 5%">'.$row['total'].'</td>';
        echo'</tr>';
    }



}
echo'</ul>';
echo'</div>';
echo'</div>';
echo'</div>';
