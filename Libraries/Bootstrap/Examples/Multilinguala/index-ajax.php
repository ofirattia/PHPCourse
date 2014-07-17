<?php 
error_reporting(E_ALL ^ E_NOTICE); // hide all basic notices from PHP
/* string function get string between two given strings */
function cutBetween($string, $start, $end){
    $sp = strpos($string, $start)+strlen($start);
    $ep = strpos($string, $end)-strlen($start);
    $data = trim(substr($string, $sp, $ep));
    return trim($data);
}
session_start();
if(isset($_GET['lng'])) {
    $_SESSION['lng'] = $_GET['lng'];
} 
if(!isset($_SESSION['lng'])) {
    $_SESSION['lng'] = 'us'; // default value
}
include('local/'.$_SESSION['lng'] . '.php'); // include lang file
$addressDetails = 'Wshington DC';  			// set your address for embbeded map

/* Drop Down Language List */
echo '<link href="css/flags.css" rel="stylesheet" type="text/css" />';

		
			/*              Jquery Part DropDown List Of Flags                           */
echo '<h2 id="nav">'.$chooseLangHeader.'</h2>';
echo '<ol class="select">';
$directory = "local/";
//get all image files with a .jpg extension.
$langFiles = glob($directory . "*.php");
//print each file name
foreach($langFiles as $lang)
		{
			$lng = cutBetween($lang,'local/','.php');
			echo '<li data-value="'.$lng.'" title="'.$lng.'" ><img class="flag flag-'.$lng.'"></li>';
		}
echo '</ol>';
echo '</form>';
/*                              END  -  Jquery Part DropDown List Of Flags                                   */


?>
<!DOCTYPE html>
<html>
<head> 
<title>Multilingual PHP Contact Form </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<!--- BOOTS CSS ---->
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/bootstrap<?php echo $dir; ?>.css" rel="stylesheet"/>
<link href="css/styles<?php echo $dir; ?>.css" rel="stylesheet" type="text/css" />

<meta http-equiv='Content-Type' content='Type=text/html; charset=utf-8'>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<script>
// making ol as select list
var nav = $('#nav');
var selection = $('.select');
var select = selection.find('li');

nav.click(function(event) {
    if (nav.hasClass('active')) {
        nav.removeClass('active');
        selection.stop().slideUp(200);
    } else {
        nav.addClass('active');
        selection.stop().slideDown(200);
    }
    event.preventDefault();
});

select.click(function(event) {
    // updated code to select the current language
    select.removeClass('active');
    $(this).addClass('active');
	var url='index-ajax.php?lng='+$(this).attr('data-value');
	$(location).attr('href',url);
  
});
</script>


<script>
			$(document).on('click', '#submit', function() { 
			var contactName = $('#contactName').val();
			var email = $('#email').val();
			var commentsText = $('#commentsText').val();
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if(contactName=='' )
				{
					
						$("#status")
						.addClass("warning")
						.html('<?php  echo  $nameErrorMessage; ?>')
						.fadeIn('fast')
						.delay(3000)
						.fadeOut('slow');
					return;
				}
			if(!regex.test(email))
				{
					
						$("#status")
						.addClass("warning")
						.html('<?php echo $invalidEmailMessage;?>')
						.fadeIn('fast')
						.delay(3000)
						.fadeOut('slow');
					return;
				}
			
			if(commentsText=='')
				{	
					
						$("#status")
						.addClass("warning")
						.html('<?php  echo  $commentErrorMessage; ?>')
						.fadeIn('fast')
						.delay(3000)
						.fadeOut('slow');
					return;
				}
						$.ajax({
								url: 'send.php',
								type: 'POST',
								data: {
								contactName: contactName,
								email: email,
								comments:commentsText,
								},	
								
								success:function (data) {
								
								if(data=='1'){
									$("#status")
									.addClass("success")
									.html('<?php  echo  $sentMessage; ?>')
									.fadeIn('fast')
									.delay(5000)
									.fadeOut('slow');
									/* 
										place your header,window.open action
									*/
									
								}
								else{
										
										$("#status")
										.addClass("error")
										.html('<?php  echo  $errorSubmitMessage; ?>')
										.fadeIn('fast')
										.delay(5000)
										.fadeOut('slow');
									}
							 }
						}); 
						
						});
</script>
</head>

<body >
<div id="wrapper">
<div class="row">
          <div class="col-lg-1">

           
    <!-- contactForm -->
	<div id="contact" >
		
		
	        
            
				<div class="desc">
					<h3><?php echo $contactHeader; ?></h3><div id="denotes" class="red"><?php echo $denotesHeader;?></div><br>
					<hr>
					<p class="desc"><?php echo $descriptionMessage; ?></p>
				</div>
				
				<div id="contact-form">
				<div id="status"></div>
				<div role="form" style="margin:10px;">
						<div class="contactForm">
						<div class="form-group">
							<label ><span class="red">*</span></i><?php echo $nameHeader; ?></label>
							<input type="text" class="form-control" name="contactName" id="contactName" value="" class="txt requiredField " placeholder="Jake" />
							
						</div>
						<div class="form-group">
							<label ><span class="red">*</span><?php echo $emailHeader; ?></label>
							<input type="text" class="form-control" name="email" id="email" value="" placeholder="Jake@yourmail.com" />
							
						</div>
						<div class="form-group">
							<label ><span class="red">*</span><?php echo $messageHeader; ?></label>
							 <textarea  class="form-control" name="comments" id="commentsText" class="txtarea requiredField" ></textarea>
							
						</div>
						</div>
                        <div class="form-group">
							<button name="submit" type="submit" id="submit" class="btn btn-success"><?php echo $submitHeader; ?></button>
							<input type="hidden" name="submitted" id="submitted" value="true" />
						</div>
					</div>	
					<p id="additionalDetails"><?php echo $additionalDetails;?></p>	
					
				</div>
				<iframe width="300" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="margin:10px;" id="map" src="https://maps.google.com/maps?q=<?php echo $addressDetails;?>&z=17&output=embed"></iframe><br />
			
		
					</form>

				</div>
         

          </div>
        </div><!-- /.row -->
    </div>



</body>
</html>