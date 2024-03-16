<?php
include("./Config/connection.php");
if ($_SESSION['role']!='region') {
    header('Location:index.php');
  }
  
$user_id =$_REQUEST['user_id'];
$query = "DELETE FROM users WHERE user_id=$user_id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error($connect));
echo"<div class='alert alert-danger'>Deletion Successfull</div>";
header("Location:OfficersAccount.php"); 
exit();

?>