<?php
    $server="localhost";
    $username="root";
    $password="";
    $dbname="member_dbapp";

    $conn=mysqli_connect($server,$username,$password,$dbname);

    if(!$conn){
        die(mysqli_error($conn));
    }

?>
