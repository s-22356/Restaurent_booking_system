<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>abc</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
	enter email:<input type="email" id="email"><br>

	enter password:<input type="password" id="password"><br>
	<input type="submit" id="submit" value="submit">
	<a href="form.php">new registration</a>
	<div id="h1"></div>
	<script type="text/javascript">
	$("document").ready(function(){
		$("#submit").click(function(){
				var eml=$("#email").val();
				var pass=$("#password").val();
			$.ajax({
				type:"post",
				url:"loginaction.php",
				data:{email:eml,password:pass}

			}).done(function(data){
					$("#h1").html(data);
			});
		});
	});
</script>
</body>
</html>