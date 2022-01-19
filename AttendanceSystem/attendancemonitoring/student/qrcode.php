<?php  
    require_once  'phpqrcode/qrlib.php';
    $path = 'photo/';
    $file = $path.uniqid().".png";
    $student = New Student();
    $res = $student->select_student($_GET['id']);

    $course = New Course();

    // $resCourse = $course->single_course($res->CourseID);
    
    // $text = "echo($res)";
    QRcode::png( $res->EmployeeID, $file, 'L', 8, 2)
   ?>
    
  <style type="text/css">
  #img_profile{
    width: 100%;
    height:auto;
  }
    #img_profile >  a > img {
    width: 100%;
    height:auto;
}


  </style>


<section id="feature" class="transparent-bg">
        <div class="container">
           <div class="center wow fadeInDown">
                 <h2 class="page-header">Employee Identification Card</h2>
                <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
            </div>
               
            <div class="row">
                <div class="features">
                      <div class="col-sm-3 wow fadeInDown">

                              <!-- <div class="panel">            
                                <div id="img_profile" class="panel-body">
                                <a href="" data-target="#studentmodal" data-toggle="modal" >
                                <img title="profile image" class="img-hover"    src="<?php echo web_root. 'student/'.  $res->StudPhoto; ?>">
                                </a>
                                 </div>
                              <ul class="list-group">
                              
                             
                                   <li class="list-group-item text-right"><span class="pull-left"><strong>Real name</strong></span> <?php echo $res->Firstname .' '.$res->Lastname; ?> </li>
                                  <li class="list-group-item text-right"><span class="pull-left"><strong>Course</strong></span> <?php echo $resCourse->CourseCode; ?> </li>
                                  <li class="list-group-item text-right"><span class="pull-left"><strong>Year Level</strong></span> <?php echo $res->YearLevel; ?> </li>
                                    
                                
                              </ul>  -->
                                    
                            </div>
                          
                          <div  style="border: 2px solid green;
                                        border-radius: 8px;
                                        width: 400px;
                                        margin: auto;
                               
                               padding: 5px;">  
                          <table style="margin: auto;
                                height: 100px;
                                        
                                        " >
                            <tr >
                              <td rowspan="3" >
                                <div class="panel">            
                                <div id="img_profile" class="panel-body">
                                <a href="" data-target="#studentmodal" data-toggle="modal" >
                                <img title="profile image" class="img-hover"    src="<?php echo web_root. 'student/'.  $res->StudPhoto; ?>" style="width:50px;height:50px;">
                                </a>
                                 </div>
                              </td>
                              <td style="padding-left: 5px;"><label>Id :</label></td>
                              <td >
                              <label><?php echo $res->EmployeeID; ?></label>
                              </td>

                            </tr>

                    
                            <tr>
                              <td style="padding-left: 5px;"><label>Name :</label></td>
                              <td>
                                <label><?php echo  $res->Firstname; ?></label>
                                <label><?php echo $res->Middlename; ?></label>
                                <label><?php echo $res->Lastname; ?></label>
                              </td> 
                             
                            </tr>
                            <tr>
                              <td style="padding-left: 5px;"><label>Age:</label></td>
                              <td>
                                <label><?php echo  $res->Age; ?></label>
                                
                              </td> 
                             
                            </tr>
                          </table></div>
                          <h2 style="text-align: center;
                                      font-weight: bold;">This is your QR Code</h3>
                          <div style="border: 2px solid green;
                                        border-radius: 8px;
                                        width: 215px;
                                        margin: auto;
                                        padding: 5px;">
                          <table>
                            <tr>
                              <td>
                                <?php echo "<img src = '".$file."' >";  ?>
                              </td>
                            </tr>
                          </table>
                          </div>
                        </div>

                             
                            <!--/col-3-->
                     
 
       
                
                </div><!--/.services-->
            </div><!--/.row-->  
        </div><!--/.container-->
    </section><!--/#feature-->
 

    <!-- <section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        
        </div> 
  </section> --><!--/#bottom-->



 
  <!-- Modal -->
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

                                                            <input type="hidden" name="StudentID" id="StudentID" value="<?php echo $res->ID; ?>">
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
                    </div><!-- /.modal -->
<div class="container" style="text-align: center;
                              margin:5px; 
">
  <div class="row">
    <form action="qrcode_print.php" method="POST" target="_blank">
    <input type="hidden" name="studentid" value="<?php echo $_GET['id']?>">
    <!-- <input type="hidden" name="attenddate" value="<?php echo isset($_POST['attenddate']) ? $_POST['attenddate'] : ''; ?>">
    <input type="hidden" name="YearLevel" value="<?php echo isset($_POST['YearLevel']) ? $_POST['YearLevel'] : ''; ?>"> -->
   <button class="btn btn-primary" target="_blank" href="">Print</button> 
   </form>
  </div>
</div>