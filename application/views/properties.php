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
               <h1 class="page-title">PROPERTY LISTING</h1>
            </div>
         </div>
      </div>
   </div>
   <!-- End page header -->
   <!-- property area -->
   <div class="properties-area recent-property" style="background-color: #FFF;">
      <div class="container">
         <div class="row">
            <div class="col-md-3 p0 padding-top-40">
               <div class="blog-asside-right pr0">
                  <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                     <div class="panel-heading">
                        <h3 class="panel-title">Smart search</h3>
                     </div>
                     <div class="panel-body search-widget">
                        <?php echo form_open_multipart('User/user_search');?>
                           <fieldset>
                              <div class="row">
                                 <div class="col-xs-12">
                                    <input id="location" type="text" class="form-control" name = "location" placeholder="Location">
                                 </div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="row">
                                 <div class="col-xs-6">
                                    <select class="selectpicker show-tick form-control" id="type" name = "type" required="required">
                                       <option value="House">House</option>
                                       <option value="Commercial">Commercial</option>
                                       <option value="Condomium">Codominium</option>
                                       <option value="For_Closures">Fore Closures</option>
                                    </select>
                                 </div>
                                 <div class="col-xs-6">
                                    <select id="sale_as" class="selectpicker show-tick form-control" name = "sale_as">
                                       <option value="LEASE">For Lease </option>
                                       <option value="SALE">For Sale</option>
                                    </select>
                                 </div>
                              </div>
                           </fieldset>
                           <fieldset >
                              <div class="row">
                                 <div class="col-xs-12">  
                                    <input class="button btn largesearch-btn" value="Search" type="submit">
                                 </div>
                              </div>
                           </fieldset>
                        </form>
                     </div>
                  </div>
                  <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                     <div class="panel-heading">
                        <h3 class="panel-title">Quick Sort</h3>
                     </div>
                     <div class="panel-body search-widget">
                        <?php echo form_open_multipart('User/user_sort');?>
                           <fieldset>
                              <div class="row">
                                 <div class="col-xs-6">
                                    <input type="Number" class="form-control" name = "priceRangeMin" placeholder="MIN" required="required">
                                 </div>
                                 <div class="col-xs-6">
                                    <input type="Number" class="form-control" name = "priceRangeMax" placeholder="MAX" required="required">
                                 </div>
                              </div>
                           </fieldset>
                           <fieldset >
                              <div class="row">
                                 <div class="col-xs-12">  
                                    <input class="button btn largesearch-btn" value="Filter" type="submit">
                                 </div>
                              </div>
                           </fieldset>
                        </form>
                     </div>
                  </div>
                  <center>
                     <h4>CAN'T DECIDE ? </h4>
                     <p>Show all properties</p>
                     <a href="<?= site_url('User/property');?>" class="btn border-btn more-black">All properties</a>
                  </center>
               </div>
            </div>
            <div class="col-md-9  pr0 padding-top-40 properties-page">
               <div class="col-md-12 clear">
                  <div class="col-xs-10 page-subheader sorting pl0">
                     
                     <!--/ .items-per-page-->
                  </div>
                  <div class="col-xs-2 layout-switcher">
                     <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                     <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>                          
                  </div>
                  <!--/ .layout-switcher-->
               </div>
               <div class="col-md-12 clear">
                  <div id="list-type" class="proerty-th">
                     <?php 
                        foreach($records as $r){
                        if ($r->User_Id_Seller == $this->session->userdata('User_Id')) {
                              # code...
                           }else{   ?> 
                     <div class="col-sm-6 col-md-4 p0" style="height: 500px">
                        <div class="box-two proerty-item">
                           <div class="item-thumb">
                              <a href="<?= base_url('User/view')."/".$r->Property_id?>" ><img src="<?= $r->Property_picmain?>" style = "width:400px; height:200px"></a>
                              <div class="stat" style="background-color: #76b852; padding: 8px; color: white;">
                                 <?php echo "<h4>".$r->Property_saleas."</h4>";?>
                              </div>
                           </div>
                           <div class="item-entry overflow">
                              <?php echo "<h5>".$r->Property_title."</h5>";?>
                              <div class="dot-hr"></div>
                              <?php echo "<span class='pull-left'> <b> Area :</b> ".$r->Property_areasize."</span>";?>
                              <?php echo "<span class='proerty-price pull-right'>Php ".$r->Property_price."</span>";?>
                              <?php echo "<p style='display: none;'>".$r->Property_detail."</p>";?>
                           </div>
                        </div>
                     </div>
                     <?php }}?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
      
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false) ;
      })();
   </script>