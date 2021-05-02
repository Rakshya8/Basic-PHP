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
</head>
<?php
Include('navbar.php');
?>
<body>
<script>
    function wishlist(name,image,id){

        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp=new XMLHttpRequest();

        } else {// code for IE6, IE5

            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

        }

        xmlhttp.onreadystatechange=function() {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

                // document.getElementById("fin").innerHTML=xmlhttp.responseText;

            }

        }
        xmlhttp.open("GET","wishlist.php?name="+name+"&image="+image+"&id"+id,true);

        xmlhttp.send();

    }
    function sort(){
        var sort=document.getElementById('sort').value;

        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp=new XMLHttpRequest();

        } else {// code for IE6, IE5

            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

        }

        xmlhttp.onreadystatechange=function() {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

                document.getElementById("fin").innerHTML=xmlhttp.responseText;

            }

        }
        xmlhttp.open("GET","select_search.php?sort="+sort,true);

        xmlhttp.send();

    }
    function check(){
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

                document.getElementById("fin").innerHTML=xmlhttp.responseText;

            }

        }
        xmlhttp.open("GET","check_sort.php?value="+vals,true);

        xmlhttp.send();

    }
    function showHide() {
        document.getElementById("myDropdown").classList.toggle("show");
        document.getElementById("myDropdown").addEventListener('click', function (event) {
            event.stopPropagation();
        });


// Close the dropdown menu if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('#drop')) {
                var dropdowns = document.getElementsByClassName("filter__dropdown");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    }
</script>
<section class="hero banner banner--general" style="height:30%;margin-bottom: 2%">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h2 style="color: #4A4A4A; margin-top: 20%"> Restaurants and Cafes</h2>
            </div>
        </div>
    </div>
</section>
<section class="filter main-space sticky-top" style="background: white; width: 100%; height: auto; position: sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-8 hidden-md-up col-xs-offset-1">
                        <div class="filter__item" style="position: relative;
                        display: inline-block;">
                            <button type="button" class="btn btn--iconed btn--white"
                                    id="drop"
                                    onclick="return showHide()">
                                <span>
                                    <i class="bi bi-filter"></i>
                                </span>
                                <span>Filter</span>
                                <div class="filter__dropdown" style="background: #FDFCFC;
                                border: 1px solid #E7E7E7;position: absolute;top: 110%;min-width: 30rem;
                                margin-left: -15%;
                                z-index: 2;padding: 0.75rem; display: none;" id="myDropdown">
                                    <div>
                                        <span class="small-title" style="display: inline-block;font-weight: 700;font-size: 0.75rem;
                                        color: #4A4A4A;text-transform: uppercase;margin-bottom: 0.5rem;line-height: 1.1;">Cuisine</span>
                                        <div class="row" style="max-height: 200px;overflow: auto;
                                        margin: 0px;" id="dropi" >
                                            <div class="row" style="max-height:200px;overflow:auto;margin:0px;">
                                                <?php Include('cuisine.php')?>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="border-top: 1px solid rgba(74, 74, 74, 0.1);">
                                    <div class="row">
                                        <div class="col-md-7">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="btn btn-success text-center" id="check"
                                                   onclick="check()" style="color:#fff;
                                                   background: green; width: 100%" name="searchSelect">
                                                Done</label>
                                        </div>
                                    </div>
                                </div>

                            </button>
                        </div>
                    </div>
                    <div class="col-4 hidden-md-up">
                        <div class="text-lg-right select-dropdown pull-right" style="float:right;text-align:right;">
                            <label style="color: #9B9B9B;">Sort By:</label>
                            <select id="sort" style="height:37px;border: 1px solid #ced4da;color: #9B9B9B;"
                                    onchange="sort()"
                            >
                                <option value="rel">Relevance</option>
                                <option value="asc">Alphabetically Order A-Z</option>
                                <option value="desc">Alphabetically Order Z-A</option>


                            </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container" style="margin-top: 2%;border-bottom: 1px solid #E7E7E7;">
    <div class="row" id="fin">
        <?php
        if(isset($_GET['input'])&&!empty($_GET['input'])){
        if($_SERVER['REQUEST_METHOD']=="GET"){
            if(isset($_GET['search'])){
                    $input = htmlspecialchars($_GET['input']);
                    $sql = "select * from restaurant where name like '%$input%' or '%$input' or'$input%'";
                    $result = mysqli_query($connection, $sql);
                    echo '<div class="container-fluid">
                          <div class="row" style="margin-bottom: 2%">';
                if( mysqli_affected_rows($connection) == 0)
                    echo "<small>No matches</small>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        if($row==0) {
                            echo 'No such keyword/s';
                        }
                        else{
                            echo '<div class="col-md-5 col-lg-4 h-25" style="margin-bottom: 2%;margin-top: 2%">';
                            echo "<a href='individual_page.php?id=".$row['id']."'>".'<img src="Images/' . $row['image'] . '" style="width:100%; height:200px"></a>';
                            echo "<br>";
                            echo '<p class="small-title inline" style="font-weight: 300;
                            color: #4A4A4A;
                            font-size: 1.25rem; margin-bottom: 0">' . $row['name'] . "</p>";
                            echo '<br>';
                            echo '<i class="bi bi-geo-alt-fill" style="font-weight: 300;
                            color: #4A4A4A;
                            fill: #4A4A4A;
                            font-size: 0.8rem;">' . $row['location'];
                            echo "</i>";
                            echo "<div style='position: absolute;
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
                            echo "</div>";
                        }
                    }
                    echo '</div></div>';
                }
            }
        }
        else{
            Include('displayAll.php');
        }
        ?>
    </div>

</div>
<?php
Include('footer.php');
?>

</body>
