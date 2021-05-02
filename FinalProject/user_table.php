<?php
include('admin_nav.php');?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Username</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Profile Picture</th>
        </tr>
        </thead>
        <tbody>
<?php
$sql="select * from users";
$result=mysqli_query($connection,$sql);
while ($row=mysqli_fetch_assoc($result)){
    echo'<tr>';
    echo'<th scope="row">'.$row['fname'].'</th>';
    echo'<td>'.$row['lname'].'</td>';
    echo'<td>'.$row['email'].'</td>';
    echo'<td>'.$row['username'].'</td>';
    echo'<td>'.$row['dob'].'</td>';
    if(!empty($row['profile_pic'])){
        echo '<td>'.'<img src="Images/'.$row['profile_pic'].'" style="width:100px; height:100px; ">'.'</td>';
    }
    else{
        echo '<td>'.'<img src="Images/empty_pic.png" style="width:100px; height:100px; ">'.'</td>';

    }
    echo'</tr>';
}
?>
        </tbody>
    </table>

</div>


