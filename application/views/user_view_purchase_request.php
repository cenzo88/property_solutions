<body onload="preliminaries()">
	<div id="preloader">
      <div id="status">&nbsp;</div>
    </div>
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
                        <li><a href="<?= site_url('User/manageSales');?>">Manage Sales</a></li>
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
    <div class="page-head">
      <div class="container">
         <div class="row">
            <div class="page-head-content">
               <h1 class="page-title">PROPERTY PURCHASE REQUEST</h1>
            </div>
         </div>
      </div>
   </div>
   <div class="table area" style="width: 90%; margin: 20px auto;">
   	<table class = "table-striped" id="myTable">
   	<thead style="background-color: #f1c40f; color: white;">
   		<tr>
   			<td>NO</td>
   			<td>Customer Name</td>
   			<td>Contact Number</td>
   			<td>Date of Meeting</td>
   			<td>Message</td>
   			<td>Property</td>
   			<td>Process Purchase</td>
   		</tr>
   	</thead>
   	<tbody>
   		<?php foreach ($records as $r) {?>
   			<tr style="color: #000000">
   				<td><?php echo $r->reqID;?></td>
   				<td><?php echo $r->User_fname." ".$r->User_lname;?></td>
   				<td><?php echo $r->User_contact;?></td>
   				<td><?php echo $r->date_of_meeting;?></td>
   				<td><?php echo $r->message_to_seller;?></td>
   				<td><?php echo $r->Property_title;?></td>
   				<td><button data-toggle = "modal" data-target="#exampleModal" style="color: #ffffff; background-color: #2ecc71;">Process Purchase</button></td>
   			</tr>
   			<div class="modal fade bd-example-modal-lg" id = "exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		      <div class="modal-dialog modal-lg">
		         <form method="POST" action="">
		            <div class='modal-content'>
		               <div class='modal-header' style="background-color:#f1c40f; ">
		                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
		                  <span aria-hidden='true'>&times;</span>
		                  </button> 
		                  <strong>
		                     <h3 class='modal-title' id='exampleModalLabel' style="text-align: center;">New Invoice</h3>
		                  </strong>
		               </div>
		               <div class='modal-body'">
		                <form>
		                	<!-- START OF SELECT MODE OF PAYMENT -->

		                	  <div class="form-group" id = "Select_mode_of_payment">
							    <label for="exampleFormControlSelect1">Select Mode Of Payment</label>
							    <select class="form-control" id="mode_of_payment" onchange="selectTransaction()">
							      <option value="undefined">Please Select Here</option>	
							      <option value="0">Loan</option>
							      <option value="1">Cash</option>
							    </select>
							  </div>

							<!-- END OF SELECT MODE OF PAYMENT -->

							<!-- IF LOAN -->
							<div id = "loan">
							  <div class="form-group">
							    <label for="formGroupExampleInput">Financing Agency (Optional, Leave it blank if none) </label>
							    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Banks, Lending Agencies etc.">
							  </div>
							  <div class="row" style="background-color: #e67e22; color: white;">
							  	<div class="form-group col-md-3">
								    <label for="formGroupExampleInput">| Down Payment</label>
								    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Down Payment">
								  </div>
								  <div class="form-group col-md-3">
								    <label for="formGroupExampleInput">| Rate Per Month</label>
								    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Rate Per Month">
								  </div>
								  <div class="form-group col-md-3">
								    <label for="formGroupExampleInput">| Credit Period (Months)</label>
								    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Rate Per Month">
								  </div>
								  <div class="form-group col-md-3">
								    <label for="formGroupExampleInput">| Interest</label>
								    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Interest Rate">
								</div>
							  </div>
							  
							</div>
							<!-- END IF LOAN -->
		                </form>        
		               </div>
		               <div class='modal-footer'>
		                    <button type="submit" class="btn btn-primary">Submit</button> 
		               </div>
		            </div>
		         </form>
		      </div>
		   </div>
   		<?php } ?>
   	</tbody>
   </table>
   </div>
   
   <script type="text/javascript">
   	$(document).ready( function () {
    	$('#myTable').DataTable(
    	{
    		"bFilter": false
    	});
   
	} );
   </script>
   <script type="text/javascript">

   	function preliminaries(){
   		var loan_div = document.getElementById("loan");
		loan_div.style.display = "none";
   	}

   	function selectTransaction() {
	  var x = document.getElementById("mode_of_payment").value;
	  var loan_div = document.getElementById("loan");
	  var selectionDiv  = document.getElementById("Select_mode_of_payment");

	  if(Number(x) == Number(0)){
	  	selectionDiv.style.display = "none";
	  	loan_div.style.display = "block";
	  }

	  $("#exampleModal").on("hidden.bs.modal", function () {
		    selectionDiv.style.display = "block";
	  		loan_div.style.display = "none";
		});
	}
   </script>
</body>
