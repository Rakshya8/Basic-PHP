<?php
echo "<center><h1> Rakshya Lama Moktan </h1> <br><h1><u>Student id: </u> <strong>C7227218</strong></h1></center><hr style='border-top: 4px solid red;'/>";
echo "<center><h2><strong><u>Using Escape Characters</u></strong></h2></center>";
echo '<center>"most programmers say it’s better <br> to use ‘echo’ rather than ‘print’” says who?</center><hr/>';
echo "<center><h2><strong><u>Variables</u></strong></h2> </center>";
$name ='David';
$age=12;
echo "<div style='text-align: center;'>";
echo "Hi my name is ".$name.' I am  '.$age.' years old.<br>';
echo "Mi nombre es $name y tengo $age anos de edad.";
echo "</div><hr/>";
echo "<center><h2><strong><u>Functions</u></strong></h2> </center>";
//gettype()returns..
echo "<div style='text-align: center;'>";
echo gettype($name);
echo '<br />';
//strlen() returns..
echo strlen($name);
echo '<br />';
//strtoUpper()returns..
echo strtoUpper($name);
echo "</div><hr/>";
echo "<center><h2><strong><u>Arithemetic</u></strong></h2> </center>";
$num=9;
$num2=12;
echo "<div style='display: flex;
  justify-content: center;'>";
echo "num1= $num<br>";
echo "num2= $num2<br>";
echo"num1*num2=".($num*$num2)."<br>";
echo"num1 as percentage of num2= ".($num/$num2)*100;
echo "<br>num2 divided by num1= ".floor($num2/$num)." remainder ".$num2%$num;
echo "</div>";
echo "<hr>";
$height=1.8;
echo "<div style='display: flex;
  justify-content: center;'>";
$i=(($height*100)/2.54);
$f=floor($i/12);
$rem=$i%12;
$i=round($i,2);
echo "Name: $name <br> Age: $age <br> Height in Meters: $height <br>Height in Feet and inches: ". $f."ft ".($rem)."inches";
echo "</div>";
echo "<hr>";
?>
