<?php 
session_start();
include "dbconfiguration.php";
if(verifyuser())
{
$emailid=$_SESSION['semail'];
$query="select * from users where Email_id='$emailid'";
$recieve=my_select($query);
if($row=mysqli_fetch_array($recieve))
{
$First_name= $row[0];
$Contact=$row[5];
}
}
else
{
header("location:index.php");
}

?>
<html>
<head>
<?php 
include"header.php"; 
?>
<style>
th{
    color:brown;
    }
td{
    color:blue;
    font-weight:bold
    }
</style>
</head>
<body>
<?php 
include"navigation2.php";
echo "<br><br><br><div><b>&nbsp;Welcome</b><b style='text-transform:capitalize; color:blue'>$First_name</b></div>";
?>

<div class="container" style="margin-top:70px">
<h2 class="text-center" style="font-family:'Monotype Corsiva'; color:#C04000; font-weight:bold">Edit Profile</h2>
<hr>
<br>
<form method=post>
<div class="form-group">
<label><b>User_Name<b></label>
<input type=text class="form-control" name="username" value="<?php echo $username ?>">

<label><b>Email_ID</b></label>
<input type=email readonly class="form-control" value="<?php echo $emailid ?>">

<label><b>Contact</b></label>
<input type=text class="form-control" name="contact" value="<?php echo $contact ?>">
<br>
<input type=submit name="submit" value="Submit" class="btn btn-info form-control">
</div>
</div>
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
$username1 = $_POST['username'];
$contact1 = $_POST['contact'];

$query="update user set username='$username1',contact='$contact1' where emailid='$emailid'";
$n=my_iud($query);
if($n==1)
{
echo '<script>alert("Profile Updated Successfully");
window.location="userhome.php";
</script>';
}
else
{
echo '<script>alert("Something Went Wrong , Try Again")</script>';
}
}
?>