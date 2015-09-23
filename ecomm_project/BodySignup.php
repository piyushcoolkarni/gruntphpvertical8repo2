<?php
session_start();
	include "Helper.php";



 
	$password=$_POST["user_password"];
	$emailId=$_POST["user_emailid"];
	
	
	
	#echo "kj2";
	$obj=new Helper("ecomm");
	
	$val="'$emailId','$password'";
	
	$field="email_id,password";
	$tableName="user";
	
	$obj->insert($tableName,$field,$val);

$email=	$_POST['user_emailid'];
$pass=	$_POST['user_password'];




if(isset($email) && isset($pass))
{
//echo 'hello';
	
	$field="user_id";
$table="user";

$condition=" email_id='$email' AND password='$pass' ";
$result=$obj->read_record($field,$table ,$condition);
//var_dump($result);
//var_dump($field);
 #$count = mysql_num_rows($result);
 
	if (is_array($result))
	{

		foreach($result as $row)

			{
						
		$_SESSION['user'] =$row['user_id'];
	//echo "Hi " . $_SESSION['user'] . "";
		{
		header("Location: LoginPageIncluded.php");
		}
	
		
		}
	
	}




}

	
	

	
	



?>








