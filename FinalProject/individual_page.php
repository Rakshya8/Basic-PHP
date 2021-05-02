<?php
Include('navbar.php');
?>
<head>
    <link href="css/font.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap');
        body{
            font-family: 'Roboto', sans-serif;
        }
        button.tablinks{
            font-size: 120%;
        }
        button.tablinks.active {
            color: #00A145;
            font-weight: 400;
            padding-bottom: 0.8rem;
            border-bottom: 2px solid #00A145;
        }
        .small-title{
            font-weight: 700;
            font-size: 0.75rem;
            color: #4A4A4A;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
            line-height: 1.1;
        }
        td{
            vertical-align: top;
            border-top: 1px solid #eceeef;
        }
        i #is:hover{
            display: inline-block;
        }
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap');
        body{
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<?php
Include('connection.php');
if (!isset($_SESSION['username'])) {
    echo "Not signed in!";
    header("location: login.php");

} ?>

<script>
    function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    function searchItem(){
        food=document.getElementById('search_food').value;
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp=new XMLHttpRequest();

        } else {// code for IE6, IE5

            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

        }

        xmlhttp.onreadystatechange=function() {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

                document.getElementById("res_search").innerHTML=xmlhttp.responseText;

            }

        }
        xmlhttp.open("GET","search_food.php?id="+food,true);

        xmlhttp.send();



    }
    function removeItem(is){
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp=new XMLHttpRequest();

        } else {// code for IE6, IE5

            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

        }

        xmlhttp.onreadystatechange=function() {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

                document.getElementById("cart").innerHTML=xmlhttp.responseText;

            }

        }
        xmlhttp.open("GET","remove_item_cart.php?id="+is,true);

        xmlhttp.send();

    }

</script>
<?php




if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['food_id']=$id;
    $sql = "select * from restaurant where id='$id'";
    $result = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $image=$row['image'];
        $about=$row['About'];


    }
    $sql="select cuisine_name from cuisine where cuisine_id =
                                       (select cuisine_id from restaurant_cuisine where restaurant_id='$id')";
    $result=mysqli_query($connection,$sql);
    while($rows=mysqli_fetch_assoc($result)){
        $cuisine_name=$rows['cuisine_name'];
    }
}
?>
<div>
    <?php
    if($_SERVER['REQUEST_METHOD']=="GET") {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "select * from restaurant where id='$id'";
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $image = "Images/" . $row['cover'];
                echo "<section
                        class='hero banner banner--restaurant' style='padding: 20% 0 1% 0;
                        position: relative;
                        z-index: 0;background: url($image);background-size: cover;
                        background-color: #FFFFFF;
                        background-position: center;'>";
                echo '<div class="container"><div class="row">';
                echo '<div class="col-md-12" style="color:#fff;"><div class="mb-3">
                         <div class="food-picture-logo" style="float: left;
                            margin-right: 1.4rem;width: 8rem;
                            height: 6rem;border-radius: 2px;text-align: center;overflow: hidden;">
                            <img src="Images/' . $row['image'] . '" style="width:100%; height:100%;">
                        </div>';
                echo '<h1 class="text-white" id="resname">';
                echo $row['name'] . "</h1>";
                $res_name=$row['name'];
                echo '<p class="text-white mb-2">
                        <span style="color: #FFFFFF;"><i class="bi bi-tag-fill"></i> 
                        </span>
                        <span>'."$cuisine_name</span>
                        <br>";
                echo '<span style="color: #FFFFFF;"><i class="bi bi-geo-alt-fill"></i> 
                        </span>
                        <span>'.$row['location']."</span>
    

                        </p>";

                echo '</div>';
                echo '<div class="float-lg-left hidden-xs-down restaurant__info-wrapper">
                      <div class="small-title text-white">Minimum order</div>
                      <span class="bold">Rs. 500.00</span>

                      </div>';
                echo '<div class="float-lg-right hidden-xs-down restaurant__info-wrapper" style="margin-right: 0">
                       <div class="info-bulb" style="margin-right: 2rem;
                        display: -webkit-box;   display: -ms-flexbox;   display: flex;  
                        -webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;
                        flex-direction: column;">
                        <div class="small-title text-white">Additional Service Charge</div>
                        <span class="bold">10 %</span>
                        </div>                

                       </div>';
                echo "</div>";

                echo '</div>';

                echo '</section>';

            }
        }
    }
?>
    <section class="menu main-space mb-4">
        <div class="menu__nav" set-class-when-at-top="fixed-top" padding-when-at-top="0" style="padding: 0.75rem 0 0;
    font-size: 0.875rem;
    border-bottom: 1px solid #E7E7E7;
    background-color: #FFFFFF;
