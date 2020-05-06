<?php
require_once ("../include/initialize.php");
	  if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'photos' :
	doupdateimage();
	break;

 
	}
   
	function doInsert(){
		
		if ($_POST['category'] == "" OR $_POST['default'] == "") {
			message("All field is required!", "error");
			redirect('index.php');
		}else{
			global $mydb;
			$mydb->setQuery("INSERT INTO `tbldefaulttime` (`TIMEID`, `ALLOTEDTIME`, `ISDEFAULT`) VALUES (NULL, '{$_POST['category']}', '{$_POST['default']}');");
			$cur = $mydb->executeQuery();
				//if ($istrue == 1){
				 
				 	message("New Default Time [".  $_POST['category'] ."] has been created successfully!","success");
					redirect('index.php');

				 //}
		}	 
	
	}


	function doEdit(){

		global $mydb;
		if ($_POST['category'] == "" OR $_POST['default'] == "") {
			message("All field is required!", "error");
			redirect('index.php');
		}else{
			$defaults = new DefaultTime();
			$dftid		= $_POST['dftid'];
			$default  	= $_POST['default'];
			$category 	= $_POST['category'];
		
		//	if($default=="YES"){
		//	 	$mydb->setQuery("UPDATE `tblcommon_list` SET `ISDEFAULT` = 'NO' WHERE CATEGORY='{$category}' AND ISDEFAULT='YES'  ");
		//	 	$mydb->executeQuery();
		//	 }
		//	$COMMONCODE	= $category.$item;
			
				$defaults->CATEGORY 	= $category;
				
				$defaults->ISDEFAULT    = $default;
				$defaults->update($dftid);
				
				//echo $dftid;
					message("New Default time [". $category ."] has been created successfully!","success");
					redirect('index.php');

		}

	}


	
	
?>