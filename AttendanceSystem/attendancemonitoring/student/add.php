  <?php 
   if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."index.php");
     }

  // $autonum = New Autonumber();
  // $res = $autonum->single_autonumber(2);

?>

 <section id="feature" class="transparent-bg">
        <div class="container">
           <div class="center wow fadeInDown">
                 <h2 class="page-header">Add New Employee</h2>
                <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
            </div>

            <div class="row">
                <div class="features">

                        <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=add" method="POST"> 
                        <!-- <form class="form-horizontal span6  wow fadeInDown" action="#" method="POST">  -->
                             <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "StudentID">Employee ID:</label>

                                <div class="col-md-8">
                                   <!-- <input type="text" id="mytextbox" onkeyup="javascript:capitalize(this.id, this.value);"> -->
                                   <input class="form-control input-sm" id="StudentID" name="EmployeeID" placeholder=
                                      "Student ID" type="number" value="<?php echo(rand(11111111,99999999))?>" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                                </div>
                                <div id="checkid_message"></div>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "Firstname">Firstname:</label>

                                <div class="col-md-8">
                                  
                                   <input class="form-control input-sm" id="Firstname" name="Firstname" placeholder=
                                      "Firstname" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);"  autocomplete="off">
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "Lastname">Lastname:</label>

                                <div class="col-md-8">
                                  
                                   <input class="form-control input-sm" id="Lastname" name="Lastname" placeholder=
                                      "Lastname" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "Middlename">Middlename:</label>

                                <div class="col-md-8">
                                  
                                   <input class="form-control input-sm" id="Middlename" name="Middlename" placeholder=
                                      "Middlename" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                                </div>
                              </div>
                            </div>

                             <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "Address">Address:</label>

                                <div class="col-md-8">
                                  
                                   <input class="form-control input-sm" id="Address" name="Address" placeholder=
                                      "Address" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                                </div>
                              </div>
                            </div> 

                            <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "Gender">Sex:</label>

                                <div class="col-md-8">
                                   <div class="col-lg-5">
                                      <div class="radio">
                                        <label><input checked id="optionsRadios1" checked="True" name="optionsRadios" type="radio" value="Female">Female</label>
                                      </div>
                                    </div>

                                    <div class="col-lg-4">
                                      <div class="radio">
                                        <label><input id="optionsRadios2"   name="optionsRadios" type="radio" value="Male"> Male</label>
                                      </div>
                                    </div> 
                                   
                                </div>
                              </div>
                            </div> 

                             <!-- <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "BirthDate">Date of birth:</label>
           
                                <div class="col-md-8">
                                   <div class="input-group" id=""> 
                                        <div class="input-group-addon"> 
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                        <input id="datemask2" name="BirthDate"  value="" type="text" class="form-control " size="7" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required>
                                      </div>
                                </div>
                              </div>
                            </div>  -->
                             <div class="form-group">
                              <div class="rows">
                                <div class="col-md-8">
                                  <h4>
                                  <div class="col-md-4">
                                    <label class="col-lg-12 control-label">Birthday</label>
                                  </div>

                                  <div class="col-lg-3">
                                    <select class="form-control input-sm" name="month">
                                      <option>Month</option>
                                      <?php

                                         $mon = array('Jan' => 1 ,'Feb'=> 2,'Mar' => 3 ,'Apr'=> 4,'May' => 5 ,'Jun'=> 6,'Jul' => 7 ,'Aug'=> 8,'Sep' => 9 ,'Oct'=> 10,'Nov' => 11 ,'Dec'=> 12 );    
                                      
                                    
                                        foreach ($mon as $month => $value ) {
                                          
                                              # code...
                                               echo '<option value='.$value.'>'.$month.'</option>';
                                            }
                                      
                                           
                                      ?>
                                    </select>
                                  </div>

                                  <div class="col-lg-2">
                                    <select class="form-control input-sm" name="day">
                                      <option>Day</option>
                                    <?php 
                                      $d = range(31, 1);
                                      foreach ($d as $day) {
                                        echo '<option value='.$day.'>'.$day.'</option>';
                                      }
                                    
                                    ?>
                                      
                                    </select>
                                  </div>

                                  <div class="col-lg-3">
                                    <select class="form-control input-sm" name="year">
                                      <option>Year</option>
                                    <?php 
                                      $years = range(2010, 1900);
                                      foreach ($years as $yr) {
                                        echo '<option value='.$yr.'>'.$yr.'</option>';
                                      }
                                    
                                    ?>
                                    
                                    </select>
                                  </div>
                                  </h4>
                                </div>
                              </div>
                            </div>

                               

                             <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "ContactNo">Mobile No:</label>

                                <div class="col-md-8">
                                  
                                   <input class="form-control input-sm" id="ContactNo" name="ContactNo" placeholder=
                                      "Mobile Number" type="number" any value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                                </div>
                              </div>
                            </div> 

                            <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "CourseID">Team:</label>

                                <div class="col-md-8">
                                 <select class="form-control input-sm" name="TeamID" id="TeamID">
                                 <option value="none" >Select</option>
                                    <?php 

                                      $mydb->setQuery("SELECT * FROM `tblteam`");
                                      $cur = $mydb->loadResultList();

                                      foreach ($cur as $result) {
                                        echo '<option value='.$result->TeamID.' >'.$result->TeamCode.' </option>';

                                      }
                                    ?>


                                   
                                  </select> 
                                </div>
                              </div>
                            </div>

                              <div class="form-group">
                                <div class="col-md-8">
                                  <label class="col-md-4 control-label" for=
                                  "U_USERNAME">Username:</label>

                                  <div class="col-md-8">
                                    <input name="deptid" type="hidden" value="">
                                     <input class="form-control input-sm" id="U_USERNAME" name="U_USERNAME" placeholder=
                                        "Username" type="text" value="" autocomplete="off">
                                       <div id="errormsg_username"></div>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="col-md-8">
                                  <label class="col-md-4 control-label" for=
                                  "U_PASS">Password:</label>

                                  <div class="col-md-8">
                                    <input name="deptid" type="hidden" value="">
                                     <input class="form-control input-sm" id="U_PASS" name="U_PASS" placeholder=
                                        "Account Password" type="Password" value="" >
                                       <div id="errormsg_pass1"></div>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="col-md-8">
                                  <label class="col-md-4 control-label" for=
                                  "RU_PASS">Re-type Password:</label>

                                  <div class="col-md-8">
                                    <input name="deptid" type="hidden" value="">
                                     <input class="form-control input-sm RU_PASS" id="RU_PASS" name="RU_PASS" placeholder=
                                        "Re-type Password" type="Password" value="" >
                                       <div id="errormsg_pass2"></div>
                                       <!-- <div id="errormsg"></div> -->
                                  </div>
                                </div>
                              </div>

                                <?php 
                                  if ($_SESSION['ACCOUNT_TYPE']=='Administrator') {
                                        # code...
                                 ?>


                              <div class="form-group">
                                <div class="col-md-8">
                                  <label class="col-md-4 control-label" for=
                                  "U_ROLE">Role:</label>

                                  <div class="col-md-8">
                                   <select class="form-control input-sm" name="U_ROLE" id="U_ROLE">
                                      <option value="Administrator"  >Administrator</option>
                                      <!-- <option value="Staff"  >Staff</option>  -->
                                      <option value="Registrar">Registrar</option>
                                      <!-- <option value="Encoder" >Encoder</option> -->
                                    </select> 
                                  </div>
                                </div>
                              </div>

                                <?php } ?>
                          <!--  <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "YearLevel">Level:</label>

                                <div class="col-md-8">
                                  <select class="form-control input-sm" name="YearLevel" id="YearLevel">
                                      <option value="none" >Select</option>
                                      <option value="First">First</option>
                                      <option value="Second">Second</option>
                                      <option value="Third" >Third</option>
                                      <option value="Fourth" >Fourth</option>
                                  </select> 
                                </div>
                              </div>
                            </div>
                       -->
                      
                       
                       
                       <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "idno"></label>

                                <div class="col-md-8">
                                 <button class="btn btn-mod btn-sm studsave" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
                                    <!-- <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span></span>&nbsp;<strong>List of Users</strong></a> -->
                                 </div>
                              </div>
                            </div> 
                  </form>

                
                </div><!--/.services-->
            </div><!--/.row-->  
        </div><!--/.container-->
    </section><!--/#feature-->
    <div class="modal fade" id="studentmodal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">×</button>

                                    <h4 class="modal-title" id="myModalLabel">Profile Image.</h4>
                                </div>

                                <form action="<?php echo web_root; ?>student/controller.php?action=photos" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="rows"> 
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                        <div class="col-md-8">

                                                            <input type="hidden" name="EmployeeID" id="EmployeeID" value="<?php echo $res->ID; ?>">
                                                              <input name="MAX_FILE_SIZE" type=
                                                            "hidden" value="1000000"> <input id=
                                                            "photo" name="photo" type=
                                                            "file">
                                                        </div>

                                                        <div class="col-md-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Close</button> <button class="btn btn-primary"
                                        name="savephoto" type="submit">Upload Photo</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
 

    <!-- <section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        
        </div> 
  </section> --><!--/#bottom-->
