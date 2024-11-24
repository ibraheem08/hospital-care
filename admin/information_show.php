<?php
include('header.php');
include('connect.php');
$query = "SELECT * FROM `information`";
$run = mysqli_query($con, $query);
?>
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">

              
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>number</th>
        <th>email</th>
        <th>location</th>
        <th>Time</th>
        
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($data=mysqli_fetch_assoc($run)){?>
      <tr>
        <td><?php echo $data ['id']?></td>
        <td><i class="fa fa-phone"></i>   <?php echo $data ['phone']?></td>
        <td><i class="fa fa-envelope"></i>  <?php echo $data ['email']?></td>
        <td><i class="fa fa-map-marker"></i>   <?php echo $data ['locations']?></td>
        <td><i class="fa fa-clock-o"></i>  <?php echo $data ['time']?></td>
        <td><a href="information_delete.php?id=<?php echo $data['id']?>"><i style="font-size:24px; color:red" class="fa">&#xf00d;</i></a></td>
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
