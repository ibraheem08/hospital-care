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
$q="SELECT * FROM `users`";
$run=mysqli_query($con,$q);
$q1="SELECT * FROM `category`";
$run1=mysqli_query($con,$q1);
$q2="SELECT * FROM `cities`";
$run2=mysqli_query($con,$q2);
?>
<div class="col-xl-12 col-lg-2">
                        <div class="card">
                            <div class="card-header">
                              
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="" enctype="multipart/form-data">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>dissease Name</label>
                                                <input type="text" class="form-control" placeholder="Enter your dissease Name" name="diss_name">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label>prevention</label>
                                                <input type="text" class="form-control" placeholder="Enter prevention" name="prention">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label>care</label>
                                                <input type="text" class="form-control" placeholder="Enter Care" name="care">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label>Since</label>
                                                <input type="number" class="form-control" placeholder="Enter Since" name="since">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label>Dissease Image</label>
                                                <input type="file" class="form-control" placeholder="Enter Image" name="diss_img" name="doc_img" accept="image/png, image/jpg, image/jpeg" onChange="abc(this)">
                                            </div>
                                        </div>
                                        
                                        
                                       
                                        </div>
                                        <img src="" id="myimage"/>
                                        <button type="submit" class="btn btn-primary" name="sub">Add dissease</button>
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
  $u = $_POST['diss_name'];
  $p = $_POST['prention'];
  $o = $_POST['care'];
  $r = $_POST['since'];
  $name=$_FILES['diss_img']['name'];         
  $tname=$_FILES['diss_img']['tmp_name'];  
  $type=$_FILES['diss_img']['type'];  
  $size=$_FILES['diss_img']['size'];  
  $folder="images/dissimages/";
  if($type=="image/png" || $type=="image/jpg" || $type=="image/jpeg"){
    $path=$folder.$name;
  move_uploaded_file($tname,$path);
$q="INSERT INTO `dissease`(`diss_name`, `doc_id_FK`, `prevention`, `care`, `since`, `diss_img`) VALUES ('$u','$doc_id','$p','$o','$r','$path')";
$run=mysqli_query($con, $q);
if($run==true){
    echo "<script>alert('Dissease has been Added');window.location.href='dissease_show.php'</script>";
}
else{
echo mysqli_error($con);;
}
}
else{
  echo "<script> alert('Image format error!!!!!')</script>";
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

    
                   
