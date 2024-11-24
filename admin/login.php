<!DOCTYPE html>
<html lang="en">
<head>
	<title>Care -login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="./images/logo1.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="./images/img1.png.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						<img src="./images/logo1.png" alt="">
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid name is required: abc.xyz">
						<input class="input100" type="text" name="user_name" placeholder="Name" required pattern="[A-Za-z]{3,15}">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required" required pattern="[A-Za-z]{3,15}">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit"  name="sub" >Sign Me In</button>
					
                    </div>

					<div class="text-center p-t-12">
						
					</div>

					<div class="text-center p-t-136">
					
					
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<?php
session_start();
include('connect.php');
if(isset($_POST['sub'])){
$u=$_POST['user_name'];
$p=$_POST['password'];
//For Admin
$q1="SELECT users.*,role.role_name FROM `users` JOIN role on role.Id=users.role_id_FK  WHERE user_name='$u' and password='$p' and role_id_FK='11'";
$run1=mysqli_query($con,$q1);
//For Publisher
$q2="SELECT users.*,role.role_name FROM `users` JOIN role on role.Id=users.role_id_FK  WHERE user_name='$u' and password='$p' and role_id_FK='13'";
$run2=mysqli_query($con,$q2);

if(mysqli_num_rows($run1)>0){
  $data=mysqli_fetch_assoc($run1);
  $_SESSION['ADMIN']=$u;
  $_SESSION['ADMIN_ROLE']=$data['role_name'];
  $_SESSION['ID']=$data['Id'];
  echo "<script>alert('Admin Login Successfull');window.location.href='index.php'</script>";
 
}
else if(mysqli_num_rows($run2)>0){
  $data=mysqli_fetch_assoc($run2);
  $_SESSION['doc']=$u;
  $_SESSION['doc_ROLE']=$data['role_name'];
  $_SESSION['ID']=$data['Id'];
  echo "<script>alert('Doctor Login Successfull');window.location.href='index.php'</script>";
}

else{
  echo "<script>alert('Login failed')</script>";
}
}

?>

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>