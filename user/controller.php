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
	case 'editprof' :
	editprof();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'delete1' :
	doDelete1();
	break;

	case 'photos' :
	doupdateimage();
	break;

 
	}
   
	function doInsert(){
	
	if ($_POST['name'] == "" OR $_POST['username'] == "" OR $_POST['pass'] == "") {
		$messageStats = false;
		message("All field is required!","error");
			redirect('index.php');
	}else{
		

		$user = new User();
		$acc_name		= $_POST['name'];
		$acc_username   = $_POST['username'];
		$acc_password 	= $_POST['pass'];
		$acc_type 		= $_POST['type'];

		$res = $user->find_all_user($acc_name);
		
		
			if ($res >=1) {
				message("Account name already exist!", "error");
					redirect('index.php');
			}else{
				
				$user->ACCOUNT_NAME = $acc_name;
				$user->ACCOUNT_USERNAME = $acc_username;
				$user->ACCOUNT_PASSWORD = sha1($acc_password);
				$user->ACCOUNT_TYPE = $acc_type;
				
				 $istrue = $user->create(); 
				 if ($istrue == 1){
				 	message("New User [". $acc_name ."] has beem created successfully!", "success");
				 	redirect('index.php');
				 	
				 }
			}	 

			
		}

	}

	function doEdit(){
	if(isset($_POST['save'])){

			$user = New User(); 
			$user->ACCOUNT_NAME 		= $_POST['U_NAME'];
			$user->ACCOUNT_USERNAME			= $_POST['U_USERNAME'];
			$user->ACCOUNT_PASSWORD				=sha1($_POST['U_PASS']);
			$user->ACCOUNT_TYPE				= $_POST['U_ROLE'];
			$user->update($_POST['USERID']);


			  message("[". $_POST['U_NAME'] ."] has been updated!", "success");
			redirect("index.php");
		}
	}



function editprof(){
	if(isset($_POST['save'])){

			$user = New User(); 
			$user->ACCOUNT_NAME 		= $_POST['U_NAME'];
			$user->ACCOUNT_USERNAME			= $_POST['U_USERNAME'];
			$user->ACCOUNT_PASSWORD				=sha1($_POST['U_PASS']);
			$user->ACCOUNT_TYPE				= $_POST['U_ROLE'];
			$user->update($_POST['USERID']);

			  message("[". $_POST['U_NAME'] ."] has been updated!", "success");
			redirect(WEB_ROOT.'\account');	
		

		}
	}
	function doDelete(){
		
		
				$id = 	$_GET['id'];

				$user = New User();
	 			$user->ACC_STATUS = 'NOT ACTIVE';
				$user->update($id);

			message("User has been deactivated!","info");
			redirect('index.php');

		
	}
	function doDelete1(){
		
		
				$id = 	$_GET['id'];

				$user = New User();
	 			$user->ACC_STATUS = 'ACTIVE';
				$user->update($id);

			message("User has been Activated!","info");
			redirect('index.php');

		
	}

	function doupdateimage(){
 
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];
		 	$location="photos/".$myfile;


		if ( $errofile > 0) {
				message("No Image Selected!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
		}else{
	 
				@$file=$_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message("Uploaded file is not an image!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
			}else{
					//uploading the file
					move_uploaded_file($temp,"photos/" . $myfile);
		 	
					 

						$user = New User();
						$user->USERIMAGE 			= $location;
						$user->update($_SESSION['USERID']);
						redirect("index.php");
						 
							
					}
			}
			 
		}
 
?>