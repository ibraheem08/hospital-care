<?php
include('connect.php');
$i = $_GET['id'];

$query = "DELETE FROM `dissease` WHERE id='$i'";
$run = mysqli_query($con, $query);
if ($run){
    echo "<script>alert('deleted');window.location.href='dissease_show.php'</script>";
}
else{
    echo "error";
}
 