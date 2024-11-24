<?php
include('connect.php');
$i = $_GET['id'];

$query = "DELETE FROM `medicine` WHERE id='$i'";
$run = mysqli_query($con, $query);
if ($run){
    echo "<script>alert('deleted');window.location.href='medicine_show.php'</script>";
}
else{
    echo "error";
}
 