<?php
include('header.php');
include('connect.php');
$i=$_GET['id'];
$query="SELECT * FROM `category` WHERE id='$i'";
$run=mysqli_query($con, $query);
$data=mysqli_fetch_assoc($run);
?>
      <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
<div class="col-xl-12 col-lg-12">
    
                        <div class="card">
                        
                            <div class="card-body">
                           
                                <div class="basic-form">

                                <form method="post">
                                                <label>update Department</label>
                                                <input type="text" class="form-control" placeholder="Enter New Category" name="cat_name" value="<?php echo $data ['cat_name'] ?>" >
                                                <label>update Detail</label>
                                                <input type="text" class="form-control" placeholder="Enter some text" name="cat_text" value="<?php echo $data ['cat_text'] ?>">

                                                <label>Update Department Image</label>
                                                <input type="file" class="form-control" placeholder="Enter image" name="cat_img" accept="image/png, image/jpg, image/jpeg" onChange="abc(this)" >
                                            </div>
                                            
                                        </div>
                                        <img src="<?php echo $data ['cat_img'] ?>" id="myimage" height=100 width=200/>
                                        <button type="submit" class="btn btn-primary" name="sub">Update Department</button>
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
    $c = $_POST['cat_name'];
    $t = $_POST['cat_text'];
    $name=$_FILES['cat_img']['name'];         
    $tname=$_FILES['cat_img']['tmp_name'];  
    $type=$_FILES['cat_img']['type'];  
    $size=$_FILES['cat_img']['size'];  
    $folder="images/catimages/";

    if(is_uploaded_file($tname)){
        if($type=="image/png" || $type=="image/jpg" || $type=="image/jpeg"){
            $path=$folder.$name;
          move_uploaded_file($tname,$path);
          $q="UPDATE `category` SET `cat_name`='$c',`cat_text`='$t',`cat_img`='$path' WHERE Id='$i'";
          $run=mysqli_query($con,$q);
          if($run){
            echo "<script> alert('updated');window.location.href='category_show.php'</script>";
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
        $q="UPDATE `category` SET `cat_name`='$c',`cat_text`='$t' WHERE Id='$i'";
          $run=mysqli_query($con,$q);
          if($run){
            echo "<script> alert('updated');window.location.href='category_show.php'</script>";
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