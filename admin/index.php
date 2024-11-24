<?php include("header.php");
include('connect.php');
$Q="select count(*) as total_patient from patient";
$run=mysqli_query($con,$Q);
$data=mysqli_fetch_assoc($run);
$Q1="select count(*) as total_doctor from doctor";
$run1=mysqli_query($con,$Q1);
$data1=mysqli_fetch_assoc($run1);
$Q2="select count(*) as total_appointment from appoinment";
$run2=mysqli_query($con,$Q2);
$data2=mysqli_fetch_assoc($run2);
$Q3="select count(*) as total_city from category";
$run7=mysqli_query($con,$Q3);
$data8=mysqli_fetch_assoc($run7);

$query = "SELECT users.user_name,cities.city_name,category.cat_name,doctor.* FROM `doctor` join cities on cities.Id=doctor.city_id_FK
join category on category.Id=doctor.cat_id_FK join users on users.Id=doctor.user_id_FK order by id desc limit 4";
$run3= mysqli_query($con, $query);

$q3="SELECT users.user_name , doctor.doc_img, doctor.doc_name, appoinment.* FROM `appoinment` JOIN users on users.Id=appoinment.user_id_FK join doctor on doctor.Id=appoinment.doc_id_FK "; 
$run13 = mysqli_query($con, $q3);

$i=$_SESSION['ID'];
$q_for_doc_id="select doctor.Id from doctor join users on users.Id=doctor.user_id_FK where users.Id='$i'";
$run_for_doc_id=mysqli_query($con,$q_for_doc_id);
$data_of_doc_id=mysqli_fetch_assoc($run_for_doc_id);
$doc_id=$data_of_doc_id['Id'];

$today=date("y-m-d");
if(isset($_SESSION['ADMIN'])){
  $query1 = "SELECT doctor.doc_name , users.user_name , appoinment.* FROM `appoinment` JOIN doctor on doctor.Id=appoinment.doc_id_FK JOIN users on users.Id=appoinment.user_id_FK  where appoinment.date='$today' ";
}
else{
  $query1 = "SELECT doctor.doc_name , users.user_name , appoinment.* FROM `appoinment` JOIN doctor on doctor.Id=appoinment.doc_id_FK JOIN users on users.Id=appoinment.user_id_FK  where doctor.Id='$doc_id' and appoinment.date='$today'";

}
$run4 = mysqli_query($con, $query1);
if(isset($_SESSION['ADMIN'])){
$Q8="select count(*) as total_appointment1 from appoinment where appoinment.date='$today'";
}
else{
	$Q8="select count(*) as total_appointment1 from appoinment where appoinment.date='$today' and appoinment.doc_id_FK='$doc_id'";
}
$run45=mysqli_query($con,$Q8);
$data22=mysqli_fetch_assoc($run45);

