<?php
//Make connection to database
include 'connection.php';
//Display heading
echo "<div style='border: 2px solid red; width:800px; padding: 30px; align-items: center; display: inline-block; margin: auto'>";
echo '<h2>Select ALL from the Customer Table</h2>';
//run query to select all records from customer table
$query="SELECT * FROM cutomer";
//store the result of the query in a variable called $result
$result=mysqli_query($connection, $query);
//Use a while loop to iterate through your $result array and display
//the first name, last name and email for each record
while ($row =mysqli_fetch_assoc($result)){
    echo $row['FirstName'].' '.$row['LastName'].' '.$row['Email'].' '.$row['Age'].'<br />';
}
echo '<h2>Select ALL from the Customer Table with Age>22</h2>';
$query="SELECT * FROM cutomer where age>22";
//store the result of the query in a variable called $result
$result=mysqli_query($connection, $query);
//Use a while loop to iterate through your $result array and display
//the first name, last name and email for each record
while ($row=mysqli_fetch_assoc($result)){
    echo $row['FirstName'].' '.$row['LastName'].' '.$row['Email'].' '.$row['Age'].'<br />';
}
echo '<h2>Select Females from the Customer Table with Age>=22</h2>';
$query="SELECT * FROM cutomer where age>=22 and gender='F'";
//store the result of the query in a variable called $result
$result=mysqli_query($connection, $query);
//Use a while loop to iterate through your $result array and display
//the first name, last name and email for each record
while ($row=mysqli_fetch_assoc($result)){
    echo $row['FirstName'].' '.$row['LastName'].' '.$row['Email'].' '.$row['Age'].'<br />';
}
echo '<h2>Select Males from the Customer Table list by age descending</h2>';
$query="SELECT * FROM cutomer where gender='M' order by age desc ";
//store the result of the query in a variable called $result
$result=mysqli_query($connection, $query);
//Use a while loop to iterate through your $result array and display
//the first name, last name and email for each record
while ($row=mysqli_fetch_assoc($result)){
    echo $row['FirstName'].' '.$row['LastName'].' '.$row['Email'].' '.$row['Age'].'<br />';
}
echo '<h2>Select All from the Customer Table with "a" in the first name</h2>';
$query="SELECT * FROM cutomer where firstname like '%A%' or 'A%' or '%A' ";
//store the result of the query in a variable called $result
$result=mysqli_query($connection, $query);
//Use a while loop to iterate through your $result array and display
//the first name, last name and email for each record
while ($row=mysqli_fetch_assoc($result)){
    echo $row['FirstName'].' '.$row['LastName'].' '.$row['Email'].' '.$row['Age'].'<br />';
}
echo "</div>";
?>

