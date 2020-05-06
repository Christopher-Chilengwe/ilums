<?php
require_once("../include/initialize.php");
 if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."/index.php");
     }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
 $title="Student Profile"; 
 $header=$view; 
switch ($view) {
	case 'profile' :
		$content    = 'profile.php';		
		break;


	default :
		$content    = 'profile.php';		
}
require_once ("../theme/templates.php");
?>
  
