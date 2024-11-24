<?php include('header.php');
include('../admin/connect.php');
@$cat_id=$_GET['cat_id'];
@$doc_id=$_GET['doc_id'];
@$cit_id=$_GET['cit_id'];
if($cat_id!=null){
    $q="SELECT users.user_name,cities.city_name,category.cat_name,doctor.* FROM `doctor` join cities on cities.Id=doctor.city_id_FK join category on category.Id=doctor.cat_id_FK join users on users.Id=doctor.user_id_FK WHERE category.Id='$cat_id'"; 
}
else if($doc_id!=null){
  $q="SELECT users.user_name,cities.city_name,category.cat_name,doctor.* FROM `doctor` join cities on cities.Id=doctor.city_id_FK join category on category.Id=doctor.cat_id_FK join users on users.Id=doctor.user_id_FK WHERE doctor.Id='$doc_id'";
}
else if($cit_id!=null){
    $q="SELECT users.user_name,cities.city_name,category.cat_name,doctor.* FROM `doctor` join cities on cities.Id=doctor.city_id_FK join category on category.Id=doctor.cat_id_FK join users on users.Id=doctor.user_id_FK WHERE cities.Id='$cit_id'";
}
else{
$q="SELECT users.user_name,cities.city_name,category.cat_name,doctor.* FROM `doctor` join cities on cities.Id=doctor.city_id_FK join category on category.Id=doctor.cat_id_FK join users on users.Id=doctor.user_id_FK ";
}
$run = mysqli_query($con, $q);
?>


<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">All Doctors</span>
          <h1 class="text-capitalize mb-5 text-lg">Specalized doctors</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">All Doctors</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>


<!-- portfolio -->
<section class="section doctors">
  <div class="container">
  	  <div class="row justify-content-center">
             <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Doctors</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>We provide a wide range of creative services adipisicing elit. Autem maxime rem modi eaque, voluptate. Beatae officiis neque </p>
                </div>
            </div>
        </div>
      
        
        
    <div class="row shuffle-wrapper portfolio-gallery">
    <?php while ($data=mysqli_fetch_assoc($run)){?>
      	<div class="col-lg-4 col-sm-6 col-md-6 mb-4 shuffle-item" >
	      	<div class="position-relative doctor-inner-box">
		        <div class="doctor-profile">
	               <div class="doctor-img">
	               		<img src="../admin/<?php  echo $data['doc_img'] ?>" alt="doctor-image" class="img-fluid w-100">
	               </div>
	            </div>
                <div class="content mt-3">
                	<h4 class="mb-3"><a href="doctor_single.php?id=<?php echo $data['Id']?>"><?php echo $data ['doc_name']?></a></h4>
                	<ul style="list-style: none">
                    <li><b>experience: </b><?php echo $data ['experiance']?></li>
                    <li> <b>Department: </b><?php echo $data ['cat_name']?></li>
                    <li><b>City: </b><?php echo $data ['city_name']?></li>
                  </ul>
                  <a href="doctor_single.php?id=<?php echo $data['Id']?>"  class="btn btn-main btn-icon btn-round-full">Read More <i class="icofont-simple-right ml-2  "></i></a>
                </div> 
                
	      	</div>
             
      	</div>
        <?php } ?> 
  </div>
  
    
  
</section>
<!-- /portfolio -->
<section class="section cta-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="cta-content">
					<div class="divider mb-4"></div>
					<h2 class="mb-5 text-lg">We are pleased to offer you the <span class="title-color">chance to have the healthy</span></h2>
					<a href="appoinment.php" class="btn btn-main-2 btn-round-full">Get appoinment<i class="icofont-simple-right  ml-2"></i></a>
				</div>
			</div>
		</div>
	</div>
    </div>
	</div>
</section>
<?php include('footer.php')?>