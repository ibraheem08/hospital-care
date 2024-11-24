<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Care - Admin. Let's Get Better Together.”</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/logo1.png">
    <link href="./css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href=""><img src="./images/logo1.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                            
                                    <form  class="appoinment-form" method="post" action="">
                    <div class="row">
					<div class="col-lg-12">
                            <div class="form-group">
                                <label class="mb-1 text-white">Name</label>
                                <input name="user_name" id="name" type="text" class="form-control" placeholder="@care.com">
                               
                            </div>
                        </div>
						<div class="col-lg-12">
                            <div class="form-group">
                                <label class="mb-1 text-white">password</label>
                                <input name="password" id="name" type="password" class="form-control" placeholder="Enter password">
                            </div>
                        </div>

								  </div>

						<div class="col-lg-12 mb-5">
                        <div class="text-center">
                                            <button type="submit" name="sub" class="btn bg-white text-primary btn-block">Sign Me In</button>
                                        </div>
								  </div>
								  </div>
					</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**************class="mb-1 text-white"********************
        Scripts
    ***********************************-->
    
    <!-- Required vendors -->
    <?php
session_start();
include('connect.php');
if(isset($_POST['sub'])){
$u=$_POST['user_name'];
$p=$_POST['password'];
$q="SELECT users.*,role.role_name FROM `users` JOIN role on role.Id=users.role_id_FK  WHERE user_name='$u' and password='$p' and role_id_FK='13'";
$run=mysqli_query($con,$q);
$rows=mysqli_num_rows($run);
if($rows==0){ 
  echo "<script>alert('Login failed')</script>";
}
else{
    $data=mysqli_fetch_assoc($run);
    $_SESSION['USERS']=$u;
    $_SESSION['ROLE']=$data['role_name'];
  echo "<script>alert('Login Successfull');window.location.href='index.php'</script>";
}

}

?>