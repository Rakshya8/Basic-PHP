<?php
Include('check_sort.php');
if(isset($_GET['sort'])){
    $sort=$_GET['sort'];
    $sort = htmlspecialchars($sort);
    if($sort=="asc"){
        if(!isset($_SESSION['check']))
        {
            $sql="select * from restaurant order by name asc";
        }
        else{
            $str_arr=$_SESSION['check'];
            $sql='select * from restaurant where id in(select restaurant_id from restaurant_cuisine where cuisine_id in (select cuisine_id from cuisine
           WHERE cuisine_name IN ("' . implode('", "', $str_arr) . '"))) order by name asc';

        }
        echo'<div class="container-fluid">
      <div class="row">';
        $result= mysqli_query($connection, $sql);
        while($row=mysqli_fetch_assoc($result)) {
            echo '<div class="col-md-5 col-lg-4 h-25" style="margin-bottom: 2%">';
            echo "<a href='individual_page.php?id=".$row['id']."'>".'<img src="Images/'.$row['image'].'" style="width:100%; height:200px"></a>';
            echo"<br>";
            echo'<p class="small-title inline" style="font-weight: 300;
    color: #4A4A4A;
    font-size: 1.25rem; margin-bottom: 0;margin-top: 2%">'.$row['name']."</p>";
            echo '<br>';
            echo '<i class="bi bi-geo-alt-fill" style="font-weight: 300;
    color: #4A4A4A;
    fill: #4A4A4A;
    font-size: 0.8rem;">'.$row['location'];
            echo"</i>";
            echo"<div style='position: absolute;
    width: 2rem;
    height: 2rem;
    top: 185px;
    right: 2rem;
    background: #FFFFFF;
    border-radius: 50%;
    padding-top: 5px;
    text-align: center;'>
     <i class='bi bi-suit-heart' style='font-size: 1.2rem;
    color: #9B9B9B;
    vertical-align: middle;'></i></div>";
            echo"</div>";
        }
        echo'</div></div>';

    }
    else if($sort=="desc"){
        if(!isset($_SESSION['check']))
        {
            $sql="select * from restaurant order by name desc";
        }
        else{
            $str_arr=$_SESSION['check'];
            $sql='select * from restaurant where id in(select restaurant_id from restaurant_cuisine where cuisine_id in (select cuisine_id from cuisine
           WHERE cuisine_name IN ("' . implode('", "', $str_arr) . '"))) order by name desc';

        }
        echo'<div class="container-fluid">
      <div class="row">';
        $result= mysqli_query($connection, $sql);
        while($row=mysqli_fetch_assoc($result)) {
            echo '<div class="col-md-5 col-lg-4 h-25" style="margin-bottom: 2%">';
            echo "<a href='individual_page.php?id=".$row['id']."'>".'<img src="Images/'.$row['image'].'" style="width:100%; height:200px"></a>';
            echo"<br>";
            echo'<p class="small-title inline" style="font-weight: 300;
    color: #4A4A4A;
    font-size: 1.25rem; margin-bottom: 0;margin-top: 2%">'.$row['name']."</p>";
            echo '<br>';
            echo '<i class="bi bi-geo-alt-fill" style="font-weight: 300;
    color: #4A4A4A;
    fill: #4A4A4A;
    font-size: 0.8rem;">'.$row['location'];
            echo"</i>";
            echo"<div style='position: absolute;
    width: 2rem;
    height: 2rem;
    top: 185px;
    right: 2rem;
    background: #FFFFFF;
    border-radius: 50%;
    padding-top: 5px;
    text-align: center;'>
     <i class='bi bi-suit-heart' style='font-size: 1.2rem;
    color: #9B9B9B;
    vertical-align: middle;'></i></div>";
            echo"</div>";
        }
        echo'</div></div>';

    }
    else if($sort=="rel"){
        $sql="select * from restaurant";
        echo'<div class="container-fluid">
      <div class="row">';
        $result= mysqli_query($connection, $sql);
        while($row=mysqli_fetch_assoc($result)) {
            $id=$_SESSION['uid'];
            echo '<div class="col-md-5 col-lg-4 h-25" style="margin-bottom: 2%">';
            echo "<a href='individual_page.php?id=".$row['id']."'>".'<img src="Images/'.$row['image'].'" style="width:100%; height:200px"></a>';
            echo"<br>";
            echo'<p class="small-title inline" style="font-weight: 300;
    color: #4A4A4A;
    font-size: 1.25rem; margin-bottom: 0;margin-top: 2%">'.$row['name']."</p>";
            echo '<br>';
            echo '<i class="bi bi-geo-alt-fill" style="font-weight: 300;
    color: #4A4A4A;
    fill: #4A4A4A;
    font-size: 0.8rem;">'.$row['location'];
            echo"</i>";
            echo"<div style='position: absolute;
    width: 2rem;
    height: 2rem;
    top: 185px;
    right: 2rem;
    background: #FFFFFF;
    border-radius: 50%;
    padding-top: 5px;
    text-align: center;'>
     <i class='bi bi-suit-heart' style='font-size: 1.2rem;
    color: #9B9B9B;
    vertical-align: middle;'></i></div>";
            echo"</div>";
        }
        echo'</div></div>';

    }


}

