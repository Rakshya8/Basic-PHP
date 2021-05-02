<?php
if(isset($_SESSION['update'])){
    echo "<div style='color:green'>".$_SESSION['update'].'</div>';
}
$username=$_SESSION['username'];
$sql="select * from users where username='$username'";

$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);

if($row>0){
    $fname=$row['fname'];
    $lname=$row['lname'];
    $email=$row['email'];
    $dob=$row['dob'];
    $file=$row['profile_pic'];
}
echo'<form class="form form--primary" action="updateUser.php" method="post">';
echo'<div class="row>';
echo'</div>';
Include('connection.php');
echo'<div class="col-md-12 mb-3"><p><label style="font-size: 0.75rem;
    color: #9B9B9B;
    text-transform: uppercase;
    font-weight: 500;
    margin-bottom: 0.25rem;">PROFILE PICTURE</label>';
echo'</p>';
echo'<div class="d-flex align-items-center">';
if(!empty($_SESSION['pro'])){
    $file=$_SESSION['pro'];
    echo'<div style="width: 8rem;
    height: 8rem;
    font-size: 2.5rem;
    background-color: #FAFAFA;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;">';
    echo '<img src="Images/'.$_SESSION['pro'].'" style="width:100px; height:100px; 
                                  border-radius:50%;"><br>';

}
else{
    echo '<img src="Images/empty_pic.png" style="width:100px; height:100px; 
                                  border-radius:50%;"><br>';
}
echo"</div>";
echo'<input type="file" name="picture">';

echo'</div>';
echo'<div class="container">';
echo'<div class="row">';
echo'<div class="col-md-6 mb-3">';
echo'<p>';
echo'<label style="font-size: 0.75rem;
    color: #9B9B9B;
    text-transform: uppercase;
    font-weight: 500;
    margin-bottom: 0.25rem;">First Name</label>';
echo"<input type='text' style='font-weight: 200;' class='form-control' name='fname' value='$fname'>";
echo'</p>';
echo'</div>';
echo'<div class="col-md-6 mb-3">';
echo'<p>';
echo'<label style="font-size: 0.75rem;
    color: #9B9B9B;
    text-transform: uppercase;
    font-weight: 500;
    margin-bottom: 0.25rem;">Last Name</label>';
echo"<input type='text' style='font-weight: 200;' class='form-control' name='lname' value='$lname'>";
echo'</p>';
echo'</div>';
echo'<div class="col-md-6 mb-3">';
echo'<p>';
echo'<label style="font-size: 0.75rem;
    color: #9B9B9B;
    text-transform: uppercase;
    font-weight: 500;
    margin-bottom: 0.25rem;">Date of Birth</label>';
echo"<input type='date' style='font-weight: 200;' class='form-control' name='dob' value='$dob'>";
echo'</p>';
echo'</div>';
echo'<div class="col-md-6 mb-3">';
echo'<p>';
echo'<label style="font-size: 0.75rem;
    color: #9B9B9B;
    text-transform: uppercase;
    font-weight: 500;
    margin-bottom: 0.25rem;">Email</label>';
echo"<input type='text' style='font-weight: 200;' class='form-control' name='email' value='$email'>";
echo'</p>';
echo'</div>';
echo'<div class="col-md-6 mb-3">';
echo'<p>';
echo'<input type="submit" class="btn btn-success" name="updateP" value="Submit" style="border-radius: 0;width: 25%">';
echo'<input type="reset" value="Cancel" class="btn btn--cancel" style="background-color: #9B9B9B; margin-left: 4%; 
      border-radius: 0;width: 25%;color: white">';
echo'</p>';
echo'</div>';
echo'</div>';
echo'</div>';
echo'</div>';
echo'</form>';
