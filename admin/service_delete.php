<?php
include('connect.php');
$i = $_GET['id'];

$query = "DELETE FROM `service` WHERE id='$i'";
$run = mysqli_query($con, $query);
if ($run){
    echo "<script>alert('deleted');window.location.href='service_show.php'</script>";
}
else{
    echo "error";
}
 