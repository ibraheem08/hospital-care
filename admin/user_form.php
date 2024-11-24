<?php
include('header.php');

?>
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
            <?php
include('connect.php');
$q="SELECT * FROM `role`";
$run=mysqli_query($con,$q);
?>
<div class="col-xl-12 col-lg-2">
                        <div class="card">
                            <div class="card-header">
                              
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>User Name</label>
                                                <input type="text" class="form-control" placeholder="Enter your Name" name="user_name">
                                            </div>
                                           
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" class="form-control" placeholder="Enter Your Password" name="password">
                                            </div>
                                            
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Role</label>
                                                <select id="inputState" class="form-control default-select" name="role_id">
                                                <?php while($data=mysqli_fetch_assoc($run)) { ?>
                                                    <option value="<?php echo $data['Id'] ?>"> <?php echo $data['role_name'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="sub">Add User</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                    </div>
					</div>
                    <?php
                    include('footer.php');
                    include('connect.php');
if(isset($_POST['sub'])){
  $u = $_POST['user_name'];
  $p = $_POST['password'];
  $r = $_POST['role_id'];
$q="INSERT INTO `users`(`user_name`, `password`, `role_id_FK`) VALUES ('$u','$p','$r')";
$run=mysqli_query($con, $q);
if($run==true){
    if($r==13){
        $or=mysqli_insert_id($con);
        $q1="INSERT INTO `doctor`(`doc_name`, `experiance`, `contact`, `user_id_FK`, `cat_id_FK`, `city_id_FK`, `doc_img`) VALUES ('','','','$or','','','')";
        $run=mysqli_query($con, $q1);
    }
  echo "<script>alert('User has been Added');</script>";
}
else{
  echo mysqli_error($con);;
}
}
?>
    
                   
