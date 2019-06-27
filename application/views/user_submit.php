<body onload="checkStatus()">
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
         </div>
         <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
   </nav>
   <!-- End of nav bar -->
   <div class="page-head">
      <div class="container">
         <div class="row">
            <div class="page-head-content">
               <h1 class="page-title">Manage your Properties</h1>
            </div>
         </div>
      </div>
   </div>
   <!-- End page header -->
   <!-- property area -->
   <div class="content-area recent-property" style="background-color: #FFF;">
      <div class="container">
         <div class="row">
            <div class="col-md-9 pr-30 padding-top-40 properties-page user-properties">
               <div class="section">
                  <div class="page-subheader sorting pl0 pr-10">
                     <ul class="sort-by-list pull-left">
                        <a href="<?= site_url('User/submitproperty');?>" class="btn border-btn more-black">Sell a Property</a>
                     </ul>
                     <!--/ .sort-by-list-->
                  </div>
               </div>
               <div class="section">
                  <div id="list-type" class="proerty-th-list">
                     <?php 
                        foreach($records2 as $r){?>
                     <div class="col-md-4 p0">
                        <div class="box-two proerty-item">
                           <div class="item-thumb">
                              <a href="<?= base_url('User/view')."/".$r->Property_id?>"><img src="<?= $r->Property_picmain?>" style = "width:300px; height:220px"></a>
                           </div>
                           <div class="item-entry overflow">
                              <?php echo "<h5>".$r->Property_title."</h5>";?>
                              <div class="dot-hr"></div>
                              <?php echo "<span class='pull-left'> <b> Area :</b> ".$r->Property_areasize."</span>";?>
                              <?php echo "<span class='proerty-price pull-right'>Php ".$r->Property_price."</span>";?>
                              <p style="display: none;"><?php echo $r->Property_detail?></p>
                              <div id = "status_bar" style="width: 100%; background-color: #f1c40f;">
                                <h3 id = "sold_status" style=" padding: 5px; text-align: center;"><?php echo $r->Sold_status;?></h3>
                              </div>
                              
                              <div class="property-icon">

                                 <div class="dealer-action pull-right">                                     
                                    <a href="<?= site_url('User/update/'.$r->Property_id);?>" class="button">Update <i class="fa fa-edit"></i></a>
                                    <a href="<?= site_url('User/delete/'.$r->Property_id);?>" class="button ">Remove <i class="fa fa-trash"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php }?>                                                      
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>
