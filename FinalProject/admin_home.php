<head>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<body>
<?php
Include('admin_nav.php');
$sql='select count(*) as count from users';
$result=mysqli_query($connection,$sql);
while($row=mysqli_fetch_assoc($result)){
    $countu=$row['count'];
}
$sql='select count(*) as count from restaurant';
$result=mysqli_query($connection,$sql);
while($row=mysqli_fetch_assoc($result)){
    $countr=$row['count'];
}
$sql='select count(*) as count from orders';
$result=mysqli_query($connection,$sql);
while($row=mysqli_fetch_assoc($result)){
    $counto=$row['count'];
}
$sql='select count(*) as count from foods';
$result=mysqli_query($connection,$sql);
while($row=mysqli_fetch_assoc($result)){
    $countf=$row['count'];
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="admin_home.php">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php
                                echo $counto?></h3>

                            <p>Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php
                                echo $countr?>
                            </h3>

                            <p>Restaurants</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php
                                echo $countu?></h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php
                                echo $countf?></h3>

                            <p>Food</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->

                <section class="col-md-6 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card" id="chart">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Cuisine
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Cuisine</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                     style="position: relative; height: 350px;">
                                    <canvas id="revenue-chart-canvas" height="300" style="height: 600px;"></canvas>
                                </div>
                                <?php


                                $sqlQuery = "SELECT c.cuisine_name as cuisine, count(cr.cuisine_id) as counti FROM cuisine c inner join restaurant_cuisine cr on cr.cuisine_id = c.cuisine_id
                                             GROUP by c.cuisine_name";

                                $result = mysqli_query($connection,$sqlQuery);

                                $data = array();
                                $label=array();
                                while($row=mysqli_fetch_assoc($result)){
                                    $label[]= $row['cuisine'];
                                    $data[]=$row['counti'];

                                }
                                $label=json_encode($label);
                                $data=json_encode($data);

                                $sql = "SELECT c.name as restaurant, count(cr.restaurant_id) as countr FROM 
                                            restaurant c inner join foods cr on cr.restaurant_id = c.id GROUP by c.name";

                                $r = mysqli_query($connection,$sql);

                                $d= array();
                                $l=array();
                                while($rows=mysqli_fetch_assoc($r)){
                                    $l[]= $rows['restaurant'];
                                    $d[]=$rows['countr'];

                                }
                                $l=json_encode($l);
                                $d=json_encode($d);


                                ?>
                                <!-- Map card -->



                                <script>
                                    window.onload=function()
                                    {
                                        var chartdata = {

                                                        labels: <?php echo $label;?>,
                                                        datasets: [
                                                            {
                                                                label: 'Cuisine',
                                                                backgroundColor: ["#993767", "#BE5168", "#E9D78E", "#49e2ff", "#E16552", "blue"],
                                                                borderColor: 'white',
                                                                hoverBackgroundColor: '#CCCCCC',
                                                                hoverBorderColor: '#CCCCCC',
                                                                data: <?php echo $data; ?>
                                                            }
                                                        ]
                                                    };

                                                    var graphTarget = $("#revenue-chart-canvas");

                                                    var barGraph = new Chart(graphTarget, {
                                                        type: 'pie',
                                                        data: chartdata
                                                    });
                                        var d = {

                                            labels: <?php echo $l;?>,
                                            datasets: [
                                                {
                                                    label: 'Restaurant',
                                                    backgroundColor: ["#993767", "#BE5168", "#E9D78E", "#49e2ff", "#E16552", "blue"],
                                                    borderColor: 'white',
                                                    hoverBackgroundColor: '#CCCCCC',
                                                    hoverBorderColor: '#CCCCCC',
                                                    data: <?php echo $d; ?>
                                                }
                                            ]
                                        };

                                        var Target = $("#restaurant_chart");

                                        var barGraph = new Chart(Target, {
                                            type: 'bar',
                                            data: d
                                        });
                                                }
                                </script>
                                <!-- /.card -->


                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                    <script src="js/chart.min.js" defer></script>
                    <!-- /.card -->
                </section>
                <section class="col-md-6 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Restaurant
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Restaurant</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                     style="position: relative; height: 350px;">
                                    <canvas id="restaurant_chart" height="300" style="height: 600px;"></canvas>
                                </div>
                                <?php


                                $sqlQuery = "SELECT c.name as restaurant, count(cr.restaurant_id) as countr FROM 
                                            restaurant c inner join foods cr on cr.restaurant_id = c.id GROUP by c.name";

                                $result = mysqli_query($connection,$sqlQuery);

                                $d= array();
                                $l=array();
                                while($row=mysqli_fetch_assoc($result)){
                                    $l[]= $row['restaurant'];
                                    $d[]=$row['countr'];

                                }
                                $l=json_encode($l);
                                $d=json_encode($d);


                                ?>
                                <!-- Map card -->
                                <!-- /.card -->


                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                    <script src="js/chart.min.js" defer></script>
                    <!-- /.card -->
                </section>
</div>

</body>
