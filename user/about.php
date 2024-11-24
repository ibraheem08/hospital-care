
<?php include('header.php');
include('../admin/connect.php');
$query = "SELECT * FROM `service` order by id desc limit 3";
$run = mysqli_query($con, $query);
$query1 ="SELECT users.user_name,cities.city_name,category.cat_name,doctor.* FROM `doctor` join cities on cities.Id=doctor.city_id_FK
join category on category.Id=doctor.cat_id_FK join users on users.Id=doctor.user_id_FK order by id desc limit 4";
$run1 = mysqli_query($con, $query1);
$q2="SELECT * FROM `rate` " ;
$run2=mysqli_query($con,$q2);
$q3="SELECT * FROM `docach` " ;
$run3=mysqli_query($con,$q3);
?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">About Us</span>
          <h1 class="text-capitalize mb-5 text-lg">About Us</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">About Us</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section about-page">
	<div class="container">
		<div class="row">
		
			<div class="col-lg-4">
				<h2 class="title-color">Personal care for your healthy living</h2>
			</div>
			<div class="col-lg-8">
				<p>In today’s fast-paced world, it can be difficult for adolescents to make time for good nutrition and a healthy lifestyle. But by establishing smart habits now, young adults can look forward to a lifetime of good health.</p>
				<img src="images/about/sign.png" alt="" class="img-fluid">
			</div>
		</div>
	</div>
</section>

			
<section class="fetaure-page ">
	<div class="container">
		<div class="row">
		<?php while ($data=mysqli_fetch_assoc($run)){?>
			<div class="col-lg-4 col-md-6">
				<div class="about-block-item mb-5 mb-lg-0">
					<img src="../admin/<?php  echo $data['service_img'] ?>" alt="" class="img-fluid w-100">
					<h4 class="mt-3"><?php echo $data ['service_name']?></h4>
					<p><?php echo $data ['text']?></p>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
<section class="section awards">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-4">
				<h2 class="title-color">Our Doctors achievements </h2>
				<div class="divider mt-4 mb-5 mb-lg-0"></div>
			</div>
			<div class="col-lg-8">
				<div class="row">
				<?php while ($data=mysqli_fetch_assoc($run3)){?>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="award-img">
							<img src="../admin/<?php  echo $data['ach_img'] ?>" alt="" class="img-fluid">
						</div>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section team">
	<div class="container">
		<div class="row justify-content-center">
		
			<div class="col-lg-6">
				<div class="section-title text-center">
					<h2 class="mb-4">Meet Our Specialist</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Today’s users expect effortless experiences. Don’t let essential people and processes stay stuck in the past. Speed it up, skip the hassles</p>
				</div>
			</div>
		</div>

		<div class="row">
		<?php while ($data=mysqli_fetch_assoc($run1)){?>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="team-block mb-5 mb-lg-0">
					<img src="../admin/<?php  echo $data['doc_img'] ?>" alt="" class="img-fluid w-100">

					<div class="content">
						<h4 class="mt-4 mb-0"><a href=""><a href=""><?php echo $data ['doc_name']?></a></h4>
						<p><?php echo $data ['cat_name']?></p>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
</section>

<section class="section testimonial">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-6">
				<div class="section-title">
					<h2 class="mb-4">What they say about us</h2>
					<div class="divider  my-4"></div>
				</div>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col-lg-6 testimonial-wrap offset-lg-6">
			<?php while($data=mysqli_fetch_assoc($run2)) { ?>
				<div class="testimonial-block">
					<div class="client-info ">
						<h4><?php echo $data['topic']  ?></h4>
						<span><?php echo $data['user_name'] ?></span>
					</div>
					<p>
					<?php echo $data['message']?>	
					</p>
					<i class="icofont-quote-right"></i>
				</div>
				<?php } ?>
			</div>
			
		</div>
			</div>
			</div>
</section>
<?php include('footer.php')?>



