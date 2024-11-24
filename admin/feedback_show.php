
<?php include("header.php");
include('connect.php');
$query = "SELECT * FROM `rate`";
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
        <th>Topic</th> 
        <th>Message</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($data=mysqli_fetch_assoc($run)){?>
      <tr>
        <td><?php echo $data ['id']?></td>
        <td><i class="fa fa-user"></i>   <?php echo $data ['user_name']?></td>
        <td><i class="fa fa-comment"></i> <?php echo $data['topic']?></td>
        <td><i class="fa fa-comment"></i> <?php echo $data['message']?></td>
        <td><a href="rate_delete.php?id=<?php echo $data['id']?>"><i style="font-size:24px;color:red" class="fa">&#xf00d;</i></a></td>
       </tr>
      <?php } ?>
      
    </tbody>
  </table>
</div>
</div>
</div>



<?php
include('footer.php')
?>

