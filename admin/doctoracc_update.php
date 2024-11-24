<?php
include('header.php');
include('connect.php');
$id = $_GET['id'];
$i=$_SESSION['ID'];
$q_for_doc_id="select doctor.Id from doctor join users on users.Id=doctor.user_id_FK where users.Id='$i'";
$run_for_doc_id=mysqli_query($con,$q_for_doc_id);
$data_of_doc_id=mysqli_fetch_assoc($run_for_doc_id);
$doc_id=$data_of_doc_id['Id'];
if(isset($_SESSION['ADMIN'])){
  $query = "SELECT docach.*,doctor.doc_name FROM `docach`JOIN doctor on doctor.Id=docach.doc_id_FK";
}
else{
  $query = "SELECT docach.*,doctor.doc_name FROM `docach`JOIN doctor on doctor.Id=docach.doc_id_FK where doctor.Id= '$doc_id'";

}

$run = mysqli_query($con, $query);
$data=mysqli_fetch_assoc($run);
?>
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
      



<div class="col-xl-12 col-lg-2">
                        <div class="card">
                            <div class="card-header">
                              
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="" enctype="multipart/form-data">

                                        <div class="form-row">
                                       
                         
                                            <div class="form-group col-md-6">
                                            <label>Doctor Image</label>
                                                <input type="file" class="form-control" placeholder="Enter Image" name="diss_img"  accept="image/png, image/jpg, image/jpeg" onChange="abc(this)">
                                            </div>
                                        </div>
                                        
                                        
                                       
                                        </div>
                                        <img src="<?php  echo $data['ach_img'] ?>" id="myimage" height=100/>
                                        <button type="submit" class="btn btn-primary" name="sub">Update Achievment</button>
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
 
  $name=$_FILES['diss_img']['name'];         
  $tname=$_FILES['diss_img']['tmp_name'];  
  $type=$_FILES['diss_img']['type'];  
  $size=$_FILES['diss_img']['size'];  
  $folder="images/docachimages/";

  if(is_uploaded_file($tname)){
    if($type=="image/png" || $type=="image/jpg" || $type=="image/jpeg"){
        $path=$folder.$name;
      move_uploaded_file($tname,$path);
      $q="UPDATE `docach` SET`doc_id_FK`='$doc_id',`ach_img`='$path' WHERE id='$id'";
      $run=mysqli_query($con,$q);
      if($run){
        echo "<script> alert('updated');window.location.href='doctoracc_show.php'</script>";
      }
      else{
        echo mysqli_error($con);
      }
      }
      else{
        echo "<script> alert('Image format error!!!!!')</script>";
      }
      
}
else{
    $q="UPDATE `docach` SET`doc_id_FK`='$doc_id',`ach_img`='$path' WHERE id='$id'";
      $run=mysqli_query($con,$q);
      if($run){
        echo "<script> alert('updated');window.location.href='doctoracc_show.php'</script>";
      }
      else{
        echo mysqli_error($con);
      }
}


}


?>
        
        <script>

function abc(input){
  if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#myimage')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100)
                   .css( "visibility", "visible" );		
            };

            reader.readAsDataURL(input.files[0]);
        }
}


</script>           

    
                   
