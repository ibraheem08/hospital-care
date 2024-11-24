<?php include('header.php');
include('../admin/connect.php');
$query1 = "SELECT medicine.*,dissease.diss_name FROM `medicine` JOIN dissease ON dissease.Id=medicine.diss_id_fk ";
$run1 = mysqli_query($con, $query1);
$query = "SELECT * FROM `dissease` ";
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
            <li class="list-inline-item"><a href="#" class="text-white-50">Department Details</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section department-single">
<?php while ($data=mysqli_fetch_assoc($run)){?>
	<div class="container">		
		<div class="row">
			<div class="col-lg-12">
				<div class="department-img">
					<img src="../admin/<?php  echo $data['diss_img'] ?>" alt="" class="img-fluid">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-8">
				<div class="department-content mt-5">
					<h3 class="text-md">Medecine and Health</h3>
					<div class="divider my-4"></div>
					<p class="lead">Age forming covered you entered the examine. Blessing scarcely confined her contempt wondered shy. Dashwoods contented sportsmen at up no convinced cordially affection.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum recusandae dolor autem laudantium, quaerat vel dignissimos. Magnam sint suscipit omnis eaque unde eos aliquam distinctio, quisquam iste, itaque possimus . Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet alias modi eaque, ratione recusandae cupiditate dolorum repellendus iure eius rerum hic minus ipsa at, corporis nesciunt tempore vero voluptas. Tempore.</p>


					<h3 class="mt-5 mb-4">Services features</h3>
					<div class="divider my-4"></div>
					<ul class="list-unstyled department-service">
						<li><i class="icofont-check mr-2"></i>International Drug Database</li>
						<li><i class="icofont-check mr-2"></i>Stretchers and Stretcher Accessories</li>
						<li><i class="icofont-check mr-2"></i>Cushions and Mattresses</li>
						<li><i class="icofont-check mr-2"></i>Cholesterol and lipid tests</li>
						<li><i class="icofont-check mr-2"></i>Critical Care Medicine Specialists</li>
						<li><i class="icofont-check mr-2"></i>Emergency Assistance</li>
					</ul>

					<a href="appoinment.html" class="btn btn-main-2 btn-round-full">Make an Appoinment<i class="icofont-simple-right ml-2  "></i></a>
				</div>
			</div>

			
		</div>
	</div>
	<?php }?>
</section>

