<?php
Include 'connection.php';
$id=$_SESSION['res_id'];
$sql = ("select * from restaurant where id=$id");
$result=mysqli_query($connection,$sql);
while($row=mysqli_fetch_assoc($result)){
    $name_i=$row['name'];
    $loc_i=$row['location'];
    $image_i=$row['image'];
    $logo_i=$row['Logo'];
    $cover_i=$row['cover'];
    $about_i=$row['About'];
}
    $name=$_POST["rname"];
    $loc=$_POST["loc"];
    $image=$_POST["image"];
    $cover=$_POST["cover"];
    $logo=$_POST["logo"];
    $about=$_POST["about"];
    if(empty($name)){
        $name=$name_i;
    }
    if(empty($price)){
        $loc=$loc_i;
    }
    if(!isset($image) ||empty($image)){
        $image=$image_i;
    }
    if(!isset($cover) ||empty($cover)){
        $cover=$cover_i;
    }
    if(!isset($logo) ||empty($logo)){
        $logo=$logo_i;
    }
    if(!isset($about) ||empty($about)){
        $about=$about_i;

}

$sql=("update restaurant set name='$name', location='$loc', image='$image', cover='$cover',logo='$logo',About='$about' where id='$id'");
if (mysqli_query($connection,$sql)){
    echo"Updated";
    header("Location:Restaurant.php");
//    echo $image;
}
else{
    echo "Error".mysqli_errno($connection);
}
