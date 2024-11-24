<?php
session_start();
if(!(isset($_SESSION['ADMIN']) || isset($_SESSION['doc']))){
    header('location:login.php');
  }
  ?>


<?php
include('connect.php');
$query = "SELECT users.*,role.role_name FROM `users` join role on users.role_id_FK=role.Id where role_id_FK= '11'";
$run = mysqli_query($con, $query);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Care - . Let's Get Better Together.”</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/logo1.png">
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="./vendor/chartist/css/chartist.min.css">
    <link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="./vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/starrr.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.php" class="brand-logo">
                <img class="logo-abbr" src="./images/" alt="">
                <img class="logo-compact" src="./images/" alt="">
                <img class="brand-title"  src="./images/logo1.png" alt="">
           
               
                
            </a>
            

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"><br></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		<div class="chatbox">
			<div class="chatbox-close"></div>
			<div class="custom-tab-1">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#notes">Notes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#alerts">Alerts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#chat">Chat</a>
					</li>
				</ul>
				
			</div>
		</div>
		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
								
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							
							
							
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
									<!-- <div class="header-info">
										<span class="text-black">Hello,<strong>Franklin</strong></span>
										<p class="fs-12 mb-0">Super Admin</p>
									</div> -->
                                    <img src="images/profile/avatar.png" width="20" alt=""/>
                                </a>
                                <?php while ($data=mysqli_fetch_assoc($run)){?>
                                <div class="dropdown-menu dropdown-menu-right">
                                       
                                        <?php if(isset($_SESSION['ADMIN'])){ ?>
                                            <UL>
                                         <li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i><a href="adminpass.php"><span class="ml-2"><?php echo $_SESSION['ADMIN']?></span></a></li>
                                         <li class="dropdown-item"><a href="logout.php"><i class="fa fa-sign-out text-primary mr-2"></i>Log out</a></li>
                                        </UL>
                                        
                                        <?php } else { ?>
                                            <UL>
                                            <li class="dropdown-item"><i class="fa fa-user-md text-primary mr-2"></i><span class="ml-2"><?php echo $_SESSION['doc']?></span></li>
                                            <li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> <a href="profile_doc.php">View profile</a></li>
                                            <li class="dropdown-item"><a href="logout.php"><i class="fa fa-sign-out text-primary mr-2"></i>Log out</a></li>
                                            </UL>
                                            

                                        <?php }?>
                                    </a>
                                    
                                    
                                    
                                    <?php } ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->

                <!-- for Admin-->
