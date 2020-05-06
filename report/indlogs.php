                      <?php 
                        if (!isset($_SESSION['ACCOUNT_ID'])){
                         redirect(web_root."admin/index.php");
                         }

                 
                       ?> 

<?php

 
      ?>
 
<form class="form-horizontal span6" action="index.php?view=indlogsrpt" method="POST">

<div class="col-md-12 well" >
<legend>Individual Report Filter</legend>
	<div class="form-group">
	    <div class="col-md-8">
	      <label class="col-md-4 control-label" for=
	      "course">Student ID Number</label>

	      <div class="col-md-8">
	    	<input type="text" name="studidno" class="form-control input-sm">
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


        </div><!--End of container-->

    </div>
 </form>
       
