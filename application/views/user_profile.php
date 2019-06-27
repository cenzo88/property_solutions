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
                        <h1 class="page-title">Hello : <span class="orange strong"><?php echo $records['User_fname']." ".$records['User_lname'];?></span></h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header --> 

        <!-- property area -->
        <div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">   
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 profiel-container">
                       <?php echo form_open_multipart('User/updateprofile');?>
                        <input type="hidden" name="old_id" value="<?php echo $records['User_Id'];?>">
                            <div class="profiel-header">
                                <h3>
                                    <b>UPDATE</b> YOUR PROFILE <br>
                                    <small>This information will let us know more about you.</small>
                                </h3>
                                <hr>
                            </div>

                            <div class="clear">
                                <div class="col-sm-3 col-sm-offset-1">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="
                                            <?php
                            $name = $this->db->get_where('user',array('User_Id' => $this->session->userdata('User_Id')))->row_array();
                                if($name['image'] == ""){
                                    ?>
                                 <?= base_url('assets/img/user.jpg')?>
                                <?php }
                                else{
                                    echo $name['image'];
                                    }?>" class="picture-src" id="wizardPicturePreview" title=""/>
                                            <input type="file" id="wizard-picture" name="updatepic">
                                        </div>
                                        <h6>Choose Picture</h6>
                                    </div>
                                </div>

                                <div class="col-sm-6 padding-top-25">

                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input name="fname" type="text" class="form-control" value="<?php echo $records['User_fname'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input name="lname" type="text" class="form-control" value="<?php echo $records['User_lname'];?>">
                                    </div> 
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control" value="<?php echo $records['User_emailadd'];?>">
                                    </div> 
                                </div>
                              
                            </div>

                    
                            <div class="col-sm-5 col-sm-offset-5">
                                <br>
                                <button type="submit" class="btn btn-finish btn-primary">FINISH</button>
                            </div>
                            <br>
                    </form>
                </div>
            </div><!-- end row -->

        </div>
    </div>