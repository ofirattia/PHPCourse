<?php
/** 
	THE FOLLLOWING SCRIPT DESCRIBE USER REGISTRATION, THE ONLY ONE PROBLEM IS THAT IF THE USER FORGET THE 
	ASSIGN ONE OF THE FIELDS : Username,Name,Email ITS SHOW HIM AN ERROR MESSAGE AND TELL HIM TO GO BACK
	BUT WITH EMPTY FORM.
	
			MODIFY THE CODE THAT WHEN THE USER GOES BACK HE CAN VIEW THE DATA THAT HE INSERTED BEFORE.

**/
//Create  array.
$browsers=array(
     "Firefox",
     "Chrome",
     "Internet Explorer",
     "Safari",
     "Opera",
     "Other"
  );
   
$speeds=array(
     "Unknown",
     "DSL",
     "T1",
     "Cable",
     "Dialup",
     "Other"
); 
 
$os=array(
     "Windows",
     "Linux",
     "Macintosh",
     "Other"
); 
 
class Select{
  //Property
  private $name;   //String variable.
  private $value;  //Array variable.
   
  //Methods
  //The string set by this method will be the name of the select field.
  public function setName($name){
     $this->name = $name;
  }
   
  public function getName(){
     return $this->name;
  }
   
  //This method provides the values used for the options
  //in the select field and checks to be sure the value is an array. 
  public function setValue($value){
     if (!is_array($value)){
        die ("Error: value is not an array.");
     }
     $this->value = $value;
   }
   
  public function getValue(){
     return $this->value;
  }
   
  //This method creates the actual select options. It is private, 
  //since there is no need for it outside the operations of the class.
  private function makeOptions($value){
     foreach($value as $v){
        echo "<option value=\"$v\">" .ucfirst($v). "</option>\n";
      }
  }
   
  //This method puts it all together to create the select field.
  //This method puts it all together to create the select field.
  public function makeSelect(){
     echo "<select name=\"" .$this->getName(). "\">\n";
     //Create options.
     echo "<option value=\"No response\">--Select one--</option>\n";
     $this->makeOptions($this->getValue());
     echo "</select>" ;
  }
}//end class
 
?>
 
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml"  xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<title>Form Modified and Validated</title>
</head>
 
<body>
<h2>User Registration<br /></h2>
 
<?php
//If form not submitted, display form.
  if(!isset($_POST['submit'])){
?>
* Indicates required field.  
<form method="post" action="user_register_a.php">

<p>*Name:<br />
<?php if(isset($_POST['name'])){?>
<input type="text" name="name" size="60" value="<?php echo $_POST['name'];?>" />  </p>
<?php }else{?>
<input type="text" name="name" size="60" value="" />  </p>
<?php }?>
<p>*Username:<br />
<?php if(isset($_POST['username'])){?>
<input type="text" name="username" size="60" value="<?php echo $_POST['username'];?>"/></p>
<?php }else{?>
<input type="text" name="username" size="60" /></p>
<?php }?>

<p>*Email:<br />
<?php if(isset($_POST['email'])){?>
<input type="text" name="email" size="60" value="<?php echo $_POST['email'];?>"/></p>
<?php }else{ ?>
<input type="text" name="email" size="60" /></p>
<?php }?>
 
<p><strong>Work Access</strong></p>
<p>Primary Browser: 
 
 
<?php
//Instantiate object.
$browserWork = new Select();
//Set properties.
$browserWork->setName('browserWork');
$browserWork->setValue($browsers);
//The object has the data it needs from the preceding commands.
//Tell it to make the select field.
$browserWork->makeSelect();
//Destroy the object.
unset($browserWork);
 
echo "</p>\n<p>Connection Speed: ";
$speedWork = new Select();
$speedWork->setName('speedWork');
$speedWork->setValue($speeds);
$speedWork->makeSelect();
unset($speedWork);
 
echo "</p>\n<p>Operating System: ";
$osWork = new Select();
$osWork->setName('osWork');
$osWork->setValue($os);
$osWork->makeSelect();
unset($osWork);
 
?>
</p>
<p><strong>Home Access</strong></p>
<p>Primary Browser:
<?php
$browserHome = new Select();
$browserHome->setName('browserHome');
$browserHome->setValue($browsers);
$browserHome->makeSelect();
unset($browserHome);
 
echo "</p>\n<p>Connection Speed: ";
$speedHome = new Select();
$speedHome->setName('speedHome');
$speedHome->setValue($speeds);
$speedHome->makeSelect();
unset($speedHome);
 
echo "</p>\n<p>Operating System: ";
$osHome = new Select();
$osHome->setName('osHome');
$osHome->setValue($os);
$osHome->makeSelect();
unset($osHome);
?>
</p>
 
<p />
<input type="submit" name="submit" value="Go" />
 
</form>
 
<?php
  //If form submitted, process input.
  }else{
    //Could include code to send data to database here.
    //Retrieve user responses.
    $name=$_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $browserWork=$_POST['browserWork'];
    $speedWork=$_POST['speedWork'];
    $osWork=$_POST['osWork'];
    $browserHome=$_POST['browserHome'];
    $speedHome=$_POST['speedHome'];
    $osHome=$_POST['osHome'];
	$form = returnForm($name,$username,$email);
    //Check input.
    if (empty($name)){
      die('Error: Please enter your name. <br />
	  '.$form.'');
    }
    if (empty($username)){
      die('Error: Please choose a username. <br />
      '.$form.'');
    }
    $char = strpos($email, '@');
    if (empty($email) || $char === false ){
      die('Error: Please enter a valid email address. <br />
     '.$form.'');
    }    
    //Confirm responses to user.
    echo "<p>The following data has been saved for $name: </p>\n";
    echo "<p>Username: $username<br />\n";
    echo "Email: $email</p>\n";
    echo "<p>Work Access:</p>\n";
    echo "<ul>\n<li>$browserWork</li>\n";
    echo "<li>$speedWork</li>\n";
    echo "<li>$osWork</li>\n</ul>\n";
    echo "<p>Home Access:</p>\n";
    echo "<ul>\n<li>$browserHome</li>\n";
    echo "<li>$speedHome</li>\n";
    echo "<li>$osHome</li>\n</ul>\n";
}
function returnForm($name,$username,$email){
return '<form method="post" action="user_register_a.php"><p hidden="yes">*Name:<br />
	  <input type="text" name="name" hidden="yes" size="60" value="'.$name.'" />  </p>
	  <p hidden="yes" >*Username:<br />
      <input type="text" name="username" hidden="yes" size="60" value="'.$username.'"/></p>
      <p hidden="yes">*Email:<br />
      <input type="text" name="email" hidden="yes" size="60" value="'.$email.'"/></p>
	  <input type="submit" name="back" value="Back to form"/></form></body></html> ';

}
?>
 
</body>
</html>