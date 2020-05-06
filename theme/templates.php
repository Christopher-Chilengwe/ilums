
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $title; ?></title>
 

 <!-- Bootstrap Core CSS -->
    <link href="<?php echo WEB_ROOT; ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo WEB_ROOT; ?>/css/sb-admin.css" rel="stylesheet">


    <link href="<?php echo WEB_ROOT; ?>/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">

    <link href="<?php echo WEB_ROOT; ?>/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"> 

    <!-- Custom Fonts -->
    <link href="<?php echo WEB_ROOT; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 

    <!-- light box -->
    <link href="<?php echo WEB_ROOT; ?>/css/ekko-lightbox.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>/dist/bootstrap-clockpicker.min.css">

    <link rel="icon" href="<?php echo WEB_ROOT; ?>favicon-1.ico" type="image/x-icon">
  <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/buttons.print.min.js"></script>
     <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/jquery-1.12.4.js"></script>
        <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>jquery/jquery.countdown.js"></script>
          <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>jquery/jquery.countdown.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]--> 


</head>
<script type="text/javascript" charset="utf-8">

$(document).ready(function() {
    var t = $('#example_live').DataTable( {

    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"<?php echo WEB_ROOT; ?>live/loaddata.php",
      type:"POST"
    },
        "columnDefs": [ {
            "searchable": true,
            "orderable": true,
            "targets": 1
        } ],
        //vertical scroll
         "scrollY":        "400px",
        "scrollCollapse": true,
        //ordering start at column 2
       "order": [[ 2, 'asc' ]]
    } );

        t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
 
} );



//setInterval("reloadPage", 1000);
//function reloadPage(){
// $( "#example_live" ).load("<?php echo WEB_ROOT; ?>live/loaddata.php #example_live" );
 
//}


//setInterval ( "doSomething()", 2000 );

//function doSomething ( )
//{

  //var x = 100; // can be any number
//var rand = Math.floor(Math.random()*x) + 1;
 //  document.getElementById('tests').value=rand;
  // document.getElementById('testform').submit();
  // var button = document.getElementById('clickButton');
  //  button.form.submit();

   //}

</script>


      
<style>
.without_ampms::-webkit-datetime-edit-ampm-field {
   display: none;
 }
 input[type=time]::-webkit-clear-button {
   -webkit-appearance: none;
   -moz-appearance: none;
   -o-appearance: none;
   -ms-appearance:none;
   appearance: none;
   margin: -10px; 
 }

p {
  text-align: center;
  font-size: 60px;
}
</style>

  <?php
   //admin_confirm_logged_in();
  if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(WEB_ROOT."/login.php");
     } 


?>
      
<body>
 
 
<div id="wrapper">

   <form action='<?php echo WEB_ROOT; ?>/logout.php' method="POST">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo WEB_ROOT;?>">Internet Laboratory Usage Management System</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
 
                <!-- account -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['ACCOUNT_NAME']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                          <?php
                           if($_SESSION['ACCOUNT_TYPE']=='Student'){
                           echo '<input type="hidden" id="displaytimer" name="updatedtimes">';
                             echo '<label id="hms">'. $_SESSION['HR'].':'.$_SESSION['MM'].':'.$_SESSION['SS'] .'</label>';
                         }
                         ?>
                    
                            <button type="submit" class="btn-warning">  <i class="fa fa-fw fa-power-off"> </i> Log Out    </button>
                         
                        </li>
                    </ul>
                </li>
                <!-- end account -->
            </ul> 
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav"> 
                  <?php if ($_SESSION['ACCOUNT_TYPE']=='Student') { ?> 
                   <li class="<?php echo (currentpage() == 'category') ? "active" : false;?>">
                       <a href="<?php echo WEB_ROOT; ?>profile/?id="><i class="fa fa-fw fa-user" ></i> Profile</a>

                    </li>
                    <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>">
                        <a href="<?php echo WEB_ROOT; ?>account/"><i class="fa fa-fw fa-user"></i> Account Details</a>
                    </li>
                     <li class="<?php echo (currentpage() == 'logs') ? "active" : false;?>">
                        <a href="<?php echo WEB_ROOT; ?>timelogs/"><i class="fa fa-fw fa-book"></i> Time Logs</a>
                    </li>

                  
                 <?php } ?>
