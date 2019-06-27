
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
                    <a class="navbar-brand" href="<?= base_url('Mis')?>"><img src="<?= base_url('')?>assets/img/logo.png" alt=""></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                       <a href="<?= site_url('Mis/login');?>" ><button class="navbar-btn nav-button wow fadeInRight" data-wow-delay="0.48s">Login</button></a>
                    </div>
                    <ul class="main-nav nav navbar-nav navbar-right">
                       <li class="wow fadeInDown" data-wow-delay="0.2s"><a class="dropdown-toggle active" href="<?= base_url('Mis')?>">Home</a></li>

                       
                       <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="<?= site_url('Mis/contact')?>">Contact</a></li>
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
                        <h2>property Searching Just Got So Easy, you can search any properties at any please either for sale or for lease.</h2>
                        <p>With our advanced search </p>
                        <div class="search-form wow pulse" data-wow-delay="0.8s" style="background: #76b852;">

                            <form method="post" action="mis/searchproperty" class=" form-inline">
                               
                                <div class="form-group" style="background: white">
                            <select class="selectpicker show-tick form-control" id="type" name = "type" required="required">
                                  <option value="House">House</option>
                                  <option value="Commercial">Commercial</option>
                                  <option value="Condomium">Codominium</option>
                                  <option value="For_Closures">Fore Closures</option>
                                </select>
                                </div>
                                <div class="form-group">                                   
                                   <input id="location" type="text" class="form-control" name = "location" required="required" placeholder="Location">
                                    
                                </div>
                                <div class="form-group" style="background: white">                                     
                                    <select id="sale_as" class="selectpicker show-tick form-control" required="required" name = "sale_as">
                                         <option value="LEASE">For Lease </option>
                                        <option value="SALE">For Sale</option>   

                                    </select>
                                </div>
                                <button type="submit" class="btn search-btn"><i class="fa fa-search"></i></button>            
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
                   <a href="<?= site_url('Mis/property');?>" class="btn border-btn more-black">All properties</a>
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
                                <p> We can give you instantly for sale or for lease properties at any place.</p>                                        
                            </div>
                            <div class="asks-first-arrow">
                                <a href="properties.html"><span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-10 col-sm-offset-1 col-xs-12 col-md-offset-0">
                        <div  class="asks-first wow fadeInLeft login" data-wow-delay="0.48s" style="background-color: #adadad;">
                            <div class="asks-first-circle">
                                <span class="fa fa-search"></span>
                            </div>
                            <div class="asks-first-info">
                                <h2>DO YOU WANT TO SELL A Property?</h2>
                                <p> Sell your property with the most visited real estate site!</p>
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
