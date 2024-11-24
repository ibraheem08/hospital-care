<?php
include('header.php');
include('connect.php');
$i=$_GET['id'];
$query="SELECT * FROM `cities` WHERE id='$i'";
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
                                                <label>update city</label>
                                                <input type="text" class="form-control" placeholder="update city" name="city_name" value="<?php echo $data['city_name']?>" >
                                            </div>
                                            
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary" name="sub">Add City</button>
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
    $i=$_GET['id'];
$us=$_POST['city_name'];
$query="UPDATE `cities` SET `city_name`='$us' WHERE id='$i'";
$run=mysqli_query($con, $query);
if($run){
echo "<script>alert('Updated');window.location.href='cities_show.php';</script>";
}
else{
echo mysqli_error($con);
}
}
?>