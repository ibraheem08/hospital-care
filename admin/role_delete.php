<?php
include('connect.php');
$i = $_GET['id'];
$query = "DELETE FROM `role` WHERE id='$i'";
$run = mysqli_query($con, $query);
if ($run){
    echo "<script>alert('deleted');window.location.href='role_show.php'</script>";
}
else{
    echo "error";
}
 