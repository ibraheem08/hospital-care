
<?php
include('header.php');
include('connect.php');
$query = "SELECT * FROM `role`";
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
        <th>Update</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($data=mysqli_fetch_assoc($run)){?>
      <tr>
        <td><?php echo $data ['Id']?></td>
        <td><i class="fa fa-user"></i>   <?php echo $data ['role_name']?></td>
        <td><a href="role_update.php?id=<?php echo $data['Id']?>"><i style="font-size:24px;color:green" class="fa">&#xf044;</i></a></td>
        <td><a href="role_delete.php?id=<?php echo $data['Id']?>"><i style="font-size:24px;color:red" class="fa">&#xf00d;</i></a></td>
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

