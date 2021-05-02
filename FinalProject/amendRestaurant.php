<html>
<head>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
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
<script>
    <?php
        Include('connection.php');
        $id=$_GET['id'];
        $_SESSION['res_id']=$id;
        $sql="select * from restaurant where id='$id'";
        $result=mysqli_query($connection,$sql);
        while ($row=mysqli_fetch_assoc($result)){
           $name=$row['name'];
            $loc=$row['location'];
            $image=$row['image'];
            $logo=$row['Logo'];
            $cover=$row['cover'];
            $about=$row['About'];
        }
        ?>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];

        if(file){
            var reader = new FileReader();

            reader.onload = function(){
                $("#previewImgi").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }
    function clear(){
        $("#previewImgi").attr("src","transparent.png");

    }
</script>
<div class="container justify-content-center" style="margin-bottom: 2%">
    <form data-toggle="validator" role="form" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"
          class="form-group has-error has-feedback justify-content-center"
          method="post" onsubmit="return validate()" action="restaurant_amend.php">
        <div class="container justify-content-center">
            <div class="row justify-content-center">
                <div class="col-sm-10 justify-content-center" style="top: 30%">
                    <h3 class='text-center' style="margin-top: 5%" >Amend Restauarant</h3>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-bottom: 5%">
                <div class="col-sm-5 justify-content-center" id="field">
                <span class="error"> <?php if(isset($rerror))
                        echo "*".$rerror;?> </span>
                    <input type="text" name="rname" placeholder="Restaurant Name" id="rname"
                           value="<?php if(isset($name)){
                               echo $name;
                           } ?>"
                           size="25%"class="inline-fields" required>
                </div>
                <div class="col-sm-5" id="field">
                    <span class="error"><?php if(!empty($loce))
                            echo "*".$loce;?> </span>
                    <input type="text" name="loc" placeholder="Location" id="loc"
                           value="<?php if(isset($loc)){
                               echo $loc;
                           }?>"
                           class="inline-fields" size="28" required>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-bottom: 5%">
                <div class="col-sm-5 justify-content-center" id="field">
                    <input type="file" name="image" placeholder="Restaurant Name" id="rname"
                           size="25%"class="inline-fields" onchange="previewFile(this)">
                </div>
                <div class="col-sm-5" id="field">

                    <?php echo '<img src="Images/'.$image.'" style="width:100px; height:100px; ">';?>

                </div>
            </div>
            <div class="row justify-content-center" style="margin-bottom: 5%">
                <div class="col-sm-5 justify-content-center" id="field">
                    <input type="file" name="cover" placeholder="Cover" id="cover"
                           size="25%"class="inline-fields">
                </div>
                <div class="col-sm-5" id="field">

                    <?php echo '<img src="Images/'.$cover.'" style="width:100px; height:100px; ">';?>


                </div>
            </div>
            <div class="row justify-content-center" style="margin-bottom: 5%">
                <div class="col-sm-5 justify-content-center" id="field">
                    <input type="file" name="logo" placeholder="Logo" id="logo"
                           size="25%"class="inline-fields">
                </div>
                <div class="col-sm-5" id="field">
                    <?php echo '<img src="Images/'.$logo.'" style="width:100px; height:100px; ">';?>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-10 justify-content-center" id="field">
                    <div class="md-form">
                        <i class="fas fa-pencil-alt prefix"></i>
                        <textarea id="form10" class="md-textarea form-control" name="about" rows="3" placeholder="<?php echo $about;?>"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center" style="margin-bottom: 5%">
                <input type="submit" style="border-radius: 0px"
                       class="btn btn-success" name="reg-submit" value="Add" id="button">

            </div>
        </div>


    </form>
</div>
</body>
</html>
