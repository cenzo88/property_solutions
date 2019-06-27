

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

        <div class="slider-area">
            <div class="slider">
                <div id="bg-slider" class="owl-carousel owl-theme">

                    <div class="item"><img src="<?= base_url('')?>assets/img/slide1/slider-image-1.jpg" alt="GTA V"></div>
                    <div class="item"><img src="<?= base_url('')?>assets/img/slide1/slider-image-2.jpg" alt="The Last of us"></div>
                    <div class="item"><img src="<?= base_url('')?>assets/img/slide1/slider-image-1.jpg" alt="GTA V"></div>

                </div>
            </div>
            <div class="slider-content">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                        <h2>property Searching Just Got So Easy</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi deserunt deleniti, ullam commodi sit ipsam laboriosam velit adipisci quibusdam aliquam teneturo!</p>
                        <div class="search-form wow pulse" data-wow-delay="0.8s" style="background-color:  #76b852;">

                            <form method="post" action="User/user_search" class=" form-inline">
                               
                                <div class="form-group" style="background: white">
                                     <select class="selectpicker show-tick form-control" id="type" name = "type" required="required">
                                  <option value="House">House</option>
                                  <option value="Commercial">Commercial</option>
                                  <option value="Condomium">Codominium</option>
                                  <option value="For_Closures">Fore Closures</option>
                                </select>
                                </div>
                                <div class="form-group">                                   
                                   <input id="location" type="text" class="form-control" name = "location" required="" placeholder="Location">
                                    
                                </div>
                                <div class="form-group" style="background: white">                                     
                                    <select id="sale_as" class="selectpicker show-tick form-control" required="" name = "sale_as">
                                    <option value="LEASE">For Lease </option>
                                        <option value="SALE">For Sale</option>  
                                    </select>
                                </div>
                                <button class="btn search-btn" type="submit"><i class="fa fa-search"></i></button>            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- property area -->
        <div class="content-area home-area-1 recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">
                <div class="row">

                 
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>CAN'T DECIDE ? </h2>
                        <p>Show all properties</p>
                   <a href="<?= site_url('User/property');?>" class="btn border-btn more-black">All properties</a>
                                </div>
                </div>

                <div class="row">
                    <div class="proerty-th">
                       
    

                    
                    </div>
                </div>
            </div>
        </div>



        <!-- boy-sale area -->
        <div class="boy-sale-area">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
                        <div class="asks-first wow fadeInRight login" data-wow-delay="0.48s" style="background-color: #adadad;">
                            <div class="asks-first-circle">
                                <span class="fa fa-search"></span>
                            </div>
                            <div class="asks-first-info">
                                <h2>ARE YOU LOOKING FOR A Property?</h2>
                                <p> varius od lio eget conseq uat blandit, lorem auglue comm lodo nisl no us nibh mas lsa</p>                                        
                            </div>
                            <div class="asks-first-arrow">
                                <a href="properties.html"><span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-10 col-sm-offset-1 col-xs-12 col-md-offset-0">
                        <div  class="asks-first wow fadeInRight login" data-wow-delay="0.48s" style="background-color: #adadad;">
                            <div class="asks-first-circle">
                                <span class="fa fa-search"></span>
                            </div>
                            <div class="asks-first-info">
                                <h2>DO YOU WANT TO SELL A Property?</h2>
                                <p> varius od lio eget conseq uat blandit, lorem auglue comm lodo nisl no us nibh mas lsa</p>
                            </div>
                            <div class="asks-first-arrow">
                                <a href="properties.html"><span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <p  class="asks-call">QUESTIONS? CALL US  : <span class="strong"> + 3-123- 424-5700</span></p>
                    </div>
                </div>
            </div>
        </div>
