<?php
session_start();
include("./Config/connection.php");

if (isset($_GET['filename'])) {
    $file = './uploads/' . $_GET['filename'];

    if (file_exists($file)) {
        // Set the appropriate headers for file download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Content-Length: ' . filesize($file));

        // Read the file and output its contents
        readfile($file);
        exit;
    } else {
        // File not found
        echo "File not found.";
    }
} else {
    // Invalid request, no filename provided
    echo "Invalid request.";
}

?>
