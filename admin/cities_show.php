
<?php
include('header.php');
include('connect.php');
$query = "SELECT * FROM `cities`";
$run = mysqli_query($con, $query);
?>
       <div class="content-body">
            <!-- row -->
			<div class="container-fluid">

                 
                              
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>City</th>
        <th>Update</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($data=mysqli_fetch_assoc($run)){?>
      <tr>
        <td><?php echo $data ['Id']?></td>
        <td><i class="fa fa-user"></i>   <?php echo $data ['city_name']?></td>
        <td><a href="cities_update.php?id=<?php echo $data['Id']?>"><i style="font-size:24px;color:green" class="fa">&#xf044;</i></a></td>
        <td><a href="cities_delete.php?id=<?php echo $data['Id']?>"><i style="font-size:24px;color:red" class="fa">&#xf00d;</i></a></td>
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

