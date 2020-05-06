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

	case 'Assign' :
	doAssign();
	break;


 
	}
   
	function doInsert(){
	
		if ($_POST['Idnum'] == "" OR $_POST['studname'] == "" ) {
			message("All field is required!", "error");
			redirect('index.php');
		}else{
		//`ENROLLMENTID`, `STUDENTNAME`, `STUDENTID`, `COURSE`, `YEARLEVEL`, `SEMESTER`, `AY`, `TIMEALLOTED`
			$SY = new Schoolyr();

			$STUDENTNAME    = $_POST['studname'];
			$IDNO 			= $_POST['Idnum'];
			$COURSE			= $_POST['Course'];
			$YEARLEVEL		= $_POST['grdlvl'];
			$SEMESTER 		= $_POST['Semester'];
			$AY 			= $_POST['ay'];
			//$TIMEALLOTED 	= $_POST['timealloted'];
			
				$singledft = new DefaultTime();
				$object = $singledft->single_default_TIME();
				

				$SY->STUDENTNAME    = $STUDENTNAME;
				$SY->STUDENTID 		= $IDNO;
				$SY->COURSE			= $COURSE;
				$SY->YEARLEVEL 		= $YEARLEVEL;
				$SY->SEMESTER 		= $SEMESTER;
				$SY->AY   			= $AY;
			//	$SY->TIMEALLOTED 	= date('10:00:00'); 
			//	$SY->TIMEALLOTED 	= $cenvertedTime;
				$SY->TIMEALLOTED 	= $object->ALLOTEDTIME; 	
				$SY->create(); 
				 
				 //	message("New Student [". $STUDENTNAME ."] has been enrolled successfully!","success");
				redirect('index.php');

		
		}

	}

	function doEdit(){

		if ($_POST['Idnum'] == "" OR $_POST['studname'] == "" ) {
			message("All field is required!", "error");
			redirect('index.php');
		}else{
		//`ENROLLMENTID`, `STUDENTNAME`, `STUDENTID`, `COURSE`, `YEARLEVEL`, `SEMESTER`, `AY`, `TIMEALLOTED`
			$SY = new Schoolyr();
			$ENROLLMENTID	= $_GET['id'];
			$STUDENTNAME    = $_POST['studname'];
			$IDNO 			= $_POST['Idnum'];
			$COURSE			= $_POST['Course'];
			$YEARLEVEL		= $_POST['grdlvl'];
			$SEMESTER 		= $_POST['Semester'];
			$AY 			= $_POST['ay'];
			$TIMEALLOTED 	= $_POST['allotedtime'];
			
			
				$SY->STUDENTNAME    = $STUDENTNAME;
				$SY->STUDENTID 		= $IDNO;
				$SY->COURSE			= $COURSE;
				$SY->YEARLEVEL 		= $YEARLEVEL;
				$SY->SEMESTER 		= $SEMESTER;
				$SY->AY   			= $AY;
				$SY->TIMEALLOTED 	= date($TIMEALLOTED); 
				$SY->update($ENROLLMENTID);  
				 
				 message("Enrollment has been updated successfully!","success");
				redirect('index.php');

		
		}

	}


	function doDelete(){
		
		
		$id = 	$_GET['id'];

		$dept = new Schoolyr();
		$dept->delete($id);

			 
		message("Enrollment Record already Deleted!","info");
		redirect('index.php');
		// }
		// }

		
	}

	function doAssign(){
		global $mydb;
		$grade = new Grades();
		
		
		$grdlvl = $_POST['grdlvl'];
		
		$mydb->setQuery("SELECT * 
                      FROM  `subject` where LEVEL='". $grdlvl."'");
        $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
            	$IDNO 			= $_POST['Idnum'];
				$STUDENTNAME    = $_POST['studname'];
         		$SUBJ_ID  		= $result->SUBJ_ID;
         		$DESCRIPTION    = $result->SUBJ_DESCRIPTION;
		 		$SYID    		= $_POST['syid'];
				$AY 			= $_POST['ay'];
				$GRADELEVEL		=  $result->LEVEL;
				$SECTION   		= $_POST['section'];
                  
                $grade->IDNO 			= $IDNO;        
                $grade->STUDENTNAME     = $STUDENTNAME;
                $grade->SUBJ_ID 		= $SUBJ_ID;
				$grade->DESCRIPTION 	= $DESCRIPTION;
				$grade->SYID 			= $SYID;
				$grade->AY 				= $AY;
				$grade->GRADELEVEL		= $GRADELEVEL;
				$grade->SECTION   		= $SECTION;
				$grade->create(); 
            } 
			
			 
			 	message("New Student subject has been assigned successfully!","success");
				redirect('index.php');

	}
 
?>