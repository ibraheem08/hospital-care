<?php
include('header.php');
include('connect.php');
$i=$_SESSION['ID'];
$q_for_doc_id="select doctor.Id from doctor join users on users.Id=doctor.user_id_FK where users.Id='$i'";
$run_for_doc_id=mysqli_query($con,$q_for_doc_id);
$data_of_doc_id=mysqli_fetch_assoc($run_for_doc_id);
$doc_id=$data_of_doc_id['Id'];
$query = "SELECT dissease.*,doctor.doc_name  FROM `dissease` JOIN doctor on doctor.Id=dissease.doc_id_FK where doctor.Id= '$doc_id' ";
$run = mysqli_query($con, $query)
?>
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">

              
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>dissease</th>
        <th>Doctor Name</th>
        <th>prention</th>
        <th>Care</th>
        <th>since</th>
        
      </tr>
    </thead>
    <tbody>
      <?php while ($data=mysqli_fetch_assoc($run)){?>
      <tr>
        <td><?php echo $data ['Id']?></td>
        <td><i class="fa fa-user"></i>   <?php echo $data ['diss_name']?></td>
        <td><i class="fa fa-user"></i>   <?php echo $data ['doc_name']?></td>
        <td><i class="fa fa-key"></i>  <?php echo $data ['prevention']?></td>
        <td><i class="fa fa-user"></i>   <?php echo $data ['care']?></td>
        <td><i class="fa fa-user"></i>  <?php echo $data ['since']?></td>
        <td><img src="<?php  echo $data['diss_img'] ?>" height=80/></td>
        <td><a href="dissease_update.php?id=<?php echo $data['Id']?>"><i style="font-size:24px;color:green" class="fa">&#xf044;</i></a></td>
        <td><a href="dissease_delete.php?id=<?php echo $data['Id']?>"><i style="font-size:24px;color:red" class="fa">&#xf00d;</i></a></td>
    
      </tr>
      <?php } ?>
      
    </tbody>
  </table>
</div>
      </div>
      </div>
<?php
    include('footer.php');
    ?>
