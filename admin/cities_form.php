

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
                                <form method="post">
                                                <label>city</label>
                                                <input type="text" class="form-control" placeholder="Enter city" name="city_name">
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
                      
include('connect.php');
if(isset($_POST['sub'])){
  $c = $_POST['city_name'];

$query="INSERT INTO `cities`(`city_name`) VALUES ('$c')";
$run = mysqli_query($con, $query);
if($run==true){
  echo "<script>alert('City has been Added');window.location.href='cities_show.php'</script>";
}
else{
  echo "error";
}
}
                    ?>