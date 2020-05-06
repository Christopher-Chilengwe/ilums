<?php
	 if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }

?>
<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">Manage all Users  <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> New</a>  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  
			      <div class="table-responsive">			
				<table id="dash-table" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
				
				
				  <thead>
				  	<tr>
				  		
				  		<th>IDNO</th>
				  		<TH>STUDENT NAME</TH>
				  		<th>COURSE/YR</th>
				  		<th>AY</th>
						<th>Semester</th>
						<th>Remaining Time</th>
						 <th width="15%" >Action</th>
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 
				  //	`SYID`, `AY`, `COURSE_ID`, `IDNO`, `CATEGORY`, `SECTION`, `STATUS`
				  		$dept = new Schoolyr();
						$cur = $dept->allSchoolyr();
						foreach ($cur as $sy) {
				  		echo '<tr>';

				  	
				  		echo '<td>'. $sy->STUDENTID.'</td>';
				  		echo '<td>'. $sy->STUDENTNAME.'</td>';
				  		echo '<td>'. $sy->COURSE .'-' . $sy->YEARLEVEL.'</td>';
				  		echo '<td>' . $sy->AY.'</a></td>';
				  		echo '<td>'. $sy->SEMESTER.'</td>';
				  		echo '<td>'. $sy->TIMEALLOTED.'</td>';
				  		$active = "";
				  		
				  		echo '<td>
				  		<a title="Edit" href="index.php?view=edit&id='.$sy->ENROLLMENTID.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></span></a>
							 </td>';
				  	

				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
				 
				</table>
			
				</form>
	

</div> <!---End of container-->