<?php 
session_start();
include("connection.php");
$id=$_SESSION["id"];
$sql="SELECT * FROM `rbs` WHERE user_id='$id' AND client='user'";
$data=mysqli_query($conn,$sql);
$value=mysqli_num_rows($data);
if($value)
{
	?>
		<table border="1" align="center">
	<tr>
		<th>Sr no.</th>
		<th>Name</th>
		<th>Address</th>
		<th>Email</th>
		<th>Place</th>
		<th>Fooditm</th>
		<th>person</th>
		<th>Password</th>
		<th>Extras</th>
		<th>picsource</th>
		<th colspan="3">Action</th>
	</tr>
<?php 
	$i=1;
	while($result=mysqli_fetch_assoc($data))
	{

		?>
			<tr>
			<td><?php echo $i;$i++ ?></td>
			<td><?php echo $result["name"] ?></td>
			<td><?php echo $result["address"] ?></td>
			<td><?php echo $result["email"] ?></td>
			<td><?php echo $result["place"] ?></td>
			<td><?php echo $result["fooditm"] ?></td>
			<td><?php echo $result["person"] ?></td>
			<td><?php echo $result["password"] ?></td>
			<td><?php echo $result["extras"];?></td>
			<td><img src='<?php echo $result["picsource"] ?>' width='50' height='50'></td>
			<td><button class="i1"><a href="edit.php?ep=<?php echo $result['user_id']?>">edit</a></button></td>
			<td><button class="i3"><a href="logout.php">logout</a></button></td>
			</tr>
		<?php 
	}
?>
</table>

	<?php 

}
else
{
	$sql1="SELECT * FROM `rbs`";
	$data1=mysqli_query($conn,$sql1);
	?>
	<table border="1" align="center">
	<tr>
		<th>Sr no.</th>
		<th>Name</th>
		<th>Address</th>
		<th>Email</th>
		<th>Place</th>
		<th>Fooditm</th>
		<th>person</th>
		<th>Password</th>
		<th>Extras</th>
		<th>picsource</th>
		<th colspan="3">Action</th>
	</tr>
<?php 
	$i=1;
	while($result=mysqli_fetch_assoc($data1))
	{

		?>
			<tr>
			<td><?php echo $i;$i++ ?></td>
			<td><?php echo $result["name"] ?></td>
			<td><?php echo $result["address"] ?></td>
			<td><?php echo $result["email"] ?></td>
			<td><?php echo $result["place"] ?></td>
			<td><?php echo $result["fooditm"] ?></td>
			<td><?php echo $result["person"] ?></td>
			<td><?php echo $result["password"] ?></td>
			<td><?php echo $result["extras"];?></td>
			<td><img src='<?php echo $result["picsource"] ?>' width='50' height='50'></td>
			<td><button class="i1"><a href="edit.php?ep=<?php echo $result['user_id']?>">edit</a></button></td>
			<td><button class="i3"><a href="logout.php">logout</a></button></td>
			</tr>
		<?php 
	}
?>
</table>
	<?php 
}
?>