?>
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="form-head d-flex align-items-center mb-sm-4 mb-3">
					<div class="mr-auto">
						<?php if(isset($_SESSION['ADMIN'])){ ?>
						<h2 class="text-black font-w600"> ADMIN </h2>	
						<p class="mb-0">    WELCOME          <?php echo $_SESSION['ADMIN']?></p>
						<?php } else { ?>
							<h2 class="text-black font-w600"> Doctor </h2>	
							<p class="mb-0">    WELCOME          <?php echo $_SESSION['doc']?></p>
							<?php } ?>
					</div>
					
				</div>
				<div class="row">
					<div class="col-xl-3 col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="media align-items-center">
									<div class="media-body mr-3">
										<h4 class="fs-34 text-black font-w600"><?php echo $data2['total_appointment']; ?></h4>
										<span><a >Appointment</a></span>
									</div>
									<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0)">
										<path d="M32.04 4.08H31.24V2.04C31.24 0.8 30.4 0 29.2 0C28 0 27.16 0.8 27.16 2.04V4.08H13.88V2.04C13.88 0.8 13.08 0 11.84 0C10.6 0 9.80002 0.8 9.80002 2.04V4.08H7.96002C4.08002 4.08 0.800018 7.36 0.800018 11.24V32.88C0.800018 36.76 4.08002 40.04 7.96002 40.04H32.04C35.92 40.04 39.2 36.76 39.2 32.88V11.24C39.2 7.36 35.92 4.08 32.04 4.08ZM7.96002 8.16H32.04C33.68 8.16 35.12 9.6 35.12 11.24V14.08H4.88002V11.24C4.88002 9.6 6.32002 8.16 7.96002 8.16ZM32.04 35.92H7.96002C6.32002 35.92 4.88002 34.48 4.88002 32.84V18.16H35.08V32.84C35.12 34.48 33.68 35.92 32.04 35.92Z" fill="#007A64"/>
										<path d="M16.12 20.6H14.48C13.44 20.6 12.84 21.4 12.84 22.24V24.08C12.84 25.12 13.64 25.72 14.48 25.72H16.12C17.16 25.72 17.76 24.92 17.76 24.08V22.44C17.96 21.44 17.16 20.6 16.12 20.6Z" fill="#007A64"/>
										<path d="M25.52 20.6H23.88C22.84 20.6 22.24 21.4 22.24 22.24V24.08C22.24 25.12 23.04 25.72 23.88 25.72H25.52C26.56 25.72 27.16 24.92 27.16 24.08V22.44C27.16 21.44 26.32 20.6 25.52 20.6Z" fill="#007A64"/>
										<path d="M16.12 28.56H14.48C13.44 28.56 12.84 29.36 12.84 30.2V31.84C12.84 32.88 13.64 33.48 14.48 33.48H16.12C17.16 33.48 17.76 32.68 17.76 31.84V30.2C17.96 29.4 17.16 28.56 16.12 28.56Z" fill="#007A64"/>
										</g>
										<defs>
										<clipPath id="clip0">
										<rect width="40" height="40" fill="white"/>
										</clipPath>
										</defs>
									</svg>
								</div>
							</div>
							<div class="progress  rounded-0" style="height:4px;">
								<div>
									<span ></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3  col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="media align-items-center">
									<div class="media-body mr-3">
										<h2 class="fs-34 text-black font-w600"><?php echo $data['total_patient']; ?></h2>
										<span>Total Patient</span>
									</div>
									<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M28.0053 2.00495C25.0652 1.92104 22.2028 2.90688 20.0059 4.76001C17.8089 2.90688 14.9465 1.92104 12.0064 2.00495C10.2879 1.99938 8.58941 2.3549 7.03328 3.04589C5.47716 3.73689 4.10208 4.74618 3.00704 6.00112C1.10117 8.19152 -0.89469 12.1574 0.427219 18.6225C2.53907 28.9417 18.358 37.4115 19.0259 37.7601C19.3237 37.9174 19.659 38 19.9999 38C20.3408 38 20.676 37.9174 20.9738 37.7601C21.6478 37.4058 37.4667 28.936 39.5725 18.6225C40.8944 12.1574 38.9006 8.201 36.9947 6.00112C35.9009 4.74722 34.5275 3.73852 32.9732 3.04756C31.4188 2.35659 29.7222 2.00052 28.0053 2.00495ZM35.6608 17.9006C34.1709 25.1899 23.3456 31.9715 20.0099 33.908C16.6741 31.9715 5.84885 25.1918 4.35895 17.9006C3.33302 12.8869 4.73692 9.97454 6.09683 8.41322C6.81663 7.59033 7.71988 6.92874 8.74167 6.47597C9.76346 6.0232 10.8784 5.79049 12.0064 5.79458C13.2101 5.70905 14.4167 5.9205 15.5084 6.40832C16.6002 6.89614 17.5399 7.64369 18.236 8.57806C18.4065 8.87653 18.6585 9.12614 18.9656 9.3008C19.2727 9.47546 19.6237 9.56876 19.9819 9.57095H20.0059C20.3619 9.56861 20.7109 9.47734 21.0178 9.30634C21.3247 9.13534 21.5786 8.89067 21.7537 8.59701C22.4489 7.65541 23.391 6.90174 24.4873 6.4103C25.5836 5.91887 26.7961 5.70665 28.0053 5.79458C29.1347 5.78937 30.2512 6.02153 31.2744 6.47434C32.2977 6.92716 33.2022 7.58934 33.9229 8.41322C35.2788 9.97454 36.6827 12.8869 35.6568 17.9006H35.6608Z" fill="#007A64"/>
									</svg>
								</div>
							</div>
							<div class="progress  rounded-0" style="height:4px;">
								<div>
									<span</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3  col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="media align-items-center">
									<div class="media-body mr-3">
										<h2 class="fs-34 text-black font-w600"><?php echo $data1['total_doctor']; ?></h2>
										<span>Total Doctor</span>
									</div>
									<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M38.3334 16.6667C38.3384 15.7489 38.0907 14.8474 37.6174 14.061C37.1441 13.2746 36.4635 12.6337 35.6501 12.2084C34.8368 11.7832 33.9221 11.59 33.0062 11.6501C32.0904 11.7101 31.2087 12.0211 30.4579 12.5489C29.707 13.0768 29.116 13.8011 28.7494 14.6426C28.3829 15.484 28.2551 16.4101 28.3799 17.3194C28.5047 18.2287 28.8774 19.0861 29.4572 19.7976C30.0369 20.5092 30.8014 21.0474 31.6667 21.3534V26.6667C31.6667 28.8768 30.7887 30.9964 29.2259 32.5592C27.6631 34.122 25.5435 35 23.3334 35C21.1232 35 19.0036 34.122 17.4408 32.5592C15.878 30.9964 15 28.8768 15 26.6667V24.8667C17.7735 24.4643 20.3097 23.0778 22.1456 20.9604C23.9815 18.8429 24.9947 16.1359 25 13.3334V3.33335C25 2.89133 24.8244 2.4674 24.5119 2.15484C24.1993 1.84228 23.7754 1.66669 23.3334 1.66669H18.3334C17.8913 1.66669 17.4674 1.84228 17.1548 2.15484C16.8423 2.4674 16.6667 2.89133 16.6667 3.33335C16.6667 3.77538 16.8423 4.1993 17.1548 4.51186C17.4674 4.82443 17.8913 5.00002 18.3334 5.00002H21.6667V13.3334C21.6667 15.5435 20.7887 17.6631 19.2259 19.2259C17.6631 20.7887 15.5435 21.6667 13.3334 21.6667C11.1232 21.6667 9.0036 20.7887 7.4408 19.2259C5.87799 17.6631 5.00002 15.5435 5.00002 13.3334V5.00002H8.33335C8.77538 5.00002 9.1993 4.82443 9.51186 4.51186C9.82442 4.1993 10 3.77538 10 3.33335C10 2.89133 9.82442 2.4674 9.51186 2.15484C9.1993 1.84228 8.77538 1.66669 8.33335 1.66669H3.33335C2.89133 1.66669 2.4674 1.84228 2.15484 2.15484C1.84228 2.4674 1.66669 2.89133 1.66669 3.33335V13.3334C1.67205 16.1359 2.68517 18.8429 4.52109 20.9604C6.357 23.0778 8.89322 24.4643 11.6667 24.8667V26.6667C11.6667 29.7609 12.8959 32.7283 15.0838 34.9163C17.2717 37.1042 20.2392 38.3334 23.3334 38.3334C26.4275 38.3334 29.395 37.1042 31.5829 34.9163C33.7709 32.7283 35 29.7609 35 26.6667V21.3534C35.9723 21.0132 36.8152 20.3797 37.4122 19.5403C38.0093 18.7008 38.3311 17.6968 38.3334 16.6667Z" fill="#007A64"/>
									</svg>
								</div>
							</div>
							<div class="progress  rounded-0" style="height:4px;">
								<div>
									<span></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3  col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="media align-items-center">
									<div class="media-body mr-3">
										<h2 class="fs-34 text-black font-w600"><?php echo $data8['total_city']; ?></h2>
										<span>Department</span>
									</div>
									<i class="fa fa-hospital-o" style="font-size:40px;color:#007A64" aria-hidden="true"></i>
								</div>
							</div>
							<div class="progress  rounded-0" style="height:4px;">
								<div>
									<span ></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
				<?php if(isset($_SESSION['ADMIN'])){ ?>
					<div class="col-xl-6">
						<div class="row">
						<div class="col-xl-12">	
								<div class="card patient-activity">
									<div class="card-header border-0 pb-0">
										<h3 class="fs-20 text-black mb-0">Recent Appointment Activity</h3>
										
									</div>
									<div class="card-body pb-0" >
										<div class="" id="patient-activity">
											<table class="table table-responsive-sm">
												<tbody>
												<?php while($data=mysqli_fetch_assoc($run13)) { ?>
													<tr>
														<td>
														<div class="d-flex">
																<img src="<?php  echo $data['doc_img'] ?>" alt="" class="img-2 mr-3">
																<div>
																	<h6 class="fs-16 mb-1"><a href="" class="text-black"><?php echo $data['doc_name']  ?></a></h6>
																	<span class="fs-14"><td></td></span>
																</div>
															</div>
														</td>
														<td>
															<div>
																<p class="fs-14 mb-1"><td> <?php echo $data['user_name']  ?></td></p>
																<span class="text-primary font-w600 mb-auto"></span>
															</div>
														</td>
														<td>
															<div>
																<p class="fs-14 mb-1"><td></p>
																<span class="text-primary font-w600 mb-2 d-block text-nowrap"><?php echo $data['status']  ?></span>
																<p class="mb-0 fs-12"><?php echo $data['time']  ?></p>
															</div>
														</td>
													</tr>
													<?php } ?>
													
												</tbody>
											</table>
										</div>
									</div>
									<div class="card-footer text-center border-0">
										<a href="appointment_show.php" class="btn-link">See More >></a>
									</div>
								</div>
								
							</div>
							<div class="col-xl-12">	
								<div class="card rated-doctors">
									<div class="card-header border-0 pb-0">
										<h3 class="fs-20 text-black mb-0 mr-auto">Recently Join Doctors</h3>
										<a href="doctor_show.php" class="btn-link">More >></a>
									</div>
									<div class="card-body">
									<?php while ($data=mysqli_fetch_assoc($run3)){?>
										<div class="d-sm-flex pb-sm-4 pb-3 border-bottom mb-sm-4 mb-3 align-items-center">
											<div class="d-flex align-items-center mr-auto pr-2">
												
												<img src="<?php  echo $data['doc_img'] ?>" class="img-1 mr-sm-4 mr-3" alt="">
												<div>
													<h4 class="mb-sm-2 mb-1"><a href="doctor_show.php" class="text-black"><?php echo $data ['doc_name']?></a></h4>
													<span class="fs-14 text-primary font-w600"><?php echo $data ['cat_name']?></span>
												</div>
											</div>
											<div class="text-sm-right mt-sm-0 mt-3 star-review">
												
												
											</div>
										</div>
									<?php } ?>
									</div>
								</div>
							</div>
							
						</div>
						
					</div>
					<?php } ?>
					<div class="col-xl-6">
						<div class="row">
							
									
							<div class="col-xl-12">	
								<div class="card appointment-schedule">
									<div class="card-header pb-0 border-0">
										<h3 class="fs-20 text-black mb-0">Today (<?php echo $data22['total_appointment1']; ?>) Appointment Schedule</h3>
										<div class="dropdown ml-auto">
											
											
										</div>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-6 col-xxl-12 col-md-6">
												
											</div>
											<div class="col-xl-6 col-xxl-12  col-md-6 height415 dz-scroll" id="appointment-schedule">
											<?php while ($data=mysqli_fetch_assoc($run4)){?>
												<div class="d-flex pb-3 border-bottom mb-3 align-items-end">
													<div class="mr-auto">
														<p class="text-black font-w600 mb-2"><?php echo $data ['date']?></p>
														<ul>
															<li><i class="las la-clock"></i> <?php echo $data ['time']?></li>
															<li><i class="las la-user"></i><?php echo $data ['doc_name']?></li>
														</ul>
													</div>
													
												</div>
												<?php } ?>
											</div>
											
										</div>
						</div>
					</div>
									</div>
								</div>
							</div>
							
							
						</div>
					</div>
					
				</div>
            </div>
        </div>
				</div>
            </div>
        </div>
		
			
				
        <?php
		include('footer.php')
		?>