	<?php
include("./Config/connection.php");
	if (!isset($_SESSION['user_id'])) {
  header('location:index.php');
}

?>
	<nav class="ts-sidebar" style="background-color: #d6dbdf ">
			<ul class="ts-sidebar-menu">
			
			<li class="ts-label">Main</li>
			

	
			<br>
			 <?php 
                 $select_all_roles = "SELECT * FROM `users` WHERE `user_id`='$_SESSION[user_id]'";
                 $result = mysqli_query($conn,$select_all_roles);
                 $number = mysqli_num_rows($result);
                 if ($number > 0) {
                     while($row = mysqli_fetch_assoc($result)) { ?>
			
				<li><a href="memberProfile.php?user_id=<?php echo $row['user_id'] ?>" style="color: #34495e "><i class="fa fa-users" style="color: #34495e "></i> &nbsp;Your Profile</a>
			 <?php } }  else {
             echo "0 results";
                  }?>
			</li>
			<hr>
				<li><a href="registration.php" style="color: #34495e "><i class="fa fa-users"></i> &nbsp;Registration</a>
			</li>
			<li><a href="payments.php" style="color: #34495e "><i class="fa fa-money"></i> &nbsp;Payments</a>
			</li>
			<li><a href="status.php" style="color: #34495e "><i class="fa fa-money"></i> &nbsp;Status</a>
			<li><a href="smsPannel.php" style="color: #34495e "><i class="fa fa-money"></i> &nbsp;Updates</a>
			
			</li>
			</ul>
			
		</nav>

		