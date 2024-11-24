

<?php
include('header.php');
?>
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">
                                <form method="post" action="" enctype="multipart/form-data">

                                                <label>Department</label>
                                                <input type="text" class="form-control" placeholder="Enter Your categories" name="cat_name">
                                                
                                                <label>Detail</label>
                                                <input type="text" class="form-control" placeholder="Enter some text" name="cat_text">

                                                <label>Department Image</label>
                                                <input type="file" class="form-control" placeholder="Enter image" name="cat_img" accept="image/png, image/jpg, image/jpeg" onChange="abc(this)">
                                            </div>
                                             <button type="submit" class="btn btn-primary" name="sub">Add Department</button>
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
  $c = $_POST['cat_name'];
  $t = $_POST['cat_text'];
  $name=$_FILES['cat_img']['name'];         
  $tname=$_FILES['cat_img']['tmp_name'];  
  $type=$_FILES['cat_img']['type'];  
  $size=$_FILES['cat_img']['size'];  
  $folder="images/catimages/";
  if($type=="image/png" || $type=="image/jpg" || $type=="image/jpeg"){
    $path=$folder.$name;
  move_uploaded_file($tname,$path);
  
$query="INSERT INTO `category`(`cat_name`,`cat_text`,`cat_img`) VALUES ('$c','$t','$path')";
$run = mysqli_query($con, $query);
if($run==true){
  echo "<script>alert('Department has been Added');window.location.href='category_show.php'</script>";
}
else{
  echo "error";
}
}
else{
  echo "<script> alert('Image format error!!!!!')</script>";
}
}
                    ?>