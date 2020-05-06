<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body >
<h1 align="center">Student Record</h1>
<table border="1" align="center">
	<thead>
				  	<tr>
				  		<th>IDNO</th>
				  		<th>Student Name</th>
				  		<th>Semester</th>
						<th>AY</th>
				  		<th>Course/Yr</th>
						 <th width="40%">Time Alloted</th>
				  	</tr>	
				  </thead>
<?php 
				 	 global $mydb;
					if ($_GET['flag']==1){

					     $res = $mydb->setQuery("SELECT * FROM tblenrollment WHERE COURSE='{$_GET['course']}' and YEARLEVEL='{$_GET['yr']}'");
					       $row_cnt = $mydb->num_rows();
					        if ($row_cnt > 0) {
					      	$cur = $mydb->loadResultList();
							foreach ($cur as $sy) {
					  		echo '<tr>';
				  			echo '<td width="10%">'. $sy->STUDENTID.'</td>';
					  		echo '<td width="25%">'. $sy->STUDENTNAME.'</td>';
					  		echo '<td width="15%">'. $sy->SEMESTER.'</td>';
					  		echo '<td width="15%">' . $sy->AY.'</a></td>';
					  		echo '<td  width="25%">'.$sy->COURSE .'-' . $sy->YEARLEVEL.'</td>';
					  		echo '<td  width="35%">'. $sy->TIMEALLOTED.'</td>';
					  	
					  		
					  		echo '</tr>';
		

					  		} 
       
					        }else{
					  		message("No results found!","info");
						 	redirect('index.php');	 
					        		
					        }
					}elseif ($_GET['flag']==2) {
						$res = $mydb->setQuery("SELECT * FROM tblenrollment WHERE AY='{$_GET['ay']}' and SEMESTER='{$_GET['sem']}'");
					       $row_cnt = $mydb->num_rows();
					        if ($row_cnt > 0) {
					      	$cur = $mydb->loadResultList();
							foreach ($cur as $sy) {
					  		echo '<tr>';
				  			echo '<td width="10%">'. $sy->STUDENTID.'</td>';
					  		echo '<td width="25%">'. $sy->STUDENTNAME.'</td>';
					  		echo '<td width="15%">'. $sy->SEMESTER.'</td>';
					  		echo '<td width="15%">' . $sy->AY.'</a></td>';
					  		echo '<td  width="25%">'.$sy->COURSE .'-' . $sy->YEARLEVEL.'</td>';
					  		echo '<td  width="35%">'. $sy->TIMEALLOTED.'</td>';
					  	
					  		
					  		echo '</tr>';
		
					  		} 

	     
					        }else{
					  		message("No results found!","info");
						 	redirect('index.php');	 
					        		
					        }
					}

				  		
					
				  	?>	
</table>

</body>
</html>


       <script>
function tablePrint(){  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close();  
    return false;  
    } 
	$(document).ready(function() {
		oTable = jQuery('#studentlogs').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers"
		} );
	});	
</script>