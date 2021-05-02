<?php
include('admin_nav.php');?>
<div class="content-wrapper">
    <section class="content">
        <div class="text-right">
            <button class="btn btn-primary" style="margin-top: 2%">
                <a href="insertFood.php" style="text-decoration: none;color: white"> <i class="fa fa-plus"></i>Add to Food</button></a>
        </div>

        <div class="container-fluid">
            <table class="table" style="margin-top: 2%">
                <thead style="background-color: #343A40; color: white">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category ID</th>
                    <th scope="col">Restaurant ID</th>
                    <th scope="col">Amend</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql="select * from foods";
                $result=mysqli_query($connection,$sql);
                while ($row=mysqli_fetch_assoc($result)){
                    echo'<tr>';
                    echo'<th scope="row">'.$row['name'].'</th>';
                    echo'<td>'.$row['price'].'</td>';
                    echo'<td>'.$row['category_id'].'</td>';
                    echo'<td>'.$row['restaurant_id'].'</td>';
                    echo "<td><a style='color:red;' href='amendFood.php?id=".$row['id']."'>Amend</a></td>";
                    echo "<td><a style='color:red;' href='deleteFood.php?id=".$row['id']."'>Delete</a></td>";
                    echo'</tr>';
                }
                ?>
                </tbody>
            </table>

        </div>


