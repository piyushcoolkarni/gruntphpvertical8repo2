<?php

session_start();

include "html/HeaderHtml.html";

include "BodyHome.php";
#print_r($_SESSION['user']);
include "html/FooterHtml.html";
 

?>