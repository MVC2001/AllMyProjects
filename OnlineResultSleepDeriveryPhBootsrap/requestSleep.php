<?php
session_start();
include("./connection/include.php");

if (!isset($_SESSION['user_id'])) {
    header('location:index.php');
    exit();
}

$errors = []; // Array to store validation errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $fullName = $_POST['fullName'];
    $indexNo = $_POST['indexNo'];
    $class = $_POST['class'];
    $school =$_POST['school'];
    $clearanceForm = $_FILES['clearanceForm']['name']; // Changed attribute name to "clearanceForm"
    $clearanceFormTmpName = $_FILES['clearanceForm']['tmp_name']; // Changed attribute name to "clearanceForm"
    $clearanceFormLocation = "./uploadsv1/" . $clearanceForm; // Changed attribute name to "clearanceForm"
    move_uploaded_file($clearanceFormTmpName, $clearanceFormLocation); // Changed attribute name to "clearanceForm"
    $wented_at = $_POST['wented_at'];


  

    // Check if indexNo already exists
    $checkIndexNoQuery = mysqli_query($connect, "SELECT * FROM `request_tbl` WHERE `indexNo` = '$indexNo'"); // Changed table name to "request_tbl"
    if (mysqli_num_rows($checkIndexNoQuery) > 0) {
        $errors[] = "Error: Index Number already exist.";
    }

    // If no errors, insert data into request_tbl
    if (empty($errors)) {
        $insertQuery = mysqli_query($connect, "INSERT INTO `request_tbl` (`fullName`, `indexNo`,`class`,`school`, `clearanceForm`,`wented_at`) VALUES ('$fullName', '$indexNo','$class','$school', '$clearanceForm', '$wented_at')");

        if ($insertQuery) {
            header('Location: successMessage.php');
            exit();
        } else {
            $errors[] = "Error creating sleep record.";
        }
    }
}


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
    $school = $row['school'];
    $options .= "<option value='{$school}'>{$school}</option>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Resert password </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">


            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">

                        </div>

                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">

                                    <a href="./logout.php" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav" style="background-color:#11517c;">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">REQUEST FOR SLEEP PANEL</li><hr>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li> -->
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Back-home</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./studentporto.php">Back-now</a></li>
                    </li>

                        </ul>
                    </li>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Create new resquest for-sleep</h4>
                            <!-- Error alert -->
                                <?php if (!empty($errors)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php foreach ($errors as $error) { ?>
                                            <p><?php echo $error; ?></p>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-6 col-xxl-12">
                                <div class="basic-form">
                                    <form class="form-inline" action="" method="POST" enctype="multipart/form-data">
                        </div>


                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title text-success">These field already filled*</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                        <div class="form-row">

                                            <div class="col-sm-6 mt-2 mt-sm-0">
                                                <input name="fullName" required type="text" <?php 
                                          $select_all_roles = "select fullName from users  WHERE `user_id`='$_SESSION[user_id]'" or die(mysqli_error($connect));
                                          $result = mysqli_query($connect,$select_all_roles);
                                          $number = mysqli_num_rows($result);
                                             if ($number > 0) {
                                           while($row = mysqli_fetch_assoc($result)) { ?>
                                             value=
                                                "<?php echo $row['fullName']; ?>"
                                           <?php } } ?>
                                                
                                                class="form-control">
                                            </div>


                                             <div class="col-sm-6 mt-2 mt-sm-0">
                                                <input name="indexNo"
                                                <?php 
                                          $select_all_roles = "select indexNo from users  WHERE `user_id`='$_SESSION[user_id]'" or die(mysqli_error($connect));
                                          $result = mysqli_query($connect,$select_all_roles);
                                          $number = mysqli_num_rows($result);
                                             if ($number > 0) {
                                           while($row = mysqli_fetch_assoc($result)) { ?>
                                           value=" <?php echo $row['indexNo']; ?>"
                                                  <?php } } ?>
                                                 required type="text" class="form-control" placeholder="Enter index number eg. 0551.0072.2018">
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>

                         <div class="card">
                            <div class="card-header">
                                <h4 class="card-title text-danger">Please fil below inputs*</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">

                                        <div class="form-row">
                                            <div class="col-sm-6 mt-2 mt-sm-0">
                                                <input name="class" required type="text" class="form-control" placeholder=" Enter class you went eg. form four A">
                                            </div>
                                            <div class="col-sm-6 mt-2 mt-sm-0">
                                                  <select type="text" class="form-control" id="school" name="school">
                                            <?php echo $options; ?>
                                                </select>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Row</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">

                                        <div class="form-row">

                                            <div class="col-sm-6 mt-2 mt-sm-0">
                                               <input type="file" class="form-control" name="clearanceForm" placeholder="upload clearence form"> <!-- Changed attribute name to "clearanceForm" -->
                                            </div>
                                    
                                             <div class="col-sm-6 mt-2 mt-sm-0">
                                               <input type="text" class="form-control" name="wented_at" placeholder="Enter year you went the school eg. 2018"> <!-- Changed attribute name to "clearanceForm" -->
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">

                            <div class="card-body">
                                <div class="basic-form">

                                        <button type="submit"  class="btn btn-primary mb-2">Request now</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->



    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

</body>

</html>
