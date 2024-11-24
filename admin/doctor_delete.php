<?php
include('connect.php');
$i = $_GET['id'];

$query = "DELETE FROM `doctor` WHERE id='$i'";
$run = mysqli_query($con, $query);
if ($run){
    echo "<script>alert('deleted');window.location.href='doctor_show.php'</script>";
}
else{
    echo "error";
}
 