<?php
require 'common.php';

$beds = $_GET['beds'];
$beds = mysqli_real_escape_string($connect, $beds);

$doctors = $_GET['doctors'];
$doctors = mysqli_real_escape_string($connect, $doctors);

$qf = $beds/$doctors;
$qf = number_format((float)$qf, 2, '.', '');

$update_query = "UPDATE hospitals SET beds= '$beds', doctor = '$doctors', quality_factor = '$qf' WHERE h_id = '$_SESSION[id]';";
$query_result = mysqli_query($connect, $update_query) or die(mysqli_error($connect));

    // $_SESSION['email'] = $email;
    $_SESSION['beds'] = $beds;
    $_SESSION['doctors'] = $doctors;
    $_SESSION['qf'] = $qf;
    
    header("location: ./../index.php");
    
?>