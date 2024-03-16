


			     <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal"
                                name="bwdatesreport">

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class="form-label">From Date</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" name="from_date" id="from_date" class="form-control"
                                            required="true"
                                            style="box-shadow: rgba(0, 0, 0, 0.15) 0px 15px 25px, rgba(0, 0, 0, 0.05) 0px 5px 10px;height:70px;border-radius:20px">
                                    </div>
                                </div>

                                <div class="row form-group" style="margin-top:50px">
                                    <div class="col col-md-3">
                                        <label for="from_date" class="form-label">To Date</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" name="to_date" class="form-control" required="true"
                                            style="box-shadow: rgba(0, 0, 0, 0.15) 0px 15px 25px, rgba(0, 0, 0, 0.05) 0px 5px 10px;height:70px;border-radius:20px">
                                        </div>
                                    </div>
                                    <br>
                                    <p style=" text-align: center;"> <button type="submit" class="btn btn-warning"
                                            name="submit" style="margin-left:200px;margin-top:50px;width:150px">Search now</button></p>
                            </form>
			   <?php
                if (isset($_POST['submit'])) {
                     $from_date = $_POST['from_date'];
                    $to_date = $_POST['to_date'];
                    ?>
                    <center>
                        <h3 style="padding-left: 100px;color:#003e6a"> Registered Members Report from
                            <?php echo $from_date ?> to
                            <?php echo $to_date ?>
                        </h3>
                    </center>
                    <hr>
                    <div class="modal-for-table" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;width:100%">
                        <div class="row">
                            <table class="table table-striped" width="100%" border="0" style="padding-left:40px;font-size:13px">
                                <thead>
                                    <tr>
                                        <th scope="col">S.No#</th>
                                        <th scope="col">SME Name</th>
                                        <th scope="col"> TIN Number</th>
                                        <th scope="col">VAT_regNo</th>
                                        <th scope="col">Member type</th>
                                        <th scope="col">Business LicenseNo</th>
                                        <th scope="col"> Member ID</th>
                                        <th scope="col">Attachment Name</th>
                                    </tr>
                      
                                </thead>
                                <?php
                                $cnt = 1;
                                $selectreport = "select * from membership_tbl where created_at  between '$from_date' and '$to_date'";
                                $result = mysqli_query($conn, $selectreport);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        foreach ($result as $row) {
                                            ?>
                                            <tbody>
                                                <tr data-expanded="true">
                                                    <td class="text-center">
                                                        <?php echo $cnt; ?>
                                                    </td>
                                                    <td class="text-center">
                                                         <?php echo $row['SME_Name'];?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo $row['TIN_Number'];?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo $row['VAT_regNo'];?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo $row['Member_type'];?>
                                                    </td>
                                                    <td  class="text-center">
                                                         <?php echo $row['Business_LicenseNo'];?>
                                                    </td>
                                                    <td  class="text-center">
                                                         <?php echo $row['membershipID'];?>
                                                    </td>
                                                    <td class="text-center">
                                                         <?php echo $row['cv_path'];?>
                                                    </td>
                                                   
                                                </tr>
                                                <?php  $cnt++ ?>
                                                
                                                <?php
                                        }
                                       
                                    }
                                } else {
                                    echo "<div class='alert alert-warning' role='alert'>No Records found  Between such date</div>";
                                }
                }
                ?>