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
	case 'doEditProfile' :
	doEditProfile();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'photos' :
	doupdateimage();
	break;

 
	}


	 
	function doInsert(){
		$IDNO  = $_POST['idno'];
		$FNAME = $_POST['fName'];
		$LNAME = $_POST['lName'];
		$MNAME = $_POST['mName'];
	//	$GENDER   = $_POST['gender'];
	//	$BDAY  = $_POST['bday'];
//		$AGE   = $_POST['age'];

//		$CONTACT_NO = $_POST['contact'];
//		$HOME_ADD 	= $_POST['home'];
//		$EMAIL  	= $_POST['email'];
		
		$user = new User();


		$acc_username   = $_POST['username'];
		$acc_password 	= $_POST['pass'];
		$acc_type 		= 'Student';

		
		
			
		$student = new Student();
		//$student->S_ID				= "null";
		$student->IDNO 				=	$IDNO;
		$student->LNAME				=	$LNAME;
		$student->FNAME				=	$FNAME;
		$student->MNAME				=	$MNAME;
	//	$student->GENDER			=   $GENDER;
	//	$student->BDAY				=	$BDAY;
	//	$student->AGE				=	$AGE;
	//	$student->CONTACT_NO		=	$CONTACT_NO;
	//	$student->HOME_ADD			=	$HOME_ADD;
	//	$student->EMAIL 			=	$EMAIL;
		$student->ACC_PASSWORD 		=	sha1($acc_password);

		
		$user->ACCOUNT_NAME 	= $LNAME .' '. $FNAME.' '.$MNAME;
		$user->ACCOUNT_USERNAME = $acc_username;
		$user->ACCOUNT_PASSWORD = sha1($acc_password);
		$user->ACCOUNT_TYPE 	= $acc_type;
		$user->EMPID 			=	$IDNO;


		
		if ($IDNO == "") {
			message('ID Number is required!', "error");
			redirect ('index.php?view=add');
		}elseif ($LNAME == "") {
			message('Last Name is required!', "error");
			redirect ('index.php?view=add');
		}elseif ($FNAME == "") {
			message('First Name is required!', "error");
			redirect ('index.php?view=add');
		//}elseif ($MNAME == "") {
		//	message('Middle Name is required!', "error");
		//	redirect ('newstudent.php');
		//}elseif ($EMAIL == "") {
		//	message('Email address is required!', "error");
		//	redirect ('index.php?view=add');
		//}elseif ($acc_username == "") {
		//	message('username is required!', "error");
		//	redirect ('index.php?view=add');
		}elseif ($acc_password == "") {
			message('Password is required!', "error");
			redirect ('index.php?view=add');
			
		}else{
			$res = $user->find_all_user($acc_username);

			if ($res >=1) {
				message("Account name already exist!", "error");
				redirect ('index.php?view=add');
			}else{
				
				
				
				 $istrue = $user->create(); 
				 $student->create(); 
				 if ($istrue == 1){
				 	message('New student ['. $FNAME .' '. $LNAME .'] addedd successfully!', "success");
					redirect('index.php');	
				 	
				 }
			}	



		}


	}

	function doEdit(){
	if (isset($_POST['save'])){	

		$IDNO  = $_POST['idno'];
		$LNAME = $_POST['lName'];
		$FNAME = $_POST['fName'];
		$MNAME = $_POST['mName'];
		//$GENDER   = $_POST['gender'];
		//$BDAY  = $_POST['bday'];
		//$AGE   = $_POST['age'];
		//$CONTACT_NO = $_POST['contact'];
		//$HOME_ADD = $_POST['home'];
		//$EMAIL   = $_POST['email'];


		$student = new Student();
		//$student->S_ID				= "null";
		$student->IDNO 				=	$IDNO;
		$student->LNAME				=	$LNAME;
		$student->FNAME				=	$FNAME;
		$student->MNAME				=	$MNAME;
		//$student->GENDER			=	$GENDER;
		//$student->BDAY				=	$BDAY;
		//$student->AGE				=	$AGE;
		//$student->CONTACT_NO		=	$CONTACT_NO;
		//$student->HOME_ADD			=	$HOME_ADD;
		//$student->EMAIL 			=	$EMAIL;


			if ($IDNO == "") {
				message('ID Number is required!', "error");
				redirect ('edit_studentinfo.php?id='.$IDNO);
			}elseif ($LNAME == "") {
				message('Last Name is required!', "error");
				redirect ('edit_studentinfo.php?id='.$IDNO);
			}elseif ($FNAME == "") {
				message('First Name is required!', "error");
				redirect ('edit_studentinfo.php?id='.$IDNO);
		//	}elseif ($MNAME == "") {
		//		message('Middle Name is required!', "error");
		//		redirect ('edit_studentinfo.php?id='.$IDNO);
		//	}elseif ($EMAIL == "") {
		//		message('Email address is required!', "error");
		//		redirect ('edit_studentinfo.php?id='.$IDNO);
				


			}else{

				$SY = new Schoolyr();
			
				$STUDENTNAME    = $LNAME. ', '. $FNAME.' '. $MNAME;
				$SY->STUDENTNAME		=	$STUDENTNAME;
				$SY->updateStud($IDNO); 

				$user = New User(); 
				$user->ACCOUNT_NAME 	= $STUDENTNAME;
				$user->updatemember($IDNO);


				$student->update($IDNO); 
				message('Student infomation updated successfully!', "info");
				redirect('index.php');	


			}
		}
	}

