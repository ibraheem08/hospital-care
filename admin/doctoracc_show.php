<?php
include('header.php');
include('connect.php');
$i=$_SESSION['ID'];
$q_for_doc_id="select doctor.Id from doctor join users on users.Id=doctor.user_id_FK where users.Id='$i'";
$run_for_doc_id=mysqli_query($con,$q_for_doc_id);
$data_of_doc_id=mysqli_fetch_assoc($run_for_doc_id);
$doc_id=$data_of_doc_id['Id'];
if(isset($_SESSION['ADMIN'])){
  $query = "SELECT docach.*,doctor.doc_name FROM `docach`JOIN doctor on doctor.Id=docach.doc_id_FK";
}
else{
  $query = "SELECT docach.*,doctor.doc_name FROM `docach`JOIN doctor on doctor.Id=docach.doc_id_FK where doctor.Id= '$doc_id'";

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
        <th>Doctors</th>
        <th>achievment Image</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($data=mysqli_fetch_assoc($run)){?>
      <tr>
        <td><?php echo $data ['id']?></td>
        <td><i class="fa fa-user"></i>   <?php echo $data ['doc_name']?></td>
        <td><img src="<?php  echo $data['ach_img'] ?>" height=100/></td>
        <td><a href="doctoracc_update.php?id=<?php echo $data['id']?>"><i style="font-size:24px" class="fa">&#xf044;</i></a></td>
        <td><a href="doctoracc_delete.php?id=<?php echo $data['id']?>"><i style="font-size:24px;color:red" class="fa">&#xf00d;</i></a></td>
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
