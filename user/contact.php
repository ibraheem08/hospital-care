<?php  include('header.php') ;
include('../admin/connect.php');
$query = "SELECT * FROM `information`order by id desc limit 1";
$run = mysqli_query($con, $query);

?>

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Contact Us</span>
          <h1 class="text-capitalize mb-5 text-lg">Get in Touch</h1>

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

<section class="section contact-info pb-0">

  <div class="container">
  <?php while ($data=mysqli_fetch_assoc($run)){?>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="contact-block mb-4 mb-lg-0">
          <i class="icofont-live-support"></i>
          <h5>Call Us</h5>
          <?php echo $data ['phone']?>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="contact-block mb-4 mb-lg-0">
          <i class="icofont-support-faq"></i>
          <h5>Email Us</h5>
          <?php echo $data ['email']?>
        </div>
      </div>
      <div class="col-lg-4 col-md-12">
        <div class="contact-block mb-4 mb-lg-0">
          <i class="icofont-location-pin"></i>
          <h5>Location</h5>
          <?php echo $data ['locations']?>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</section>

<section class="contact-form-wrap section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="section-title text-center">
          <h2 class="text-md mb-2">Contact us</h2>
          <div class="divider mx-auto my-4"></div>
          <p class="mb-5">Lets Have A Talk</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <form id="contact-form" class="contact__form " method="post" action="">
          <!-- form message -->
          <div class="row">
            <div class="col-12">
              <div class="alert alert-success contact__msg" style="display: none" role="alert">
                Your message was sent successfully.
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <input name="user_name"  id="name" type="text" class="form-control" placeholder="Your Full Name" required pattern="[A-Za-z]{3,15}">
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <input name="email" id="email" type="email" class="form-control" placeholder="Your Email Address" required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <input name="topic" id="subject" type="text" class="form-control" placeholder="Your  Topic" required>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <input name="number" id="phone" type="text" class="form-control" placeholder="Your Phone Number in this 0300-0000000 pattern" required pattern="[0-9]{4}-[0-9]{7}">
              </div>
            </div>
          </div>

          <div class="form-group-2 mb-4">
            <textarea name="message" id="message" class="form-control" rows="8" placeholder="Write something.." required></textarea>
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
    $e = $_POST['email'];
    $t = $_POST['topic'];
    $n = $_POST['number'];
    $m = $_POST['message'];
  $query="INSERT INTO `contact`(`user_name`, `email`, `topic`, `number`, `message`) VALUES ('$u','$e','$t','$n','$m')";
  $run=mysqli_query($con, $query);
  if($run==true){
    echo "<script>alert('message send')</script>";
  }
  else{
    echo mysqli_error($con);
  }
  }




?>