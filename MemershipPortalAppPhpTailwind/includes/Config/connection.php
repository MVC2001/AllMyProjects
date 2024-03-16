<?php
    $server="localhost";
    $username="root";
    $password="";
    $dbname="membershipapp_db";

    $conn=mysqli_connect($server,$username,$password,$dbname);

    if(!$conn){
        die(mysqli_error($conn));
    }

?>
