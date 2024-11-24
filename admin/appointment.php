<?php
include('header.php');
?>
<div class="content-body">
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
                                    <form method="post">

                                    
                                            
                                            <div class="form-group col-md-6">
                                            <label>Date</label>
                                            <input type="date" name="date" class="form-control" id="start" id="datePickfggerId" min="<?= date('Y-m-d'); ?>">
                                            </div>
                                            
                                        </div>
                                        
                                        
                                            
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
  $o = $_POST['date'];
$query="";
$run=mysqli_query($con, $query);
if($run==true){
  echo "<script>alert('Data has been entered');window.location.href='index.php'</script>";
}
else{
  echo mysqli_error($con);
}
}
?>
    
                   
