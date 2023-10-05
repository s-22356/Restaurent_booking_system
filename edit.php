<?php  
session_start();
include("connection.php");
$id=$_REQUEST["ep"];
// echo $id;
// die();
$sql="SELECT * FROM `rbs` WHERE user_id='$id'";
$data=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($data);
$_SESSION["oldimgpath"]=$result["picsource"];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RESTAURENT_BOOKING_TABLE</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
	<table border="1" id="r1">
		<tr>
			<td colspan="2"><h1>Restaurents Booking Table</h1></td>
		</tr>
	<td>Name</td>
		<td><input type="text" id="name" value="<?php echo $result["name"]?>"></td>
	</tr>
	<input type="text" id="uid" value="<?php echo $id;?>" hidden></td>
	<tr>
		<td>Enter Address</td>
		<td><input type="text" id="address" value="<?php echo $result["address"]?>"></td>
	</tr>
	<tr>
		<td>Place</td>
		<td>AC <input type="radio" name="g1" value="AC"<?php if($result['place']=='AC'){echo "checked";} ?>>&nbsp&nbsp NON AC<input type="radio" name="g1" value="NONAC"<?php if($result['place']=='NONAC'){echo "checked";} ?>></td>
	</tr>
<tr>
	<td>Food Items</td>
	<td align="center"><select id="F1">
		<option>select</option>
		<option value="Biriyani"<?php if($result['fooditm']=='Biriyani'){echo "selected";}?>>Biriyani</option>
		<option value="Mutton"<?php if($result['fooditm']=='Mutton'){echo "selected";}?>>Mutton</option>
		<option  value="Roll"<?php if($result['fooditm']=='Roll'){echo "selected";}?>>Roll</option>
		<option value="Tandori"<?php if($result['fooditm']=='Tandori'){echo "selected";}?>>Tandori</option></select></td>
</tr>
<?php
	$personarray=explode(",", $result['person']);
?>
<tr>
	<td>Person</td>
	<td><input type="checkbox" name="p1[]" value="1" <?php if(in_array("1",$personarray))
		{
			echo "checked";

		}   ?> >1
		<input type="checkbox" name="p1[]" value="2" <?php if(in_array("2",$personarray))
		{
			echo "checked";

		}   ?> >2
		<input type="checkbox" name="p1[]" value="3" <?php if(in_array("3",$personarray))
		{
			echo "checked";

		}   ?> >3</td>
</tr>

<tr>
	<td>UploadImage</td>
	<td><input type="file" name="uploadimage" value="<?php echo $result["picsource"] ?>"><img src="<?php echo $result["picsource"]?>" height="50" width="50"></td>
</tr>
<tr>
	<td align="center"><input type="submit" id="submit" value="submit">
</tr>

</table>
<div id="h1"></div>
<script type="text/javascript">
	$("document").ready(function(){
		$("#submit").click(function(){
			  var nme=$("#name").val();
			  var id=$("#uid").val();
				var add=$("#address").val();
				var plc=$("input[name='g1']:checked").val();
				var food=$("#F1").val();
				var per=[];
				$.each($("input[name='p1[]']:checked"),function(){
					per.push($(this).val());
				});
				var person=per.join(",");
				var uploadimage=$("input[name='uploadimage']")[0].files[0];
				var pass=$("#password").val();
				// document.write(add);
				// document.write(nme,plc,food,person,pass);
				var formdata=new FormData();
			formdata.append("name",nme);
			formdata.append("uid",id)
			formdata.append("address",add);
			formdata.append("place",plc);
			formdata.append("fooditm",food);
			formdata.append("per",person);
      		formdata.append("password",pass);
      		
			formdata.append("Image",uploadimage);
			// $("#reset").click(function(){
			// 	$("#r1").reset();
			// });
			$.ajax({
				type:"post",
				url:"editaction.php",
				data:formdata,
				contentType:false,
				processData:false

			}).done(function(data){
					$("#h1").html(data);
			});
		});
	});
</script>
</body>
</html>