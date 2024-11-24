<?php
include('header.php');
include('connect.php');
@$id=$_GET['pt'];
if(isset($_GET['pt'])){
  $query = "SELECT patient.*,users.user_name FROM `patient` join users on users.Id=patient.user_id_Fk where patient.user_id_Fk='$id'";
}
else{
  $query = "SELECT patient.*,users.user_name FROM `patient` join users on users.Id=patient.user_id_Fk";

}

$run = mysqli_query($con, $query);
?>
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">

              
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Patient Name</th>
        <th>Medical History</th>
        <th>Date Of Birth</th>
        <th>Contact</th>
        <th>User</th>
       
      </tr>
    </thead>
    <tbody>
      <?php while ($data=mysqli_fetch_assoc($run)){?>
      <tr>
        <td><?php echo $data ['Id']?></td>
        <td><i class="fa fa-wheelchair"></i>   <?php echo $data ['patient_name']?></td>
        <td><i class="fa fa-history"></i>  <?php echo $data ['medical_history']?></td>
        <td><i class="fa fa-calendar" aria-hidden="true"></i>  <?php echo $data ['d_o_b']?></td>
        <td><i class="fa fa-phone-square"></i>  <?php echo $data ['contact']?></td>
        <td><i class="fa fa-user"></i>  <?php echo $data ['user_name']?></td>
      
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
