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
               <?php  foreach($records as $r){ ?>
               <?php echo "<h1 class='page-title'>Super nice ".$r->Property_title."</h1>";?>  
               <?php }?>              
            </div>
         </div>
      </div>
   </div>
   <!-- End page header -->
   <!-- property area -->
   <div class="content-area single-property" style="background-color: #FCFCFC;">
   <div class="container">
      <div class="clearfix padding-top-40">
         <div class="col-md-8 single-property-content ">
            <div class="row">
               <div class="light-slide-item">
                  <div class="clearfix">
                     <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                        <?php  foreach($records2 as $r){ ?>
                        <?php echo "<li data-thumb= '".$r->Image."'>"?>
                        <?php echo "<img src= '".$r->Image."'>"?>
                        <?php echo"</li>"?>
                        <?php };?>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="single-property-wrapper">
               <?php foreach($records as $r){   ?> 
               <div class="single-property-header"> 
                  <?php echo "<h1 class='property-title pull-left'>".$r->Property_title."</h1>";?> 
                  <?php echo "<span class='property-price pull-right'>Php ".$r->Property_price."</span>";?>
               </div>
               <div class="property-meta entry-meta clearfix ">
                  <div class="col-xs-3 col-sm-3 col-md-3 p-b-15">
                     <span class="property-info-icon icon-tag">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 48 48">
                           <path class="meta-icon" fill-rule="evenodd" clip-rule="evenodd" fill="#FFA500" d="M47.199 24.176l-23.552-23.392c-.504-.502-1.174-.778-1.897-.778l-19.087.09c-.236.003-.469.038-.696.1l-.251.1-.166.069c-.319.152-.564.321-.766.529-.497.502-.781 1.196-.778 1.907l.092 19.124c.003.711.283 1.385.795 1.901l23.549 23.389c.221.218.482.393.779.523l.224.092c.26.092.519.145.78.155l.121.009h.012c.239-.003.476-.037.693-.098l.195-.076.2-.084c.315-.145.573-.319.791-.539l18.976-19.214c.507-.511.785-1.188.781-1.908-.003-.72-.287-1.394-.795-1.899zm-35.198-9.17c-1.657 0-3-1.345-3-3 0-1.657 1.343-3 3-3 1.656 0 2.999 1.343 2.999 3 0 1.656-1.343 3-2.999 3z"></path>
                        </svg>
                     </span>
                     <span class="property-info-entry">
                     <span class="property-info-label">Status</span>
                     <?php echo "<span class='property-info-value'>For ".$r->Property_saleas."</span>";?>
                     </span>
                  </div>
                  <div class="col-xs-3 col-sm-3 col-md-3 p-b-15">
                     <span class="property-info icon-area">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 48 48">
                           <path class="meta-icon" fill="#FFA500" d="M46 16v-12c0-1.104-.896-2.001-2-2.001h-12c0-1.103-.896-1.999-2.002-1.999h-11.997c-1.105 0-2.001.896-2.001 1.999h-12c-1.104 0-2 .897-2 2.001v12c-1.104 0-2 .896-2 2v11.999c0 1.104.896 2 2 2v12.001c0 1.104.896 2 2 2h12c0 1.104.896 2 2.001 2h11.997c1.106 0 2.002-.896 2.002-2h12c1.104 0 2-.896 2-2v-12.001c1.104 0 2-.896 2-2v-11.999c0-1.104-.896-2-2-2zm-4.002 23.998c0 1.105-.895 2.002-2 2.002h-31.998c-1.105 0-2-.896-2-2.002v-31.999c0-1.104.895-1.999 2-1.999h31.998c1.105 0 2 .895 2 1.999v31.999zm-5.623-28.908c-.123-.051-.256-.078-.387-.078h-11.39c-.563 0-1.019.453-1.019 1.016 0 .562.456 1.017 1.019 1.017h8.935l-20.5 20.473v-8.926c0-.562-.455-1.017-1.018-1.017-.564 0-1.02.455-1.02 1.017v11.381c0 .562.455 1.016 1.02 1.016h11.39c.562 0 1.017-.454 1.017-1.016 0-.563-.455-1.019-1.017-1.019h-8.933l20.499-20.471v8.924c0 .563.452 1.018 1.018 1.018.561 0 1.016-.455 1.016-1.018v-11.379c0-.132-.025-.264-.076-.387-.107-.249-.304-.448-.554-.551z"></path>
                        </svg>
                     </span>
                     <span class="property-info-entry">
                     <span class="property-info-label">Area</span>
                     <?php echo "<span class='property-info-value'>".$r->Property_areasize."<b class='property-info-unit'></b></span>";?>
                     </span>
                  </div>
                  <div class="col-xs-3 col-sm-3 col-md-3 p-b-15">
                     <span class="property-info-icon icon-bed">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 48 48">
                           <path class="meta-icon" fill="#FFA500" d="M21 48.001h-19c-1.104 0-2-.896-2-2v-31c0-1.104.896-2 2-2h19c1.106 0 2 .896 2 2v31c0 1.104-.895 2-2 2zm0-37.001h-19c-1.104 0-2-.895-2-1.999v-7.001c0-1.104.896-2 2-2h19c1.106 0 2 .896 2 2v7.001c0 1.104-.895 1.999-2 1.999zm25 37.001h-19c-1.104 0-2-.896-2-2v-31c0-1.104.896-2 2-2h19c1.104 0 2 .896 2 2v31c0 1.104-.896 2-2 2zm0-37.001h-19c-1.104 0-2-.895-2-1.999v-7.001c0-1.104.896-2 2-2h19c1.104 0 2 .896 2 2v7.001c0 1.104-.896 1.999-2 1.999z"></path>
                        </svg>
                     </span>
                     <span class="property-info-entry">
                     <span class="property-info-label">Bed</span>
                     <?php echo "<span class='property-info-value'>".$r->Number_of_bedroom."</span>";?>
                     </span>
                  </div>
                  <div class="col-xs-3 col-sm-3 col-md-3 p-b-15">
                     <span class="property-info-icon icon-bath">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 48 48">
                           <path class="meta-icon" fill="#FFA500" d="M37.003 48.016h-4v-3.002h-18v3.002h-4.001v-3.699c-4.66-1.65-8.002-6.083-8.002-11.305v-4.003h-3v-3h48.006v3h-3.001v4.003c0 5.223-3.343 9.655-8.002 11.305v3.699zm-30.002-24.008h-4.001v-17.005s0-7.003 8.001-7.003h1.004c.236 0 7.995.061 7.995 8.003l5.001 4h-14l5-4-.001.01.001-.009s.938-4.001-3.999-4.001h-1s-4 0-4 3v17.005000000000003h-.001z"></path>
                        </svg>
                     </span>
                     <span class="property-info-entry">
                     <span class="property-info-label">Bath</span>
                     <?php echo "<span class='property-info-value'>".$r->Number_of_bathroom."</span>";?>
                     </span>
                  </div>
               </div>
               <?php }?>

               <button class="navbar-btn nav-button wow bounceInRight login" data-wow-delay="0.4s" data-toggle = "modal" data-target="#inCashModal" style="color: #ffffff" id="buy">
               <?php
                  if($r->Property_saleas=="SALE"){
                  ?>BUY NOW
               <?php }
                  else if($r->Property_saleas=="LEASE"){
                      ?>LEASE
               <?php }
                  ?>  
               </button>

               <div class="section">
                  <h4 class="s-property-title">Description</h4>
                  <?php foreach($records as $r){   ?>
                  <div class="s-property-content">
                     <?php echo "<p>".$r->Property_detail."</p>";?>
                  </div>
                  <?php }?>
               </div>
               <div class="section">
                  <h4 class="s-property-title">Location</h4>
                  <?php foreach($records as $r){   ?>
                  <div class="s-property-content">
                     <?php echo "<p id = 'address'>".$r->pa_street." ,".$r->pa_barangay." ,".$r->pa_city.", ".$r->pa_province."</p>";?>
                  </div>
                  <?php }?>
               </div>
               <!-- End description area  -->
            </div>
         </div>
         <div class="col-md-4 p0">
            <aside class="sidebar sidebar-property blog-asside-right">
               <div class="dealer-widget">
                  <div class="dealer-content">
                     <?php foreach ($records3 as $r3) {?>
                     <div class="inner-wrapper">
                        <div class="clear">
                           <div class="col-xs-4 col-sm-4 dealer-face">
                              <a href="">
                                 <?php if ($r3->image == "") {
                                    echo "<img src='".base_url('assets/img/user.jpg')."' class='img-circle'>";
                                 }else{
                                    echo "<img src=' ".$r3->image."' class='img-circle'>";
                                 }?>
                                 
                              </a>
                           </div>
                           
                              <div class="col-xs-8 col-sm-8 ">
                              <h3 class="dealer-name">
                                 <?php echo $r3->fname." ".$r3->lname; ?>
                              </h3>
                              <h6><?php echo $r3->designation;?> | Property Solutions Inc.</h6>
                           </div>
                           <h5></h5>
                        </div>
                        <div class="clear">
                           <ul class="dealer-contacts">                                       
                              <?php echo "<li><i class='pe-7s-call strong'> </i>".$r3->contactNumber."</li>";?>
                           </ul>
                           <ul class="dealer-contacts">                                       
                              <?php echo "<li><i class='pe-7s-mail-open strong'> </i>".$r3->email."</li>";?>
                           </ul>
                        </div>
                     </div>
                     <?php }?>
                  </div>
               </div>
               <div class="panel panel-default sidebar-menu similar-property-wdg wow fadeInRight animated">
                  <div class="panel-heading">
                  </div>
                  <div class="panel-body recent-property-widget">
                     <ul>
                     </ul>
                  </div>
            </aside>
            </div>
         </div>
      </div>
   </div>
  
   <!-- PURCHASE in cash modal --------------------------------------------------------------------->

   <div class='modal fade' id='inCashModal' tabindex='-1' role='dialog' style='margin-top:80px;' aria-labelledby='exampleModalLabel' aria-hidden='true'>
      <div class='modal-dialog' role='document'>
         <div class='modal-content'>
            <div class='modal-header' style="">
               <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
               <span aria-hidden='true'>&times;</span>
               </button> 
               <strong>
                  <h3 class='modal-title' id='exampleModalLabel' style="text-align: center;">Arrange a meeting for the seller!</h3>
               </strong>
            </div>
            <?php echo form_open_multipart('User/newRequestQuery');?>
               <div class='modal-body'>
                  
                           <input type="hidden" name="prospectBuyerID" value="<?php echo $this->session->userdata('User_Id')?>" required>
                           <input type="hidden" name="propertyID" value="<?php echo $r->Property_id?>" required>
                     <div class="form-row">
                           <label for="exampleFormControlTextarea1">Date of Meeting</label>
                           <input type="date" name="dateOfPayment" class="form-control" required>
                     </div>
                     <div class="form-row">
                        <label for="exampleFormControlTextarea1">Give a message to the Seller!</label>
                        <textarea required class="form-control" name = "messageToSeller" id="messageToSeller" rows="3"></textarea>
                     </div>                
                  <br>
               </div>
               <div class='modal-footer'>
                    <button type="submit" class="btn btn-primary">Submit</button> 
               </div>
            </form>
         </div>
      </div>
   </div>
  
   <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10 mt-5" style="background-color: white; padding: 10px;">
         <h3 style="text-align: center; margin: 30px;">The proximate location of the property</h3>
         <div id="map"></div>
      </div>
      <div class="col-md-1"></div>
   </div>
   <script type="text/javascript">
      $('#sandbox-container .input-group.date').datepicker({
      });
   </script>
   <script>
      window.addEventListener("load", myInit, true); 
      function myInit(){  
         initMap();
         checkSeller();
      }; 


      function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: {lat: -34.397, lng: 150.644}
      });
      var geocoder = new google.maps.Geocoder();
      
          geocodeAddress(geocoder, map);
      }
      
      function geocodeAddress(geocoder, resultsMap) {
      var address = document.getElementById('address').innerText;
      geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
          resultsMap.setCenter(results[0].geometry.location);
          var marker = new google.maps.Marker({
            map: resultsMap,
            position: results[0].geometry.location
          });
        } else {
          alert('Geocode was not successful for the following reason: ' + status);
        }
      });
      }

      function submitReservation(){
         var contactNo = document.getElementById("dr").value;

         if(contactNo === ""){
            alert("Please Provide Your Contact Number");
         }
      }

      function checkSeller(){
         var sessionID = <?php echo $this->session->userdata('User_Id'); ?>;
         var sellerID = <?php echo $r->User_Id_Seller;?>;

         if(sessionID == sellerID){
            document.getElementById("buy").disabled = true;
            document.getElementById("reserve").disabled = true;
         }

      }
   </script>
   <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZF8NNdFGJYQ_CdntRu107FinoJ_IXvkY&callback=initMap">
    </script>
   <script> 
      $(document).on("click" , ".hhh" , function() {
      document.getElementById('dr').disabled=false;
      document.getElementById('db').disabled=false;
      document.getElementById('okbtn').disabled=false;
             });
              
   </script>
   <script type="text/javascript">
      function inCash(){
         $('#exampleModal').modal('hide');
         $('#inCashModal').modal('show');
      }
   </script>