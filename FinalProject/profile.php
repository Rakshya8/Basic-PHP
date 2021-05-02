<head>
    <link rel="stylesheet" href="css/font.css">
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
    <link rel="stylesheet" href="css/search_page.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/form.js"></script>
</head>
<?php
Include('navbar.php');
?>
<body>
<script>
    function profile(){

        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp=new XMLHttpRequest();

        } else {// code for IE6, IE5

            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

        }

        xmlhttp.onreadystatechange=function() {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

                document.getElementById("profiles").innerHTML=xmlhttp.responseText;

            }

        }
        xmlhttp.open("GET","updateProfile.php",true);

        xmlhttp.send();

    }
    function password(){
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp=new XMLHttpRequest();

        } else {// code for IE6, IE5

            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

        }

        xmlhttp.onreadystatechange=function() {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

                document.getElementById("profiles").innerHTML=xmlhttp.responseText;

            }

        }
        xmlhttp.open("PROFILE","updatePassword.php",true);

        xmlhttp.send();

    }
    function wishlist(){
        checkedValue = document.getElementsByName('check[]');
        vals = "";
        for (var i=0, n=checkedValue.length;i<n;i++)
        {
            if (checkedValue[i].checked)
            {
                vals += ","+checkedValue[i].value;
            }
        }
        if (vals) vals = vals.substring(1);
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp=new XMLHttpRequest();

        } else {// code for IE6, IE5

            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

        }

        xmlhttp.onreadystatechange=function() {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

                document.getElementById("profiles").innerHTML=xmlhttp.responseText;

            }

        }
        xmlhttp.open("PROFILE","displayWishlist.php",true);

        xmlhttp.send();

    }
    function order(){

        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp=new XMLHttpRequest();

        } else {// code for IE6, IE5

            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

        }

        xmlhttp.onreadystatechange=function() {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

                document.getElementById("profiles").innerHTML=xmlhttp.responseText;

            }

        }
        xmlhttp.open("POST","orderHistory.php",true);

        xmlhttp.send();

    }
</script>
<section class="hero banner banner--general" style="padding: 4% 0 1% 0;
    background-size: 40%;
    background: #FAFAFA;
    border-top: 1px solid #E7E7E7;
    border-bottom: 1px solid #E7E7E7;
top: 30%">
    <div class="container"style="" >
        <div class="row">
            <div class="col-8" style="margin-top: 5%;top: 50%">
                <h1 class="mb-0 mt-2 mt-md-0">Account Settings</h1>
            </div>
            <div class="col-4"style="margin-top: 5%; top: 50%">
                <a href="logout.php">
                    <button class="btn btn--primary btn--logout float-right mt-0 mt-sm-3 mt-md-2 cc_pointer"
                            style="background-color: #9F1D22;
                color: #FFFFFF; border-radius: 0px;">Logout</button></a>
            </div>
        </div>
    </div>
</section>
<div class="container" style="margin-top: 2%;margin-bottom: 3rem;border-bottom: 1px solid #E7E7E7;">
    <div class="row">
        <div class="col-md-3  menu__category hidden-sm-down sidebar-nav" STYLE="border-right: 1px solid #E7E7E7;">
            <div class="sticky-side">
                <ul class="nav flex-md-column flex-row" STYLE="border-bottom: 1px solid #E7E7E7;
                margin-bottom: 3rem;overflow-x: hidden; font-size: 0.875rem">
                    <li style="margin-bottom: 1rem;" onclick="profile()">
                                    <span style="font-size: 0.875rem;color: #9B9B9B;">
                                        <i class="bi bi-person"></i>
                                    </span>
                        <span>
                                        Profile
                                    </span>
                    </li>
                    <li style="margin-bottom: 1rem;" onclick="password()">
                                    <span style="font-size: 0.875rem;color: #9B9B9B;">
                                        <i class="bi bi-lock"></i>
                                    </span>
                        <span>
                                       Password
                                    </span>
                    </li>
                    <li style="margin-bottom: 1rem;" onclick="order()">
                                    <span style="font-size: 0.875rem;color: #9B9B9B;">
                                        <i class="bi bi-handbag"></i>
                                    </span>
                        <span>
                                        Order History
                                    </span>
                    </li>
                    <li style="margin-bottom: 1rem;" onclick="wishlist()">
                                   <span style="font-size: 0.875rem;color: #9B9B9B;">
                                        <i class="bi bi-suit-heart"></i>
                                    </span>
                        <span>
                                        Wishlist
                                    </span>
                    </li>

                </ul>
            </div>

        </div>
        <div class="col-md-8" style="position: relative;min-height: 4rem;" id="profiles">
            <?php Include('updateProfile.php')?>
        </div>
    </div>
</div>
<?php
Include('footer.php');
?>

</body>

