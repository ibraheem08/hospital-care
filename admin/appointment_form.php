<?php
include('header.php');
?>
<div class="content-body">
			<div class="container-fluid">
            <?php
include('connect.php');
$q="SELECT * FROM `doctor`";
$run=mysqli_query($con,$q);
$q1="SELECT * FROM `patient`";
$run1=mysqli_query($con,$q1);
?>
<div class="col-xl-12 col-lg-2">
                        <div class="card">
                            <div class="card-header">
                              
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post">

                                    <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Doctor</label>
                                                <select id="inputState" class="form-control default-select" name="doc_id">
                                                <?php while($data=mysqli_fetch_assoc($run)) { ?>
                                                    <option value="<?php echo $data['Id'] ?>"> <?php echo $data['doc_name'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Patient</label>
                                                <select id="inputState" class="form-control default-select" name="patient_id">
                                                <?php while($data=mysqli_fetch_assoc($run1)) { ?>
                                                    <option value="<?php echo $data['Id'] ?>"> <?php echo $data['patient_name'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            
                                        </div>
                                            
                                            <div class="form-group col-md-6">
                                            <label>Date</label>
                                                <input type="date" class="form-control" placeholder="Enter your date of birth" name="date">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label>Time</label>
                                                <input type="time" class="form-control" placeholder="Enter time" name="time">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label>status</label>
                                                <input type="text" class="form-control" placeholder="Enter your status" name="status">
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
                    <?php
                    include('footer.php');
                    include('connect.php');
if(isset($_POST['sub'])){
  $u = $_POST['doc_id'];
  $p = $_POST['patient_id'];
  $o = $_POST['date'];
  $r = $_POST['time'];
  $s = $_POST['status'];
$query="INSERT INTO `appoinment`(`doc_id_FK`, `patient_id_FK`, `date`, `time`, `status`) VALUES ('$u','$p','$o','$r','$s')";
$run=mysqli_query($con, $query);
if($run==true){
  echo "<script>alert('Data has been entered');window.location.href='appointment_show.php'</script>";
}
else{
  echo mysqli_error($con);
}
}
?>
    
                   
