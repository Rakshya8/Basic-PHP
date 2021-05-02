<?php
include('admin_nav.php');?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql="select * from orders";
                $result=mysqli_query($connection,$sql);
                while ($row=mysqli_fetch_assoc($result)){
                    echo'<tr>';
                    echo'<th scope="row">'.$row['id'].'</th>';
                    echo'<td>'.$row['date'].'</td>';
                    echo'<td>'.$row['user_name'].'</td>';
                    echo'<td>'.$row['total'].'</td>';
                    echo'</tr>';
                }
                ?>
                </tbody>
            </table>

        </div>


