                      <?php 
                        if (!isset($_SESSION['ACCOUNT_ID'])){
                         redirect(web_root."admin/index.php");
                         }

                 
                       ?> 

<?php

 
      ?>
 
<form class="form-horizontal span6" action="index.php?view=banned" method="POST">
<div class="col-md-6 well" >
<legend>Report Filter by AY and Semester</legend>
	<div class="form-group">
	    <div class="col-md-8">
	      <label class="col-md-4 control-label" for=
	      "course">AY :</label>

	      <div class="col-md-8">
	        <select class="form-control input-sm" name="ay" id="ay">

        <?php
         $mydb->setQuery("SELECT `LISTNAME` FROM `tblcommon_list` where CATEGORY='AY'");
         $cur = $mydb->loadResultList();
         foreach ($cur as $resSS) {
              echo '<option value="'. $resSS->LISTNAME.'" >'. $resSS->LISTNAME. '</option>';
         }
        ?>
      </select> 
	      </div>
	    </div>
	  </div>


	  <div class="form-group">
	    <div class="col-md-8">
	      <label class="col-md-4 control-label" for=
	      "grdlvl">LEVEL :</label>

	      <div class="col-md-8">
	        <select class="form-control input-sm" name="sem" id="sem">

		        <?php
		         $mydb->setQuery("SELECT `LISTNAME` FROM `tblcommon_list` where CATEGORY='SEMESTER'");
		         $cur = $mydb->loadResultList();
		         foreach ($cur as $res) {
		              echo '<option value="'. $res->LISTNAME.'" >'. $res->LISTNAME. '</option>';
		         }
		        ?>
		      </select> 
	      </div>
	    </div>
	  </div>

	  <div class="form-group">
	    <div class="col-md-8">
	      <label class="col-md-4 control-label" for=
	      "grdlvl"></label>

	      <div class="col-md-8">
	        <button type="submit" name="searchay" class="btn btn-default" >Search  <span class="glyphicon glyphicon-search"></span></button></span>
	      </div>
	    </div>
	  </div>

	

</div>

<div class="col-md-6 well" >
<legend>Report Filter by Course and Year</legend>
	<div class="form-group">
	    <div class="col-md-8">
	      <label class="col-md-4 control-label" for=
	      "course">Course :</label>

	      <div class="col-md-8">
	        <select class="form-control input-sm" name="course" id="course">

        <?php
         $mydb->setQuery("SELECT `COURSE_NAME` FROM `course` GROUP by `COURSE_NAME`");
         $cur = $mydb->loadResultList();
         foreach ($cur as $res) {
              echo '<option value="'. $res->COURSE_NAME.'" >'. $res->COURSE_NAME. '</option>';
         }
        ?>
      </select> 
	      </div>
	    </div>
	  </div>


	  <div class="form-group">
	    <div class="col-md-8">
	      <label class="col-md-4 control-label" for=
	      "grdlvl">LEVEL :</label>

	      <div class="col-md-8">
	        <select class="form-control input-sm" name="grdlvl" id="grdlvl">

		        <?php
		         $mydb->setQuery("SELECT `COURSE_LEVEL` FROM `course` GROUP by `COURSE_LEVEL`");
		         $cur = $mydb->loadResultList();
		         foreach ($cur as $res) {
		              echo '<option value="'. $res->COURSE_LEVEL.'" >'. $res->COURSE_LEVEL. '</option>';
		         }
		        ?>
		      </select> 
	      </div>
	    </div>
	  </div>

	  <div class="form-group">
	    <div class="col-md-8">
	      <label class="col-md-4 control-label" for=
	      "grdlvl"></label>

	      <div class="col-md-8">
	        <button type="submit" name="search" class="btn btn-default" >Search  <span class="glyphicon glyphicon-search"></span></button></span>
	      </div>
	    </div>
	  </div>

	

</div>

<div class="col-md-12">
    <span id="printout">
<H1>Banned Students</H1>
      <div class="table-responsive">         
        <table id="studentlogs" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
        
         <thead>
				  	<tr>
				  		
				  		<th>IDNO</th>
				  		<TH>STUDENT NAME</TH>
				  		<th>Semester</th>
				  		<th>AY</th>
						<th>Course/Yr</th>						
					
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 
				 	 global $mydb;
					if (isset($_POST['search'])){

					     $res = $mydb->setQuery("SELECT * FROM tblenrollment WHERE COURSE='{$_POST['course']}' and YEARLEVEL='{$_POST['grdlvl']}' and  `TIMEALLOTED`='00:00:00' order by STUDENTNAME");
					       $row_cnt = $mydb->num_rows();
					        if ($row_cnt > 0) {
					      	$cur = $mydb->loadResultList();
							foreach ($cur as $sy) {
					  		echo '<tr>';
				  			echo '<td>'. $sy->STUDENTID.'</td>';
					  		echo '<td>'. $sy->STUDENTNAME.'</td>';
					  		echo '<td>'. $sy->SEMESTER.'</td>';
					  		echo '<td>' . $sy->AY.'</a></td>';
					  		echo '<td>'.$sy->COURSE .'-' . $sy->YEARLEVEL.'</td>';
					  	//	echo '<td>'. $sy->TIMEALLOTED.'</td>';
					  	
					  		
					  		echo '</tr>';
		

					  		} 

			echo '  </tbody>
          
        </table>';	
         echo '<a href="index.php?view=print&course='.$_POST['course'].'&yr='.$_POST['grdlvl'].'&flag=1" class="btn btn-primary">Print</a>';
					        }else{
					  		message("No results found!","info");
						 	redirect('index.php');	 
					        		
					        }
					}elseif (isset($_POST['searchay'])) {
						$res = $mydb->setQuery("SELECT * FROM tblenrollment WHERE AY='{$_POST['ay']}' and SEMESTER='{$_POST['sem']}' and  `TIMEALLOTED`='00:00:00' ORDER BY STUDENTNAME");
					       $row_cnt = $mydb->num_rows();
					        if ($row_cnt > 0) {
					      	$cur = $mydb->loadResultList();
							foreach ($cur as $sy) {
					  		echo '<tr>';
				  			echo '<td>'. $sy->STUDENTID.'</td>';
					  		echo '<td>'. $sy->STUDENTNAME.'</td>';
					  		echo '<td>'. $sy->SEMESTER.'</td>';
					  		echo '<td>' . $sy->AY.'</a></td>';
					  		echo '<td>'.$sy->COURSE .'-' . $sy->YEARLEVEL.'</td>';
					  		echo '<td>'. $sy->TIMEALLOTED.'</td>';
					  	
					  		
					  		echo '</tr>';
		
					  		} 

		echo '  </tbody>
          
        </table>';
        echo '<a href="index.php?view=print&ay='.$_POST['ay'].'&sem='.$_POST['sem'].'&flag=2" class="btn btn-primary">Print</a>';
					        }else{
					  		message("No results found!","info");
						 	redirect('index.php');	 
					        		
					        }
					}

				  		
					
				  	?>
				
            <div class="btn-group">
      
         </span>


        </div>

        </div><!--End of container-->

    </div>
 </form>
       
