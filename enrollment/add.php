                      <?php 
                        if (!isset($_SESSION['ACCOUNT_ID'])){
                         redirect(web_root."admin/index.php");
                         }

                 
                       ?> 
<?php
        /*if (isset($_POST['search'])){
        if ($_POST['txtsearch']==""){
          message("ID Number is required!","error");
          

        }else{
          $student = new Student();
          $mysqli = new mysqli("localhost", "root", "", "ilmsdb");
          if (mysqli_connect_errno()) {
             printf("Connect failed: ", mysqli_connect_error());
             exit();
          }
          if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE IDNO=".$_POST['txtsearch']."")) {
            $row_cnt = $result->num_rows;
         
            if($row_cnt==1){
               message("Found 1 Result!","success");
               $cur = $student->single_student($_POST['txtsearch']);
               
            }else{
              message("No Results found!","error");
            }
            $result->close();
           }else{
              message("No Results found!","error");
           }
          $mysqli->close();


        }
      }*/
      if (isset($_POST['search'])){
        if ($_POST['txtsearch']==""){
          message("ID Number is required!","error");
          

        }else{
          $student = new Student();
         // $mysqli = new mysqli("localhost", "root", "", "ilmsdb");
          
          //if (mysqli_connect_errno()) {
            // printf("Connect failed: ", mysqli_connect_error());
            // exit();
          //}
            global $mydb;
      $mydb->setQuery("SELECT * FROM tblstudent WHERE IDNO=".$_POST['txtsearch']."");
      $row_cnt = $mydb->num_rows();

          //if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE IDNO=".$_POST['txtsearch']."")) {
          //  $row_cnt = $result->num_rows;
         
            if($row_cnt==1){
               message("Found 1 Result!","success");
               $cur = $student->single_student($_POST['txtsearch']);
               
            }else{
              message("No Results found!","error");
            }
           // $result->close();
          /* }else{
              message("No Results found!","error");
           }*/
       //   $mysqli->close();


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
      <form class="navbar-form navbar-left" id="lets_search" action="index.php?view=add" method="POST">
      <div class="form-group">
        <input type="text" name="txtsearch" id="txtsearch" class="form-control" placeholder="Search">
      </div>
       <button type="submit" name="search"  class="btn btn-default">  <span class="glyphicon glyphicon-search"></span></button></span>
      
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><?php
       $created =  strftime("%Y-%m-%d %H:%M:%S", time()); 


       date_toText($created); ?></a></li>
      <li class="dropdown">
       
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>

 <form class="form-horizontal span6" action="controller.php?action=add" method="POST">

      <fieldset>
            <legend>Add Enrollment</legend>
                              
                  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Idnum">ID Number:</label>

                      <div class="col-md-8">
                        <input name="Idnum" type="hidden" value="">
                         <input class="form-control input-sm" id="Idnum" readonly name="Idnum" placeholder=
                            "ID Number" type="text" value="<?php echo (isset($cur)) ? $cur->IDNO : '' ;?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "studname">Student Name:</label>

                      <div class="col-md-8">
                        <input class="form-control input-sm" id="studname" readonly name="studname" placeholder=
                            "Student Name" type="text" value="<?php echo (isset($cur)) ? $cur->LNAME.', '.$cur->FNAME : '' ;?>">
                      </div>
                    </div>
                  </div>
                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Course">Course : </label>

                      <div class="col-md-8">
                        <select class="form-control input-sm" name="Course" id="Course">
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
                      "grdlvl">Year Level</label>

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
                      "Semester">Semester : </label>

                      <div class="col-md-8">
                          <?php
                        $mydb->setQuery("SELECT * FROM(tblcommon_list) WHERE category = 'SEMESTER' and ISDEFAULT='YES'");
                          $res =  $mydb->loadSingleResult();
                          echo ' <input class="form-control input-sm" id="Semester"  name="Semester" placeholder=
                            "Semester" type="text" readonly value="'. $res->LISTNAME .'">';
                        ?>
                            
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "ay">Academic Year :</label>

                      <div class="col-md-8">
                     
                        <?php
                        $mydb->setQuery("SELECT * FROM(tblcommon_list) WHERE category = 'AY'");
                        $cur = $mydb->loadSingleResult();
                        echo ' <input class="form-control input-sm" id="ay"  name="ay" placeholder=
                            "Semester" type="text" readonly value="'. $cur->LISTNAME .'">';
                        ?> 
                        </select> 
                      </div>
                    </div>
                  </div>   
          
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                        <button class="btn btn-default" name="save" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
                      </div>
                    </div>
                  </div>


              
          </fieldset> 


              
        </form>
       