<?php
include "Helper.php";
include "GenericClass.php";
session_start();

$objLoginCheck=new GenericClass();
$objLoginCheck->checFunLogin($_POST[ 'email' ],$_POST[ 'pass' ]);




  
    ?>


    