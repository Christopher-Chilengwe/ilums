                      <?php 
                        if (!isset($_SESSION['ACCOUNT_ID'])){
                          redirect(web_root."admin/index.php");
                         }

                 
                       ?> 

 <form class="form-horizontal span6" action="controller.php?action=add" method="POST">

      <fieldset>
            <legend>New Default</legend>
              <div class="form-group">
                  <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "category">Time</label>

                      <div class="col-md-8">
                     
                          <div class="clearfix">
                            <div class="input-group clockpicker-with-callbacks">
                              <input type="text" class="form-control" value="10:10" id="category" name="category">
                              <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                              </span>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                          
                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "default">Set Default?</label>

                      <div class="col-md-8">
                          <select class="form-control input-sm" name="default" id="default">
                           <option value="NO">NO</option>
                            <option value="YES">YES</option>
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
       