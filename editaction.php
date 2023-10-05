<?php
session_start();
include("connection.php");
$id= $_REQUEST["uid"];
$nme=$_REQUEST["name"];
$addr=$_REQUEST["address"];
$place=$_REQUEST["place"];
$fooditem=$_REQUEST["fooditm"];
$person=$_REQUEST["per"];
$filename=$_FILES["Image"]["name"];
$tmpname=$_FILES["Image"]["tmp_name"];
$folder="images/".$filename;
move_uploaded_file($tmpname,$folder);
// echo "<img src='$folder' hight='100' width='100'>";
$oldimage=$_SESSION["oldimgpath"];

if($folder=="images/")
{
	$sql="UPDATE `rbs` SET `user_id`='$id',`name`='$nme',`address`='$addr',`place`='$place',`fooditm`='$fooditem',`person`='$person',`picsource`='$oldimage' WHERE user_id='$id'";
	$data= mysqli_query($conn,$sql);
	if($data)
	{
		// echo "Insert Data Successfully";
		// header("location:display.php");
		echo "updated successful";
		echo "<script>window.location.href='display.php'</script>";
		
	}
	else
	{
		echo "Not Updated";	
	}
}
else
{
	$sql="UPDATE `rbs` SET `user_id`='$id',`name`='$nme',`address`='$addr',`place`='$place',`fooditm`='$fooditem',`person`='$person',`picsource`='$folder' WHERE user_id='$id'";
	$data=mysqli_query($conn,$sql);
	if($data)
	{
		// echo "cnncteed";

		echo "<script>alert('updated successful')</script>";
		echo "<script>window.location.href='display.php'</script>";
		
	}
	else
	{
		echo "not connected";
	}
}
?>