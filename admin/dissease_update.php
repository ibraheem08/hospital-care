<?php
include('header.php');
$i=$_GET['id'];
include('connect.php');
$query="SELECT * FROM `dissease` WHERE  id='$i'";
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
                                                <label>dissease Name</label>
                                                <input type="text" class="form-control" placeholder="Enter your dissease Name" name="diss_name"value="<?php echo $data ['diss_name'] ?>" >
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label>prevention</label>
                                                <input type="text" class="form-control" placeholder="Enter experiance" name="prention" value="<?php echo $data ['prevention'] ?>" >
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label>care</label>
                                                <input type="text" class="form-control" placeholder="Enter Care" name="care" value="<?php echo $data ['care'] ?>" >
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label>Since</label>
                                                <input type="number" class="form-control" placeholder="Enter Since" name="since" value="<?php echo $data ['since'] ?>" >
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label>Dissease Image</label>
                                                <input type="file" class="form-control" placeholder="Enter Image" name="diss_img"  accept="image/png, image/jpg, image/jpeg" onChange="abc(this)" value="<?php echo $data ['diss_img'] ?>">
                                            </div>
                                        </div>
                                        
                                        
                                       
                                        </div>
                                        <img src="<?php  echo $data['diss_img'] ?>" id="myimage" height=100/>
                                        <button type="submit" class="btn btn-primary" name="sub">Add User</button>
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
  $u = $_POST['diss_name'];
  $p = $_POST['prention'];
  $o = $_POST['care'];
  $r = $_POST['since'];
  $name=$_FILES['diss_img']['name'];         
  $tname=$_FILES['diss_img']['tmp_name'];  
  $type=$_FILES['diss_img']['type'];  
  $size=$_FILES['diss_img']['size'];  
  $folder="images/dissimages/";
  if(is_uploaded_file($tname)){
    if($type=="image/png" || $type=="image/jpg" || $type=="image/jpeg"){
        $path=$folder.$name;
      move_uploaded_file($tname,$path);
      $q= "UPDATE `dissease` SET `diss_name`='$u',`prevention`='$p',`care`='$o',`since`='$r',`diss_img`='$path' where Id='$i'";
      $run=mysqli_query($con,$q);
      if($run){
        echo "<script> alert('updated');window.location.href='dissease_show.php'</script>";
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
    $q= "UPDATE `dissease` SET `diss_name`='$u',`prevention`='$p',`care`='$o',`since`='$r' where Id='$i'";
      $run=mysqli_query($con,$q);
      if($run){
        echo "<script> alert('updated');window.location.href='dissease_show.php'</script>";
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

                   
