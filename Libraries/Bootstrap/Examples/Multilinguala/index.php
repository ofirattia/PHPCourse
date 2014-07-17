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

//if the form is submitted
if(isset($_POST['submitted'])) {
	
	// require name
	if(trim($_POST['contactName']) === '') {
		$nameError =  $nameErrorMessage; 
		$onError = true;
	} else {
		$name = trim($_POST['contactName']);
	}
	
	// check if mail is valid
	if(trim($_POST['email']) === '')  {
		$emailError = $emailErrorMessage;
		$onError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = $invalidEmailMessage;
		$onError = true;
	} else {
		$email = trim($_POST['email']);
	}
		
	// message required
	if(trim($_POST['comments']) === '') {
		$commentError = $commentErrorMessage;
		$onError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}
		
	//send the mail if there is no errors
	if(!isset($onError)) {
		
		$emailTo = 'YOUR MAIL';
		$subject = $messageFrom.' - '.$name;
		$sendCopy = trim($_POST['sendCopy']);
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: ' .' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
        
         // boolean variable to the html part after submit
		$emailSent = true;
	}
}
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
	var url='index.php?lng='+$(this).attr('data-value');
	$(location).attr('href',url);
  
});
</script>

</head>

<body >
<div id="wrapper">
<div class="row">
          <div class="col-lg-1">

           
    <!-- contactForm -->
	<div id="contact" >
		
		
	        <?php if(isset($emailSent) && $emailSent == true) { ?>
                <p class="info "><?php echo $sentMessage; ?></p>
            <?php } else { ?>
            
				<div class="desc">
					<h3><?php echo $contactHeader; ?></h3><div id="denotes" class="red"><?php echo $denotesHeader;?></div><br>
					<hr>
					<p class="desc"><?php echo $descriptionMessage; ?></p>
				</div>
				
				<div id="contact-form">
					<?php if(isset($onError)  ) { ?>
                        <p class="alert"><?php echo $errorSubmitMessage; ?></p>
                    <?php } ?>
				
					<form id="contact-us" action="" method="post" role="form" style="margin:10px;">
						<div class="contactForm">
						<div class="form-group">
							<label ><span class="red">*</span><?php echo $nameHeader; ?></label>
							<input type="text" class="form-control" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="txt requiredField " placeholder="Jake" />
							<?php if($nameError != '') { ?>
								<br /><span class="red"><?php echo $nameError;?></span> 
							<?php } ?>
						</div>
						<div class="form-group">
							<label ><span class="red">*</span><?php echo $emailHeader; ?></label>
							<input type="text" class="form-control" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="txt requiredField email" placeholder="Jake@yourmail.com" />
							<?php if($emailError != '') { ?>
								<br /><span class="red"><?php echo $emailError;?></span>
							<?php } ?>
						</div>
						<div class="form-group">
							<label ><span class="red">*</span><?php echo $messageHeader; ?></label>
							 <textarea  class="form-control" name="comments" id="commentsText" class="txtarea requiredField" ><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
							<?php if($commentError != '') { ?>
								<br /><span class="red"><?php echo $commentError;?></span> 
							<?php } ?>
						</div>
						</div>
                        <div class="form-group">
							<button name="submit" type="submit" class="btn btn-success"><?php echo $submitHeader; ?></button>
							<input type="hidden" name="submitted" id="submitted" value="true" />
						</div>
					</form>	
					<p id="additionalDetails"><?php echo $additionalDetails;?></p>	
					
				</div>
				<iframe width="300" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="margin:10px;" id="map" src="https://maps.google.com/maps?q=<?php echo $addressDetails;?>&z=17&output=embed"></iframe><br />
			<?php } ?>
		
					</form>

				</div>
         

          </div>
        </div><!-- /.row -->
    </div>

<a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="רישיון Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png" /></a><br />היצירה <span xmlns:dct="http://purl.org/dc/terms/" href="http://purl.org/dc/dcmitype/InteractiveResource" property="dct:title" rel="dct:type">Multilinguala</span> של <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">Ofir Attia</span> מוצעת תחת <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">רישיון ייחוס-שימוש לא מסחרי 4.0 בין־לאומי של Creative Commons</a>.

</body>
</html>