<?php
include('admin_nav.php');?>
<div class="content-wrapper">
    <section class="content">
        <div class="text-right">
            <button class="btn btn-primary" style="margin-top: 2%">
                <a href="insertRestaurant.php" style="text-decoration: none; color: white"> <i class="fa fa-plus"></i>Add to Restaurant</button></a>
        </div>

        <div class="container-fluid">
            <table class="table" style="margin-top: 2%">
                <thead style="background-color: #343A40; color: white">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Thumbnail Image</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Amend</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql="select * from restaurant";
                $result=mysqli_query($connection,$sql);
                while ($row=mysqli_fetch_assoc($result)){
                    echo'<tr>';
                    echo'<th scope="row">'.$row['name'].'</th>';
                    echo'<td>'.$row['location'].'</td>';
                    echo '<td>'.'<img src="Images/'.$row['image'].'" style="width:100px; height:100px; ">'.'</td>';
                    echo '<td>'.'<img src="Images/'.$row['cover'].'" style="width:100px; height:100px; ">'.'</td>';
                    echo '<td>'.'<img src="Images/'.$row['Logo'].'" style="width:100px; height:100px; ">'.'</td>';
                    echo "<td><a style='color:red;' href='amendRestaurant.php?id=".$row['id']."'>Amend</a></td>";
                    echo "<td><a style='color:red;' href='deleteRerstaurant.php?id=".$row['id']."'>Delete</a></td>";
                    echo'</tr>';
                }
                ?>
                </tbody>
            </table>

        </div>


