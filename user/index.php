
<?php
include('header.php')

?>
<div class="content-body">
			<div class="container-fluid">
            <?php
include('../admin/connect.php');
$q="SELECT * FROM `users`";
$run=mysqli_query($con,$q);
$q1="SELECT * FROM `category`order by id desc limit 3 " ;
$run1=mysqli_query($con,$q1);
$q2="SELECT * FROM `rate` " ;
$run2=mysqli_query($con,$q2);

$Q="select count(*) as total_doctor from doctor";
$run3=mysqli_query($con,$Q);
$data5=mysqli_fetch_assoc($run3);

$Q1="select count(*) as total_patient from patient";
$run4=mysqli_query($con,$Q1);
$data6=mysqli_fetch_assoc($run4);

$Q2="select count(*) as total_department from category";
$run6=mysqli_query($con,$Q2);
$data7=mysqli_fetch_assoc($run6);

$Q3="select count(*) as total_city from cities";
$run7=mysqli_query($con,$Q3);
$data8=mysqli_fetch_assoc($run7);
?>
<section class="banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-xl-7">
				<div class="block">
					<div class="divider mb-3"></div>
					<span class="text-uppercase text-sm letter-spacing ">Total Health care solution</span>
					<h1 class="mb-3 mt-3">Your most trusted health partner</h1>
					<p class="mb-4 pr-5">Healthcare service line management is patient-centered care related to a specific area of clinically-related conditions .</p>
					<div class="btn-container ">
					<a href="appoinment.php" class="btn btn-main-2 btn-icon btn-round-full">Make appoinment <i class="icofont-simple-right ml-2"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="feature-block d-lg-flex">
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-surgeon-alt"></i>
						</div>
						<span>24 Hours Service</span>
						<h4 class="mb-3">Online Appoinment</h4>
						<p class="mb-4">You can book your appoinment while sitting in room.</p>
						<a href="appoinment.php" class="btn btn-main btn-round-full">Make a appoinment</a>
					</div>
				
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-ui-clock"></i>
						</div>
						<span>Timing schedule</span>
						<h4 class="mb-3">Working Hours</h4>
						<p class="mb-4">We are available for you 24/7 .</p>
						
					</div>
				
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-support"></i>
						</div>
						<span>Capable Doctor</span>
						<h4 class="mb-3">1-800-700-6200</h4>
						<p class="mb-4">Our doctor are always at your services.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="section about">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-4 col-sm-6">
				<div class="about-img">
					<img src="images/about/img-1.jpg" alt="" class="img-fluid">
					<img src="images/about/img-2.jpg" alt="" class="img-fluid mt-4">
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
				<div class="about-img mt-4 mt-lg-0">
					<img src="images/about/img-3.jpg" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="about-content pl-4 mt-4 mt-lg-0">
					<h2 class="title-color">Personal care <br>& healthy living</h2>
					<p class="mt-4 mb-5">which was calculated and rated based on the reported intake of healthy foods like vegetables, fruits, nuts, whole grains, healthy fats, and omega-3 fatty acids, and unhealthy foods like red and processed meats, sugar-sweetened beverages, trans fat, and sodium.</p>

					<a href="service.php" class="btn btn-main-2 btn-round-full btn-icon">Services<i class="icofont-simple-right ml-3"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="cta-section ">
	<div class="container">
		<div class="cta position-relative">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-doctor"></i>
						<span class="h3 counter" ><?php echo $data5['total_doctor']; ?></span>
						<p>Doctors</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-user"></i>
						<span class="h3 counter" ><?php echo $data6['total_patient']; ?></span>
						<p>Patient</p>
					</div>
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-badge"></i>
						<span class="h3 counter"><?php echo $data7['total_department']; ?></span>
						<p>Department</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-globe"></i>
						<span class="h3 counter"><?php echo $data8['total_city']; ?></span>
						<p>Cities</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section service gray-bg">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2>Department</h2>
					<div class="divider mx-auto my-4"></div>
					<p>There are several departments are found in Care</p>
				</div>
			</div>
		</div>
	
		<div class="row">
		<?php while($data3=mysqli_fetch_assoc($run1)) { ?>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class=" text-lg">	<a href="doctor.php?cat_id=<?php echo $data3 ['Id']?>"><img src="../admin/<?php  echo $data3['cat_img'] ?>"  alt="Category-image" class="img-fluid w-20"></a></i>
						<h3 class="mt-3 mb-3"></h3>
					</div>

					<div class="content">
						<p class="mb-4"><?php echo $data3 ['cat_text']?></p>
					</div>
				</div>
				
			</div>
			<?php  } ?>
		
			
		</div>
		<a href="department.php" class="btn btn-main-2 btn-round-full btn-icon">View More<i class="icofont-simple-right ml-3"></i></a>
		
	</div>
</section>

<section class="section testimonial-2 gray-bg">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="section-title text-center">
					<h2>We served over <?php echo $data6['total_patient']; ?> Patients</h2>
					<div class="divider mx-auto my-4"></div>
					<p>All of us working in health care are looking for ways to better connect with patients. If you are a clinician, it’s probably obvious that better connection allows for better patient care.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 testimonial-wrap-2">
				<?php while($data2=mysqli_fetch_assoc($run2)) {?>
				<div class="testimonial-block style-2  gray-bg">
					<i class="icofont-quote-right"></i>

					<div class="client-info ">
						<h4><?php echo $data2['topic'] ?></h4>
						<span><?php echo $data2['user_name']  ?></span>
						<p>
						<?php echo $data2['message'] ?>
						</p>
					</div>
				</div>
<?php } ?>
				
			</div>
		</div>
	</div>
</section>


	
<?php
include('footer.php');
include('../admin/connect.php');
if(isset($_POST['sub'])){
  $u = $_POST['patient_name'];
  $p = $_POST['medical_history'];
  $o = $_POST['d_o_b'];
  $r = $_POST['contact'];
  $s = $_POST['user_id'];
$query="INSERT INTO `patient`(`patient_name`, `medical_history`, `d_o_b`, `contact`, `user_id_Fk`) VALUES ('$u','$p','$o','$r','$s')";
$run=mysqli_query($con, $query);
if($run==true){
  echo "<script>alert('Data has been entered');window.location.href='appoinment.php'</script>";
}
else{
  echo mysqli_error($con);
}
}
?>
