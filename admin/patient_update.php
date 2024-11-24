<?php
include('header.php');
include('connect.php');
$i=$_GET['id'];
$query="SELECT * FROM `patient` WHERE id='$i'";
$run=mysqli_query($con, $query);
$data=mysqli_fetch_assoc($run);
?>
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
            <?php
include('connect.php');
$q="SELECT * FROM `users`";
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
                                                <label>Patient Name</label>
                                                <input type="text" class="form-control" placeholder="Enter patient Name" name="patient_name" value="<?php echo $data['patient_name']?>">
                                            </div>
                                           
                                            <div class="form-group col-md-6">
                                                <label>madical history</label>
                                                <input type="text" class="form-control" placeholder="Enter Your medical history" name="medical_history" value="<?php echo $data['medical_history']?>">
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <label>Date Of Birth</label>
                                                <input type="date" class="form-control" placeholder="Enter Your medical history" name="d_o_b" value="<?php echo $data['d_o_b']?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label>contact</label>
                                                <input type="tel" class="form-control" placeholder="Enter contact no" name="contact"  value="<?php echo $data['contact']?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>User</label>
                                                <select id="inputState" class="form-control default-select" name="role_id"  value="<?php echo $data['role_id']?>">
                                                <?php while($data=mysqli_fetch_assoc($run)) { ?>
                                                    <option value="<?php echo $data['Id'] ?>"> <?php echo $data['user_name'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        
                                            
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary" name="sub">Add Patient</button>
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
    $u = $_POST['patient_name'];
    $p = $_POST['medical_history'];
    $o = $_POST['d_o_b'];
    $r = $_POST['contact'];
    $s = $_POST['role_id'];
  
$query="UPDATE `patient` SET `patient_name`='$u',`medical_history`='$p',`d_o_b`='$o',`contact`='$r',`user_id_Fk`='$s'";
$run=mysqli_query($con, $query);
if($run){
echo "<script>alert('Updated');window.location.href='patient_show.php';</script>";
}
else{
echo mysqli_error($con);
}
}
?>