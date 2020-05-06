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
	
	if ($_POST['item'] == "" OR $_POST['default'] == "") {
		message("All field is required!", "error");
		redirect('index.php');
	}else{
		$defaults = new Defaults();

		$item		= $_POST['item'];
		$default  	= $_POST['default'];
		$category 	= $_POST['category'];

		$COMMONCODE	= $category.$item;
		$res = $defaults->find_all_default($COMMONCODE);
				
		if ($res >=1) {
			message("Default already exist!","error");
			redirect('index.php');
		}else{
			$defaults->COMMON_CODE  = $COMMONCODE;
			$defaults->CATEGORY 	= $category;
			$defaults->LISTNAME 	= $item;
			$defaults->ISDEFAULT    = $default;
			
			 $istrue = $defaults->create(); 
			 if ($istrue == 1){
			 
			 	message("New Default [". $item ."] has been created successfully!","success");
				redirect('index.php');

			 }
	}	 

		
	
	}

	}

	function doEdit(){
		global $mydb;
		if ($_POST['item'] == "" OR $_POST['default'] == "") {
			message("All field is required!", "error");
			redirect('index.php');
		}else{
			$defaults = new Defaults();
			$dftid		= $_POST['dftid'];
			$item		= $_POST['item'];
			$default  	= $_POST['default'];
			$category 	= $_POST['category'];
		
		//	if($default=="YES"){
		//	 	$mydb->setQuery("UPDATE `tblcommon_list` SET `ISDEFAULT` = 'NO' WHERE CATEGORY='{$category}' AND ISDEFAULT='YES'  ");
		//	 	$mydb->executeQuery();
		//	 }
			$COMMONCODE	= $category.$item;
			
				$defaults->COMMON_CODE  = $COMMONCODE;
				$defaults->CATEGORY 	= $category;
				$defaults->LISTNAME 	= $item;
				$defaults->ISDEFAULT    = $default;
				$defaults->update($dftid);
				
				//echo $dftid;
					message("New Default [". $item ."] has been created successfully!","success");
					redirect('index.php');

		}


	}


	function doDelete(){
		
		
		$id = 	$_GET['id'];

		$dept = new Defaults();
		$dept->delete($id);

			 
		message("Default has been Deleted!","info");
		redirect('index.php');
		// }
		// }

		
	}

	
?>