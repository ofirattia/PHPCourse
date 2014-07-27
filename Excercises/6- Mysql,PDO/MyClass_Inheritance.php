<?php
 
class MyClass
{
  public $prop1 = "I'm a class property!";
 
  public function __construct()
  {
      echo 'The class "', __CLASS__, '" was initiated!<br />';
  }
 
  public function __destruct()
  {
      echo 'The class "', __CLASS__, '" was destroyed.<br />';
  }
 
  public function __toString()
  {
      echo "Using the toString method: ";
      return $this->getProperty();
  }
 
  public function setProperty($newval)
  {
      $this->prop1 = $newval;
  }
 
  public function getProperty()
  {
      return $this->prop1 . "<br />";
  }
}
 
class MyOtherClass extends MyClass
{
  public function newMethod()
  {
      echo "From a new method in " . __CLASS__ . ".<br />";
  }
}
 
// Create a new object
$newobj = new MyOtherClass;
 
// Output the object as a string
echo $newobj->newMethod();
 
// Use a method from the parent class
echo $newobj->getProperty();
 
?>
