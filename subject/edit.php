<?php  
      if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }

   $singlesubject = new Subject();
  $object = $singlesubject->single_subject($_GET['id']);
?> 

 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

          <fieldset>
            <legend> Update Subject Details</legend>
                   
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "subjcode">Subject Code</label>

                      <div class="col-md-8">
                       <input name="subjid" type="hidden" value="<?php echo $object->SUBJ_ID;?>">
                         <input class="form-control input-sm" id="subjcode" name="subjcode" placeholder=
                            "Subject Code" type="text" value="<?php echo $object->SUBJ_CODE;?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "subjdesc">Subject Description</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="subjdesc" name="subjdesc" placeholder=
                            "Subject Description" type="text" value="<?php echo $object->SUBJ_DESCRIPTION;?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "course">Course</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="course" id="course">

                            <?php
                            $course = new Dept();
                            $cur = $course->listOfDept(); 
                            foreach ($cur as $course) {

                              if ($object->SUBJ_DESCRIPTION = $course->DEPARTMENT_NAME) {
                                 echo '<option value="'. $course->DEPARTMENT_NAME.'" selected="selected">'. $course->DEPARTMENT_NAME .'</option>';

                              }else{
                                
                            
                                 echo '<option value="'. $course->DEPARTMENT_NAME.'">'.$course->DEPARTMENT_NAME .'</option>';
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
                      "idno"></label>

                      <div class="col-md-8">
                         <button class="btn btn-primary " name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                          <!-- <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span>&nbsp;<strong>List of Users</strong></a> -->
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