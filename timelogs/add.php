<?php  
      if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }

  @$USERID = $_SESSION['ACCOUNT_ID'];
    if($USERID==''){
  redirect("index.php");
}
  $user = New User();
  $singleuser = $user->single_user($USERID);

?> 

      <H1>Time Logs</H1>
      <div class="table-responsive">         
        <table class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
        
          <thead>
            <tr>
              <!-- <th>No.</th> -->
              <th>Last Login Date</th> 
              <th>Last Login Time</th>
              <th>Time Start</th>
              <th>Time End</th>
              <th>Status</th>
            </tr> 
          </thead> 
          <tbody>
            <?php 
              $mydb->setQuery("SELECT * FROM `tbltimelogs` where IDNUM='".$_SESSION['EMPID']."'");
              $cur = $mydb->loadResultList(); 

            foreach ($cur as $result) {
              echo '<tr>';
              // echo '<td width="5%" align="center"></td>'; 
              echo '<td>' . $result->LAST_LOGINDATE .'</td>';
              echo '<td>' . $result->LAST_LOGINTIME .'</td>';
              echo '<td>' . $result->TIMESTART .'</td>';
              echo '<td>' . $result->TIMEEND .'</td>';
              echo '<td>' . $result->ACTIVESTATUS .'</td>';
              echo '</tr>';
            } 
            ?>
          </tbody>
          
        </table>
            <div class="btn-group">
         <!--  <a href="index.php?view=add" class="btn btn-default">New</a> -->
         
        </div>

        </div><!--End of container-->
  

