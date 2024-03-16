<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Define the target directory to store uploaded CVs
    $uploadDir = 'uploads/';
    
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    // Check if the CV file was uploaded without errors
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
        $cvTmpName = $_FILES['cv']['tmp_name'];
        $cvName = basename($_FILES['cv']['name']);
        $cvPath = $uploadDir . $cvName;

        // Move the uploaded CV to the target directory
        if (move_uploaded_file($cvTmpName, $cvPath)) {
            // CV uploaded successfully; you can save the details to a database or perform other actions here
            echo "Application submitted successfully!";
            // Optionally, store the applicant's details in a database
            // $conn = new mysqli("localhost", "root", "", "membershipapp_db");
            // $sql = "INSERT INTO job_applications (name, email, phone, cv_path) VALUES (?, ?, ?, ?)";
            // $stmt = $conn->prepare($sql);
            // $stmt->bind_param("ssss", $name, $email, $phone, $cvPath);
            // $stmt->execute();
            // $stmt->close();
            // $conn->close();
        } else {
            echo "Error uploading CV.";
        }
    } else {
        echo "CV upload failed. Please make sure to choose a valid PDF or Word document.";
    }
} else {
    // If accessed directly, redirect back to the form
    header('Location: index.html');
}
?>
