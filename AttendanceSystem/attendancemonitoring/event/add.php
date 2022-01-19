<!DOCTYPE html>
<html>
<head>
 
</head>
<body>
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
                 <h2 class="page-header">Add New Event</h2>
                <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
            </div>
               
            <div class="row">
                <div class="features">
 
                  <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=add" method="POST">

                      <!-- <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "user_id">User Id:</label>

                        <div class="col-md-8"> --> 
                          <!--  <input class="form-control input-sm" id="user_id" name="user_id" placeholder=
                              "Account Id" type="hidden" value="<?php echo $res->AUTO; ?>"> -->
                      <!--   </div>
                      </div>
                    </div> -->           
                     <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "DEPARTMENT_NAME">Name:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                           <input class="form-control input-sm" id="DEPARTMENT_NAME" name="EVENT_NAME" placeholder=
                              "Event Name" type="text" value=""  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "EVENT_PLACE">Place:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                           <input class="form-control input-sm" id="DEPARTMENT_PLACE" name="EVENT_PLACE" placeholder=
                              "Place" type="text" value=""  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "EVENT_DESC">Description:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                          <textarea  class="form-control input-sm" id="DEPARTMENT_DESC" name="EVENT_DESC" placeholder=
                              "Description" rows="5" cols="60"  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
                           <!-- <input class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" placeholder=
                              "Description" type="text" value=""> -->
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "EVENT_STATUS">Status:</label>

                        <div class="col-md-8">
                          <select class="form-control input-sm" name="status">
                              <option value="Active">Active</option>
                              <option value="No Active">No Active</option>
                          </select>
                        </div>
                      </div>
                    </div>
                   <!-- <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "DEPARTMENT_NAME">Schedule:</label>

                        <div class="col-md-8">
                          <div class="col-md-2 control-label">
                            <label>Start:</label>
                          </div>
                          <div class="col-md-4">
                            <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                            <input placeholder="Start Time" type="text" class="form-control timepickerMorning" name="event_starttime" value="07:00 AM" /> 
                             <div class="timepicker" style="z-index: 1"></div>
                          </div>
                          </div>
                          <div class="col-md-2 control-label">
                            <label>End:</label>
                          </div>
                          <div class="col-md-4">
                            <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                            <input placeholder="End Time" type="text" class="form-control timepickerMorning" name="event_endtime" value="11:00 AM"  />
                          </div>
                          </div>
                        </div>
                      </div>
                    </div> 
                    
                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "DEPARTMENT_NAME">Attendance Time In:</label>

                        <div class="col-md-8">
                          <div class="col-md-2 control-label">
                            <label>Start:</label>
                          </div>
                          <div class="col-md-4">
                            <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                            <input placeholder="Start Time" type="text" class="form-control timepickerMorning" name=att_timein_start" value="07:00 AM" />
                          </div>
                          </div>
                          <div class="col-md-2 control-label">
                            <label>End:</label>
                          </div>
                          <div class="col-md-4">
                            <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                            <input placeholder="End Time" type="text" class="form-control timepickerMorning" name="att_timein_end" value="11:00 AM" />
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "DEPARTMENT_NAME">Attendance Time Out:</label>

                        <div class="col-md-8">
                          <div class="col-md-2 control-label">
                            <label>Start:</label>
                          </div>
                          <div class="col-md-4">
                            <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                            <input placeholder="Start Time" type="text" class="form-control timepickerMorning" name="att_timeout_start" value="07:00 AM" />
                          </div>
                          </div>
                          <div class="col-md-2 control-label">
                            <label>End:</label>
                          </div>
                          <div class="col-md-4">
                            <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                            <input placeholder="End Time" type="text" class="form-control timepickerMorning" name="att_timeout_end" value="11:00 AM" />
                          </div>
                          </div>
                        </div>
                      </div>
                    </div> -->

                    

                   


                  <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "idno"></label>

                        <div class="col-md-8">
                         <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
                            <!-- <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span></span>&nbsp;<strong>List of Users</strong></a> -->
                         </div>
                      </div>
                    </div>


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
       
       
                
                </div><!--/.services-->
            </div><!--/.row-->  
        </div><!--/.container-->
    </section><!--/#feature-->
</body>
</html> 

 