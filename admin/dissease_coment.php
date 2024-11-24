
<?php
include('header.php');
include('connect.php');
$query = "SELECT * FROM `coment`";
$run = mysqli_query($con, $query);
?>
       <div class="content-body">
            <!-- row -->
			<div class="container-fluid">

                 
                              
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>User_names</th>
        <th>Email</th>
        <th>comment</th>
       
        
      </tr>
    </thead>
    <tbody>
      <?php while ($data=mysqli_fetch_assoc($run)){?>
      <tr>
        <td><?php echo $data ['id']?></td>
        <td><i class="fa fa-user"></i>   <?php echo $data ['name']?></td>
        <td><i class="fa fa-envelope"></i>  <?php echo $data['email']?></td>
       
        
        <td><i class="fa fa-comment"></i>  <?php echo $data['comnt']?></td>
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

