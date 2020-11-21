<?php 
session_start();
include "dbconfiguration.php";
if(verifyuser())
{
$emailid=$_SESSION['semail'];
$query="select * from user where emailid='$emailid'";
$recieve=my_select($query);
if($row=mysqli_fetch_array($recieve))
{
$First_name=$row[0];
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
include "header.php"; 
?>
<style>
th{
    color:brown;
    }
td{
    color:blue; 
    font-weight:bold;
    }
</style>
</head>
<body>
<?php 
include "navigation2.php";
echo "<br><br><br><div><b>&nbsp;Welcome</b><b style='text-transform:capitalize; color:blue'>$First_name</b></div>";
?>

<div class="container" style="margin-top:70px">
<h2 class="text-center" style="font-family:'cooper' ; color:#C04000; font-weight:bold">User Profile</h2>
<hr>
<br>
<table class="table table-hover table-borderless">
<tr>
<th>User_Name</th>
<td><?php echo $username ?></td>
</tr>
<tr>
<th>Email ID</th>
<td><?php echo $emailid ?></td>
</tr>
<tr>
<th>Contact</th>
<td><?php echo $contact ?></td>
</tr>
</table>
<a href="editprofile.php" class="btn btn-warning"><b>Edit Profile</b></a>
</div>
</body>
</html>