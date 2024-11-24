<?php
include('header.php');
include('connect.php');
$i=$_GET['id'];
$query="SELECT * FROM `service` WHERE id='$i'";
$run=mysqli_query($con, $query);
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
                                                <label>Service Name</label>
                                                <input type="text" class="form-control" placeholder="Enter service Name" name="service_name" value="<?php echo $data ['service_name'] ?>" >
                                            </div>
                                           
                                            <div class="form-group col-md-6">
                                            <label>Service Text</label>
                                                <input type="text" class="form-control" placeholder="Enter experiance" name="text" value="<?php echo $data ['text'] ?>" >
                                            </div>
                                           
                                        </div>

                                        <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Service Image</label>
                                                <input type="file" class="form-control" placeholder="Service Image" name="service_img" accept="image/png, image/jpg, image/jpeg" onChange="abc(this)">
                                            </div>
                                            </div>
                                                </div>
                                                <img src="<?php echo $data ['service_img'] ?>" id="myimage" height=100/>
                                        <button type="submit" class="btn btn-primary" name="sub">Update Service</button>
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
  $u = $_POST['service_name'];
  $p = $_POST['text'];
 
  $name=$_FILES['service_img']['name'];         
  $tname=$_FILES['service_img']['tmp_name'];  
  $type=$_FILES['service_img']['type'];  
  $size=$_FILES['service_img']['size'];  
  $folder="images/serviceimages/";

  if(is_uploaded_file($tname)){
    if($type=="image/png" || $type=="image/jpg" || $type=="image/jpeg"){
        $path=$folder.$name;
      move_uploaded_file($tname,$path);
      $q="UPDATE `service` SET `service_name`='$u',`text`='$p',`service_img`='$path' WHERE id='$i'";
      $run=mysqli_query($con,$q);
      if($run){
        echo "<script> alert('updated');window.location.href='service_show.php'</script>";
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
    $q="UPDATE `service` SET `service_name`='$u',`text`='$p' WHERE id='$i'";
      $run=mysqli_query($con,$q);
      if($run){
        echo "<script> alert('updated');window.location.href='service_show.php'</script>";
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
