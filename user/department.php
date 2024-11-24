<?php include ('header.php');
include('../admin/connect.php');
$q1="SELECT * FROM `category` " ;
$run1=mysqli_query($con,$q1);
?>

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">All Departments</span>
          <h1 class="text-capitalize mb-5 text-lg">Care Department</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">All Department</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section service-2">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2> patient care</h2>
					<div class="divider mx-auto my-4"></div>
					<p>All of us working in health care are looking for ways to better connect with patients. If you are a clinician, it’s probably obvious that better connection allows for better patient care.</p>
				</div>
			</div>
		</div>
		<div class="row">
        <?php while($data3=mysqli_fetch_assoc($run1)) { ?>
			<div class="col-lg-4 col-md-6 ">
				<div class="department-block mb-5">
				<a href="doctor.php?cat_id=<?php echo $data3 ['Id']?>"> <img src="../admin/<?php  echo $data3['cat_img'] ?>" alt="" class="img-fluid w-100"></a>
					<div class="content">
						
						<p class="mb-4"><?php echo $data3 ['cat_text']?></p>
					
					</div>
				</div>
			</div>
<?php } ?>
		</div>
	</div>
</section>
<?php
include('footer.php'); 
?>