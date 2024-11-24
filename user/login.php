<?php include('header.php');

?>
<section class="section cta-page1">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				
			</div>
			<div class="col-lg-5 col-md-10 ">
				<div class="appoinment-wrap mt-5 mt-lg-4">
				<h2 class="mb-2 title-color">Log in </h2>
					<p class="mb-4">AllState "You're in good hands" ...</p>
					     <form  class="appoinment-form" method="post" action="">
                    <div class="row">
					<div class="col-lg-12">
                            <div class="form-group">
                                <input name="user_name" id="name" type="text" class="form-control" placeholder="Enter your Name" required pattern="[A-Za-z]{3,15}">
                               
                            </div>
                        </div>
						<div class="col-lg-12">
                            <div class="form-group">
                                <input name="password" id="name" type="password" class="form-control" placeholder="Enter your password" required pattern="[A-Za-z]{3,15}">
                            </div>
                        </div>

								  </div>
								  <div class="row">
			
								  <div class="col-lg-6">
                            <div class="form-group">
						<input type="submit" class="btn btn-main btn-round-full"   name="sub"> <i class=" ml-2  "></i>

								  </div>
								  </div>
						
			</div>

						
								  </div>
					</form>
					
            </div>


		</div>
	</div>
</section>

<!-- footer Start -->

 <?php
 include('footer.php');
session_start();
include('../admin/connect.php');
if(isset($_POST['sub'])){
$u=$_POST['user_name'];
$p=$_POST['password'];
$q="SELECT * FROM `users` WHERE user_name='$u' and password='$p' and role_id_FK= 12";
$run=mysqli_query($con,$q);
$rows=mysqli_num_rows($run);
if($rows==0){
  echo "<script>alert('Login failed')</script>";
}
else{
	$data=mysqli_fetch_assoc($run);
  $_SESSION['FRONT']=$u;
  $_SESSION['FRONT_ID']=$data['Id'];
  echo "<script>alert('Login Successfull');window.location.href='index.php'</script>";
}

}

?>