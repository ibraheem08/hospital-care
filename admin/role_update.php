<?php
include('header.php');
include('connect.php');
$i=$_GET['id'];
$query="SELECT * FROM `role` WHERE id='$i'";
$run=mysqli_query($con, $query);
$data=mysqli_fetch_assoc($run);
?>
      <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
<div class="col-xl-12 col-lg-12">
    
                        <div class="card">
                        
                            <div class="card-body">
                           
                                <div class="basic-form">
                                
                                <form method="post">
                                                <label>update Role</label>
                                                <input type="text" class="form-control" placeholder="Enter New role" name="role_name" value="<?php echo $data['role_name'] ?>">
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
if(isset($_POST['sub'])){
    $i=$_GET['id'];
$us=$_POST['role_name'];
$query="UPDATE `role` SET `role_name`='$us' WHERE id='$i'";
$run=mysqli_query($con, $query);
if($run){
echo "<script>alert('Updated');window.location.href='role_show.php';</script>";
}
else{
echo mysqli_error($con);
}
}
?>