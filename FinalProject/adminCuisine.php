<?php
include('admin_nav.php');?>
<div class="content-wrapper">
    <section class="content">
        <div class="text-right">
            <button class="btn btn-primary" style="margin-top: 2%">
                <a href="insertCuisine.php" style="color: white; text-decoration: none"> <i class="fa fa-plus"></i>Add to Cuisine</a></button>
        </div>

        <div class="container-fluid">
            <table class="table" style="margin-top: 2%">
                <thead style="background-color: #343A40; color: white">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Amend</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql="select * from cuisine";
                $result=mysqli_query($connection,$sql);
                while ($row=mysqli_fetch_assoc($result)){
                    echo'<tr>';
                    echo'<th scope="row">'.$row['cuisine_name'].'</th>';

                    echo "<td><a style='color:red;' href='amendCuisine.php?id=".$row['cuisine_id']."'>Amend</a></td>";
                    echo "<td><a style='color:red;' href='deleteCuisine.php?id=".$row['cuisine_id']."'>Delete</a></td>";
                    echo'</tr>';
                }
                ?>
                </tbody>
            </table>

        </div>


