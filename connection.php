<?php 
$servername="localhost";
$username="root";
$password="";
$db="mwf3to6";
$conn=mysqli_connect($servername,$username,$password,$db);
if($conn)
{
	// echo "connected";
}
else
{
	echo "not connected";
}

?>