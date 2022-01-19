<?php 
 if (!isset($_SESSION['ACCOUNT_ID'])){
    redirect(web_root."index.php");
   }

// $autonum = New Autonumber();
// $res = $autonum->single_autonumber(2);
 @$EmployeeID = $_GET['id'];
    if($EmployeeID==''){
  redirect("index.php");}

  $stud = New Student();
  $s_student = $stud->select_student($EmployeeID);

  $birthday = date_format(date_create($s_student->BirthDate),'m/d/Y');
  $mv = date_format(date_create($s_student->BirthDate),'m');
  $m =date_format(date_create($s_student->BirthDate),'M');
  $d = date_format(date_create($s_student->BirthDate),'d');
  $y = date_format(date_create($s_student->BirthDate),'Y');


  if ($s_student->Gender == 'Male') {
    # code...
   $radio =  '<div class="col-md-8">
             <div class="col-lg-5">
                <div class="radio">
                  <label><input   id="optionsRadios1" name="optionsRadios" type="radio" value="Female">Female</label>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="radio">
                  <label><input id="optionsRadios2"  checked="True" name="optionsRadios" type="radio" value="Male">Male</label>
                </div>
              </div> 
             
          </div>';
  }else{
       $radio =  '<div class="col-md-8">
             <div class="col-lg-5">
                <div class="radio">
                  <label><input   id="optionsRadios1"  checked="True" name="optionsRadios" type="radio" value="Female">Female</label>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="radio">
                  <label><input id="optionsRadios2"  name="optionsRadios" type="radio" value="Male"> Male</label>
                </div>
              </div> 
             
          </div>';

  }

 ?> 

<section id="feature" class="transparent-bg">
    <div class="container">
       <div class="center wow fadeInDown">
             <h2 class="page-header">Update Employees</h2>
            <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
        </div>

        <div class="row">
            <div class="features">

                 <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=edit" method="POST"> 
               <!--     <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "StudentID">Student ID:</label>

                      <div class="col-md-8"> -->
                         <input class="form-control input-sm" id="EmployeeID" name="EmployeeID" placeholder=
                            "Student ID" type="hidden" value="<?php echo $s_student->ID;?>">

                         <input class="form-control input-sm" id="IDNO" name="IDNO" placeholder=
                            "Employee ID" type="hidden" value="<?php echo $s_student->EmployeeID;?>"  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                    <!--   </div>
                    </div>
                  </div>
 -->
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Firstname">Firstname:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="Firstname" name="Firstname" placeholder=
                            "Firstname" type="text" value="<?php echo $s_student->Firstname;?>" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Lastname">Lastname:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="Lastname" name="Lastname" placeholder=
                            "Lastname" type="text" value="<?php echo $s_student->Lastname;?>" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Middlename">Middlename:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="Middlename" name="Middlename" placeholder=
                            "Middlename" type="text" value="<?php echo $s_student->Middlename;?>" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Address">Address:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="Address" name="Address" placeholder=
                            "Address" type="text" value="<?php echo $s_student->Address;?>" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Gender">Sex:</label>

                      <?php
                        echo $radio;
                      ?>

                      <!-- <div class="col-md-8">
                         <div class="col-lg-5">
                            <div class="radio">
                              <label><input checked id="optionsRadios1" checked="True" name="optionsRadios" type="radio" value="Female">Female</label>
                            </div>
                          </div>

                          <div class="col-lg-4">
                            <div class="radio">
                              <label><input id="optionsRadios2" checked="" name="optionsRadios" type="radio" value="Male"> Male</label>
                            </div>
                          </div> 
                         
                      </div> -->
                    </div>
                  </div> 

                  <!--  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "BirthDate">Date of birth:</label>
 
                      <div class="col-md-8">
                         <div class="input-group" id=""> 
                              <div class="input-group-addon"> 
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input id="datemask2" name="BirthDate"  value="<?php echo $birthday;?>" type="text" class="form-control " size="7" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                            </div>
                      </div>
                    </div>
                  </div> 
 -->
                  <div class="form-group">
                      <div class="rows">
                        <div class="col-md-8">
                          <h4>
                          <div class="col-md-4">
                            <label class="col-lg-12 control-label">Date of Birth</label>
                          </div>

                          <div class="col-lg-3">
                            <select class="form-control input-sm" name="month">
                              <option>Month</option>
                              <?php


                                 echo '<option SELECTED value='.$mv.'>'.$m.'</option>';

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
                             echo '<option SELECTED value='.$d.'>'.$d.'</option>';
                              $d = range(1, 31);
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
                                echo '<option SELECTED value='.$y.'>'.$y.'</option>';
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
                            "Mobile Number" type="any" value="<?php echo $s_student->ContactNo;?>" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "TeamID">Team:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="TeamID" id="TeamID">
                       <option value="none" >Select</option>
                          <?php 

                           $mydb->setQuery("SELECT * FROM `tblteam` WHERE TeamID=".$s_student->TeamID);
                           $cur = $mydb->loadResultList();

                            foreach ($cur as $result) {
                              echo '<option SELECTED value='.$result->TeamID.' >'.$result->TeamCode.' </option>';
 
                            }

                            $mydb->setQuery("SELECT * FROM `tblteam` WHERE TeamID <>".$s_student->TeamID);
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
                                  "Username" type="text" value="<?php echo $s_student->ACCOUNT_USERNAME; ?>" autocomplete="off">
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
                                  <option value="Administrator"  <?php echo ($s_student->ACCOUNT_TYPE=='Administrator') ? 'selected="true"': '' ; ?>>Administrator</option>
                                  <!-- <option value="Staff" <?php echo ($singleuser->ACCOUNT_TYPE=='Staff') ? 'selected="true"': '' ; ?>>Staff</option>  -->
                                  <!-- <option value="Customer">Customer</option> -->
                                      <option value="Registrar" <?php echo ($s_student->ACCOUNT_TYPE=='Registrar') ? 'selected="true"': '' ; ?>>Registrar</option>
                             <!-- <option value="Encoder" <?php echo ($singleuser->ACCOUNT_TYPE=='Encoder') ? 'selected="true"': '' ; ?>>Encoder</option> -->
                                </select> 
                              </div>
                            </div>
                          </div>

                          <?php } ?>
             <div class="form-group">
              <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "idno"></label>

                <div class="col-md-8">
                 <button class="btn btn-mod btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
                    <!-- <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span></span>&nbsp;<strong>List of Users</strong></a> -->
                 </div>
              </div>
            </div> 
        </form>


            
            </div><!--/.services-->
        </div>
        <!--/.row-->  
    </div>   <!--/.container-->
</section>