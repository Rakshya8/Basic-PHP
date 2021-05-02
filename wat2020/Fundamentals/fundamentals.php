<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web Applications and Technologies</title>
    <link type="text/css" rel="stylesheet" href="../Style/main.css" />
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
    <h1><u>Fundamentals of PHP</u></h1>
    <h2><strong>Selections</strong></h2>

    <?php
    echo "<h4>Selection, comparison operators and logical operators</h4>";
    echo "<h4><u>Day of the Week</u></h4>";
    $day = date('l'); //that is a lower case L
//    $day="Tuesday";
    echo 'it\'s '.$day."<br>";
    $day=strtolower($day);
    if($day=="wednesday")
        echo"Mid Week"."<br>";
    else
        echo "Not mid week"."<br>";
    echo "<hr>";
    echo "<h4><u>Time Zones</u></h4>";
    date_default_timezone_set("Asia/Kathmandu");
    echo date("l jS \of F Y h:i:s A");
    echo "<br>";
    $t = date("h");
    // echo $t;
//    $t = "00";
    if($t >= "05" && $t < "12")
        echo "Good Morning";
    else if($t >= "12" && $t < "18")
        echo "Good Afternoon";
    else if($t >= 18 && $t <="22")
        echo "Good Night";
    else
        echo "Not in the 24 hour format <hr/>";
    echo "<h4><u>Passwords</u></h4>";
    $pass="password";

    if(strlen($pass)>=4 && strlen($pass)<10)
        echo "Password length is valid";
    else
        echo "Password length is invalid";
    if($pass=="admin"&&$pass=="password"){
        echo "Password invalid";
    }
    echo "<hr>";
    echo "<h4><u>Ticket Counter</u></h4>";
    ?>
    <style>
        .center{
            padding: 10px;
            border: 2px solid black;
            border-collapse: collapse;
        }
        .center td{
            border: 2px solid black;
        }
        .center th{
            border: 2px solid black;
        }
        .center {
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 40px;

        }
        .center2,th,td{
            padding: 10px;
            border-collapse: collapse;
            border: 3px double black;
        }
        .center2{
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 40px;
            margin-top: 20px;

        }

    </style>
            <table class="center">
                <th> Age/Member</th>
                <th>Discount</th>
                <tr>
                    <td>
                        Under 12
                    </td>
                    <td>
                        50%
                    </td>
                </tr>
                <tr>
                    <td>
                        Under 18
                    </td>
                    <td>
                        25%
                    </td>
                </tr>
                <tr>
                    <td>
                        Over 65
                    </td>
                    <td>
                        50%
                    </td>
                </tr>
                <tr>
                    <td>
                        Member
                    </td>
                    <td>
                        10% - in addition to any other discounts.
                    </td>
                </tr>
            </table>
    <?php

    $price=25;
    $age=12;
    if($age<12)
        $dis=10;
    elseif ($age<18){
        $dis=25;
    }
    elseif ($age>65){
        $dis=25;
    }
    $price=$price-(($dis/100)*$price);
    $check="yes";
    if($check=="yes")
        $price=$price-((10/100)*$price);
    echo "Output of the form <br> Age: $age <br> Member: $check <br> Final Ticket Price: £".number_format($price,2);
    echo"<hr>";
    echo"<h3><u>Arrays</u></h3><h4><u>Simple Arrays</u></h4>";
    $products=['t-shirt','cup','mug'];
    print_r($products);
    echo "<br>";
    $products[1]="shirt";
    print_r($products);
    echo "<br>";
    $products[]='skirt';
    print_r($products);
    echo"<br>";
    echo"<u>Items in my products array</u><br>";
    echo"The item at index [2] is: $products[2]<br>";
    echo"The item at index [3] is: $products[3]";
    echo"<h4><u>Associative Arrays</u></h4>";
    $customer=['CustID'=>12, 'CustName'=>'Sarah', 'CustAge'=>23, 'CustGender'=>'F'];
    print_r($customer);
    echo "<br>";
    $customer['CustAge']=32;
    $customer['CustEmail']="sarah@gmail.com";
    print_r($customer);
    echo"<br><u>Items in my customer array</u><br>";
    echo "The item at index [CustName] is: ".$customer['CustName']."<br>";
    echo "The item at index [CustEmail]  is: ".$customer['CustEmail']."<br>";
    echo"<h4><u> Multi-Dimensional Arrays</u></h4>";
    $stock=['id1'=>[
        "description"=>"t-shirt",
        "price"=>9.99,
        "stock"=>100,
        "color"=>['blue','green','red']
    ],
        'id2'=>[
        "description"=>"cap",
        "price"=>4.99,
        "stock"=>50,
        "color"=>['blue','black','grey']
    ],
        'id3'=>[
            "description"=>"mug",
            "price"=>6.99,
            "stock"=>30,
            "color"=>['yellow','green','pick']
        ]
    ];
    echo"<u>This is my order:</u><br>";
    echo $stock['id1']["color"][1]." ".$stock['id1']['description']."<br>Price: £".$stock['id1']['price']."<br>";
    echo $stock['id2']["color"][2]." ".$stock['id2']['description']."<br>Price: £".$stock['id2']['price'];
    echo"<hr>";
    echo"<h3><u> Loops</u></h3>";
    echo"<h4><u>While Loops</u></h4>";
    $counter=1;
    while ($counter<6){
        echo 'Count: '.$counter.'<br />';
        $counter++;
    }
    $shirtPrice=9.99;
    $counter=1;
    echo'<table class="center2" border: "1|0">';
    echo "<th>Quantity</th>";
    echo "<th>Price</th>";
    while($counter<10){
        $total=$counter*$shirtPrice;
        echo"<tr>";
        echo"<td>";
        echo$counter.".</td>";
        echo"<td>"."£".$total."<br></td>";
        $counter++;
    }
    echo "</table><hr>";
    echo"<h3><u>For Loops</u></h3>";
    $names =['Rakshya',"Pramudita","Peter","Simon","Lara"];
    for($i=0;$i<count($names);$i++){
        echo $names[$i] .'<br />';
    }
    echo"<h3><u>For Each Loops</u></h3>";
    $names=Array ("Rakshya" => "C7227218"  ,
        "Gita" => "C7227220"  ,
        "Sita"=>"C7227219" ,
        "Ram"=> "C7227229" ,
         "Peter"=> "C7227217" );
    foreach ($names as $key=>$value){
        echo"Name: ".$key." ID: ".$value."<br>";
    }
    echo "<hr>";
    $city=array('Peter'=>'LEEDS','Kat'=>'bradford','Laura'=>'wakeFIeld');
    print_r($city);
    echo"<br>";
    $new=[];
    foreach ($city as $key=>$value){
        $new[$key]=ucfirst(strtolower($value));
    }
    print_r($new);
    echo"<hr>";
    echo"<h3><u>Some Useful Functions</u></h3>";
    $password="password   ";
    $password=trim($password);
    $password=htmlentities($password);
    echo "Password is: $password <br>";
    if(isset($password) && !empty($password)){
        if(strlen($password)>=6 and strlen($password)<=8){
            if(is_numeric($password)){
                echo "Password cannot be a number";
            }
            else{
                $enc=sha1($password);
                echo"The password is Ok<br>";
                echo "Encypted password: $enc";

            }
        }
        else{
            echo"Your password must be between 6 and 8 characters in length";
        }

    }
    else{
        echo"Please enter a password";
    }
    ?>
</section>
<footer>
    <small> <a href="../watIndex.html">Home</a></small>
</footer>
</body>
</html>