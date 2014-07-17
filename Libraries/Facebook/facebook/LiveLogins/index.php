<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="en-gb" lang="en-gb" >
<head>
<!-- Call jQuery -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrapLTR.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<title>Facebook Live Logins </title>
	<script>
	setInterval(function() {
		
		$.get( "data.php", function( data ) {
			
			var users = data.split(",");
				users.forEach(function(entry) {
				if($("#users:has(img."+entry+")").length <= 0){
					console.log("img not found");
					$("#users").append('<img src="https://graph.facebook.com/'+entry+'/picture" class="'+entry+'" style="border:1px solid;"/>');
				}else{
					console.log("img found");
				}
			});
		});
	}, 5000); 
	</script>
</head> 
<body>
<div id="users">

</div>
</body>
</html>
