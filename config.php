<?php 
    $server = "sql105.epizy.com";
    $user = "epiz_31547042";
    $pass = "LHZlcxVnb1OwErm";
    $db = "epiz_31547042_voting_system";

    $con = mysqli_connect($server,$user,$pass,$db);

    if(!$con){
        die("Connection LOST...!".mysqli_connect_error());
    }
?>