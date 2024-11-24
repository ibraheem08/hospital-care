<?php
include('header.php');
include('../admin/connect.php');
$id=$_GET['id'];
$q = "SELECT * FROM `dissease` WHERE dissease.Id= $id ";
$run=mysqli_query($con,$q);
$data=mysqli_fetch_assoc($run);
$q2="SELECT * FROM `coment` " ;
$run2=mysqli_query($con,$q2);
$Q="select count(*) as total_messages from coment";
$run3=mysqli_query($con,$Q);
$data5=mysqli_fetch_assoc($run3);
$q3 = "SELECT dissease.diss_name, medicine.* FROM `medicine`JOIN dissease on dissease.Id=medicine.diss_id_fk WHERE medicine.diss_id_fk= $id ";
$run8=mysqli_query($con,$q3);
$data8=mysqli_fetch_assoc($run8);
?>
<section class="page-title bg-1">
	
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Dissease</span>
          <h1 class="text-capitalize mb-5 text-lg"><?php echo $data['diss_name']?></h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">News details</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section blog-wrap">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
	<div class="col-lg-12 mb-5">
		<div class="single-blog-item">
			<img src="../admin/<?php  echo $data['diss_img'] ?>" alt="" class="img-fluid">

			<div class="blog-item-content mt-5">
				<div class="blog-item-meta mb-3">
				
					<span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-2"></i> <?php echo $data ['since']?></span>
				</div>

				<h2 class="mb-4 text-md"><a><?php echo $data['diss_name']?></a></h2>

				<p class="lead mb-4"><i>prevention:-</i> <?php echo $data ['prevention']?></p>

				

				<blockquote class="quote">
				<i>Care:</i> 
				<?php echo $data['care']?>
				</blockquote>


				


			
			</div>
		</div>
	</div>

	<div class="col-lg-12">
		<div class="comment-area mt-4 mb-5">
			<h4 class="mb-4"><?php echo $data5['total_messages']; ?> Comments </h4>
			<ul class="comment-tree list-unstyled">
			<?php while($data=mysqli_fetch_assoc($run2)) { ?>
				<li class="mb-5">
					<div class="comment-area-box d-block d-sm-flex">
						<div class="comment-thumb">
							<img alt="" src="" style="width: 70px">
						</div>

						<div class="block">
							<div class="comment-info">
								<h5 class="mb-1"><?php echo $data['name']  ?></h5>
								<span><?php echo $data['email']  ?></span>
							</div>
							

							<div class="comment-content mt-3">
								<p><?php echo $data['comnt']  ?> </p>
							</div>
						</div>
					</div>
				</li>
<?php } ?>
				
			</ul>
		</div>
	</div>


	<div class="col-lg-12">
		<form class="comment-form my-5" id="comment-form" method="post" >
			<h4 class="mb-4">Write a comment</h4>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control" type="text" name="name" id="name" placeholder="Name:">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control" type="text" name="email" id="mail" placeholder="Email:">
					</div>
				</div>
			</div>


			<textarea class="form-control mb-4" name="comnt" id="comment" cols="30" rows="5"
				placeholder="Comment"></textarea>

			<input class="btn btn-main-2 btn-round-full" type="submit" name="submit" id="submit_contact"
				value="Submit Message">
		</form>
	</div>
</div>
      </div>
  
	  <div class="col-lg-4">
        <div class="sidebar-wrap pl-lg-4 mt-5 mt-lg-0">
	


	

	<div class="sidebar-widget category mb-3">
		<h5 class="mb-4">Medicine</h5>

		<ul class="list-unstyled">
		  <li class="align-items-center">
		    <a ><?php echo $data8['diss_name']?></a>
		    <span>: <?php echo $data8['medi_name']?></span>
		  </li>
		 
		</ul>
	</div>

</div>
      </div>
    </div>
  </div>
</section>
<?php
include('footer.php');
if(isset($_POST['submit'])){
    $u = $_POST['name'];
    $e = $_POST['email'];
    $m = $_POST['comnt'];
  $query="INSERT INTO `coment`( `name`, `email`, `comnt`) VALUES ('$u','$e','$m')";
  $run=mysqli_query($con, $query);
  if($run==true){
    echo "<script>alert('message send');window.location.href='dissease_single.php'</script>";
  }
  else{
    echo mysqli_error($con);
  }
  }

 
?>