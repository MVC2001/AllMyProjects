



<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Define the target directory to store uploaded CVs
    $uploadDir = 'uploads/';

    // Get the form data
    $SME_Name = $_POST['SME_Name'];
    $TIN_Number = $_POST['TIN_Number'];
    $VAT_regNo = $_POST['VAT_regNo'];
	$Member_type = $_POST['Member_type'];
    $email = $_POST['email'];
    $Website = $_POST['Website'];
   $Telephone = $_POST['Telephone'];
    $Sector = $_POST['Sector'];
    $Business_LicenseNo = $_POST['Business_LicenseNo'];
	$Postal_Address = $_POST['Postal_Address'];
    $Fullname = $_POST['Fullname'];
    $membershipID  = $_POST['membershipID'];
	 $region = $_POST['region'];
	  $district = $_POST['district'];



               
               // Validate TIN_Number
    if (!preg_match('/^\d{9}$/', $TIN_Number)) {
        // TIN does not match the expected format (9 digits)
        echo "Invalid TIN format. TIN must be a 9-digit number.";
    } else {
        // Create a database connection
        $conn = new mysqli("localhost", "root", "", "membershipapp_db");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

      // Check if the TIN_Number is already in the database
        $checkQuery = "SELECT TIN_Number FROM membership_tbl WHERE TIN_Number = ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bind_param("s", $TIN_Number);
        $checkStmt->execute();
        $checkStmt->store_result();
        
        if ($checkStmt->num_rows > 0) {
            // TIN_Number is already taken
            echo "TIN_Number is already registered. Please check your entry.";
        } else

    // Check if the CV file was uploaded without errors
    if (isset($_FILES['cv_path']) && $_FILES['cv_path']['error'] === UPLOAD_ERR_OK) {
        $cvTmpName = $_FILES['cv_path']['tmp_name'];
        $cvName = basename($_FILES['cv_path']['name']);
        $cvPath = $uploadDir . $cvName;

        // Move the uploaded CV to the target directory
        if (move_uploaded_file($cvTmpName, $cvPath)) {
            // CV uploaded successfully; you can save the details to a database or perform other actions here
            echo "SME information submitted successfully!";
            // Optionally, store the SME's details in a database
            // Ensure you have a MySQL database connection and replace database credentials
            $conn = new mysqli("localhost", "root", "", "membershipapp_db");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO membership_tbl (SME_Name, TIN_Number, VAT_regNo, Member_type, email, Website, Telephone, Sector, Business_LicenseNo, Postal_Address, Fullname, membershipID, region, district, cv_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
              $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssssssssss", $SME_Name, $TIN_Number, $VAT_regNo, $Member_type, $email, $Website, $Telephone, $Sector, $Business_LicenseNo, $Postal_Address, $Fullname, $membershipID, $region, $district, $cvPath);
                                               
            if ($stmt->execute()) {
                echo "SME information saved to the database.";
                header("location:payments.php");
                exit();
            } else {
                echo "Error saving SME information: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "Error uploading CV.";
        }
    } else {
        echo "CV upload failed. Please make sure to choose a valid PDF or Word document.";
    }
}
} else {
    // If accessed directly, redirect back to the form
    header('Location: registration.php');
}
?>
