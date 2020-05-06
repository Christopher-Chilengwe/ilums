<?php
	 if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }

?>

<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable( {
      paging:         false
    } );
} );
</script>
<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">List of Students  <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> New</a>  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  
			      <div class="table-responsive">			
				<table id="example" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
				
				   <thead>
				  	<tr>
				  		<th>ID#.</th>
				  		<th>Fullname</th>
				  		<th>Action</th>
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 

				  	global $mydb;
				
					//this is the current page per number ($current_page)	
					$current_page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
									
					//record per Page($per_page)	
					$per_page = 10;
										
					//total count record ($total_count)
					$countEmp = new StudPagination();
					$total_count = $countEmp->count_allrecords();
					
					$pagination = new StudPagination($current_page, $per_page, $total_count);

				  	  @$idno =  $_GET['idno'];
				  	  @$lname =  $_GET['lname'];
				  	  @$fname =  $_GET['fname'];
				  	  if ($idno == '' AND $lname=='' AND $fname == ''){
				  	  	//`S_ID`, `IDNO`, `FNAME`, `LNAME`, `MNAME`, `SEX`, `BDAY`, `AGE`, `CONTACT_NO`, `HOME_ADD`, `EMAIL`, `ACC_PASSWORD`
				  	  	$mydb->setQuery("SELECT  `IDNO` , CONCAT(  `LNAME` ,  ' ',  `FNAME` ,  ' ',  `MNAME` ) AS  'Name',
				  						  `GENDER` ,`AGE`, `BDAY` ,  `EMAIL`
				  						  FROM  `tblstudent` LIMIT {$pagination->per_page} OFFSET {$pagination->offset()}");
				  	  	loadresult();

				  	  }else{
							$mydb->setQuery("SELECT  `IDNO` , CONCAT(  `LNAME` ,  ' ',  `FNAME` ,  ' ',  `MNAME` ) AS  'Name',
				  						  `GENDER` ,`AGE`, `BDAY` ,  `EMAIL`
											FROM  `tblstudent` 
											WHERE  `IDNO` ='". $idno."' OR  `LNAME` = '". $lname ."'	OR  `FNAME` =  '". $fname ."' 
											LIMIT {$pagination->per_page} OFFSET {$pagination->offset()}");	

							loadresult();	
				  	  }

				  		
				  		
				  	
				  		function loadresult(){
				  			global $mydb;
					  		$cur = $mydb->loadResultList();
							foreach ($cur as $student) {
					  		echo '<tr>';

					  		echo '<td>'. $student->IDNO.'</a></td>';
					  		echo '<td>'. $student->Name.'</td>';
					  		//echo '<td>'. $student->GENDER.'</td>';
					  		//echo '<td>'. $student->AGE.'</td>';
					  		//echo '<td>'. $student->BDAY.'</td>';
					  	
					  		//echo '<td>'. $student->EMAIL.'</td>';
					  		$active = "disabled";
				  		
					  		echo '<td align="center" > <a title="Edit" href="index.php?view=edit&id='.$student->IDNO.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></span></a>
					  					
					  					 </td>';
					  		echo '</tr>';
					  		}

				  		} 
				  	
				  	?>


				  </tbody>
				  <tfoot>
				  	<tr>
				  		<td colspan="8">
				  		<?php	echo '<ul class="pagination" align="center">';
									
							if ($pagination->total_pages() > 1){
								//this is for previous record
								if ($pagination->has_previous_page()){
								echo ' <li><a href='. WEB_ROOT .'admin/student/?page='.$pagination->previous_page().'>&laquo; </a> </li>';
								}
								 //it loops to all pages
							 	 for($i = 1; $i <= $pagination->total_pages(); $i++){
									//check if the value of i is set to current page	
									if ($i == $pagination->current_page){
									//then it sset the i to be active or focused
										echo '<li class="active"><span>'. $i.' <span class="sr-only">(current)</span></span></li>';
									 }else {
									 //display the page number
										echo ' <li><a href='. WEB_ROOT .'admin/student/?page='.$i.'> '. $i .' </a></li>';
									 } 
								 }
								//this is for next record		
								if ($pagination->has_next_page()){
								echo ' <li><a href='. WEB_ROOT .'admin/student/?page='.$pagination->next_page().'>&raquo;</a></li> ';
								}
								
							}
						?>
					</td>
				</tr>
				  </tfoot>
				</table>
 
				<!-- <div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
 -->
			</div>
				</form>
	

</div> <!---End of container-->