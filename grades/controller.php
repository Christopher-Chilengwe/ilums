<?php
require_once ("../include/initialize.php");
	  if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."index.php");
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
	
	if ($_POST['deptname'] == "" OR $_POST['deptdesc'] == "") {
		message("All field is required!", "error");
		redirect('index.php');
	}else{
		$dept = new Dept();
		$deptid		= $_POST['deptid'];
		$deptname   = $_POST['deptname'];
		$dept_desc 	= $_POST['deptdesc'];
		$res = $dept->find_all_dept($deptname);
				
		if ($res >=1) {
			message("Grade level name already exist!","error");
			redirect('index.php');
		}else{
			$dept->DEPARTMENT_NAME = $deptname;
			$dept->DEPARTMENT_DESC = $dept_desc;
			 $istrue = $dept->create(); 
			 if ($istrue == 1){
			 
			 	message("New Grade Level [". $deptname ."] has been created successfully!","success");
				redirect('index.php');

			 }
	}	 

		
	
}

	}

	function doEdit(){

		if (isset($_POST['save'])){

			if ($_POST['deptname'] == "" OR $_POST['deptdesc'] == "") {
				message("All field is required!", "error");
				redirect('index.php');

			}else{
				$dept = new Dept();
				$deptid		= $_POST['deptid'];
				$deptname   = $_POST['deptname'];
				$dept_desc 	= $_POST['deptdesc'];
						
				$dept->DEPT_ID		   = $deptid;
				$dept->DEPARTMENT_NAME = $deptname;
				$dept->DEPARTMENT_DESC = $dept_desc;
				$dept->update($deptid);

				
				message("Grade Level [". $deptname ."] has been updated successfully!","success");
				redirect('index.php');

			}
		}

	}


	function doDelete(){
		
		
		$id = 	$_GET['id'];

		$dept = new Dept();
		$dept->delete($id);

			 
		message("Grade level already Deleted!","info");
		redirect('index.php');
		// }
		// }

		
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