function doEditProfile(){
	if (isset($_POST['save'])){	

		$IDNO  = $_POST['idno'];
		$LNAME = $_POST['lName'];
		$FNAME = $_POST['fName'];
		$MNAME = $_POST['mName'];
	/*	$GENDER   = $_POST['gender'];
		$BDAY  = $_POST['bday'];
		$AGE   = $_POST['age'];
		$CONTACT_NO = $_POST['contact'];
		$HOME_ADD = $_POST['home'];
		$EMAIL   = $_POST['email'];
*/

		$student = new Student();
		//$student->S_ID				= "null";
		$student->IDNO 				=	$IDNO;
		$student->LNAME				=	$LNAME;
		$student->FNAME				=	$FNAME;
		$student->MNAME				=	$MNAME;
	
/*		$student->GENDER			=	$GENDER;
		$student->BDAY				=	$BDAY;
		$student->AGE				=	$AGE;
		$student->CONTACT_NO		=	$CONTACT_NO;
		$student->HOME_ADD			=	$HOME_ADD;
		$student->EMAIL 			=	$EMAIL;*/


			if ($IDNO == "") {
				message('ID Number is required!', "error");
				redirect ('edit_studentinfo.php?id='.$IDNO);
			}elseif ($LNAME == "") {
				message('Last Name is required!', "error");
				redirect ('edit_studentinfo.php?id='.$IDNO);
			}elseif ($FNAME == "") {
				message('First Name is required!', "error");
				redirect ('edit_studentinfo.php?id='.$IDNO);
			}elseif ($MNAME == "") {
				message('Middle Name is required!', "error");
				redirect ('edit_studentinfo.php?id='.$IDNO);
			
				
			}else{

				$SY = new Schoolyr();
			
				$STUDENTNAME    = $LNAME. ', '. $FNAME.' '. $MNAME;
				$SY->STUDENTNAME		=	$STUDENTNAME;
				$SY->updateStud($IDNO); 

				$user = New User(); 
				$user->ACCOUNT_NAME 	= $STUDENTNAME;
				$user->updatemember($IDNO);
				
				$student->update($IDNO); 
				message('Student infomation updated successfully!', "info");
				redirect(WEB_ROOT.'\profile');	


			}
		}
	}


	function doDelete(){
		
		
		//		$id = 	$_GET['id'];

		//		$user = New User();
	 	//	 	$user->delete($id);
			 
		//	message("User already Deleted!","info");
		//	redirect('index.php');
		
		
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