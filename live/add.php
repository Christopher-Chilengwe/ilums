<?php  
      if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }

  @$USERID = $_SESSION['ACCOUNT_ID'];
    if($USERID==''){
  redirect("index.php");
}

?> 
<form method="POST" name="testform" action="http://localhost/ilums/live">
<input id="clickButton" class="button" name="accept" type="hidden"/>
<input id="tests" name="tests" type="hidden" />


      <H1>Active Students</H1>
      <div class="table-responsive">         
        <table id="example_live" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
        
          <thead>
            <tr>
              <th>No.</th>
              <th>Student Name</th>
              <th>Last Login Date</th> 
              <th>Last Login Time</th>
              <th>Time Start</th>
              <th>Time End</th>
              <th>Status</th>
            </tr> 
          </thead> 
          <tbody>
        
          </tbody>
          
        </table>
            <div class="btn-group">
         <!--  <a href="index.php?view=add" class="btn btn-default">New</a> -->
         
        </div>

        </div><!--End of container-->
  
</form>
<script type="text/javascript" language="javascript">

  //setInterval ( "doSomething()", 10000 );
setInterval ( "doSomething()", 2000 );
function doSomething ( )
{

$('input[type="search"]').val('').keyup()
  var x = 100; // can be any number
var rand = Math.floor(Math.random()*x) + 1;
   document.getElementById('tests').value=rand;
   document.getElementsByTagName('input').value= rand;
   document.getElementsByName('search').value=rand;
 
  // var button = document.getElementById('clickButton');
   // button.form.submit();

   }
//setInterval (500000 );


 // 
 </script>