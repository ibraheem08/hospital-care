
<?php
include('header.php');
include('connect.php');
$query = "SELECT medicine.*,dissease.diss_name FROM `medicine` JOIN dissease ON dissease.Id=medicine.diss_id_fk ";
$run = mysqli_query($con, $query);
?>
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">

              
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Medicine_names</th>
        <th>Dissease</th>
        
        
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($data=mysqli_fetch_assoc($run)){?>
      <tr>
        <td><?php echo $data ['id']?></td>
        <td><i class="fa fa-user"></i>   <?php echo $data ['medi_name']?></td>
       
        <td><i class="fa fa-user"></i>  <?php echo $data ['diss_name']?></td>
        
        <td><a href="medicine_delete.php?id=<?php echo $data['id']?>"><i style="font-size:24px;color:red" class="fa">&#xf00d;</i></a></td>
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
