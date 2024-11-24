
<?php
include('header.php');
include('connect.php');
$query = "SELECT * FROM `category`";
$run = mysqli_query($con, $query);
?>
       <div class="content-body">
            <!-- row -->
			<div class="container-fluid">

                 
                              
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>department</th>
        <th>details</th>
        <th>department image</th>
        <?php if(isset($_SESSION['ADMIN'])){ ?>
        <th>update</th>
        <th>delete</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php while ($data=mysqli_fetch_assoc($run)){?>
      <tr>
        <td><?php echo $data ['Id']?></td>
        <td><i class="fa fa-hospital-o"></i>   <?php echo $data ['cat_name']?></td>
        <td><i class="fa fa-id-card"></i>   <?php echo $data ['cat_text']?></td>
        <td><img src="<?php  echo $data['cat_img'] ?>" height=100/></td>
        <?php if(isset($_SESSION['ADMIN'])){ ?>
        <td><a href="category_update.php?id=<?php echo $data['Id']?>"><i style="font-size:24px;color:green" class="fa">&#xf044;</i></a></td>
        <td><a href="category_delete.php?id=<?php echo $data['Id']?>"><i style="font-size:24px;color:red" class="fa">&#xf00d;</i></a></td>
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

