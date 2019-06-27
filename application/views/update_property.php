 <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->

        <div class="header-connect">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-8  col-xs-12">
                        <div class="header-half header-call">
                            <p>
                                <span><i class="pe-7s-call"></i> (038) 412 - 4978</span>
                                <span><i class="pe-7s-mail"></i> propadmin@email.com</span>
                            </p>
                        </div>
                    </div>
            </div>
        </div>              
        <!--End top header -->
<nav class="navbar navbar-default ">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= base_url('User')?>"><img src="<?= base_url('')?>assets/img/logo.png" alt=""></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                <ul class="main-nav nav navbar-nav navbar-right">
                       <li class="wow fadeInDown" data-wow-delay="0.2s"><a style="padding-top: 25px" class="dropdown-toggle active" href="<?= base_url('User')?>">Home</a></li>
                       <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="<?= site_url('User/contact')?>" style="padding-top: 25px">Contact</a></li>
                       <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                            <a href="index.html" data-toggle="dropdown" data-hover="dropdown" data-delay="200"><img style="width:40px;height: 40px;border-radius: 20px" src="
                                <?php
                            $name = $this->db->get_where('user',array('User_Id' => $this->session->userdata('User_Id')))->row_array();
                                if($name['image'] == ""){
                                    ?>
                                  <?= base_url('assets/img/user.jpg')?>
                                <?php }
                                else{
                                    echo $name['image'];
                                    }?>

                                "> <?= $name['User_fname']?> <b class="caret"></b></a>
                            <ul class="dropdown-menu navbar-nav">
                               <li><a href="<?= site_url('User/submitted');?>">Submitted property</a> </li>
                               <li><a href="<?= site_url('User/changepassword');?>">Change password</a></li>
                               <li><a href="<?= site_url('User/userprofile');?>">Your profile</a></li>
                               <li><a href="<?= site_url('User/logout');?>">Log-Out</a>  </li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Submit new property</h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="content-area submit-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">
                <div class="clearfix" > 
                    <div class="wizard-container"> 

                        <div class="wizard-card ct-wizard-orange" id="wizardProperty">
                            
                        <?php echo form_open_multipart('User/update_prop/'.$records['Property_id']); ?> 
                           <div class="wizard-header">
                                    <h3>
                                        <b>Update</b> YOUR PROPERTY <br>
                                      
                                    </h3>
                                </div>

                                <ul>
                                    <li><a href="#step1" data-toggle="tab">Step 1 </a></li>
                                    <li><a href="#step2" data-toggle="tab">Step 2 </a></li>
                                    <li><a href="#step3" data-toggle="tab">Step 3 </a></li>
                                    <li><a href="#step4" data-toggle="tab">Finished </a></li>
                                </ul>

                                <div class="tab-content">

                                    <div class="tab-pane" id="step1">
                                        <div class="row p-b-15  ">
                                            <h4 class="info-text"> Let's start with the basic information</h4>

                                        
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Property name</label>
                                                    <input name ="title" type="text" class="form-control" id="Property_title" required="" aria-describedby="titlehelp" value="<?php echo $records['Property_title'];?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Property price</label>
                                                 <input name ="price" type="number" class="form-control" id="price" required="" aria-describedby="pricehelp" value="<?php echo $records['Property_price'];?>">
                                                </div> 
                                                <div class="form-group">
                                                    <label>Property Type</label>
                                                    <select id="exampleSelect1" class="selectpicker" name = 'type' value="<?php echo $records['Property_type'];?>">
                                                    <option value="house" selected>House</option>
                                                     <option value="apartment">Apartment</option>
                                                     <option value="commercial">Commercial</option>
                                                     <option value="land">Land</option>
                                                     <option value="foreclosure">Fore Closure</option>
                                                        </select>
                                                    
                                                   </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  End step 1 -->

                                    <div class="tab-pane" id="step2">
                                        <h4 class="info-text"> How much your Property is Beautiful ? </h4>
                                        <div class="row">
                                            <div class="col-sm-12"> 
                                                <div class="col-sm-12"> 
                                                    <div class="form-group">
                                                        <label>Property Description :</label>
                                                        <textarea class="form-control" id="detail" rows="3" name = "detail" required="" aria-describedby="detailhelp"><?php echo $records['Property_detail'];?></textarea>
                                                       
                                                    </div> 
                                                </div> 
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Property State :</label>
                                                        <input name="province" type="text" id="pa_province" value="<?php echo $records['pa_province'];?>" required="" class="form-control" placeholder="Bohol/Cebu/Davao">
                                                       </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Property City/Municipality :</label>
                                                        <input name="city" type="text" id="city" value="<?php echo $records['pa_city'];?>" required=""class="form-control" placeholder="Tagbilaran City...">
                                                       </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Property Town  :</label>
                                                        <input name="brgy" type="text" id="brgy" value="<?php echo $records['pa_barangay'];?>" required="" class="form-control" placeholder="Tangnan...">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Property Street  :</label>
                                                        <input name="street" type="text" id="street" value="<?php echo $records['pa_street'];?>" required="" class="form-control" placeholder="California St...">
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 padding-top-15"> 
                                            <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Property sold as :</label>
                                                       <?php 
                          if($records['Property_saleas'] == "SALE"){
                            echo "<select class='form-control' id='exampleSelect1' name = 'for'>
                                      <option value='SALE' selected>For Sale</option>
                                      <option value='LEASE'>For Lease</option>
                                 </select>";
                          }else if($records['Property_saleas'] == "LEASE"){
                            echo "<select class='form-control' id='exampleSelect1' name = 'for'>
                                      <option value='SALE'>For Sale</option>
                                      <option value='LEASE' selected>For Lease</option>
                                 </select>";
                          }
                          ?>   
                                                       </div>
                                                </div>  

                                                    <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Availability  :</label>
                                                       <?php 
                          if($records['Property_status'] == "AVAILABLE"){
                            echo "<select class='form-control' id='exampleSelect1' name = 'status'>
                                      <option value='AVAILABLE' selected>Available</option>
                                      <option value='NOT_AVAILABLE'>Not Availabe</option>
                                 </select>";
                          }else if($records['Property_status'] == "NOT_AVAILABLE"){
                            echo "<select class='form-control' id='exampleSelect1' name = 'status'>
                                      <option value='AVAILABLE' selected>Available</option>
                                      <option value='NOT_AVAILABLE'>Not Availabe</option>
                                 </select>";
                          }
                          ?>
                          </div>
                                                </div> 

                                            <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Area sqm  :</label>
                                                       <input name="sqm" type="number" id="sqm" value="<?php echo $records['Property_areasize'];?>" class="form-control" required="">
                                                       </div>
                                                </div>                                                
                                               <div class="col-sm-4">
                                                        <div class="form-group">
                                                        <label>Min bed  :</label>
                                                       <input name="bed" type="number" id="bed" value="<?php echo $records['Number_of_bedroom'];?>" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Min baths  :</label>
                                                        <input name="bath" type="number" id="bath" value="<?php echo $records['Number_of_bathroom'];?>" class="form-control" placeholder="">
                                                    </div>
                                                </div>   
                                            </div>
                                           
                                           
                                            <br>
                                        </div>
                                    </div>
                                    <!-- End step 2 -->

                                  
                                    <div class="tab-pane" id="step3">                                        
                                        <h4 class="info-text">Give us some images ? </h4>
                                        <div class="row"> 
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="property-images">Choose Images :</label>
                                                    <input required type="file" class="form-control imgclick" id="userfile" name="userfile">
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                     
                                    <!--  End step 3 -->


                                    <div class="tab-pane" id="step4">                                        
                                        <h4 class="info-text"> Finished and submit </h4>
                                        <div class="row">  
                                            <div class="col-sm-12">
                                                <div class="">
                                                    <p>
                                                        <label><strong>Terms and Conditions</strong></label>
                                                        By accessing or using  GARO ESTATE services, such as 
                                                        posting your property advertisement with your personal 
                                                        information on our website you agree to the
                                                        collection, use and disclosure of your personal information 
                                                        in the legal proper manner
                                                    </p>

                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" /> <strong>Accept termes and conditions.</strong>
                                                        </label>
                                                    </div> 

                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <!--  End step 4 -->

                                </div>

                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-primary' name='next' value='Next' />
                                        <input type='submit' class='btn btn-finish btn-primary ' name='finish' value='Finish' />
                                    </div>

                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-default' name='previous' value='Previous' />
                                    </div>
                                    <div class="clearfix"></div>                                            
                                </div>	
                            </form>
                           
                        </div>
                        <!-- End submit form -->
                    </div> 
                </div>
            </div>
        </div>

