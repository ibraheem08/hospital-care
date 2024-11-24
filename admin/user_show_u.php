
<?php
include('header.php');
include('connect.php');
$query = "SELECT users.*,role.role_name FROM `users` join role on users.role_id_FK=role.Id where role_id_FK='12'";
$run = mysqli_query($con, $query);
?>
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">

              
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>user_names</th>
       
        <th>Role</th>
     
        
      </tr>
    </thead>
    <tbody>
      <?php while ($data=mysqli_fetch_assoc($run)){?>
      <tr>
        <td><?php echo $data ['Id']?></td>
        <td><i class="fa fa-id-card"></i>   <?php echo $data ['user_name']?></td>
        
        <td><i class="fa fa-user"></i>  <?php echo $data ['role_name']?></td>
        
      
      <?php } ?>
      
    </tbody>
  </table>
</div>
      </div>
      </div>
<?php
    include('footer.php');
    ?>