<?php if ($_SESSION['ACCOUNT_TYPE']=='Administrator') { ?> 
                   <li data-toggle="collapse" class="collapsed  <?php echo (currentpage() == 'user') ? "active" : false;?>" data-target="#entry" >
                      <a href="#"><span class="glyphicon glyphicon-pencil"> </span>Manage Student Records</a>
                        <ul class="sub-menu collapse" id="entry">
                          <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>"> <a href="<?php echo WEB_ROOT; ?>student/">Enrollment</a></li>
                       
                        </ul>  

                    </li>
                   
                   
                    <li class="<?php echo (currentpage() == 'category') ? "active" : false;?>">
                        <a href="<?php echo WEB_ROOT; ?>enrollment/"><i class="fa fa-fw fa-table"></i> Manage All User</a>
                    </li>
                    
                     
<?php } ?>
<?php if ($_SESSION['ACCOUNT_TYPE']=='Cashier') { ?> 
                    <li class="<?php echo ($_GET['view']== 'POS' || $_GET['view']== 'addmeal') ? "active" : false;?>">
                        <a href="<?php echo WEB_ROOT; ?>/orders/index.php?view=POS"><i class="fa fa-fw fa-barcode"></i> Enrollment <div id="notif" class="label label-danger"><?php echo $maxrow; ?></div></a>
                    </li> 
<?php } ?>

<?php if ($_SESSION['ACCOUNT_TYPE']=='Administrator') { ?> 
                    <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>">
                        <a href="<?php echo WEB_ROOT; ?>course/"><i class="fa fa-fw fa-square"></i> Manage Course</a>
                    </li>
                    <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>">
                        <a href="<?php echo WEB_ROOT; ?>user/"><i class="fa fa-fw fa-user"></i> Manage User Accounts</a>
                    </li>
                      <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>">
                        <a href="<?php echo WEB_ROOT; ?>live/"><i class="fa fa-fw fa-square"></i> Live Monitor</a>
                    </li>
                      <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>">
                        <a href="<?php echo WEB_ROOT; ?>studentlogs/"><i class="fa fa-fw fa-file-text"></i> Student Logs</a>
                    </li>
                      <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>">
                        <a href="<?php echo WEB_ROOT; ?>band/"><i class="fa fa-fw fa-file"></i> Banned Students</a>
                    </li>
                    <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>">
                        <a href="http://192.168.1.1/login.asp"target="_blank"><i class="fa fa-fw fa-file"></i> WIFI monitoring</a>
                    </li>
                    <li data-toggle="collapse" class="collapsed  <?php echo (currentpage() == 'user') ? "active" : false;?>" data-target="#settings" >
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Manage Settings</a>
                        <ul class="sub-menu collapse" id="settings">
                          <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>"> <a href="<?php echo WEB_ROOT; ?>settings/">Defaults Settings</a></li>
                          <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>"> <a href="<?php echo WEB_ROOT; ?>defaulttime/">Time Settings</a></li>
                        </ul>  
                    </li>
<?php } ?>
<?php if ($_SESSION['ACCOUNT_TYPE']=='Librarian') { ?> 
                  
                      <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>">
                        <a href="<?php echo WEB_ROOT; ?>live/"><i class="fa fa-fw fa-square"></i> Live Monitor</a>
                    </li>
                  <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>">
                        <a href="<?php echo WEB_ROOT; ?>account/"><i class="fa fa-fw fa-user"></i> Account Details</a>
                    </li>
               
<?php } ?>

<?php if ($_SESSION['ACCOUNT_TYPE']=='Administrator' || $_SESSION['ACCOUNT_TYPE']=='Cashier') { ?>
                    <li data-toggle="collapse" class="collapsed  <?php echo (currentpage() == 'user') ? "active" : false;?>" data-target="#rpt" >
                        <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> Report</a>
                        <ul class="sub-menu collapse" id="rpt">
                    <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>"> <a href="<?php echo WEB_ROOT; ?>report/">Student Records</a></li>
                     <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>"> <a href="<?php echo WEB_ROOT; ?>report/index.php?view=banned">Banned Students</a></li> 
                     <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>"> <a href="<?php echo WEB_ROOT; ?>report/index.php?view=indilogs">Individual Student Logs</a></li> 
                      </ul>  
                    </li>  
<?php } ?> 

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

         </form>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
               <div class="row" > 

                   <?php   check_message();  ?>   
    <?php require_once $content; ?> 

