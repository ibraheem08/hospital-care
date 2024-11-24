<?php
 include('header.php'); 
if(!isset($_SESSION['FRONT'])){
echo "<script>window.location.href='login.php'</script>";
}

 
  include('../admin/connect.php');
  @$id=$_GET['id'];






?>

<section class="page-title bg-1">

  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Book your Seat</span>
          <h1 class="text-capitalize mb-5 text-lg">Appoinment</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Book your Seat</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>

<section class="appoinment section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
          <div class="mt-3">
            <div class="feature-icon mb-3">
              <i class="icofont-support text-lg"></i>
            </div>
             <span class="h3">Call for an Emergency Service!</span>
              <h2 class="text-color mt-3">+84 789 1256 </h2>
          </div>
      </div>

      <div class="col-lg-8">
           <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
            <h2 class="mb-2 title-color">Book an appoinment</h2>
            <p class="mb-4">The actual motion adopted by the Senate when exercising the power is "to advise and consent", which shows how initial advice on nominations and treaties is not a formal power exercised by the Senate.</p>
               <form id="#" class="appoinment-form" method="post" action="">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">

<?php 
if($id!=null){
  $q="SELECT * FROM `doctor` WHERE doctor.Id='$id'"; 
$run = mysqli_query($con, $q);
$data=mysqli_fetch_assoc($run);
?>
                           <input type="hidden" name="doc_id" class="form-control" value="<?php echo $data['Id'] ?>">
                             <input type="text" class="form-control" disabled value="<?php echo $data['doc_name'] ?>">
<?php }
else{
$q="SELECT * FROM `doctor`";
$run = mysqli_query($con, $q); ?>
                                <select class="form-control" id="exampleFormControlSelect2" name="doc_id" required>
                                 
                                  <?php  while ($data=mysqli_fetch_assoc($run)){?>
                                                    <option value="<?php echo $data['Id'] ?>"> <?php echo $data['doc_name'] ?> </option>
                                                    <?php } ?>
                                </select>
<?php } ?>

                                
                            </div>
                        </div>

                         <div class="col-lg-6">
                            <div class="form-group" for="start">
                                <input type="date" name="date" class="form-control" id="start" id="datePickfggerId" min="<?= date('Y-m-d'); ?>">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="time" id="time" type="time" class="form-control" placeholder="Time" required>
                            </div>
                        </div>
                        
                    <div class="col-lg-12">
					<div class="form-group">
                        <textarea name="status" id="message" class="form-control" rows="6" placeholder="Your Message" required></textarea>
                    </div>
								  </div>
					<div class="col-lg-12">
                            <div class="form-group">
                    <input type="submit" class="btn btn-main btn-round-full"  name="sub"> <i class=""></i>
					</div>
					</div>
				</form>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php

if(isset($_POST['sub'])){
  $u = $_POST['doc_id'];
  $p = $_SESSION['FRONT_ID'];
  $o = $_POST['date'];
  $r = $_POST['time'];
  $s = $_POST['status'];
$query="INSERT INTO `appoinment`(`doc_id_FK`, `user_id_FK`, `date`, `time`, `Message`,`status`) VALUES ('$u','$p','$o','$r','$s','pending')";
$run=mysqli_query($con, $query);
if($run==true){
  echo "<script>location.href='confirmation.php'</script>";
}
else{
  echo mysqli_error($con);
}
}
include('footer.php');
?>
    
                   
