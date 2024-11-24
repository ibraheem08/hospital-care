<?php
include('header.php') ; 
include('connect.php');
$id= $_SESSION['ID'];
$query = "SELECT users.user_name,cities.city_name,category.cat_name,doctor.* FROM `doctor` join cities on cities.Id=doctor.city_id_FK
join category on category.Id=doctor.cat_id_FK join users on users.Id=doctor.user_id_FK where users.Id=$id";
$run = mysqli_query($con, $query);
$i=$_SESSION['ID'];
$q_for_doc_id="select doctor.Id from doctor join users on users.Id=doctor.user_id_FK where users.Id='$i'";
$run_for_doc_id=mysqli_query($con,$q_for_doc_id);
$data_of_doc_id=mysqli_fetch_assoc($run_for_doc_id);
$doc_id=$data_of_doc_id['Id'];
$query1 = "SELECT dissease.*,doctor.doc_name  FROM `dissease` JOIN doctor on doctor.Id=dissease.doc_id_FK where doc_id_FK='$doc_id'order by id desc limit 1 ";
$run2 = mysqli_query($con, $query1);
$query2 = "SELECT dissease.*,doctor.doc_name  FROM `dissease` JOIN doctor on doctor.Id=dissease.doc_id_FK where doc_id_FK='$doc_id'order by id asc limit 3 ";
$run3 = mysqli_query($con, $query2);
?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<h4>Profile</h4>
					
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    <div class=""></div>
                                </div>
                                <?php while ($data=mysqli_fetch_assoc($run)){?>
                                <div class="profile-info">
									<div class="profile-photo">
										<img src="<?php  echo $data['doc_img'] ?>" class="img-fluid rounded-circle" alt="">
									</div>
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0"><?php echo $data ['doc_name']?></h4>
											<p><?php echo $data ['cat_name']?></p>
										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-muted mb-0"><?php echo $data ['contact']?></h4>
											<p><?php echo $data ['city_name']?></p>
										</div>
										<div class="dropdown ml-auto">
											<a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li class="dropdown-item"><a href="adminpass.php"><i class="fa fa-user-circle text-primary mr-2"> Edit Profile</i></a> </li>
											</ul>
										</div>
									</div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                               
                                <div class="profile-blog mb-5">
                                    <h5 class="text-primary d-inline">Highlights</h5><a href="javascript:void()" class="pull-right f-s-16"></a>
                                    <?php while ($data=mysqli_fetch_assoc($run2)){?>
                                    <img src="<?php  echo $data['diss_img'] ?>" alt="" class="img-fluid mt-4 mb-4 w-100">
                                    
                                    <h4><a href="post-details.html" class="text-black"><?php  echo $data['diss_name'] ?></a></h4>
                                    <p class="mb-0"><?php echo $data ['prevention']?></td></p>
                                    <?php } ?>
                                </div>
                                
                                <div class="profile-news">
                                    <h5 class="text-primary d-inline">Our Latest News</h5>
                                    <?php while ($data=mysqli_fetch_assoc($run3)){?>
                                    <div class="media pt-3 pb-3">
                                        <img src="<?php  echo $data['diss_img'] ?>" alt="image" class="mr-3 rounded" width="75">
                                       
                                        <div class="media-body">
                                            <h5 class="m-b-5"><a href="post-details.html" class="text-black"><?php  echo $data['diss_name'] ?></a></h5>
                                            <p class="mb-0"><?php echo $data ['prevention']?></p>
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

        <?php include('footer.php'); ?>
        <!--**********************************
            Content body end
        ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
 
    

