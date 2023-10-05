<?php 
session_start();
include("connection.php");
$email=$_REQUEST["email"];
$password=md5($_REQUEST["password"]);
$sql="SELECT * FROM `rbs` WHERE email='$email' AND password='$password'";
$data=mysqli_query($conn,$sql);
$total=mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data);
if($total)
{
	// echo "login successful";
	$_SESSION["id"]=$result["user_id"];
	header("location:display.php");
}
else
{
	echo "login failure";
}
?>