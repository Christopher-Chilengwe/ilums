<?php
	 if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }

?>
<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">List of Banned Students </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form  method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	 		    	<span id="printout">

			      <div class="table-responsive">			
				<table id="dash-table" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
				
				
				  <thead>
				  	<tr>
				  		
				  		<th>IDNO</th>
				  		<TH>STUDENT NAME</TH>
				  		<th>Year LEVEL</th>
				  		<th>AY</th>
						<th>Semester</th>
						<th>Remaining Time</th>
					<!--	 <th width="15%" >Action</th>-->
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 
				  //	`SYID`, `AY`, `COURSE_ID`, `IDNO`, `CATEGORY`, `SECTION`, `STATUS`
				  		 global $mydb;
						$mydb->setQuery("SELECT * FROM tblenrollment where `TIMEALLOTED` = '00:00:00' AND AY= '{$_SESSION['AY']}' AND SEMESTER='{$_SESSION['SEMESTER']}'");
						$cur = $mydb->loadResultList();
						foreach ($cur as $sy) {
				  		echo '<tr>';

				  		
				  		echo '<td>'. $sy->STUDENTID.'</td>';
				  		echo '<td>'. $sy->STUDENTNAME.'</td>';
				  		echo '<td>'. $sy->YEARLEVEL.'</td>';
				  		echo '<td>' . $sy->AY.'</a></td>';
				  		echo '<td>'. $sy->SEMESTER.'</td>';
				  		echo '<td>'. $sy->TIMEALLOTED.'</td>';
				  		$active = "";
				  		
				  		/*echo '<td>
				  		<a title="Edit" href="index.php?view=edit&id='.$sy->ENROLLMENTID.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></span></a>
				  					 <a title="Delete" href="controller.php?action=delete&id='.$sy->ENROLLMENTID.'" class="btn btn-danger btn-xs" '.$active.'><span class="fa fa-trash-o fw-fa"></span> </a>
				  					 </td>';
				  	*/	

				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
				 
				</table>
				</span>
		

				</form>
	

</div> <!---End of container-->
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
		oTable = jQuery('#list').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers"
		} );
	});		
</script>