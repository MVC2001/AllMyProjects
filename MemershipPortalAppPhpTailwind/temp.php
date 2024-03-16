<form method="POST" action="upload.php" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
	<label class="col-sm-2 control-label">SME_Name<span style="color:red">*</span></label>
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
	<input type="email" minlength="8" placeholder="eg. mvc@gmail.com" name="Email" class="form-control" required>
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
	<label class="col-sm-2 control-label">Title<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" minlength="5" name="Fullname" class="form-control" required>
	</div>
	 

	 
	<label class="col-sm-2 control-label">Membership ID<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" minlength="5" name="membersipID" class="form-control" required>
	</div>
</div>


<div class="form-group">

	<label class="col-sm-2 control-label">Region<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="region" class="form-control" required>
	</div>

	<label class="col-sm-2 control-label">District<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="district" class="form-control" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Attachment<span style="color:red">*</span></label>
	<div class="col-sm-8">
	<input type="file" name="cv" class="form-control" required>
	</div>
</div>



<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<button class="btn btn-primary"  type="submit" value="Submit">Submit datails</button>
	</div>
</div>

</form>