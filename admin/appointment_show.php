<?php
include('header.php');
include('connect.php');
$i=$_SESSION['ID'];
$q_for_doc_id="select doctor.Id from doctor join users on users.Id=doctor.user_id_FK where users.Id='$i'";
$run_for_doc_id=mysqli_query($con,$q_for_doc_id);
$data_of_doc_id=mysqli_fetch_assoc($run_for_doc_id);
$doc_id=$data_of_doc_id['Id'];
if(isset($_SESSION['ADMIN'])){
  $query1 = "SELECT doctor.doc_name , users.user_name , appoinment.* FROM `appoinment` JOIN doctor on doctor.Id=appoinment.doc_id_FK JOIN users on users.Id=appoinment.user_id_FK   ";
}
else{
  $query1 = "SELECT doctor.doc_name , users.user_name , appoinment.* FROM `appoinment` JOIN doctor on doctor.Id=appoinment.doc_id_FK JOIN users on users.Id=appoinment.user_id_FK  where doctor.Id='$doc_id'";

}
$run4 = mysqli_query($con, $query1);


?>
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">

              
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Patient Name</th>
        <th>date</th>
        <th>time</th>
        <th>Message</th>
        <th>status</th>
        <?php if(isset($_SESSION['doc'])){ ?>
        <th>Change Status</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php while ($data=mysqli_fetch_assoc($run4)){?>
      <tr>
        <td><?php echo $data ['Id']?></td>
        <td><a href="patient_show.php?pt=<?php echo $data ['user_id_FK']?>"><i class="fa fa-user"></i>  <?php echo $data ['user_name']?></a></td>
        <td><i class="fa fa-calendar"></i>   <?php echo $data ['date']?></td>
        <td><i class="fa fa-clock-o" aria-hidden="true"></i>  <?php echo $data ['time']?></td>
        <td><i class="fa fa-user-md"></i>   <?php echo $data ['Message']?></td>
        <td><i class="fa fa-comments"></i>  <?php echo $data ['status']?></td>
        <?php if(isset($_SESSION['doc'])){ ?>
        <td> <a href="ap_update.php?id=<?php echo $data ['Id'] ?>"> Click Here</a></td>
        <?php } ?>
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
