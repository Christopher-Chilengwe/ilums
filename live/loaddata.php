<?php 
require_once("../include/initialize.php");
global $mydb;

$output = array();
$query ="SELECT * FROM `tbltimelogs`l RIGHT JOIN tblstudent s on l.IDNUM=s.IDNO WHERE `ACTIVESTATUS`= 'ACTIVE'";

if(isset($_POST["tests"]["value"]))
{
$mydb->setQuery($query);

$curss = $mydb->loadResultList();
$curs = $mydb->executeQuery();
		$row_count = $mydb->num_rows($curs);
		$filtered_rows = $row_count;
$data = array();

$i = 1;	

}else{
$mydb->setQuery($query);

$curss = $mydb->loadResultList();
$curs = $mydb->executeQuery();
		$row_count = $mydb->num_rows($curs);
		$filtered_rows = $row_count;
$data = array();

$i = 1;	

}

foreach ($curss as $result) {
			 
$sub_array = array();
	
	$sub_array[] =$i;
	$sub_array[] = $result->LNAME. ', '. $result->FNAME ;
	$sub_array[] = $result->LAST_LOGINDATE;
	$sub_array[] =  $result->LAST_LOGINTIME;
	$sub_array[] = $result->TIMESTART;
	$sub_array[] = $result->TIMEEND;
	$sub_array[] = $result->ACTIVESTATUS;
	$data[] = $sub_array;
$i = $i + 1;		
}

function get_total_all_records()
{
	global $mydb;
	$statement = "SELECT * FROM `tbltimelogs`";
	$result = $mydb->setQuery($statement);
	$cur = $mydb->executeQuery();
		$row_count = $mydb->num_rows($cur);
		return $row_count;
}

$output = array('data' 			   => $data, 
				"recordsTotal"	   => $filtered_rows,
				"recordsFiltered"	=> get_total_all_records() );
echo json_encode($output);

?>