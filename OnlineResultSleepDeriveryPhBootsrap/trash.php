
<?php
// Fetch data from the school_tbl
$query = "SELECT  school FROM school_tbl";
$result = mysqli_query($connect, $query);

// Check if query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($connect));
}

// Fetch data and display options
$options = "";
while ($row = mysqli_fetch_assoc($result)) {
    $school_name = $row['school'];
    $options .= "<option value='{$school_name}'>{$school_name}</option>";
}

?>

