<html>
<head>
    <?php
    Include('connection.php');
    ?>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

</head>
<body>

<header class="header" style="background: white;">

    <nav class="navbar navbar-expand-sm-md-lg fixed-top" style="background: white">
            <div class="col-mb-3 col-sm-3 col-lg-3 header-logo">
            <a class="navbar-brand" href="home.php">
                <img src="Images/Untitled-1.jpg" width="auto" height="35px" alt="" >
            </a>
            </div>

            <div class="list-inline col-md-6 hidden-sm-down">
                <form class="form-inline my-2 my-lg-0" method="get" action="search_page.php">
                    <input class="form-control mr-sm-2" type="search"
                           placeholder="Find by Restaurant" aria-label="Search" name="input"
                           value="<?php
                           if(isset($_GET['input'])){
                               echo $_GET['input'];

                           }
                           ?>">
                    <input class="btn btn-outline-success my-2 my-sm-0" type="submit"
                    style="background: #00A145;color: white; border-radius: 0px" id="search" name="search"
                           value="Find by Restaurant">
                </form>
            </div>
        <script>
            function myCart() {

                document.getElementById("myCart").classList.toggle("show");
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
                if (!event.target.matches('#cart-i')) {
                    var myDropdown = document.getElementById("myCart");
                    if (myDropdown.classList.contains('show')) {
                        myDropdown.classList.remove('show');
                    }
                }
                document.getElementById("myCart").addEventListener('click',function(event){
                    event.stopPropagation();
                });
            }
            function myProfile() {

                document.getElementById("myProfile").classList.toggle("show");
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(e) {
                if (!e.target.matches('#profile')) {
                    var myDropdown = document.getElementById("myProfile");
                    if (myDropdown.classList.contains('show')) {
                        myDropdown.classList.remove('show');
                    }
                }
            }
            function removeItem(is){
                if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

                    xmlhttp=new XMLHttpRequest();

                } else {// code for IE6, IE5

                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

                }

                xmlhttp.onreadystatechange=function() {

                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

                        document.getElementById("myDropdown").innerHTML=xmlhttp.responseText;

                    }

                }
                xmlhttp.open("GET","remove_item_cart.php?id="+is,true);

                xmlhttp.send();

            }

        </script>
           <?php
           if(isset($_SESSION['username'])){
               echo'
                <div class="col-8 offset-md-5 offset-lg-0 col-md-4 col-lg-3 header__right-menu">';
               echo'<ul class="list-inline float-right" style="margin-right: 20px">';
                     echo'<li class="list-inline-item">';
               echo'<i class="bi bi-person" style="font-size: 1.5rem;
    vertical-align: middle;color: #9B9B9B;padding-right: 10px;"id="profile"
     onclick="myProfile()"></i>';
               echo"</li>";
               echo'<li class="list-inline-item">';
               echo'<i class="bi bi-cart4" onclick="myCart()" style="font-size: 1.5rem;
    vertical-align: middle; color: #9B9B9B;" id="cart-i"></i></a>';
               echo"</li><span class='badge' style='background-color: red;
                     border-radius: 15px;box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
                     color: rgb(255, 255, 255);display: inline-block;font-size: 10px;
                     height: 20px;line-height: 1;padding: 6px 7px;text-align: center;
                     margin-right: 3%;
                     margin-left: -5%;margin-top: -7%;vertical-align: middle;white-space: nowrap;
                     width: 20px;padding-right: 10px;'>";
               if(isset($_SESSION['count'])){
                   echo $_SESSION['count'];
               }
               echo"</span>";
               echo'<a href="profile.php" style="text-decoration: none"> <i class="bi bi-suit-heart" style="font-size: 1.5rem;
    vertical-align: middle; color: #9B9B9B;" id="cart-i"></i></a>';
               echo"</li><span class='badge' style='background-color: red;
                     border-radius: 15px;box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
                     color: rgb(255, 255, 255);display: inline-block;font-size: 10px;
                     height: 20px;line-height: 1;padding: 6px 7px;text-align: center;
                     margin-left: 1%;margin-top: -7%;vertical-align: middle;white-space: nowrap;
                     width: 20px;padding-right: 10px;'>";
               $id=$_SESSION['uid'];
               $sql="select count(*) as c from wishlist where uid='$id'";
               $result=mysqli_query($connection, $sql);
               while($row=mysqli_fetch_assoc($result)){
                   $c=$row['c'];
               }
               echo $c;


               echo"</span>";
               echo"</li>";
                echo"</ul>
            </div>
               ";
           }

           else{
               echo'
                <div class="col-8 offset-md-5 offset-lg-0 col-md-4 col-lg-3 header__right-menu">';
               echo'<ul class="list-inline float-right">
                    <li class="list-inline-item">';
                       echo'<a href="login.php">
 <button class="btn btn-outline-success my-2 my-sm-0"
                        style="border-radius: 0px">
                            Login</button></a>';
                    echo"</li>
                </ul>
            </div>
               ";
           }
           ?>
        <div class="header__right-dropdown cart" style="position: absolute;top: 100%;right: 2rem;
         z-index: 4;margin-top: 0.1rem;background: #FFFFFF;width: 20rem;margin-left: -5%">
            <div class="dropdown-content" id="myProfile" style="display: none;
                      position: relative;border: 1px solid #E7E7E7;max-height: 100%;">
                <div class="sidebar-wrapper sidebar-wrapper--inner" style="overflow-y: auto;
              max-height: 90vh;">
                    <div class="side-title" style="padding: 1rem;padding-bottom: 0;border-bottom: 1px solid #E7E7E7;
                        font-size: 0.875rem;color: #9B9B9B;">
                        <h3 style="font-weight: 700;font-size: 0.75rem;color: #4A4A4A;text-transform: uppercase;
                        margin-bottom: 0.5rem;line-height: 1.1;">MY PROFILE</h3>
                        <div class="text-center">
                            <?php
                            if(empty($_SESSION['pro'])){
                                echo '<a href="profile.php" style="text-decoration: none; color:#9B9B9B;">
                                  <img src="Images/empty_pic.png" style="width:100px; height:100px; 
                                  border-radius:50%;"><br>';
                            }
                            else{
                                echo '<a href="profile.php" style="text-decoration: none; color:#9B9B9B;">
                                  <img src="Images/'.$_SESSION['pro'].'" style="width:100px; height:100px; 
                                  border-radius:50%;"><br>';
                            }
                            $id=$_SESSION['uid'];
                            echo $_SESSION['username']."</a>";
                            ?>
                        </div>
                        <div class="text-center">
                            <a href="profile.php" style="text-decoration: none; color: #00A145">Edit Profile</a>
                        </div>
                        <hr style="margin-top: 1rem;margin-bottom: 1rem;border: 0;
                        border-top: 1px solid rgba(74, 74, 74, 0.1);"/>
                        <div class="profile__nav" style="border-right:none !important;">
                            <ul class="nav flex-md-column flex-row" style>
                                <a href="profile.php" style="text-decoration: none; color:#9B9B9B "><li style="margin-bottom: 1rem;">
                                    <span style="font-size: 1rem;color: #9B9B9B;">
                                        <i class="bi bi-handbag"></i>
                                    </span>
                                    <span>
                                        Order History
                                    </span>
                                </li>
                                </a style="text-decoration: none">
                                <li>
                                    <span style="font-size: 1rem;color: #9B9B9B;">
                                        <i class="bi bi-suit-heart"></i>
                                    </span>
                                    <span>
                                        My Wishlist
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <hr style="margin-top: 1rem;margin-bottom: 1rem;border: 0;
                        border-top: 1px solid rgba(74, 74, 74, 0.1);"/>
                        <div class="text-center" style="margin-bottom: 5%; border: none">
                            <a href="logout.php" style="text-decoration: none; color: #00A145">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header__right-dropdown cart" style="position: absolute;top: 100%;right: 2rem;
         z-index: 4;margin-top: 0.1rem;background: #FFFFFF;width: 20rem;margin-left: -5%">
            <div class="dropdown-content" id="myCart" style="display: none;
                      position: relative;border: 1px solid #E7E7E7;max-height: 100%;">
                <div class="sidebar-wrapper sidebar-wrapper--inner" style="overflow-y: auto;
              max-height: 90vh;">
                    <div class="side-title" style="padding: 1rem;padding-bottom: 0;border-bottom: 1px solid #E7E7E7;">
                        <h3 style="font-weight: 700;font-size: 0.75rem;color: #4A4A4A;text-transform: uppercase;
                        margin-bottom: 0.5rem;line-height: 1.1;">MY BAG</h3>
                        <table>
                        <?php Include('display_cart.php')?>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </nav>
</header>

</html>

