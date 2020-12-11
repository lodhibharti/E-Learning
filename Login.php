<html>
<head>
<?php 
include "Header.php";
?>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include "navigation1.php";
?>
<div class="container"style="margin-top:75px">
<h2 class="text-center" style="font-family:'cooper'; color:#C04000; font-weight:bold;">User Sign In</h2>
<hr>
<br>
<form method=post>
<div class="form-group">
<label><b>Email id</b></label>
<input type="email" name="emailid" class="form-control" placeholder="Enter your Name">
<label><b>Password</b></label>
<input type="password"name="password"class="form-control"placeholder="Enter your Password">
<br>
<input type="checkbox"name="rem"><b>Remember Me</b>
<br>
<input type="submit" name="submit" value="Login" class="btn btn-primary">
<a href="registration.php" class="btn btn-primary">SignUp</a>
</div>
</form>
</div>
</body>
</html>
<?php 
session_start();
include"dbconfiguration.php";
if(isset($_POST['submit']))
{
  $Email_id=$_POST['emailid'];
  $Password=$_POST['password'];

  echo $Email_id.$Password;

  if(isset($_POST['remember']))
  {
    $remember="yes";
  }
  else
  {
    $remember="no";
  }
   
  $query="select count(*) from users where Email_id='$Email_id' and Password='$Password';";
  
$a=my_one($query);
settype($a, "integer");
echo $a;

if($a==1)
{
  $_SESSION['semail']=$Email_id;
  $_SESSION['spassword']=$Password;

  $_SESSION['sun']=$Email_id;
  $_SESSION['spwd']=$Password;

  if($remember=='yes')
  {
    setcookie('cemail',$Email_id,time()+60*60*24*7);
    setcookie('cemail',$Password,time()+60*60*24*7);
  }
  header("location:userhome.php");
}
else
{
  echo'<script>alert("invalid login credentials,Try again")</script>';
}
}


if($a==1)
{
  echo'<script>alert("Login Done Successfully")</script>';
}
else{
  echo'<script>alert("invalid login credentials,Try again")</script>';
}

?>