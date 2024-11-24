<?php
include('header.php');
?>
<div class="content-body">
			<div class="container-fluid">
            <?php
include('connect.php');

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
                                                <label>contact</label>
                                                <input type="tel" class="form-control" placeholder="Enter hospital number" name="patient_name">
                                            </div>
                                           
                                            <div class="form-group col-md-6">
                                            <label>Email	</label>
                                                <input type="text" class="form-control" placeholder="Enter hospital email	" name="medical_history">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label>location</label>
                                                <input type="tel" class="form-control" placeholder="Enter hospital location" name="contact">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label>time</label>
                                                <input type="time" class="form-control" placeholder="Enter time" name="d_o_b">
                                            </div>
                                            
                                        </div>
                                        
                                        
                                            
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary" name="sub">Add Information</button>
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
  $u = $_POST['patient_name'];
  $p = $_POST['medical_history'];
  $r = $_POST['contact'];
  $o = $_POST['d_o_b'];

  
$query="INSERT INTO `information`( `phone`, `email`, `locations`, `time`) VALUES ('$u','$p','$r','$o')";
$run=mysqli_query($con, $query);
if($run==true){
  echo "<script>alert('Information has been Added');window.location.href='information_show.php'</script>";
}
else{
  echo mysqli_error($con);
}
}
?>
    
                   
