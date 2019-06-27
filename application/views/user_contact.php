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
                        <h1 class="page-title">Home / Contact </h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->
        
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10 mt-5" style="background-color: white; padding: 10px;">
             <h3 style="text-align: center; margin: 30px;">We are here</h3>
             <div id="map"></div>
          </div>
          <div class="col-md-1"></div>
       </div>

        <!-- register-area -->

        <div class="register-area" style="background-color: rgb(249, 249, 249);">
            <div class="container">

               
                <div class="col-md-8 col-md-offset-2"> 
                    <div class="box-for overflow">  

                        <div class="col-md-8 col-md-offset-2 col-xs-12 login-blocks">
                            <h2>Contact Form <i class="fa fa-send"></i> </h2> 
                            <form class="login-form" action="<?= site_url('Mis/sendMessage')?>" method="post">
                                   <div class="form-group">
                                    <label >Your Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Your name" required="required" value="<?= $records['User_fname'].' '.$records['User_lname'];?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom03">Email</label>
                                    <input type="email" value="<?= $records['User_emailadd'];?>" class="form-control" name="email" id="validationCustom03" placeholder="Your email" required="required" readonly>
                                </div>
                                   <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" required="" name="message" placeholder="Your message"></textarea>
                                </div>
  <br>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-default" id="login"> Submit <i class="fa fa-check"></i></button>
                                </div>
                            </form>
                            <br>
                           
                        </div>
                       
                    </div>
                </div>

            </div>
        </div>

        <script type="text/javascript">
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
      var address = "Calape, Bohol";
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
      </script>
      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZF8NNdFGJYQ_CdntRu107FinoJ_IXvkY&callback=initMap">
    </script>