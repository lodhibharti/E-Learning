<?php
$dbserver="127.0.0.1";	//localhost
$dbuser="root";
$dbpassword="";
$dbname="elearningsite";


function my_iud($query) //insert , update , delete
{
global $dbserver,$dbuser,$dbpassword,$dbname;
$connection_id=mysqli_connect($dbserver,$dbuser,$dbpassword,$dbname) or die("connection failed");

//mysqli_select_db($dbname,$cid);
mysqli_query($connection_id,$query);
$a=mysqli_affected_rows($connection_id);
mysqli_close($connection_id);
return $a;
}


function my_select($query)
{
global $dbserver,$dbuser,$dbpassword,$dbname;
$connection_id=mysqli_connect($dbserver,$dbuser,$dbpassword,$dbname) or die("connection failed");
//mysql_select_db($dbname,$cid);
$recieve=mysqli_query($connection_id,$query);
mysqli_close($connection_id);
return $recieve;
}

//to be used when sql query returns a single value
function my_one($query)
{
global $dbserver,$dbuser,$dbpassword,$dbname;
$connection_id=mysqli_connect($dbserver,$dbuser,$dbpassword,$dbname) or die("connection failed");
//mysqli_select_db($dbname,$connection_id);
$recieve=mysqli_query($connection_id,$query);
$row=mysqli_fetch_array($recieve);
mysqli_close($connection_id);
return $row;
}


function verifyusers()
{
$user_name="";
$password="";
if(isset($_COOKIE['cemail']) && isset($_COOKIE['cpassword']))
{
$user_name=$_COOKIE['cemail'];
$password=$_COOKIE['cpassword'];
}
else
{
if(isset($_SESSION['semail']) && isset($_SESSION['spassword']))
{
$u=$_SESSION['semail'];
$p=$_SESSION['spassword'];
}
}

$query="select count(*) from users where emailid='$user_name' and password='$password'";
$b=my_one($query);
if($b==1)
{
return true;
}
else
{
return false;
}
}

?>