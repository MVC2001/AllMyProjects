<?php

include './connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Check if the email exists in the database
    $sql = "SELECT * FROM users WHERE email = '".$email."'";
    $result = mysqli_query($connect, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // Update the user's password
        $updateSql = "UPDATE users SET password = '".$password."' WHERE email = '".$email."'";
        if (mysqli_query($connect, $updateSql)) {
            echo json_encode("Password reset successful");
        } else {
            echo json_encode("Error resetting password");
        }
    } else {
        echo json_encode("Email not found");
    }
} else {
    echo json_encode("Method not allowed");
}
?>
