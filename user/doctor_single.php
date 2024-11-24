<?php
include('header.php');
include('../admin/connect.php');
@$id=$_GET['id'];
$q="SELECT users.user_name,cities.city_name,category.cat_name,doctor.* FROM `doctor` join cities on cities.Id=doctor.city_id_FK join category on category.Id=doctor.cat_id_FK join users on users.Id=doctor.user_id_FK where doctor.Id= $id ";
$run=mysqli_query($con,$q);
$data=mysqli_fetch_assoc($run);
$query = "SELECT docach.*,doctor.doc_name FROM `docach`JOIN doctor on doctor.Id=docach.doc_id_FK where doctor.Id= $id";
$run5=mysqli_query($con,$query);
$query1 = "SELECT dissease.*,doctor.doc_name  FROM `dissease` JOIN doctor on doctor.Id=dissease.doc_id_FK where doctor.Id= $id";
$run6 = mysqli_query($con, $query1);
?>


	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="doctor-img-block">
					<img src="../admin/<?php  echo $data['doc_img'] ?>" alt="" class="img-fluid w-100">

					<div class="info-block mt-4">
						<h4 class="mb-0"><?php echo $data['doc_name']?></h4>
						<p><?php echo $data['cat_name']?></p>

						
					</div>
				</div>
			</div>

			<div class="col-lg-8 col-md-6">
				<div class="doctor-details mt-4 mt-lg-0">
					<h2 class="text-md">Introducing to myself</h2>
					<div class="divider my-4"></div>
					<p><?php echo $data['experiance']?></p>
					<p><?php echo $data['contact']?></p>
					<p><?php echo $data['city_name']?></p>

					<a href="appoinment.php?id=<?php echo $data ['Id']?>" class="btn btn-main-2 btn-round-full mt-3">Make an Appoinment<i
							class="icofont-simple-right ml-2  "></i></a>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="section doctor-qualification gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="section-title">
					<h3>Researches</h3>
			
					<div class="divider my-4"></div>
					<?php while($data2=mysqli_fetch_assoc($run6)){ ?>
					<img src="../admin/<?php  echo $data2['diss_img'] ?>" alt="" class="img-fluid w-80">
					<div class="divider my-4"></div>
					<p > <?php echo $data2 ['diss_name']?></p>
				<?php } ?>
				</div>
			</div>
		</div>
</section>
<section class="section doctor-qualification gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="section-title">
					<h3>My Acchievment</h3>
			
					<div class="divider my-4"></div>
					<?php while($data2=mysqli_fetch_assoc($run5)){ ?>
					<img src="../admin/<?php  echo $data2['ach_img'] ?>" alt="" class="img-fluid w-80">
				<?php } ?>
				</div>
			</div>
		</div>
</section>





<?php include('footer.php')?>