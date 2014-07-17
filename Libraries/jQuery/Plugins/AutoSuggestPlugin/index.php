<html>
<head>
	<title>Auto Suggest</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
	<link href="css/style.css" rel="stylesheet">
	<script type='text/javascript' src="js/jquery.min.js"></script>
	<script type='text/javascript' src="js/autoSuggest.js"></script>
</head>

<body>

		<div class="wrap">
				<input type="text" class="search" id="searchField" placeholder="Start Typing..."/>
		</div>

<script>
$('#searchField').autoSuggest({url:'data/data.php'});
</script>

</body>
</html>