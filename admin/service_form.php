<?php
include('header.php');

?>
<div class="content-body">
            <!-- row -->
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
                                    <form method="post" action="" enctype="multipart/form-data">
                                    <div class="form-row">
                                    
                                            <div class="form-group col-md-6">
                                                <label>Service Name</label>
                                                <input type="text" class="form-control" placeholder="Enter service Name" name="service_name">
                                            </div>
                                           
                                            <div class="form-group col-md-6">
                                            <label>Service Text</label>
                                                <input type="text" class="form-control" placeholder="Enter experiance" name="text">
                                            </div>
                                           
                                        </div>

                                        <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Service Image</label>
                                                <input type="file" class="form-control" placeholder="Service Image" name="service_img" accept="image/png, image/jpg, image/jpeg" onChange="abc(this)">
                                            </div>
                                            </div>
                                                </div>
                                                <img src="" id="myimage"/>
                                        <button type="submit" class="btn btn-primary" name="sub">Add Service</button>
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
  
  if($type=="image/png" || $type=="image/jpg" || $type=="image/jpeg"){
    $path=$folder.$name;
  move_uploaded_file($tname,$path);
  $q="INSERT INTO `service`(`service_name`, `text`, `service_img`) VALUES ('$u','$p','$path')";
  $run=mysqli_query($con,$q);
  if($run){
    echo "<script>alert('Service has been entered');window.location.href='service_show.php'</script>";
  }
  else{
    echo mysqli_error($con);
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
