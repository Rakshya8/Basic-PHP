<html>
<head>
    <title>Forms</title>

    <style>
        body{
            text-align: center;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function previewFile(input){
            var file = $("input[type=file]").get(0).files[0];

            if(file){
                var reader = new FileReader();

                reader.onload = function(){
                    $("#previewImg").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
        function clear(){
            alert("Hello");
            $("#previewImg").attr("src","transparent.png");

        }
    </script>
</head>
<body>
<header>
    <center>
        <h1>Rakshya Lama Moktan</h1> <br>
        <h1><u>Student id:</u> C7227218</h1>
    </center>
    <hr style='border-top: 4px solid red;'/>
</header>

<section id="container" style='text-align: center;'>
    <h1><u>Admin Crud Functionality</u></h1>
<form  method="post" action="insertProduct.php" >
    <fieldset style="width: 20px; display: inline-block">
        <legend>Enter New Product Detail</legend>
        Product Name: <br><input type="text" name="name" required><br><br>
        Price: <br><input type="number" name="price" required><br><br>
        Image Filename: <br><input type="file" name="file" onchange="previewFile(this)" required> <br> <br>
        <img id="previewImg" src="Images/transparent.png" alt="Placeholder" style="height: 50px; width: 50px"><br><br>
        <input type="submit" value="Submit" name="submit"> <input type="reset" value="Clear" onclick="clear()">
    </fieldset>
</form>
    <?php
    Include('displayProducts.php');
    ?>
</section>
</body>
</html>


