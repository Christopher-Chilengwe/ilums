                      <?php 
                        if (!isset($_SESSION['ACCOUNT_ID'])){
                         redirect(web_root."admin/index.php");
                         }

                 
                       ?> 
<?php

if (isset($_POST['search'])){

	 if ($_POST['studidno']==""){
	     message("ID Number is required!","error");
		  redirect('index.php?view=indilogs');
    }else{
      
     $res = $mydb->setQuery("SELECT * FROM tblenrollment where STUDENTID='{$_POST['studidno']}' AND AY= '{$_SESSION['AY']}' AND SEMESTER='{$_SESSION['SEMESTER']}' LIMIT 1");
       $row_cnt = $mydb->num_rows();
    //  echo $row_cnt;
        if ($row_cnt > 0) {
        	$sing = $mydb->loadSingleResult();
        }else{
  		message("No resultsdsfds found!","info");
		  redirect('index.php?view=indilogs');
        		
        }

    }
}

 
      ?>
 
<form class="form-horizontal span6" action="#" method="POST">
<div class="col-sm-12">

<table class="table" align="center" >	 
				    			
			  <tbody>				    
		     	<tr>
		     		<td><strong>ID Number:</strong><?php echo (isset($sing)) ? $sing->STUDENTID : '' ;?><br/>
		     		<strong>Student Name:</strong><?php echo (isset($sing)) ? $sing->STUDENTNAME : '' ;?><br/>
		     
		     	 
		     	</tr>
	    	</tbody>
	    </table>
	

	

</div>

<H1>Students Record</H1>
      <div class="table-responsive">         
        <table id="studentlogs" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
        
          <thead>
            <tr>
              <th>No.</th>
              <th>Last Login Date</th> 
              <th>Last Login Time</th>
              <th>Time Start</th>
              <th>Time End</th>
              <th>Status</th>
            </tr> 
          </thead> 
          <tbody>
          	<?php
        if (isset($_POST['search'])){
	        if ($_POST['studidno']==""){
	          message("ID Number is required!","error");
	          redirect('index.php?view=indilogs');
	        }else{
		       	global $mydb;
		       	echo $_POST['search'];
				$query ="SELECT * FROM `tbltimelogs` l RIGHT JOIN tblstudent s on l.IDNUM=s.IDNO where s.IDNO=".$_POST['studidno'];
					
				$mydb->setQuery($query);
				$cur = $mydb->loadResultList();
				$i = 1;	
		   	
					foreach ($cur as $result) {
						echo '<tr>';		 
						echo '<td>'. $i .'</td>';
						echo '<td>'.$result->LAST_LOGINDATE.'</td>';
						echo '<td>'.$result->LAST_LOGINTIME.'</td>';
						echo '<td>'.$result->TIMESTART.'</td>';
						echo '<td>'.$result->TIMEEND.'</td>';
						echo '<td>'.$result->ACTIVESTATUS.'</td>';
						echo '</tr>';
					$i = $i + 1;		
					}
			}
		}	
		?>
          </tbody>
          
        </table>
            <div class="btn-group">
         <!--  <a href="index.php?view=add" class="btn btn-default">New</a> -->
         
        </div>

        </div><!--End of container-->
 </form>
       