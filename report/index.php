<?php
require_once("../include/initialize.php");
 if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."/index.php");
     }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
 $title="Enrollment Module"; 
 $header=$view; 
switch ($view) {
	case 'list' :
		$content    = 'list.php';		
		break;
	case 'banned' :
		$content    = 'banned.php';		
		break;
	
	case 'add' :
		$content    = 'add.php';		
		break;
	case 'print' :
		$content    = 'print.php';		
		break;
	case 'indilogs':
		$content    = 'indlogs.php';		
		break;	
	case 'indlogsrpt':
		$content 	= 'indlogsrpt.php';
		break;
    case 'view' :
		$content    = 'view.php';		
		break;

	default :
		$content    = 'list.php';		
}
require_once ("../theme/templates.php");
?>
  
