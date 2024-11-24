<?php
include('header.php');
include('connect.php');
$query = "SELECT users.user_name,cities.city_name,category.cat_name,doctor.* FROM `doctor` join cities on cities.Id=doctor.city_id_FK
join category on category.Id=doctor.cat_id_FK join users on users.Id=doctor.user_id_FK";
$run = mysqli_query($con, $query);
?>
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">

              
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Doctors</th>
        <th>Experience</th>
        <th>Contacts</th>
        <th>user</th>
        <th>Category</th>
        <th>city</th>
        <th>image</th>
       
      </tr>
    </thead>
    <tbody>
      <?php while ($data=mysqli_fetch_assoc($run)){?>
      <tr>
        <td><?php echo $data ['Id']?></td>
        <td><i class="fa fa-user-md"></i>   <?php echo $data ['doc_name']?></td>
        <td><i class="fa fa-id-card"></i>  <?php echo $data ['experiance']?></td>
        <td><i class="fa fa-phone"></i>   <?php echo $data ['contact']?></td>
        <td><i class="fa fa-user"></i>  <?php echo $data ['user_name']?></td>
        <td><i class="fa fa-hospital-o"></i>  <?php echo $data ['cat_name']?></td>
        <td><i class="fa fa-map-marker"></i>  <?php echo $data ['city_name']?></td>
        <td><img src="<?php  echo $data['doc_img'] ?>" height=100/></td>
        
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
