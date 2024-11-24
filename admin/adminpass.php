<?php
include('header.php');
include('connect.php');
$i=$_SESSION['ID'];
$query="SELECT * FROM `users` WHERE id='$i'";
$run=mysqli_query($con, $query);
$data=mysqli_fetch_assoc($run);
?>
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
            <?php


?>

<?php if(isset($_SESSION['ADMIN'])){ ?>
<div class="col-xl-8 col-lg-5 ">
     <div class="card">
                            <div class="card-header">
                              
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post">

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>User Name</label>
                                                <input type="text" class="form-control" placeholder="Enter your Name" name="user_name" value="<?php echo $data['user_name']?>">
                                            </div>
                                           
                                            <div class="form-group col-md-12">
                                                <label>Password</label>
                                                <input type="password" class="form-control" placeholder="Enter Your Password" name="password"  value="<?php echo $data['password']?>">
                                            </div>
                                            
                                        </div>
                                        
                                        
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="sub">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                    </div>
					</div>
                    <?php } else { ?>
                        <div class="col-xl-8 col-lg-5 ">
     <div class="card">
                            <div class="card-header">
                              
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post">

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>User Name</label>
                                                <input type="text" class="form-control" placeholder="Enter your Name" name="user_name" value="<?php echo $data['user_name']?>">
                                            </div>
                                           
                                            <div class="form-group col-md-12">
                                                <label>Password</label>
                                                <input type="password" class="form-control" placeholder="Enter Your Password" name="password"  value="<?php echo $data['password']?>">
                                            </div>
                                            
                                        </div>
                                        
                                        
                                        
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="sub">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                    </div>
					</div>
                    
<?php
                    } ;
include('footer.php');
if(isset($_POST['sub'])){
    $u = $_POST['user_name'];
    $p = $_POST['password'];
   
  
$query="UPDATE `users` SET `user_name`='$u',`password`='$p' WHERE id='$i'";
$run=mysqli_query($con, $query);
if($run){
echo "<script>alert('password has been changed');window.location.href='index.php';</script>";
}
else{
echo mysqli_error($con);
}
}
?>