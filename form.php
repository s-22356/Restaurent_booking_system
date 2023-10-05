<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RESTAURENT_BOOKING_TABLE</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
	<table border="1">
		<tr>
			<td colspan="2"><h1>Restaurents Booking Table</h1></td>
		</tr>
	<td>Name</td>
		<td><input type="text" id="name"></td>
	</tr>
	<tr>
		<td>Enter Address</td>
		<td><input type="text" id="address"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="email" id="email"></td>
	</tr>
	<tr>
		<td>Place</td>
		<td>AC <input type="radio" name="g1" value="AC">&nbsp&nbsp NON AC<input type="radio" name="g1" value="NONAC"></td>
	</tr>
<tr>
	<td>Food Items</td>
	<td align="center"><select id="F1">
		<option>select</option>
		<option value="Biriyani">Biriyani</option>
		<option value="Mutton">Mutton</option>
		<option  value="Roll">Roll</option>
		<option value="Tandori">Tandori</option></select></td>
</tr>
<tr>
	<td>Password</td>
	<td><input type="password" id="password"></td>
</tr>
<tr>
	<td>Person</td>
	<td><input type="checkbox" name="p1[]" value="1">1
		<input type="checkbox" name="p1[]" value="2">2
		<input type="checkbox" name="p1[]" value="3">3</td>
</tr>
<tr>
	<td>UploadImage</td>
	<td><input type="file" name="uploadimage"></td>
</tr>

<tr>
<td>Extra</td>
<td><input type="checkbox" name="e1[]" value="cola">cola
<input type="checkbox" name="e1[]" value="icecream">icecream
<input type="checkbox" name="e1[]" value="juice">juice</td>
</tr>
<tr>
	<td align="center"><input type="submit" id="submit" value="submit">&nbsp&nbsp<input type="reset" id="reset"></td>
</tr>

</table>
<div id="h1"></div>
<script type="text/javascript">
	$("document").ready(function(){
		$("#submit").click(function(){
			  var nme=$("#name").val();
				var add=$("#address").val();
				var eml=$("#email").val();
				var plc=$("input[name='g1']:checked").val();
				var food=$("#F1").val();
				var per=[];
				$.each($("input[name='p1[]']:checked"),function(){
					per.push($(this).val());
				});
				var person=per.join(",");

				var ex=[];
				$.each($("input[name='e1[]']:checked"),function(){
					ex.push($(this).val());
				});
				var extra=ex.join(",");
				
				var uploadimage=$("input[name='uploadimage']")[0].files[0];
				
				var pass=$("#password").val();
				// /document.write(add);
				// document.write(person);
				// 	die();
				var formdata=new FormData();
			formdata.append("name",nme);
			formdata.append("address",add);
			formdata.append("email",eml);
			formdata.append("place",plc);
			formdata.append("fooditm",food);
			formdata.append("per",person);
      		formdata.append("password",pass);
      		formdata.append("extra",extra);
			formdata.append("Image",uploadimage);
			
			$.ajax({
				type:"post",
				url:"formaction.php",
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