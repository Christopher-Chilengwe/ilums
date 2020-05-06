<?php
require_once("../include/initialize.php");
 if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."/index.php");
     }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
 $title="Time Logs"; 
 $header=$view; 
switch ($view) {
	
	case 'List' :
		$content    = 'add.php';		
		break;

	
	default :
		$content    = 'add.php';		
}
require_once ("../theme/templates.php");
?>
  