<?php if(isset($_SESSION['ADMIN'])){ ?>
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a href="index.php" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text"> Dashboard</span>
						</a>
                        
                    </li>
                    
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
							<span class="nav-text"> Roles and Users</span>
						</a>
                        <ul aria-expanded="false">
						<li><a class="fa fa-user-plus" aria-hidden="true" href="role_form.php"> Add Role</a></li>
                            <li><a class="fa fa-user"  aria-hidden="true" href="role_show.php"> Show Roles</a></li>
                            <li><a  class="fa fa-users" aria-hidden="true" href="user_form.php"> Add Users</a></li>
                            <li><a class="fa fa-user"  aria-hidden="true" href="admin_show_u.php"> Show Admin</a></li>
                            <li><a class="fa fa-users"  aria-hidden="true" href="user_show_u.php"> Show User</a></li>
                            <li><a  class="fa fa-user-md" aria-hidden="true" href="doctor_show_u.php"> show Doctor</a></li>
                            <li><a class="fa fa-eye" aria-hidden="true" href="doctor_show.php"> show Doctor Details</a></li>
                            
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i  class="fa fa-globe" aria-hidden="true"></i></i>
							<span class="nav-text"> Cities</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="fa fa-map-marker" aria-hidden="true" href="cities_form.php"> Add city</a></li>
                            <li><a class="fa fa-map" aria-hidden="true"  href="cities_show.php"> show city</a></li>
                          
                        </ul>
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-user-md" aria-hidden="true"></i>
							<span class="nav-text"> Department</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a  class="fa fa-hospital-o" aria-hidden="true" href="category_form.php"> Add Department</a></li>
                            <li><a class="fa fa-building-o" aria-hidden="true" href="category_show.php"> show Department</a></li>
                            
                           
                        </ul>
                    </li>
                    

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-users" aria-hidden="true"></i>
							<span class="nav-text"> Appointments</span>
						</a>
                        <ul aria-expanded="false">
                          
                            <li><a  class="fa fa-address-card" aria-hidden="true" href="appointment_show.php"> All Appoinments</a></li>
                            <li><a  class="fa fa-address-card" aria-hidden="true" href="patient_show.php"> patients</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-comments" aria-hidden="true"></i>
							<span class="nav-text"> Message and testimonials</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="fa fa-commenting" aria-hidden="true" href="contact_show.php"> Messages</a></li>
                            <li><a  class="fa fa-comment" aria-hidden="true" href="feedback_show.php"> testimonials</a></li>
                            
                            
                        </ul>
                    </li>

                    
                    
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
							<span class="nav-text">Information</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="fa fa-plus-square" aria-hidden="true" href="information_form.php"> add Information</a></li>
                            <li><a class="fa fa-eye" aria-hidden="true" href="information_show.php"> show information</a></li>
                            
                            
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-info" aria-hidden="true"></i>
							<span class="nav-text">Services and Bio</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="fa fa-plus-square" aria-hidden="true" href="service_form.php"> Add service</a></li>
                            <li><a class="fa fa-info" aria-hidden="true" href="service_show.php"> Service Show</a></li>
                            
                            
                            
                        </ul>
                    </li>
                </ul>
				
				<div class="copyright">
					<p><strong>care Admin</strong> © 2023 All Rights Reserved</p>
					<p>Made with ♥ by Team Work</p>
				</div>
			</div>
        </div>
        
		<?php } else { ?>		



        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a href="index.php" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text"> Dashboard</span>
						</a>
                        
                    </li>
                    
                    
                    

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-user-md" aria-hidden="true"></i>
							<span class="nav-text"> depts and cities</span>
						</a>
                        <ul aria-expanded="false">
                           
                            <li><a class="fa fa-building-o" aria-hidden="true" href="category_show.php"> show Department</a></li>
                          
                         
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-user-md" aria-hidden="true"></i>
							<span class="nav-text"> doctor</span>
						</a>
                       
                        <ul aria-expanded="false">
                        
                        <li><a class="fa fa-eye" aria-hidden="true" href="doctor_update.php">  Doctor detailed</a></li>
                        </ul>
                        
                    </li>
                    

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-users" aria-hidden="true"></i>
							<span class="nav-text"> Appointments & Patients</span>
						</a>
                        <ul aria-expanded="false">
                          
                            <li><a  class="fa fa-address-card" aria-hidden="true" href="appointment_show.php"> All Appoinments</a></li>
                            
                        </ul>
                    </li>
                    

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-medkit" aria-hidden="true"></i>
							<span class="nav-text"> Disseas and medicnes</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="fa fa-plus-square" aria-hidden="true" href="dissease_form.php"> Add dissease</a></li>
                            <li><a  class="fa fa-eye" aria-hidden="true" href="dissease_show.php"> show dissease</a></li>
                            <li><a class="fa fa-plus-square" aria-hidden="true" href="medicine_form.php"> Add medicnes</a></li>
                            <li><a  class="fa fa-eye" aria-hidden="true" href="medicine_show.php"> show medicnes</a></li>
                            
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
							<span class="nav-text">doctor acchievment</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="fa fa-plus-square" aria-hidden="true" href="doctoracc_form.php"> add achievment</a></li>
                            <li><a class="fa fa-eye" aria-hidden="true" href="doctoracc_show.php"> show achievment</a></li>
                            
                            
                        </ul>
                    </li>
                   
                   
                </ul>
				
				<div class="copyright">
					<p><strong>care Admin</strong> © 2023 All Rights Reserved</p>
					<p>Made with ♥ by Team Work</p>
				</div>
			</div>
        </div>
					
		<?php } ?>
        <!--**********************************
            Sidebar end
        ***********************************-->
		