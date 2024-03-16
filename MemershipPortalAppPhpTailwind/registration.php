<?php
session_start();
include("./Config/connection.php");
if (!isset($_SESSION['user_id'])) {
  header('location:index.php');
}


?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Edit Profile</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

	<script type= "text/javascript" src="../vendor/countries.js"></script>
	<style>
	.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>


</head>

<body>

	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
                       
							<div class="col-md-12">
                            <h2 style="color:red">Please fill  this form below</h2>
								<div class="panel panel-default">
									<div class="panel-heading"><h4 style="color:red"><b>Membership registration pannel</b></h4></div>




<div class="panel-body">
<form method="POST" action="upload.php" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
	<label class="col-sm-2 control-label">Company Name<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" minlength="8" placeholder="" name="SME_Name" class="form-control" required>
	</div>

	<label class="col-sm-2 control-label">TIN_Number<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" minlength="8"  name="TIN_Number" class="form-control" required>
	</div>
	
</div>


<div class="form-group">
	<label class="col-sm-2 control-label">VAT_regNo<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="VAT_regNo" minlength="8" placeholder=""  class="form-control" required>
	</div>
	

	<label class="col-sm-2 control-label">Member_type<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<select type="text" name="Member_type" minlength="10" placeholder=""  class="form-control" required>
                    <option selected disabled value="">..choose member type..</option>
                    <option value="Non-Member">Non-Member</option>
                    <option value="Individual">Individual</option>
                    <option value="Ordinary">Ordinary</option>
                    <option value="Cooperative">Cooperative</option>
                     <option value="Affiliate">Affiliate</option>
                      <option value="Silver">Silver</option>
                      <option value="---empty---">Others</option>
        </select>
	</div>
</div>


<div class="form-group">
	<label class="col-sm-2 control-label">Email<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="email" minlength="8" value="<?php   $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id`='$_SESSION[user_id]'") or die(mysqli_connect_error());
         $fetch = mysqli_fetch_array($query);
         echo "" . $fetch['email'] . " "; ?>" placeholder="eg. mvc@gmail.com" name="email" class="form-control" required>
	</div>
	

	<label class="col-sm-2 control-label">Website<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text"  name="Website" class="form-control" required>
	</div>
</div>



<div class="form-group">
	<label class="col-sm-2 control-label">Telephone<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text"  minlength="10" name="Telephone" class="form-control" required>
	</div>

	<label class="col-sm-2 control-label">Sector<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="Sector" class="form-control" required>
	</div>

</div>


<div class="form-group">
	<label class="col-sm-2 control-label">Business_LicenseNo<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" minlength="10" name="Business_LicenseNo" class="form-control" required>
	</div>
	
	
	<label class="col-sm-2 control-label">Postal_Address<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="Postal_Address" class="form-control" required>
	</div>
</div>





<div class="form-group">
	<label class="col-sm-2 control-label">FullName<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" minlength="5" name="Fullname" class="form-control" required>
	</div>
	 

	 
	<label class="col-sm-2 control-label">Membership ID<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" minlength="5" name="membershipID" class="form-control" required>
	</div>
</div>


<div class="form-group">

	<label class="col-sm-2 control-label">Region<span style="color:red">*</span></label>
	<div class="col-sm-4">
	 <select  class="form-control" name="region" type="text" class="textfields" id="model" required="true">
                     <option id="0">--Select region--</option>
                              <?php
			    $select = mysqli_query($conn, "SELECT *  FROM region_tbl");
			          	while($row = mysqli_fetch_array($select)){
					$region = $row['region'];
			           	$id = $row['id'];
			                ?>
                         <option id="<?php echo $id; ?>" value="<?php echo $region; ?>"><?php echo $region; ?></option>
                          <?php } ?>
                     </select>
	</div>

	<label class="col-sm-2 control-label">District<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="district" class="form-control" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Attachment<span style="color:red">*</span></label>
	<div class="col-sm-8">
	<input type="file" name="cv_path" class="form-control" required>
	</div>
</div>



<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<button class="btn btn-primary"  type="submit" value="Submit">Submit datails</button>
	</div>
</div>

</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>
</body>
</html>
