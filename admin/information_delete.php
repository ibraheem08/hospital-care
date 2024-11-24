<?php
include('connect.php');
$i = $_GET['id'];

$query = "DELETE FROM `information` WHERE id='$i'";
$run = mysqli_query($con, $query);
if ($run){
    echo "<script>alert('deleted');window.location.href='information_show.php'</script>";
}
else{
    echo "error";
}
 