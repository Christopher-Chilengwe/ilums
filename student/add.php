                      <?php 
                        if (!isset($_SESSION['ACCOUNT_ID'])){
                          redirect(web_root."admin/index.php");
                         }

                 
                       ?> 
 <form class="form-horizontal well span6" action="controller.php?action=add" method="POST">

    <fieldset>
         
            <legend> Primary Details</legend>       

          <div class="form-group" >
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "idno">ID Number*</label>

              <div class="col-md-8">
                 <input class="form-control input-sm" id="idno" name="idno" placeholder="ID Number" type="number" value="">
              </div>

            </div>
           </div> 
            <div class="form-group">
              <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "fName">Firstname:</label>

                <div class="col-md-8">
                  
                   <input class="form-control input-sm" id="fName" name="fName" type="text" placeholder="First Name">
                </div>
              </div>
            </div>

           <div class="form-group">
              <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "lName">LastName:*</label>

                <div class="col-md-8">
                  <input class="form-control input-sm" id="lName" name="lName" type=
                  "text" placeholder="Last Name">
                </div>
              </div>
            </div>
             <div class="form-group">

              <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "mName">Middlename:*</label>

                <div class="col-md-8">
                  <input class="form-control input-sm" id="mName" name="mName" type=
                  "text" placeholder="Middle Name">
                </div>
              </div>
            </div>
            <!--
          <div class="form-group">
              <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "gender">Gender </label>

                <div class="col-md-8">
                  <select class="form-control input-sm" name="gender" id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option> 
                  </select> 
                </div>
              </div>
            </div>
             <div class="form-group">
              <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "bday">Birth Date</label>
    
                    <div class="col-md-8">
                          <div class="input-group date form_curdate col-md-15" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd">
                            <input class="form-control" size="11" type="date" value="" data-date-format="yyyy-mm-dd" name="bday" id="bday">
                           
               
                        </div>
                      </div>
              </div>
            </div>
             <div class="form-group">
               <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "age">Age</label>

                <div class="col-md-8">
                  <input class="form-control input-sm" id="age" name="age" type="number" placeholder="age">
                </div>
              </div>
            </div>
             <div class="form-group">
              <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "contact">Contact </label>

                <div class="col-md-8">
                  <input class="form-control input-sm" id="contact" name="contact" type="text" placeholder="Contact Number">
                </div>
              </div>
            </div>
           <div class="form-group">
               <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "email">Email</label>

                <div class="col-md-8">
                  <input class="form-control input-sm" id="email" name="email" type=
                  "text" placeholder="Email address">
                </div>
              </div>
            </div>
              <div class="form-group">
                <div class="col-md-8">
                  <label class="col-sm-4 control-label" for=
                  "home">Home   </label>

                  <div class="col-md-8">
                    <input class="form-control input-sm" id="home" name="home" type=
                    "text" placeholder="Home Address">
                  </div>
                </div>
              </div>
             -->
              
          </fieldset> 
            
          <fieldset>
            <legend>Accounts Details</legend>

 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "username">Username:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="username" name="username" placeholder=
                            "Username" Address" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "pass">Password:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="pass" name="pass" placeholder=
                            "Account Password" type="Password" value="">
                      </div>
                    </div>
                  </div>
          </fieldset>
            <div class="form-group">
                <div class="col-md-8">
                  <label class="col-sm-4 control-label" for=
                  "home">   </label>

                  <div class="col-md-8">
                     <button class="btn btn-primary" name="save" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
                  </div>
                </div>
              </div>  
        </form>
       