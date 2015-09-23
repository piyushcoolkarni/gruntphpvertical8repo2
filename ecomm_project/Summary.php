<?php
include "Helper.php";
include "GenericClass.php";


session_start();
 



$objSummary=new GenericClass();
$objSummary->checkFunctionSummery($_SESSION[ 'email' ], $_SESSION[ 'pass' ]);












  
    ?>


    