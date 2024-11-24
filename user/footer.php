<!-- footer Start -->
<footer class="footer section gray-bg">
<?php  
include('../admin/connect.php');
$query = "SELECT * FROM `information`order by id desc limit 1";
$run22 = mysqli_query($con, $query);
$q="SELECT * FROM `category`order by id desc limit 3";
$run=mysqli_query($con,$q);
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mr-auto col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<div class="logo mb-4">
						<img src="images/logoe.png" alt="" class="img-fluid">
					</div>
					<p>We seek a world of hope, inclusion and social justice, where
poverty has been overcome and all people live in dignity and security.</p>

					<ul class="list-inline footer-socials mt-4">
						<li class="list-inline-item">
							<a href="https://www.facebook.com/"><i class="icofont-facebook"></i></a>
						</li>
						<li class="list-inline-item">
							<a href="https://twitter.com/"><i class="icofont-twitter"></i></a>
						</li>
						<li class="list-inline-item">
							<a href="https://www.instagram.com/"><i class="icofont-instagram"></i></a>
						</li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Department</h4>
					<div class="divider mb-4"></div>
					<?php while($data=mysqli_fetch_assoc($run)) { ?>
					<ul class="list-unstyled footer-menu lh-35">
					
							<li><?php echo $data['cat_name'] ?></li>
					</ul>
					<?php } ?>
					<a href="department.php" class="widget">View More </a>
					<div class="divider mb-4"></div>
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Pages</h4>
					<div class="divider mb-4"></div>
					
					<ul class="list-unstyled footer-menu lh-35">
					<li> <a href="doctor.php"> Doctor</a>   </li>
							<li> <a href="login.php"> log in</a>   </li>
				      	    <li> <a href="contact.php"> Contact us</a></li>
							<li> <a href="about.php"> About Us</a></li>
							

					</ul>
					
				</div>
			</div>
			<?php while ($data=mysqli_fetch_assoc($run22)){?>
			<div class="col-lg-3 col-md-6 col-sm-6">
				
				<div class="widget widget-contact mb-5 mb-lg-0">
				
					<h4 class="text-capitalize mb-3">Get in Touch</h4>
					<div class="divider mb-4"></div>

					<div class="footer-contact-block mb-4">
						<div class="icon d-flex align-items-center">
							<i class="icofont-email mr-3"></i>
							<span class="h6 mb-0">Support Available for 24/7</span>
						</div>
						<h4 class="mt-2"><a href="mailto:support@email.com"> <?php echo $data ['email']?></a></h4>
					</div>

					<div class="footer-contact-block">
						<div class="icon d-flex align-items-center">
							<i class="icofont-support mr-3"></i>
							<span class="h6 mb-0">Mon to Fri :  <?php echo $data ['time']?> - 18:00</span>
						</div>
						<h4 class="mt-2"><a href="tel:+23-345-67890"> <?php echo $data ['phone']?></a></h4>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>

		<div class="footer-btm py-4 mt-5">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-6">
					<div class="copyright">
						Copyright &copy; 2023, Designed &amp; Developed by <a href="">Team Work</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="subscribe-form text-lg-right mt-5 mt-lg-0">
						
						
							<button  class="btn btn-main-2 btn-round-full"><a href="rate.php">Feedback</a></button>
					
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4">
					<a class="backtop scroll-top-to" href="#top">
						<i class="icofont-long-arrow-up"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>

   


  


    
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
  <script src="dist/starrr.js"></script>
  <script>
    $('#star1').starrr({
      change: function(e, value){
        if (value) {
          $('.your-choice-was').show();
          $('.choice').text(value);
        } else {
          $('.your-choice-was').hide();
        }
      }
    });

    var $s2input = $('#star2_input');
    $('#star2').starrr({
      max: 10,
      rating: $s2input.val(),
      change: function(e, value){
        $s2input.val(value).trigger('input');
      }
    });
  </script>
  <script type="text/javascript">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-39205841-5', 'dobtco.github.io');
    ga('send', 'pageview');
  </script>
    <!-- 
    Essential Scripts
    =====================================-->
    <script src="plugins/jquery/jquery.js"></script>
    <script src="plugins/bootstrap/bootstrap.min.js"></script>
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <script src="plugins/shuffle/shuffle.min.js"></script>

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA"></script>
    <script src="plugins/google-map/gmap.js"></script>
    
    <script src="js/script.js"></script>


  </body>
  </html>
