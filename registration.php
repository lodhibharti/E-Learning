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

<div class="container" style="margin-top:75px">
<h1 class="text-center" style="font-family:'cooper'; color:#C04000; font-weight:bold;">User Registration</h1>
<hr>
<br>
<form method="post">
<div class="form-group">
<label><b>First_Name</b></label>
<input type="text" name="fname" class="form-control" placeholder="Enter your First Name Here">
<label><b>Last_Name</b></label>
<input type="text" name="lname" class="form-control" placeholder="Enter your Last Name Here">
<label><b>EmailID</b></label>
<input type="Email" name="Email" class="form-control" placeholder="Enter your EmailID Here">
<label><b>Password</b></label>
<input type="password" name="password" class="form-control" placeholder="Enter your Password">
<label><b>Confirm_Password</b></label>
<input type="password" name="cpassword" class="form-control" placeholder="Enter your Password">
<label><b>Contact</b></label>
<input type="text" name="contact" class="form-control" placeholder="Enter your Contact Number Here">
<label><b>City</b></label>
<input type="text" name="city" class="form-control" placeholder="Enter your city Here">
<label><b>Address</b></label>
<textarea name="address" class="form-control" placeholder="Enter your address Here"></textarea>
<br>
<label><b>Occupation</b></label>
<input type="text" name="occupation" class="form-control" placeholder="Enter here">
<br>
<label><b>Security Question</b></label>
 <select name="security_question">
 <option>What is your pet name</option>
 <option>What is your favorite food</option>
 <option>What is your first school name</option>
 <option>What is your nick name</option>
 <option>What is your favorite color</option>
</select>
<br>  
 <label><b>Answer</b></label>
<input type="text" name="ans" class="form-control" placeholder="Enter your answer here">
<br>
<input type="submit" name="submit" value="Ragister" class="btn btn-primary">
</div>
</form>
</div>
</body>
</html>
<?php
include"DBconfiguration.php";
if(isset($_POST['submit']))
{
 $First_name=$_POST['fname'];
 $Last_name=$_POST['lname'];
 $Email_id=$_POST['Email'];
 $Password=$_POST['password'];
 $Confirm_password=$_POST['cpassword'];
 $Contact=$_POST['contact'];
 $City=$_POST['city'];
 $Address=$_POST['address'];
 $Occupation=$_POST['occupation'];
 $Security_question=$_POST['security_question'];
 $query="select * from question";
 $recieve=my_select($query);
 while($row=mysqli_fetch_array($recieve))
 {
   echo"<option value='$row[0]'</option>";
 }
 $Answer=$_POST['ans'];
$a=my_iud($query);
if($a!=1)
{
  $query="insert into users values('$First_name','$Last_name','$Email_id','$Password','$Confirm_password','$Contact','$City','$Address','$Security_question','$Answer','$Occupation')";
  my_iud($query);
  echo'<script>alert("Ragistration Successfully Done");
  window.location="login.php";
  </script>';
}
else
{
    echo'<script>alert("Somthing went to wrong");</script>';
}
}
?>