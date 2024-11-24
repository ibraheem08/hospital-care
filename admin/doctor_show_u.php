
<?php
include('header.php');
include('connect.php');
$query = "SELECT users.*,role.role_name FROM `users` join role on users.role_id_FK=role.Id where role_id_FK='13'";
$run = mysqli_query($con, $query);
?>
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">

              
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Doctor_names</th>
        
        <th>Role</th>
        
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($data=mysqli_fetch_assoc($run)){?>
      <tr>
        <td><?php echo $data ['Id']?></td>
        <td><i class="fa fa-id-card"></i>   <?php echo $data ['user_name']?></td>
       
        <td><i class="fa fa-user"></i>  <?php echo $data ['role_name']?></td>
        
        <td><a href="user_delete.php?id=<?php echo $data['Id']?>"><i style="font-size:24px;color:red" class="fa">&#xf00d;</i></a></td>
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
