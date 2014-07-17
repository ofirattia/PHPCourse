<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>התחברות למערכת טורס</title> 
<link rel="stylesheet"  href=" mobile/demos/css/themes/default/jquery.mobile-1.2.0.css" />  
	<link rel="stylesheet" href="mobile/demos/docs/_assets/css/jqm-docs.css"/>
	<script src="mobile/demos/js/jquery.js"></script>
	<script src="mobile/demos/docs/_assets/js/jqm-docs.js"></script>
	<script src="mobile/jquery.mobile-1.2.0.js"></script>
	<link rel="apple-touch-icon" href="iphone-icon.png" />
	<link rel="shortcut icon" href="favi.ico" type="image/x-icon" />
</head> 


<body> 

<div data-role="page" data-theme="b">

	<div data-role="header" data-theme="b" data-icon="home">
		<h1>דף התחברות</h1><a data-theme="b" href="" data-icon="home" data-role="button" rel="internal" data-iconpos="notext"></a>
	</div><!-- /header -->
<ul data-role="listview" data-inset="true" data-theme="e">
<?php
if( isset($_GET['error']))
{
echo '<li style="color:red;"><center>'.$_GET['error'].'</center></li>';

}
?>
</ul>
	
	<div data-role="content" data-theme="b">	
<!--Content start-->
				<div data-type="horizontal" data-role="controlgroup" class="ui-corner-all ui-controlgroup ui-controlgroup-horizontal">
					<center><a href="mailto:ofirattia@gmail.com" data-inline="true" data-role="button" data-icon="info" href="#" data-theme="c" class="ui-btn ui-btn-inline ui-btn-icon-left ui-corner-left ui-btn-up-c"><span class="ui-btn-inner ui-corner-left"><span class="ui-btn-text">צור קשר</span><span class="ui-icon ui-icon-gear ui-icon-shadow"></span></span></a>

					<a data-inline="true" data-role="button" data-icon="refresh" href="#" data-theme="c" class="ui-btn ui-btn-inline ui-btn-icon-left ui-corner-right ui-controlgroup-last ui-btn-up-c"><span class="ui-btn-inner ui-corner-right ui-controlgroup-last"><span class="ui-btn-text">רענן</span><span class="ui-icon ui-icon-refresh ui-icon-shadow"></span></span></a>
				</center>
				</div><!-- /controlgroup -->
<br/>
<br/>		
		<!--Login form start-->
		<form id="login" action="check.php" method="get" data-ajax="false" target="_top">
<ul data-role="listview">
<li>שם משתמש : demo@attiatech.com</li>
<li>סיסמא : 3885</li>
</ul>
			<div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
	         <label for="name" class="ui-input-text">שם משתמש:</label>
	         <input type="text" value="" id="name" style="text-align:left;" name="name" class="ui-input-text ui-body-null ui-corner-all ui-shadow-inset ui-body-c">
			</div>
			
			<div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
	         <label for="name" class="ui-input-text">סיסמא:</label>
	         <input type="password" value="" id="password" name="password" style="text-align:left;" class="ui-input-text ui-body-null ui-corner-all ui-shadow-inset ui-body-c">
			</div>
			
		<fieldset class="ui-grid-a">
				<div class="ui-block-a"><button data-theme="b" type="submit" class="ui-btn-hidden" aria-disabled="false" >התחבר</button></div>
				<div class="ui-block-b"><button data-theme="b" onclick="window.open('reg.php')" class="ui-btn-hidden" aria-disabled="false">רישום</button></div>

	    </fieldset>
		
	</form>
<!-- /Login form end-->
<li><a href="recover.php">שכחתי את הסיסמא שלי</a></li>
<br /><br />
<center>		<a href="http://attiatech.com" data-role="button" data-theme="c" data-icon="check" data-inline="true" target="_blank">ATTIA Technologies</a> </center>

<!--Content end-->

</div><!-- /page -->
<div data-role="footer" data-theme="b">
		<h4>&copy; טורס - מערכת לניהול הסעים</h4>
	</div><!-- /footer -->
	


</body>
</html>