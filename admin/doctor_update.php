<?php
include('header.php');
include('connect.php');
$i=$_SESSION['ID'];
$query1="SELECT * FROM `doctor` WHere doctor.user_id_FK='$i'";
$r=mysqli_query($con, $query1);
$data1=mysqli_fetch_assoc($r);
?>
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
            <?php

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
                                    <form method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Doctor Name</label>
                                                <input type="text" class="form-control" placeholder="Enter your doctor Name" name="doc_name" value="<?php echo $data1['doc_name']?>">
                                            </div>
                                           
                                            <div class="form-group col-md-6">
                                            <label>Experiance</label>
                                                <input type="text" class="form-control" placeholder="Enter experiance" name="experiance" value="<?php echo $data1['experiance']?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label>contact</label>
                                                <input type="tel" class="form-control" placeholder="Enter contact number" name="contact"value="<?php echo $data1['contact']?>">
                                            </div>
                                        </div>
                                       
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>department</label>
                                                <select id="inputState" class="form-control default-select" name="cat_id" value="">
                                                <?php while($data=mysqli_fetch_assoc($run1)) { ?>
                                                    <option value="<?php echo $data['Id'] ?>"> <?php echo $data['cat_name'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>city</label>
                                                <select id="inputState" class="form-control default-select" name="city_id">
                                                <?php while($data=mysqli_fetch_assoc($run2)) { ?>
                                                    <option value="<?php echo $data['Id'] ?>"> <?php echo $data['city_name'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Doctor Image</label>
                                                <input type="file" class="form-control" placeholder="Doctor Image" name="doc_img" accept="image/png, image/jpg, image/jpeg" onChange="abc(this)">
                                            </div>
                                            
                                            </div>
                                        </div>
                                        <img src="<?php echo $data1['doc_img']?>" id="myimage" height=100/>
                                        <button type="submit" class="btn btn-primary" name="sub">Add doctor</button>
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
    $u = $_POST['doc_name'];
    $p = $_POST['experiance'];
    $o = $_POST['contact'];
    $r = $_SESSION['ID'];
    $c = $_POST['cat_id'];
    $q = $_POST['city_id'];
    $name=$_FILES['doc_img']['name'];         
    $tname=$_FILES['doc_img']['tmp_name'];  
    $type=$_FILES['doc_img']['type'];  
    $size=$_FILES['doc_img']['size'];  
    $folder="images/docimages/";


    if(is_uploaded_file($tname)){
        if($type=="image/png" || $type=="image/jpg" || $type=="image/jpeg"){
            $path=$folder.$name;
          move_uploaded_file($tname,$path);
          $q="UPDATE `doctor` SET `doc_name`='$u',`experiance`='$p',`contact`='$o',`user_id_FK`='$r',`cat_id_FK`='$c',`city_id_FK`='$q',`doc_img`='$path' where user_id_FK =$i";
          $run=mysqli_query($con,$q);
          if($run){
            echo "<script> alert('updated');window.location.href='doctor_show.php'</script>";
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
        $q="UPDATE `doctor` SET `doc_name`='$u',`experiance`='$p',`contact`='$o',`user_id_FK`='$r',`cat_id_FK`='$c',`city_id_FK`='$q' where user_id_FK =$i";
          $run=mysqli_query($con,$q);
          if($run){
            echo "<script> alert('updated');window.location.href='doctor_show.php'</script>";
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