<?php
include('header.php');
include('connect.php');
$query = "SELECT * FROM `service`";
$run = mysqli_query($con, $query);
?>
       <div class="content-body">
            <!-- row -->
			<div class="container-fluid">

                 
                              
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Service name</th>
        <th>Text</th>
        <th>Service image</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($data=mysqli_fetch_assoc($run)){?>
      <tr>
        <td><?php echo $data ['id']?></td>
        <td><i class="fa fa-user"></i>   <?php echo $data ['service_name']?></td>
        <td><i class="fa fa-user"></i>   <?php echo $data ['text']?></td>
        <td><img src="<?php  echo $data['service_img'] ?>" height=100/></td>
        <td><a href="service_update.php?id=<?php echo $data['id']?>"><i style="font-size:24px;color:green" class="fa">&#xf044;</i></a></td>
        <td><a href="service_delete.php?id=<?php echo $data['id']?>"><i style="font-size:24px;color:red" class="fa">&#xf00d;</i></a></td>
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