<!--               
<div id="hms"> </div> -->

                   <script type="text/javascript">
                  var startTime;
                  function getCookie(name) {
                    var value = "; " + document.cookie;
                    var parts = value.split("; " + name + "=");
                    if (parts.length == 2) return parts.pop().split(";").shift();
                  } // credits kirlich @http://stackoverflow.com/questions/10730362/get-cookie-by-name

                  function count() {
                   if(typeof getCookie('remaining')!= 'undefined')
                   {
                     startTime = getCookie('remaining');
                   }
                   else if(document.getElementById('hms').innerHTML.trim()!='')
                   {
                     startTime = document.getElementById('hms').innerHTML;
                   }
                   else
                   {
                    var d = new Date(); 
                    var h=d.getHours(); 
                    var m=d.getMinutes();
                    var s=d.getSeconds();
                    startTime = h+':'+m+':'+s;
                    //OR
                    startTime  = d.toTimeString().split(" ")[0]
                   }

                   var pieces = startTime.split(":");
                   var time = new Date();
                   time.setHours(pieces[0]);
                   time.setMinutes(pieces[1]);
                   time.setSeconds(pieces[2]);
                   var timediff = new Date(time.valueOf()-1000)
                   var newtime = timediff.toTimeString().split(" ")[0];
                   document.getElementById('hms').innerHTML=newtime ;
                   document.getElementById('displaytimer').value=newtime;
                   //document.cookie = "remaining="+newtime;+ "path=/";
                   document.cookie = "remaining="+newtime+"; path=/"; 
                   setTimeout(count,1000);
                  }
                  count();
                    </script>

                  
              
              </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<!-- jQuery --> 
<script src="<?php echo WEB_ROOT; ?>/jquery/jquery.min.js"></script> 
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo WEB_ROOT; ?>/js/bootstrap.min.js"></script>

<script src="<?php echo WEB_ROOT; ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo WEB_ROOT; ?>/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/js/bootstrap-datepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/js/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>

<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/js/janobe.js" charset="UTF-8"></script> 
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/dist/bootstrap-clockpicker.min.js"></script>
<script src="<?php echo WEB_ROOT; ?>/js/ekko-lightbox.js"></script>
<script src="<?php echo WEB_ROOT; ?>/js/lightboxfunction.js"></script> 
<script type="text/javascript">
$('.clockpicker').clockpicker()
  .find('input').change(function(){
    console.log(this.value);
  });
var input = $('#single-input').clockpicker({
  placement: 'bottom',
  align: 'left',
  autoclose: true,
  'default': 'now'
});

$('.clockpicker-with-callbacks').clockpicker({
    donetext: 'Done',
    init: function() { 
      console.log("colorpicker initiated");
    },
    beforeShow: function() {
      console.log("before show");
    },
    afterShow: function() {
      console.log("after show");
    },
    beforeHide: function() {
      console.log("before hide");
    },
    afterHide: function() {
      console.log("after hide");
    },
    beforeHourSelect: function() {
      console.log("before hour selected");
    },
    afterHourSelect: function() {
      console.log("after hour selected");
    },
    beforeDone: function() {
      console.log("before done");
    },
    afterDone: function() {
      console.log("after done");
    }
  })
  .find('input').change(function(){
    console.log(this.value);
  });

// Manually toggle to the minutes view
$('#check-minutes').click(function(e){
  // Have to stop propagation here
  e.stopPropagation();
  input.clockpicker('show')
      .clockpicker('toggleView', 'minutes');
});
if (/mobile/i.test(navigator.userAgent)) {
  $('input').prop('readOnly', true);
}
</script>
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/assets/js/highlight.min.js"></script>
<script type="text/javascript">
hljs.configure({tabReplace: '    '});
hljs.initHighlightingOnLoad();
</script>
<script>

 $(document).on("click",".delenrollment",function(e){ 

              var confirmation =      confirm('Are you sure you want to delete this Enrollment?');

              if (confirmation==true) {

                return true;
              }else{
                return false;
              } 

          });
 $(document).on("click",".useractive",function(e){ 

              var confirmation =      confirm('Are you sure you want to Activate this User?');

              if (confirmation==true) {

                return true;
              }else{
                return false;
              } 

          });
  $(document).on("click",".deactivate",function(e){ 

              var confirmation =      confirm('Are you sure you want to de-activate this User?');

              if (confirmation==true) {

                return true;
              }else{
                return false;
              } 

          });




  function checkall(selector)
  {
    if(document.getElementById('chkall').checked==true)
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=true;
      }
    }
    else
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=false;
      }
    }
  }
  </script>   
     <script type="text/javascript">
                              $(function () {
                                  $('#datetimepicker3').datetimepicker({
                                      format: 'LT'
                                  });
                              });
                          </script>

<script>
/*// Set the date we're counting down to
var hour = <?PHP // ECHO $_SESSION['HR'] ;?>;
var mint = <?PHP //ECHO $_SESSION['MM'] ;?>;
var sec = <?PHP //ECHO $_SESSION['SS'] ;?>;


var totalmins = (((hour * 60) + mint) * 60 ) +  sec;
var countDownDate = new Date(Date.parse(new Date()) + totalmins * 1000);
//var countDownDate = new Date("Jan 5, 2018 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = hours + ": "
    + minutes + ": " + seconds ;
    //  document.getElementById('txtName').value
    document.getElementById("displaytime").value = hours + ": "
    + minutes + ": " + seconds ;


    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);*/
</script>

</body>
</html>