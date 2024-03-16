<?php

include './connection.php';

$fullName = mysqli_real_escape_string($connect, $_POST['fullName']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$password = mysqli_real_escape_string($connect, md5($_POST['password']));

// Check if email already exists
$query_check_email = "SELECT * FROM users WHERE email='$email'";
$result_check_email = mysqli_query($connect, $query_check_email);

if (mysqli_num_rows($result_check_email) > 0) {
    // Email already exists
    echo "Email already taken";
} else {                                                       
    // Insert new user
    $query = "INSERT INTO users (fullName,email,password) VALUES('$fullName','$email','$password')";
    $results = mysqli_query($connect, $query);
    if ($results > 0) {
        echo "Student registered successfully";
    } else {
        echo "Error registering student";
    }
}

?>
