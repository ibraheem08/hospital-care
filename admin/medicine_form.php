<?php
include('header.php');

?>
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
            <?php
include('connect.php');

$i=$_SESSION['ID'];
$q_for_doc_id="select doctor.Id from doctor join users on users.Id=doctor.user_id_FK where users.Id='$i'";
$run_for_doc_id=mysqli_query($con,$q_for_doc_id);
$data_of_doc_id=mysqli_fetch_assoc($run_for_doc_id);
$doc_id=$data_of_doc_id['Id'];
$query = "SELECT dissease.*,doctor.doc_name  FROM `dissease` JOIN doctor on doctor.Id=dissease.doc_id_FK where doctor.Id= '$doc_id' ";
$run = mysqli_query($con, $query)
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
                                                <label>Medicine Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Medicine Name" name="medi_name">
                                            </div>
                                           
                                            
                                            
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>dissease</label>
                                                <select id="inputState" class="form-control default-select" name="diss_id_fk">
                                                <?php while($data=mysqli_fetch_assoc($run)) { ?>
                                                    <option value="<?php echo $data['Id'] ?>"> <?php echo $data['diss_name'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="sub">Add medicine</button>
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
  $u = $_POST['medi_name'];
  $r = $_POST['diss_id_fk'];
$q="INSERT INTO `medicine`(`medi_name`,`diss_id_fk`) VALUES ('$u','$r')";
$run=mysqli_query($con, $q);
if($run==true){
  echo "<script>alert('Medicine has been Added');window.location.href='medicine_show.php'</script>";
}
else{
   echo mysqli_error($con);
}
}
?>
    
                   
