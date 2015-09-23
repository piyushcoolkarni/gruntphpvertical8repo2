<?php
session_start();
include "Helper.php";
#	function insert($table,$field,$values)
$helperObj=new Helper("ecomm");
$table="buy_details";
$field="user_id,product_id,price";


$arra=array(explode(";",$_SESSION['key']));
var_dump($arra);
echo "<br>";


 foreach ($arra as $booking) 
 {
  #print_r($booking);
  $temp=$booking;
  $a=implode(",",$temp);
  var_dump($a);
  echo "<br>";
  $temp=explode(",",$a);
  
  var_dump($temp);
  echo "<br>";

$cnt=0;
     foreach ($temp as $booking2) 
	 {
	   $cnt++;
      $user=$_SESSION['user'];
	 
		if($cnt==1)
		{
		$prod=$booking2;
		echo "PRODID=$prod";
		 echo "<br>";
		}
		if($cnt==3)
		{
		$price=$booking2;
		echo "PRICE=$price";
		echo "<br>";
		}
		if($cnt==6) 
		{
		$values="'$user','$prod','$price'";
		$result=$helperObj->insert($table,$field,$values);
		if($result)
		{
		echo "data inserted";
		}
		$cnt=0;
		
		}
}

}


?>