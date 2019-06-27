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
               <li class="wow fadeInDown" data-wow-delay="0.2s"><a class="" href="<?= base_url('Mis')?>">Home</a></li>
               <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="<?= site_url('Mis/contact')?>">Contact</a></li>
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
               <h1 class="page-title">Home / Log in </h1>
            </div>
         </div>
      </div>
   </div>
   <!-- End page header -->
   <!-- register-area -->
   <div class="register-area" style="background-color: rgb(249, 249, 249);">
      <div class="container">
         <div class="col-md-8 col-md-offset-2">
            <div class="box-for overflow">
               <div class="col-md-8 col-md-offset-2 col-xs-12 login-blocks">
                  <h2>Login : </h2>
                  <form class="login-form" action="userlogin" method="post">
                     <div class="form-group">
                        <label for="validationCustom03">Email</label>
                        <input type="text" class="form-control" name="email" id="validationCustom03" placeholder="Your email" required="required">
                     </div>
                     <div class="input-group">
                        <input type="password" maxlength="20" required class="form-control pwd" placeholder="Password" name="password">
                        <span class="input-group-btn">
                        <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                        </span>          
                     </div>
                     <br>
                     <div class="text-center">
                        <button type="submit" class="btn btn-default" id="login"> Log in <i class="fa fa-check"></i></button>
                        <p class="message"> <br> Not registered? <a href="<?php echo base_url('Mis/register');?>">Create an account</a></p>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script type="text/javascript">
      $(".reveal").on('click',function() {
      var $pwd = $(".pwd");
      if ($pwd.attr('type') === 'password') {
          $pwd.attr('type', 'text');
      } else {
          $pwd.attr('type', 'password');
      }
      });
   </script>