<?php
include('header.php');
include('../admin/connect.php');
$i=$_SESSION['FRONT_ID'];
$query="SELECT * FROM `users` WHERE id='$i'";
$run=mysqli_query($con, $query);
$data=mysqli_fetch_assoc($run);
?>
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
            <?php


                            
?>
<section class="section appoinment">
    
	<div class="container">
		
			
			<div class="col-lg-10 col-md-10 ">
				<div class="">
				<h2 class="mb-5 text-lg">Update <span class="title-color"></span>Your Password</h2>
					
					     <form  class="" method="post" action="">
                    <div class="row">
					<div class="col-lg-12">
                            <div class="form-group">
                                <input name="user_name" id="name" type="text" class="form-control" placeholder="Enter Name" value="<?php echo $data['user_name']?>" >
                               
                            </div>
                        </div>
						<div class="col-lg-12">
                            <div class="form-group">
                                <input name="password" id="name" type="password" class="form-control" placeholder="Enter password" value="<?php echo $data['password']?>">
                            </div>
                        </div>

								  </div>

						<div class="col-lg-8">
                            <div class="form-group">
						<input type="submit" class="btn btn-main btn-round-full"   name="sub"> <i class=" ml-2  "></i>
								  </div>
								  </div>
								  </div>
					</form>
            </div>
			</div>
		
	</div>
</section>


                    <?php
include('footer.php');
if(isset($_POST['sub'])){
    $u = $_POST['user_name'];
    $p = $_POST['password'];
   
  
$query="UPDATE `users` SET `user_name`='$u',`password`='$p' WHERE id='$i'";
$run=mysqli_query($con, $query);
if($run){
echo "<script>alert('password has been changed');window.location.href='patient.php';</script>";
}
else{
echo mysqli_error($con);
}
}
?>