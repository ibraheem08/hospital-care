

<?php
include('header.php');
?>
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">
                                <form method="post">
                                                <label>Role</label>
                                                <input type="text" class="form-control" placeholder="Enter Your Role" name="role_name">
                                            </div>
                                            
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary" name="sub">Add Role</button>
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
  $r = $_POST['role_name'];

$query="INSERT INTO `role`(`role_name`) VALUES ('$r')";
$run = mysqli_query($con, $query);
if($run==true){
  echo "<script>alert('Role has been Added');window.location.href='role_show.php'</script>";
}
else{
  echo "error";
}
}
                    ?>