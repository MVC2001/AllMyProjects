<?php
include("./Config/connection.php");
$id =$_REQUEST['id'];
$query = "DELETE FROM membership_tbl WHERE id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error($connect));
echo"<div class='alert alert-danger'>Deletion Successfull</div>";
header("Location:New_members.php"); 
exit();

?>