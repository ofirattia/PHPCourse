<?php 
session_start(); 
include_once("config.php");

if(isset($_GET["logout"]) && $_GET["logout"]==1)
{
	//User clicked logout button, distroy all session variables.
	session_destroy();
	echo "Not Logged in.";
	header("Location: index.php","_top");
}
?>
<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="en-gb" lang="en-gb" >
<head>
<!-- Call jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrapLTR.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<title>Login</title> 

</head> 

<title>Facebook Login </title>
<script>
 function AjaxResponse()
 {
	 var myData = 'connect=1'; // pass a post variable, Check process_facebook.php
	 jQuery.ajax({
	 type: "POST",
	 url: "process_facebook.php",
	 dataType: 'html',
	 data:myData,
	 success:function(response){
		console.log(response);
		window.open('index.php','_top');
	 },
	 error:function (xhr, ajaxOptions, thrownError){
		console.log("error");
 	}
 });
 }
 
function LodingAnimate() //Show loading Image
	{
		$("#LoginButton").hide(); //hide login button once user authorize the application
		$("#pgrs").show();
		var valeur = 100;
		$('.progress-bar').css('width', valeur+'%').attr('aria-valuenow', valeur);	
		//for(var i=45;i<100;i++){
		//	
		//	$("#results").html('<div class="progress"><div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="'+i+'" aria-valuemin="0" aria-valuemax="100" style="width: '+i+'%"><span class="sr-only">100% Complete</span></div></div>');
			
		//}
	}

function ResetAnimate() //Reset User button
{
	$("#LoginButton").show(); //Show login button 
	$("#results").html(''); //reset element html
}

 </script>
</head>
<body>
<center><h1>Login Page - PHP Course </h1></center>


		<?php
		if( isset($_GET['error']))
		{
		echo '<li style="color:red;"><center>'.$_GET['error'].'</center></li>';

		}
		?>

	


	
	<?php
	if(!isset($_SESSION['logged_in']))
	{
	?>
		<div id="results"> </div>
		<center>
		<div style="margin-top:100px;">
			<button id="LoginButton" class="btn btn-primary" style="width:500px;height:80px;" onclick="javascript:CallAfterLogin();"><div  onlogin="javascript:CallAfterLogin();" size="medium" scope="<?php echo $fbPermissions; ?>">Connect With Facebook</div></button>
		    <div class="progress progress-striped active" id="pgrs" style="width:300px;margin-top:10px;display:none;">
				<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
				</div>
			</div>
		</div>
		</center>
	<?php
	}
	else
	{
		echo "<center>Logged in.";
		echo '<img src="https://graph.facebook.com/'.$_SESSION['uid'].'/picture" style="border:1px solid;"/>
			 <h3>'.$_SESSION['fullname'].'</h3>
			 <p><b></b></p>';
		echo '<a href="index.php?logout=1" class="btn btn-warning">Log Out</a></center>';
	}
?>

<div id="fb-root"></div>


<!--Content end-->




<script type="text/javascript">
window.fbAsyncInit = function() {
FB.init({appId: '<?php echo $appId; ?>',cookie: true,xfbml: true,channelUrl: '<?php echo $return_url; ?>channel.php',oauth: true});};
(function() {var e = document.createElement('script');
e.async = true;e.src = document.location.protocol +'//connect.facebook.net/en_US/all.js';
document.getElementById('fb-root').appendChild(e);}());

function CallAfterLogin(){
		FB.login(function(response) {		
		if (response.status === "connected") 
		{
			LodingAnimate(); //Animate login
			FB.api('/me', function(data) {
			  
					AjaxResponse();
			
		  });
		 }
	});
}

</script>
<center>
	<div style="bottom:0px;position:absolute;margin-left:25%;">
		<a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/" ><img alt="רישיון Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/80x15.png" /></a><br />היצירה <span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Facebook Login</span> של <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">Ofir Attia</span> מוצעת תחת <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">רישיון ייחוס-שימוש לא מסחרי 4.0 בין־לאומי של Creative Commons</a>.
	</div>
</center>
</body>
</html>