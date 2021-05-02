<html>
<head>
    <link rel="stylesheet" href="css/home.css">
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
    <script src="js/form.js"></script>
    <style>
        .footer a, .footer li, .footer p {
            font-weight: 100;
            color: #4A4A4A;
            line-height: 1.8;
            text-decoration: none;
        }
        .small-title {
            display: inline-block;
            font-weight: 700;
            font-size: 0.75rem;
            color: #4A4A4A;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
            line-height: 1.1;
        }
        .download-logo {
            height: 2.2rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }
    </style>

</head>
</html>
<?php
Include('navbar.php');
?>
<section class="banner banner--landing d-flex align-items-center parallax" style="height: 90vh;
    background-color: #4A4A4A;
    background-image: url('./Images/home-bg.jpg');">
    <div class="container parallax__front">
        <div class="row">
            <div class="col-md-9 col-lg-8 col-sm-9 mx-auto hero__container">
                <h2 class="text-center col-md-12">
                    Order food from the widest range of restaurants.</h2>
                <div class="row">
                    <form action="search_page.php">
                    <div class="col-md-9 mx-auto mt-3 search search--hero no-padding-md input-group">
                        <input type="search" class="search form-control form-control-lg cta-search animate-bg
                        ng-pristine ng-untouched ng-valid ng-empty" name="input"
                               placeholder="Restaurant or Cuisine (leave it blank to browse all)" value="<?php
                        if(isset($_GET['input'])){
                            echo $_GET['input'];

                        }
                        ?>" >
                        <span class="icon-close red clearSearch ng-hide" ng-show="fm_filter.search_text" ></span>
                    </div>
                    <div class="text-center hidden-md-up col-sm-12 mt-3">
                        <input type="submit" value="Search by Restaurant"  class="btn btn-primary"
                        style=" background: #00A145;color: #FFFFFF;padding-left: 1.5rem;padding-right: 1.5rem;
                        border-radius: 2px;cursor: pointer;font-size: 1.2rem;height: 50%; border:2px solid #00A145 "
                        name="search">

                    </div>
                    </form>

</section>
<section class="section" style="padding: 4rem 0; border-bottom-color: #999999">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="small-title inline" style="display: inline-block;font-weight: 700;font-size: 0.75rem;
                color: #4A4A4A;text-transform: uppercase;margin-bottom: 0.5rem;line-height: 1.1;">
                    FOODMANDU FRESH</h3>
                <img src="Images/section-bg.jpeg" style="width:100%;border:none;">
            </div>
        </div>
    </div>

</section>

    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 2%">
                <h2 class="small-title inline" style="display: inline-block;font-weight: 700;font-size: 0.75rem;
                color: #4A4A4A;text-transform: uppercase;margin-bottom: 0.5rem;line-height: 1.1;">
                    FEATURED RESTAURANTS</h2>
                <a style="color: #4A4A4A;" href="search_page.php">
                    <small class="float-right">
                        View All
                        <span>
                            <i class="bi bi-arrow-right"></i>
                        </span>
                    </small>
                </a>
            </div>
        </div>
            <?php
$sql="select * from restaurant";
$result= mysqli_query($connection, $sql);
echo'<div class="container-fluid">
      <div class="row">';

while($row=mysqli_fetch_assoc($result)) {
    echo '<div class="col-md-5 col-lg-3 h-25" style="margin-bottom: 2%">';
    echo '<img src="Images/'.$row['image'].'" style="width:100%; height:200px">';
    echo"<br>";
    echo'<p class="small-title inline" style="font-weight: 300;
    color: #4A4A4A;
    font-size: 1.25rem; margin-bottom: 0">'.$row['name']."</p>";
    echo '<br>';
    echo '<i class="bi bi-geo-alt-fill" style="font-weight: 300;
    color: #4A4A4A;
    fill: #4A4A4A;
    font-size: 0.8rem;">'.$row['location'];
    echo"</i>";
    echo"<div style='position: absolute;
    width: 2rem;
    height: 2rem;
    top: 185px;
    right: 2rem;
    background: #FFFFFF;
    border-radius: 50%;
    padding-top: 5px;
    text-align: center;'>
     <i class='bi bi-suit-heart' style='font-size: 1.2rem;
    color: #9B9B9B;
    vertical-align: middle;'></i></div>";
    echo"</div>";
}
echo'</div></div>';
?>
    </div>
        <section class="section section--testimonial" style="position: relative;
    background-image: url(Images/testimonial.png);
    background-size: cover;
    background-repeat: no-repeat;">
            <div class="overlay" style="position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);"></div>
            <div class="overlay" style="position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);"></div>
            <div class="container">
                <div class="row">


                    <div class="col-md-2"></div>
                    <div class="col-md-8 text-center" style="margin-top: 2%">
                        <h3 class="text-white text-center">About Us</h3>
                        <p class="text-white text-center">
                            Foodmandu is the fastest, easiest and most convenient way to enjoy the best food of your favourite restaurants at home, at the office or wherever you want to.
                        </p>
                        <p class="text-white text-center">
                            We know that your time is valuable and sometimes every minute in the day counts.
                            That’s why we deliver! So you can spend more time doing the things you love.
                        </p>
                        <button class="btn" style="padding-left: 1.5rem;
    padding-right: 1.5rem;
    border-radius: 2px;
    cursor: pointer;
    font-size: 0.875rem;
background: #00A145;
    color: #FFFFFF;">LEARN MORE</button>
                    </div>
                    <div class="col-md-2"></div>


                </div>
            </div>
        </section>
<section class="section section--download-app" style="border:1px solid #E7E7E7; border-width:1px 0 1px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <h1 class="red" style="color:#9F1D22 !important;"><b>Download the app</b></h1>
                        <p>Always on the go.</p>
                        <p> Food - whenever and wherever you want it!</p>
                        <a href="https://itunes.apple.com/np/app/foodmandu/id983591001"><img src="Images/itunes.png" style="height: 2.2rem;
    margin-right: 0.5rem;
    margin-bottom: 0.5rem;" alt="" class="download-logo"></a>
                        <a href="https://play.google.com/store/apps/details?id=com.app.foodmandu"><img style="height: 2.2rem;
    margin-right: 0.5rem;
    margin-bottom: 0.5rem;" src="Images/play.png" alt="" class="download-logo"></a>
                    </div>
                </div>
            </div>
                <div class="col-md-5 img-container">
                    <img src="Images/download.png"style="width: 100%;" alt="download">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section" style="background-color:#F7F7F7;margin-top: 4%">
    <div class="container" style="margin-bottom: 4%">
        <div class="row">
            <div class="col-md-3">&nbsp;</div>
            <div class="col-md-6">
                <div class="text-center" style="text-align:justify;">

                    <h2 style="text-align:center;">
                        <b>
                            List your Restaurant at Foodmandu!<br /> Reach 2,00,000 + new customers.
                        </b>
                    </h2>
                </div>
                <br />
                <div class="text-center">
                    <button class="btn btn--primary text-center" style="background: #00A145;
    color: #FFFFFF;">Send a request</button>
                </div>
            </div>
            <div class="col-md-12 col-lg-2 mt-2">

            </div>
        </div>
    </div>
</section>



</div>


<!-- section end -->
<?php
Include('footer.php');
?>



