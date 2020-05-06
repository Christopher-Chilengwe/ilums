                      <?php 
                        if (!isset($_SESSION['ACCOUNT_ID'])){
                         redirect(web_root."admin/index.php");
                         }

                 
                       ?> 

<?php

if (isset($_POST['search'])){

	 if ($_POST['txtsearch']==""){
	     message("ID Number is required!","error");
		 redirect('index.php');	 
    }else{
      
     $res = $mydb->setQuery("SELECT * FROM tblenrollment where STUDENTID= ". $_POST['txtsearch'] ." AND AY= '{$_SESSION['AY']}' AND SEMESTER='{$_SESSION['SEMESTER']}' LIMIT 1");
       $row_cnt = $mydb->num_rows();
    //   echo $row_cnt;
        if ($row_cnt == 1) {
        	$sing = $mydb->loadSingleResult();
        }else{
  		message("No results found!","info");
		 redirect('index.php');	 
        		
        }

    }
}

 
      ?>

 <nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#"> Student ID Number:</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left" id="lets_search" action="index.php?view=list" method="POST">
      <div class="form-group">
        <input type="text" name="txtsearch" id="txtsearch" class="form-control" placeholder="Search">
      </div>
       <button type="submit" name="search"class="btn btn-default">  <span class="glyphicon glyphicon-search"></span></button></span>
      
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><?php
       $created =  strftime("%Y-%m-%d %H:%M:%S", time()); 


      echo date_toText($created); ?></a></li>
      <li class="dropdown">
       
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>


 
<form class="form-horizontal span6" action="#" method="POST">
<div class="col-md-6">

	<div class="form-group">
	    <div class="col-md-8">
	      <label class="col-md-4 control-label" for=
	      "Idnum">ID Number:</label>

	      <div class="col-md-8">
	        <input name="Idnum" type="hidden" value="">
	         <input class="form-control input-sm" id="Idnum" readonly name="Idnum" placeholder=
	            "ID Number" type="text" value="<?php echo (isset($sing)) ? $sing->STUDENTID : '' ;?>">
	      </div>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-md-8">
	      <label class="col-md-4 control-label" for=
	      "studname">Student Name:</label>

	      <div class="col-md-8">
	        <input class="form-control input-sm" id="studname" readonly name="studname" placeholder=
	            "Student Name" type="text" value="<?php echo (isset($sing)) ? $sing->STUDENTNAME : '' ;?>">
	      </div>
	    </div>
	  </div>

	

</div>
<div class="col-md-6">

	<div class="form-group">
	    <div class="col-md-10">
	      <label class="col-md-4 control-label" for=
	      "Idnum">AY, SEMESTER:</label>

	      <div class="col-md-8">
	        <input name="Idnum" type="hidden" value="">
	         <input class="form-control input-sm" id="Idnum" readonly name="Idnum" placeholder=
	            "ID Number" type="text" value="<?php echo (isset($sing)) ? $sing->AY. ', '. $sing->SEMESTER : '' ;?>">
	      </div>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-md-10">
	      <label class="col-md-4 control-label" for=
	      "studname">Remaining Time:</label>

	      <div class="col-md-8">
	        <input class="form-control input-sm" id="studname" readonly name="studname" placeholder=
	            "Student Name" type="text" value="<?php echo (isset($sing)) ? $sing->TIMEALLOTED : '' ;?>">
	      </div>
	    </div>
	  </div>


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
	        if ($_POST['txtsearch']==""){
	     //     message("ID Number is required!","error");
	        }else{
		       	global $mydb;
		       	echo $_POST['search'];
				$query ="SELECT * FROM `tbltimelogs` l RIGHT JOIN tblstudent s on l.IDNUM=s.IDNO where s.IDNO=".$_POST['txtsearch'];
					
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
       