<?php
include("connection.php");
$nme=$_REQUEST["name"];
$addr=$_REQUEST["address"];
$eml=$_REQUEST["email"];
$place=$_REQUEST["place"];
$fooditem=$_REQUEST["fooditm"];
$password=md5($_REQUEST["password"]);
$person=$_REQUEST["per"];
$extra=$_REQUEST["extra"];
$filename=$_FILES["Image"]["name"];
$tmpname=$_FILES["Image"]["tmp_name"];
$folder="images/".$filename;
move_uploaded_file($tmpname,$folder);
$sql1="SELECT * FROM `rbs` WHERE email='$eml'";
$data1=mysqli_query($conn,$sql1);
$value1=mysqli_num_rows($data1);

if($value1)
{
	echo "email id already exist";
}
else
{
// echo "$nme";
// echo "$addr";
// echo "$fooditem";
// echo "$password";
// echo "$person";
// echo "$place";
// echo "$eml";
// print_r($folder);
// die();

	$sql="INSERT INTO `rbs`(`user_id`, `name`, `address`, `email`, `place`, `fooditm`, `person`, `password`,`extras`, `picsource`,`client`) VALUES ('','$nme','$addr','$eml','$place','$fooditem','$person','$password','$extra','$folder','user')";
	$data=mysqli_query($conn,$sql);
	if($data)
	{
		echo "<script>alert('INSERTED SUCCESSFULLY')</script>";
		echo "<script>window.location.href='login.php'</script>";
	}	
	else
	{
		echo "Not Inserted";
	}

}
?>