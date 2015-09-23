<?php
session_start();
#echo "in validate.php";
if($_REQUEST['btn_submit']=="Address")
{
echo "Address";
header("Location:AddAddressIncluded.php");
}

if($_REQUEST['btn_submit']=="Confirm")
{
echo "Confirm";
header("Location:Confirm.php");
}

if($_REQUEST['btn_submit']=="Cancel")
{
header("Location:index.php");
}  

?>