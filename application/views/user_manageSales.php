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
                        <h1 class="page-title">Manage Your Sales</h1>               
                    </div>
                </div>
            </div>
        </div>

        <!-- Sales Proper -->
        
            <div class="row" style="margin:10px;">
                <button style="width: 230px; height: 80px; font-size: 19px;" class="btn btn-primary"><i class="fa fa-paypal"></i>   PayPal</button>
                <button style="width: 250px; height: 80px; font-size: 19px;" class="btn btn-primary"><i class="fa fa-list-ul"></i>   Reservation Request</button>
                <button onclick="window.location.href='viewPurchaseRequest'" style="width: 250px; height: 80px; font-size: 19px;" class="btn btn-primary" ><i class="fa fa-list-ul"></i>   Purchase Requests</button>
                <button style="width: 230px; height: 80px; font-size: 19px;" class="btn btn-primary"><i class="fa fa-list-ul"></i>   View Sales</button>
                <button style="width: 230px; height: 80px; font-size: 19px;" class="btn btn-primary"><i class="fa fa-credit-card"></i>   Loans</button>
            </div> 

        <div class='modal fade' id='newSales' tabindex='-1' role='dialog' style='margin-top:80px;' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-header' style="">
                       <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                       </button> 
                       <strong>
                          <h3 class='modal-title' id='exampleModalLabel' style="text-align: center;">Create New Invoice</h3>
                       </strong>
                    </div>
                    <div class='modal-body'>


                       <button onclick="" class="btn btn-primary" style="width:100%; height: 50px;  font-size: 19px;" data-toggle = "modal" data-target="#inCashModal"><i class="fa fa-plus"></i>   Property Sales (Full Payment)</button>
                       <p style="text-align: center;">A customer buys in full payment, based from the Purchase Request</p>


                       <button onclick="" class="btn btn-primary" style="width:100%; height: 50px;  font-size: 19px;"><i class="fa fa-plus"></i>   Property Sales (Loan Application)</button>
                       <p style="text-align: center;">A customer buys in in a monthly basis</p>


                       <button onclick="" class="btn btn-primary" style="width:100%; height: 50px;  font-size: 19px;"><i class="fa fa-plus"></i>   Reservation Fee</button>
                       <p style="text-align: center;">Collect Reservation Fee, based from the Reservation Request</p>


                    </div>
                </div>
            </div>
        </div>  
   <!-- PURCHASE in cash modal ------------------------END------------------------------------------>
</body>