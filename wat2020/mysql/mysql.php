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

<form method="post" action="insertRecord.php" style="border: 2px solid black; width: 400px">
    <table cellpadding="10">
        <tr>
            <td width="120px">
                First Name:
            </td>
            <td width="120px">
                <input type="text" name="fname">
            </td>
        </tr>
            <tr>
            <td width="120px">
                Last Name:
            </td>
                <td width="120px">
                    <input type="text" name="lname">
                </td>
        </tr>
        <tr>
            <td width="120px">
                Email:
            </td>
            <td width="120px">
                <input type="email" name="email">
            </td>
        </tr>
            <tr>
            <td width="120px">
                Password:
            </td>
                <td width="120px">
                    <input type="password" name="password">
                </td>
        </tr>
        <tr>
            <td width="120px">
                <label for="gender">Gender:</label>
            </td>
            <td>

                <select name="gender" id="gender">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </td>
        </tr>
        <tr>
            <td width="120px">
                Age:
            </td>
            <td width="120px">
                <input type="number" name="age">
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btnSubmit"></td>
        </tr>
    </table>

</form>
<?php
echo"<br>";
include 'selectRecord.php';
?>
</section>
</body>
</html>
