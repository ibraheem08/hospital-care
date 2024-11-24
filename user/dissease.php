<?php include('header.php');
include('../admin/connect.php');
$query1 = "SELECT medicine.*,dissease.diss_name FROM `medicine` JOIN dissease ON dissease.Id=medicine.diss_id_fk ";
$run1 = mysqli_query($con, $query1);
$query = "SELECT dissease.*,doctor.doc_name  FROM `dissease` JOIN doctor on doctor.Id=dissease.doc_id_FK ";
$run = mysqli_query($con, $query);
?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Detail</span>
          <h1 class="text-capitalize mb-5 text-lg">Dissease</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Our blog</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section blog-wrap">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
		<?php while ($data=mysqli_fetch_assoc($run)){?>
	<div class="col-lg-12 col-md-12 mb-5">
		<div class="blog-item">
			<div class="blog-thumb">
				
			<img src="../admin/<?php  echo $data['diss_img'] ?>" alt="" class="img-fluid ">
			</div>

			<div class="blog-item-content">

				<div class="blog-item-meta mb-3 mt-4">
					
					 <p><b>Added by</b> <?php echo $data ['doc_name']?></p>
           <span class="text-black text-capitalize"><i class="icofont-calendar"></i> <?php echo $data ['since']?></span>
				</div> 

				<h2 class=""><a href=""> <?php echo $data ['diss_name']?></a></h2>

				<p class=""><?php echo $data ['prevention']?></p>
       

				<a href="dissease_single.php?id=<?php echo $data['Id']?>"  class="btn btn-main btn-icon btn-round-full">Read More <i class="icofont-simple-right ml-2  "></i></a>
			</div>
			
		</div>
		
	</div>
	<?php }?>
	


	

	
</div>
      </div>
     
  </div>
</section>

<?php include('footer.php')?>