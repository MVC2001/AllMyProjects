<?php
include("./Config/connection.php");
if ($_SESSION['role']!='HQAdmin') {
    header('Location:index.php');
  }
  
$id =$_REQUEST['id'];
$query = "DELETE FROM users WHERE id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error($connect));
echo"<div class='alert alert-danger'>Deletion Successfull</div>";
header("Location:UsersAccount.php"); 
exit();

?>