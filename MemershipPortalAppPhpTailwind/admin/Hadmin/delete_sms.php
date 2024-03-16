<?php
include("./Config/connection.php");
$sms_id =$_REQUEST['sms_id'];
$query = "DELETE FROM comment_tbl WHERE sms_id=$sms_id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error($connect));
echo"<div class='alert alert-danger'>Deletion Successfull</div>";
header("Location:MessagesPannel.php"); 
exit();

?>