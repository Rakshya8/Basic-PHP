<center>

<form method="post" style="margin-top: 10%; border: 2px solid black; width: 200px">
    <h1>Register</h1>
    <label>Username</label>
    <input type="text" name="uname">
    <br>
    <label>Password</label>
    <input type="password" name="pwd">
    <br>
    <input type="submit" name="s" value="Submit" style="margin-top: 5%; margin-bottom: 5%">
</form>
</center>
<?php
Include('init.php');
if(isset($_POST['s'])){
  if(isset($_POST['uname'])&&!empty($_POST['uname'])){
      if(isset($_POST['pwd'])&&!empty($_POST['pwd'])){
          $uname=$_POST['uname'];
          $pwd=$_POST['pwd'];
          $sql="insert into users value(null,'$uname','$pwd')";
          echo $sql;
          if(mysqli_query($connection,$sql)){
              header('location:session.php');
          }
          else{
              echo mysqli_error($connection);
          }
      }
  }
}
?>
