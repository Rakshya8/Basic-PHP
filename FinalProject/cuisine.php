<?php
$sql="select * from cuisine";

$result=mysqli_query($connection,$sql);
while($row=mysqli_fetch_assoc($result)){
    $name=$row['cuisine_name'];
    echo'<div class="col-md-3">';

    echo"<input type='checkbox' name='check[]'  value='$name' id='checks'>";
    echo"<label style='margin-left: 2%'>$name</label>";
    echo'</div>';
}