margin-bottom: 2%;">

            <div class="container" style="margin-bottom: 1%">
                <div class="row">
                    <div class="col-md-12">
                        <div class="menu__nav" set-class-when-at-top="fixed-top" padding-when-at-top="0">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12" style="font-size: 13px">
                                        <button class="tablinks" style="border: 0px; background: white"
                                                onclick="openCity(event, 'Main')">Main</button>
                                        <button class="tablinks" style="border: none;background: white"
                                                onclick="openCity(event, 'About')">About</button>
                                        <button class="tablinks" style="border: none;background: white"
                                                onclick="openCity(event, 'Branches')">Branches</button>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="container">
                <div class="row">
                    <div id="Main" class="tabcontent">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 col-lg-2 menu__category hidden-sm-down sidebar-nav" style="font-size: 14px">
                                    <div class="sticky-side">
                                        <ul class="nav flex-md-column flex-row">
                                            <li class="recommended" style="margin-bottom: 15%; margin-right: 3%">
                                <span>
                                    <i class="bi bi-basket2-fill" style="color: #00A145;"></i>
                                </span>
                                                <span style="color:forestgreen;">Categories</span>
                                            </li>
                                            <li>
                                                <a href="#FavItems" style="text-decoration: none; color: black; margin-bottom: 5%; margin-right: 2%">My Favourites</a>
                                            </li>
                                            <?php
                                            $sql="select name from category where 
                                id in (select category_id from foods where restaurant_id='$id')";
                                            $result=mysqli_query($connection,$sql);
                                            while ($row=mysqli_fetch_assoc($result)){
                                                echo'<a href="#'.$row['name'].'" 
                                        style="text-decoration: none; color: black"> 
                                        <li style="margin-bottom: 0.5rem;margin-right: 0.5rem">'.
                                                    $row['name'].'</li></a>';
                                            }
                                            ?>
                                        </ul>
                                    </div>

                                </div>
                                <div class="col-sm-12 col-md-8 col-lg-7 menu__list">
                                    <div class="row menu__header">
                                        <div class="col-12 col-lg-12 col-sm-12">
                                            <div class="menu_search" >
                                                <div class="input-group has-feedback">
                                                    <input type="search" name="search_food"
                                                           class="form-control" id="search_food"
                                                           placeholder="Search food items">
                                                    <span style="margin-top: 1%;margin-left: 1%">
                                        <i class="bi bi-search justify-content-center"
                                           onclick="searchItem()"
                                           style="position: absolute; font-size: 115%"></i>
                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function cart(price, name,res,is){
                                            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

                                                xmlhttp=new XMLHttpRequest();

                                            } else {// code for IE6, IE5

                                                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

                                            }

                                            xmlhttp.onreadystatechange=function() {

                                                if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

                                                    document.getElementById("cart").innerHTML=xmlhttp.responseText;

                                                }

                                            }
                                            xmlhttp.open("GET","cart.php?name="+name+"&price="+price+"&res="+res+"&is="+is,true);

                                            xmlhttp.send();

                                        }
                                    </script>
                                    <div class="clear_fix">
                                        <div class="menu__content wrap" id="res_search">
                                            <br>
                                            <?php
                                            $sql="select * from category where id in 
                             (select category_id from foods where restaurant_id='$id')";
                                            $result=mysqli_query($connection,$sql);
                                            while ($row=mysqli_fetch_assoc($result)){
                                                $cat=$row['id'];
                                                echo'<p id='.$row['name'].' style="padding: 0.8rem;background-color: #FBF9F9;border-bottom: 1px solid #E7E7E7;
                                              display: block;font-size: 0.75rem;font-weight: 400;text-transform: uppercase;
                                              margin-bottom: 0;color: #9F1D22">'.$row['name'].'</p>';
                                                $query="select * from foods where restaurant_id='$id' 
                                                and category_id='$cat'";
                                                $array=mysqli_query($connection,$query);
                                                while($res=mysqli_fetch_assoc($array)){
                                                    $price=$res['price'];
                                                    $name=$res['name'];
                                                    $is= $res['id'];
                                                    echo'<ul class="nav flex-column menu__items">';
                                                    echo'<li class="d-flex justify-content-between" style="cursor: pointer;
                                                    padding: 0.8rem;
                                                    border-bottom: 1px solid #E7E7E7;
                                                    -webkit-transition: 0.2s all ease-in;
                                                    transition: 0.2s all ease-in; margin-bottom: 1rem"><p name="price">'.$res['name']."</p>";
                                                    echo '<div style="min-width: 6rem;text-align: right;">';
                                                    echo'<span id="price" value="'.$res['price'].'">'.$res['price'].'</span>';
                                                    echo"<span><i class='bi bi-plus-circle'  onclick='cart(\"$price\",\"$name\",\"$res_name\",\"$is\")'
                                                 style='margin-left: 2%; color: #00A145;font-size: 110%; font-weight: 100 '></i></span>";
                                                    echo '</li>';
                                                    echo'</ul>';
                                                }

                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 hidden-md-down">
                                    <div class="sticky-side">
                                        <h2 class="small-title" style="margin-left: 5%;display: inline-block;font-weight: 700;
                                 font-size: 1rem;color: #4A4A4A;text-transform: uppercase;margin-bottom: 0.5rem;
                                line-height: 1.1;">My Bag</h2>
                                        <div class="cart cart--empty d-flex justify-content-center align-items-center">
                                            <div class="text-center">
                                                <div class="cart__content spinner" style="display: flex;
                                        -webkit-box-orient: vertical;-webkit-box-direction: normal;
                                        -ms-flex-direction: column;flex-direction: column;
                                        height: calc(100vh - 7rem);">
                                                    <div class="d-flex flex-column">
                                                        <div class="cart__items-wrapper" style="min-height: 3rem;
                                        overflow: auto;margin-bottom: 0.5rem;">
                                                            <table style="margin-bottom: 0;
                                        background: #FAFAFA;column-span: 3;table-layout: fixed;border-bottom: 1px solid #E7E7E7;"
                                                                   class="table" id="cart">
                                                            </table>

                                                        </div>

                                                    </div></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        <div id="About" class="tabcontent">
            <div class="container">
                <div class="row">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-8" style="font-style:17px;">
                                    <p align="Justify">
                                        <b> <?php
                                            echo $res_name;
                                            ?></b>
                                        <br>
                                        <?php
                                        echo $about;
                                        ?>

                                    </p>

                                </div>
                                    <div class="col-md-4">
                                        <div class="about__opening-time">
											<span class="small-title">
												Delivery Hours
											</span>
                                            <table style="width: 100%;">
                                                <tbody>

                                                <tr>
                                                    <td style="padding: 0.5rem;"><label for="Day">Sunday</label></td>
                                                    <td style="padding: 0.5rem;" class="text-right"><label for="OpeningTime" id="OpeningTime1">11:00 AM</label> - <label for="ClosingTime" id="ClosingTime1">08:30 PM</label></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 0.5rem;"><label for="Day">Monday</label></td>
                                                    <td style="padding: 0.5rem;" class="text-right"><label for="OpeningTime" id="OpeningTime2">11:00 AM</label> - <label for="ClosingTime" id="ClosingTime2">08:30 PM</label></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 0.5rem;"><label for="Day">Tuesday</label></td>
                                                    <td style="padding: 0.5rem;" class="text-right"><label for="OpeningTime" id="OpeningTime3">11:00 AM</label> - <label for="ClosingTime" id="ClosingTime3">08:30 PM</label></td>
                                                </tr>
                                                <tr class="today">
                                                    <td style="padding: 0.5rem;" ><label for="Day">Wednesday</label></td>
                                                    <td style="padding: 0.5rem;" class="text-right"><label for="OpeningTime" id="OpeningTime4">11:00 AM</label> - <label for="ClosingTime" id="ClosingTime4">08:30 PM</label></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 0.5rem;"><label for="Day">Thursday</label></td>
                                                    <td style="padding: 0.5rem;" class="text-right"><label for="OpeningTime" id="OpeningTime5">11:00 AM</label> - <label for="ClosingTime" id="ClosingTime5">08:30 PM</label></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 0.5rem;"><label for="Day">Friday</label></td>
                                                    <td style="padding: 0.5rem;" class="text-right"><label for="OpeningTime" id="OpeningTime6">11:00 AM</label> - <label for="ClosingTime" id="ClosingTime6">08:30 PM</label></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 0.5rem;"><label for="Day">Saturday</label></td>
                                                    <td style="padding: 0.5rem;" class="text-right"><label for="OpeningTime" id="OpeningTime7">11:00 AM</label> - <label for="ClosingTime" id="ClosingTime7">08:30 PM</label></td>
                                                </tr>


                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div id="Branches" class="tabcontent">
            <div class="container">
                <div class="row">

                        <div class="col-md-12">
                            <strong>No other Branched Found</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
Include('footer.php');
?>



