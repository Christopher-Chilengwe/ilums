<?php  
      if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }

?> 

<?php
        if (isset($_GET['id'])){
      
          $student = new Schoolyr();
          $cur = $student->single_sy($_GET['id']);
       
      }
     
      ?>

 <form class="form-horizontal span6" action="controller.php?action=edit&id=<?php echo (isset($cur)) ? $cur->ENROLLMENTID : '' ;?>" method="POST">

          <fieldset>
            <legend>Update Enrollment</legend>
                              
                  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Idnum">ID Number:</label>

                      <div class="col-md-8">
                        <input name="Idnum" type="hidden" value="">
                         <input class="form-control input-sm" id="Idnum" readonly name="Idnum" placeholder=
                            "ID Number" type="text" value="<?php echo (isset($cur)) ? $cur->STUDENTID : '' ;?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "studname">Student Name:</label>

                      <div class="col-md-8">
                        <input class="form-control input-sm" id="studname" readonly name="studname" placeholder=
                            "Student Name" type="text" value="<?php echo (isset($cur)) ? $cur->STUDENTNAME : '' ;?>">
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
                         $curs = $mydb->loadResultList();
                         foreach ($curs as $res) {

                              if ($cur->COURSE == $res->COURSE_NAME ){
                                 echo '<option value="'. $res->COURSE_NAME.'"  selected>'. $res->COURSE_NAME. '</option>';
                              }else{
                                echo '<option value="'. $res->COURSE_NAME.'" >'. $res->COURSE_NAME. '</option>';
                              }
                             
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
                         $curlv = $mydb->loadResultList();
                         foreach ($curlv as $ress) {
                            if ($curlv->YEARLEVEL== $ress->COURSE_LEVEL ){
                                echo '<option value="'. $ress->COURSE_LEVEL.'" selected>'. $ress->COURSE_LEVEL. '</option>';
                            }else{
                                echo '<option value="'. $ress->COURSE_LEVEL.'" >'. $ress->COURSE_LEVEL. '</option>';
                            }
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
                        <input class="form-control input-sm" id="Semester"  name="Semester" type="text" readonly value="<?php echo (isset($cur)) ? $cur->SEMESTER : '' ;?>">
                     
                            
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "ay">Academic Year :</label>

                      <div class="col-md-8">
                      <input class="form-control input-sm" id="ay"  name="ay" placeholder=
                            "Semester" type="text" readonly value="<?php echo (isset($cur)) ? $cur->AY : '' ;?>">
                        </select> 
                      </div>
                    </div>
                  </div>   
           <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "allotedtime">Time Alloted : </label>

                      <div class="col-md-8">
                        <input class="form-control input-sm" id="allotedtime"  name="allotedtime" type="text" value="<?php echo (isset($cur)) ? $cur->TIMEALLOTED : '' ;?>">
                     
                            
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



        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>

                    <div class="col-md-6">
                   
                    </div>
                  </div>

                  <div class="col-md-6" align="right">
                   

                   </div>
                  
              </div>
              </div>
          
        </form>
      

        </div><!--End of container-->