<?php  include ('header.php');
include('../admin/connect.php');
$query = "SELECT * FROM `service`";
$run = mysqli_query($con, $query);
?>
<div>
<section class="section appoinment">
    
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-7 ">
				<div class="appoinment-content">
					<img src="images/about/img-3.jpg" alt="" class="img-fluid">
					
				</div>
			</div>
			<div class="col-lg-5 col-md-10 ">
				<div class="appoinment-wrap mt-5 mt-lg-0">
				<h2 class="mb-5 text-lg">Register  <span class="title-color">your self</span></h2>
					
					     <form  class="appoinment-form" method="post" action="">
                    <div class="row">
					<div class="col-lg-12">
                            <div class="form-group">
                                <input name="user_name" id="name" type="text" class="form-control" placeholder="Enter Name" required pattern="[A-Za-z]{3,15}">
                               
                            </div>
                        </div>
						<div class="col-lg-12">
                            <div class="form-group">
                                <input name="password" id="name" type="password" class="form-control" placeholder="Enter password" required pattern="[A-Za-z]{3,15}">
                            </div>
                        </div>

								  </div>

						<div class="col-lg-5">
                            <div class="form-group">
						<input type="submit" class="btn btn-main btn-round-full"   name="sub"> <i class=" ml-2  "></i>
								  </div>
								  </div>
								  </div>
					</form>
            </div>
			</div>
		</div>
	</div>
</section>
 </div>
 
 <?php 
include('footer.php');
include('../admin/connect.php');
if(isset($_POST['sub'])){
	$u = $_POST['user_name'];
	$p = $_POST['password'];
  $q="INSERT INTO `users`(`user_name`, `password`, `role_id_FK`) VALUES ('$u','$p','12')";
  $run=mysqli_query($con, $q);
  if($run==true){
	$or=mysqli_insert_id($con);
	$q1="INSERT INTO `patient`(`patient_name`, `medical_history`, `d_o_b`, `contact`, `user_id_Fk`) VALUES ('','','','','$or')";
	$run1=mysqli_query($con, $q1);
	echo "<script>alert(' Registered');window.location.href='login.php'</script>";
  }
  else{
	 echo mysqli_error($con);
  }
  }
  ?>
