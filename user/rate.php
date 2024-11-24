<!DOCTYPE html>
<?php  include('header.php') ;
include('../admin/connect.php');


?>

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Please let us know your experience with our website</span>
          <h1 class="text-capitalize mb-5 text-lg">Feedback</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Contact Us</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- contact form start -->



<section class="contact-form-wrap section">
  <div class="container">
    
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <form id="contact-form" class="contact__form " method="post" action="">
          <!-- form message -->
          <div class="row">
            <div class="col-12">
              <div class="alert alert-success contact__msg" style="display: none" role="alert">
              Thanks For Your Rating!!!
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <input name="user_name" id="name" type="text" class="form-control" placeholder="Your Full Name" required pattern="[A-Za-z]{3,15}" >
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <input name="topic" id="email" type="text" class="form-control" placeholder="Enter topic " required>
              </div>
            </div>
            
            
          </div>

          <div class="form-group-2 mb-4">
            <textarea name="message" id="message" class="form-control" rows="8" placeholder="Your Message" required></textarea>
          </div>

          <div>
            <input class="btn btn-main btn-round-full" name="sub" type="submit" ></input>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php include('footer.php');
  
  if(isset($_POST['sub'])){
    $u = $_POST['user_name'];
    $e = $_POST['topic'];
    $m = $_POST['message'];
  $query="INSERT INTO `rate`(`user_name`, `topic`,`message`) VALUES ('$u','$e','$m')";
  $run=mysqli_query($con, $query);
  if($run==true){
    echo "<script>alert('Thanks For Your Rating!!!')</script>";
  }
  else{
    echo mysqli_error($con);
  }
  }




?>