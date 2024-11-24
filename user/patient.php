<?php 
include('header.php');
include('../admin/connect.php');
$id=$_SESSION['FRONT_ID'];
$q3="SELECT users.user_name , doctor.doc_name, appoinment.* FROM `appoinment` JOIN users on users.Id=appoinment.user_id_FK join doctor on doctor.Id=appoinment.doc_id_FK where users.Id='$id'"; 
$run3 = mysqli_query($con, $q3);
$q="SELECT * FROM `users`";
$run=mysqli_query($con,$q);
$q1="SELECT * FROM `category`";
$run1=mysqli_query($con,$q1);
$q2="SELECT * FROM `rate`" ;
$run2=mysqli_query($con,$q2);
$Q2="select count(*) as total_appointment from appoinment ";
$run4=mysqli_query($con,$Q2);
$data4=mysqli_fetch_assoc($run4);
?>
  
<section class="banner">
	<div class="container">
		<div class="row">

<div class="col-lg-6 col-md-10 ">
				<div class="appoinment-wrap mt-12 mt-lg-4">
          
					<h2 class="mb-2 title-color">Patient Detail</h2>
					<p class="mb-4">AllState "You're in good hands" ...</p>
					     <form  class="appoinment-form" method="post" action="">
                    <div class="row">
					<div class="col-lg-6">
                            <div class="form-group">
                                <input name="patient_name" id="name" type="text" class="form-control" placeholder="Full Name" required>
                            </div>
                        </div>
						<div class="col-lg-6">
                            <div class="form-group">
                                <input name="medical_history" id="name" type="text" class="form-control" placeholder="Inter Medical History" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="d_o_b" id="time" type="date" class="form-control" placeholder="Date Of Birth" required>
                            </div>
                        </div>
                       

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="contact" id="phone" type="Number" class="form-control" placeholder="Phone Number" required>
                            </div>
                        </div>
                    
                    

                       

						<div class="col-lg-6">
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
<div class="col-lg-12">
		<div class="comment-area mt-4 mb-5">
			<h4 class="mb-4"> Your Appointments </h4>
			<table class="table">
  <thead>
	<tr>
	  
	  <th>Doctor Name</th>
	  
	  <th>Time</th>
	  <th>status</th>
	  
	 
	  
	</tr>
  </thead>
  <tbody>
  <?php while($data=mysqli_fetch_assoc($run3)) { ?>
	<tr>
	  
	  <td><?php echo $data['doc_name']  ?></td>
	  
	  <td><?php echo $data['time']  ?> </td>
	  <td><?php echo $data['status']  ?></td>
	  
	  
	</tr>
	<?php } ?>
	
  </tbody>
</table>


		</div>
    <button  class="btn btn-main-2 btn-round-full "><a href="update_pass.php">Update password</a></button>
	</div>

	

              


<?php 
include('footer.php');

if(isset($_POST['sub'])){
  $u = $_POST['patient_name'];
  $p = $_POST['medical_history'];
  $o = $_POST['d_o_b'];
  $r = $_POST['contact'];
  
$query="UPDATE `patient` SET `patient_name`=' $u',`medical_history`='$p',`d_o_b`='$o',`contact`='$r' WHERE user_id_Fk='$id'";
$run=mysqli_query($con, $query);
if($run==true){
  echo "<script>alert('patient has been registered');window.location.href='appoinment.php'</script>";
}
else{
  echo mysqli_error($con);
}
}
?>