
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>-  Care &amp; Medical </title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Health Care Medical Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Novena HTML Template v1.0">
  
  <!-- theme meta -->
  <meta name="theme-name" content="novena" />

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- 
  Essential stylesheets
  =====================================-->
  <link rel="icon" type="image/png" sizes="16x16" href="images/logoe.png">
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body id="top">
<?php 
session_start();
function PageName() {
  return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
$current_page = PageName(); 
include('../admin/connect.php');
$q1="SELECT * FROM `category` " ;
$run1=mysqli_query($con,$q1);
$q2="SELECT * FROM `cities` " ;
$run3=mysqli_query($con,$q2);
$query = "SELECT * FROM `information`order by id desc limit 1";
$run2 = mysqli_query($con, $query);

?>
<header>
	<div class="header-top-bar">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-lg-6">
				<?php while($data=mysqli_fetch_assoc($run2)) { ?>
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="contact.php"><i class="icofont-support-faq mr-2"></i> <?php echo $data ['email']?></a></li>
						<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i> <?php echo $data ['locations']?></li>
					</ul>
					<?php } ?>
				</div>
				<div class="col-lg-6">
				<?php if(isset($_SESSION['FRONT'])) {?> 
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
					
						<a href="patient.php">
							<span><i class="fa fa-user"></i><?php echo strtoupper($_SESSION['FRONT'])?></span> &nbsp;
						</a>
						
						<a href="logout.php">
						<span ><i class="fa fa-sign-out"></i>Logout</span>
                        </a>
						<?PHP } else {?>
							<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="login.php">
							<span><i class="fa fa-lock"></i>Log in</span> &nbsp;
						</a>
						<a href="register.php">
						<span ><i class="fa fa-plus"></i>Register</span>
                        </a>
						<?php } ?>	 
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php">
				<img src="images/logoe.png" alt="" class="img-fluid">
			</a>

			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
				aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icofont-navigation-menu"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarmain">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item <?php echo $current_page == 'index.php' ? 'active' :NULL ?>"><a class="nav-link" href="index.php">Home</a></li>
					<li class="nav-item <?php echo $current_page == 'appoinment.php' ? 'active' :NULL ?>"><a class="nav-link" href="appoinment.php">appoinment</a></li>
					<li class="nav-item <?php echo $current_page == 'dissease.php' ? 'active' :NULL ?>"><a class="nav-link" href="dissease.php">Disease</a></li>

					<li class="nav-item <?php echo $current_page == 'doctor.php' ? 'active' :NULL ?>"><a class="nav-link" href="doctor.php">Doctors</a></li>
					<li class="nav-item dropdown">
						<a class="nav-link <?php echo $current_page == 'department.php' ? 'active' :NULL ?> dropdown-toggle" href="department.php" id="dropdown02" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Department <i class="icofont-thin-down"></i></a>
						<ul class="dropdown-menu" aria-labelledby="dropdown02">
						<?php while($data=mysqli_fetch_assoc($run1)) { ?>
							<li><a class="dropdown-item " href="doctor.php?cat_id=<?php echo $data ['Id']?>"><?php echo $data['cat_name'];?></a></li>
							<?php } ?>
						</ul>
					</li>
					<li class="nav-item  <?php echo $current_page == 'service.php' ? 'active' :NULL ?>"><a class="nav-link" href="service.php">Service</a></li>
					<li class="nav-item dropdown">
						<a class="nav-link <?php echo $current_page == 'department.php' ? 'active' :NULL ?> dropdown-toggle" href="department.php" id="dropdown02" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">city <i class="icofont-thin-down"></i></a>
						<ul class="dropdown-menu" aria-labelledby="dropdown02">
						<?php while($data=mysqli_fetch_assoc($run3)) { ?>
							<li><a class="dropdown-item " href="doctor.php?cit_id=<?php echo $data ['Id']?>"><?php echo $data['city_name'];?></a></li>
							<?php } ?>
						</ul>
					</li>
					<li class="nav-item <?php echo $current_page == 'about.php' ? 'active' :NULL ?>"><a class="nav-link" href="about.php">About Us</a></li>
					<li class="nav-item <?php echo $current_page == 'contact.php' ? 'active' :NULL ?>"><a class="nav-link" href="contact.php">Contact Us</a></li>
					
				</ul>
                
              <div>
               
              </div>                   
			</div>
		</div>
	</nav>
</header>


