<?php
include('header.php');
?>
<div class="content-body">
			<div class="container-fluid">
            <?php
include('connect.php');
$i=$_GET['id'];


?>
<div class="col-xl-12 col-lg-2">
                        <div class="card">
                            <div class="card-header">
                              
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="">

                                    <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Doctor</label>
                                                <select id="inputState" class="form-control default-select" name="status">
                                                <option selected disabled>Please select</option>
                                                           
                                                            <option>Approved</option>
                                                            <option>Declained</option>
                                                            <option>Pending</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                     
                                        
                                        
                                        <button type="submit" class="btn btn-primary" name="sub">Submit</button>
                                        </div>
                                        
                                       
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
  $u = $_POST['status'];
 
$query="UPDATE `appoinment` SET `status`='$u' WHERE Id='$i'";
$run=mysqli_query($con, $query);
if($run==true){
  echo "<script>alert('Data has been entered');window.location.href='appointment_show.php'</script>";
}
else{
  echo mysqli_error($con);
}
}
?>
    
                   
