<?php
session_start();

// require 'connect.php';

require '../web_files/connect.php';

// APPROVE ADMISSION
if(isset($_GET['approve'])){
    $canID = $_GET['approve'];
    $activekey = 1;

    $query = "SELECT * FROM candidatedetails WHERE id = '$canID'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
// auto generate candidate ID
// get the last Student ID and plus one
$querylastID = "SELECT * FROM candidatedetails ORDER BY id DESC LIMIT 1";
$resultlastID = mysqli_query($con, $querylastID);

if(mysqli_num_rows($resultlastID) > 0) {
    while($row2 = $resultlastID->fetch_assoc()):

        $studentNumber = intval($row2['candidateID']) + 1;

// date of application
    $updateQuery =  "UPDATE `candidatedetails` SET  `admStatus` = '$activekey', `candidateID` = '$studentNumber' WHERE id = '$canID'";
    $updateQueryResult = mysqli_query($con, $updateQuery);
    if($updateQueryResult){
        
        ///**********i*/
       
        // <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
   header("location: admissionApproval.php");

    }
endwhile;

}
else{
      echo "check details";
    }
}
}

//UNAPPROVE ADMISSION
if(isset($_GET['unapprove'])){
    $canID = $_GET['unapprove'];
    $activekey = 0;

    $query = "SELECT * FROM candidatedetails WHERE id = '$canID'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
// auto generate candidate ID
// $admStat = 1;
// date of application
    $updateQuery =  "UPDATE `candidatedetails` SET  `admStatus` = '$activekey' WHERE id = '$canID'";
    $updateQueryResult = mysqli_query($con, $updateQuery);
    if($updateQueryResult){
        
        ///**********i*/

  header("location: admissionApproval.php");
      
    }else{
      echo "check details";
    }
}
}

//UNAPPROVE ADMISSION
if(isset($_GET['delete'])){
    $canID = $_GET['delete'];
    // $activekey = 0;

    $query = "SELECT * FROM candidatedetails WHERE id = '$canID'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {

    $updateQuery =  "DELETE FROM `candidatedetails` WHERE id = '$canID'";
    $updateQueryResult = mysqli_query($con, $updateQuery);
    if($updateQueryResult){
        
        ///**********i*/

  header("location: admissionApproval.php");
      
    }else{
      echo "check details";
    }
}
}
//SerialNo`, `Title`, `Firstname`, `Middlename`, `Lastname`, `Gender`, `DOB`, `NationalID`, 
//`Religion`, `COB`, `Phone`, `email`, `nationality`, `pysicalDisability`, 
//`ActualDisability`, `maritalStatus`, `DOA`, `password`, `serialStatus`, `admStatus

//VIEW APPLICANT INFO 
if(isset($_GET['view'])){
    $canID = $_GET['view'];
    // $activekey = 0;

    $query = "SELECT * FROM candidatedetails WHERE id = '$canID'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {    
        ///**********i*/

  header("location: admissionApproval.php");
    }
    else{
      echo "check details";
    }
}


?>






<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KsTU Admission Portal</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">KsTU ADMIN <sup>1</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Applicants
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-code"></i>
                    <span>Applicant Serial</span>
                </a>
                <div id="collapseTo" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Code Activation</h6>
                        <a class="collapse-item active" href="serialNumberGenerate.php">Generate Serial #</a>
                        <a class="collapse-item active" href="serialNumberApprove.php">Approve Serial #</a>
                    </div>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtiliti" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-book"></i>
                    <span>Applicant List</span>
                </a>
                <div id="collapseUtiliti" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Applications</h6>
                        <a class="collapse-item active" href="admissionApproval.php">Applications List</a>
                        <!-- <a class="collapse-item active" href="">Admission List</a> -->
                    </div>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilitis" aria-expanded="true"
                    aria-controls="collapseUtilities">
                    <i class="fas fa-users"></i>
                    <span>Candidates</span>
                </a>
                <div id="collapseUtilitis" class="collapse " aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Approved Applications</h6>
                        <!-- <a class="collapse-item active" href="candidates.php">Candidates Applied</a> -->
                        <a class="collapse-item active" href="candidates.php">Candidates Details</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-user"></i>
                    <span>Users</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Admin Details:</h6>
                        <a class="collapse-item active" href="newuser.php">New user</a>
                        <a class="collapse-item active" href="newuserlist.php">Users list</a>
                        <!-- <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a> -->
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="logout.php" >
                <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages"> -->
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
                </a>
                <!-- <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div> -->
            </li>


            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> -->

            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for student ..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">6+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    New Applications
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2021</div>
                                        <span class="font-weight-bold">Ishmael just applied</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2021</div>
                                        10 applicants has been rejected
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2021</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">I cannot login, my serial number is invalid.</div>
                                        <div class="small text-gray-500">Prince · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I want to update my bio data, can you help me?</div>
                                        <div class="small text-gray-500">Obed Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">KsTU Online Admission Portal - Administrator</h1>
                    </div>

                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-3">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                New Applications</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $serialSstat = 0; $course = $con->query("SELECT * FROM candidatedetails where admStatus ='$serialSstat' order by id asc");  echo $course->num_rows; ?></div>
                                        </div>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                    <div class="row">
<!-- table -->
<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>Applicant List</b>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Name</th>
									<th class="text-center">Phone Number</th>
									<!-- <th class="text-center">Phone Number</th> -->
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$course = $con->query("SELECT * FROM candidatedetails order by id asc");
								while($row2 = $course->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p> <b><?php echo $row2['Middlename']." ".$row2['Lastname']." ". $row2['Firstname'] ?></b></p>
										
									</td>
                                    <td>
                                    <p><small><b><?php echo $row2['Phone'] ?></b></small></p>
                                    </td>
									<td class="text-center">
                                       <a  class="btn btn-sm btn-warning delete_course" data-toggle="modal" data-target="#viewModal" href="#">View</a>
                                       <!-- <a  class="btn btn-sm btn-warning delete_course"data-toggle="modal" data-target="#ViewModal" href="admissionApproval.php?view=<?php //echo $row['id'];  ?>">View</a> -->
                                       <!-- CHECK APPROVALS -->
                                       <?php   if($row2['admStatus'] == 0){ ?>
                                       <a  class="btn btn-sm btn-success delete_course"  href="admissionApproval.php?approve=<?php echo $row2['id'];  ?> ">Approve</a>
                                       <?php }  elseif($row2['admStatus'] == 1){?>
                                       <a  class="btn btn-sm btn-info delete_course" href="admissionApproval.php?unapprove=<?php echo $row2['id'];  ?>">Unapprove</a>
                                       <?php } ?>
                                       <a  class="btn btn-sm btn-primary delete_course" href="admissionApproval.php?edit=<?php echo $row2['id'];  ?>">Edit</a>
                                       <a  class="btn btn-sm btn-danger delete_course" href="admissionApproval.php?delete=<?php echo $row2['id'];  ?>">Delete</a>
										<!-- <button class="btn btn-sm btn-danger delete_course" type="button" data-id="<?php //echo $row['id'] ?>">Delete</button> -->
									</td>
								</tr>
   
<!-- VIEW APPLICANT INFO -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Applicant Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                               
                                                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-md-push-1">
                                <div class="bg-lightest border-1px p-30 mb-0">
                                    <!-- <h3 class="text-theme-colored mt-0 "> Applications Details</h3> <br> -->
                                    <!-- <h5 style="color: red;">Note: All submitted information cannot be updated in this section</h5> -->
                                    <h4 style="text-align: center;" class="text-theme-colored mt-0 pt-5">Applicant Basic Information</h4>



                                    <?php   // query with serial number
                                    //SerialNo`, `Title`, `Firstname`, `Middlename`, `Lastname`, `Gender`, `DOB`, `NationalID`, `Religion`, `COB`, `Phone`, `email`,
                                    // `nationality`, `pysicalDisability`, `ActualDisability`, `maritalStatus`, `DOA`, `password`, `serialStatus`, `admStatus
                                    //check if serial number exist
                                    $query = "SELECT * FROM candidatedetails WHERE SerialNo = $row2[SerialNo]";
                                    $queryguard = "SELECT * FROM guardiandetails WHERE SerialNumber = $row2[SerialNo]";
                                    $queryprog = "SELECT * FROM programme WHERE serialnum =  $row2[SerialNo]";
                                    $querycert = "SELECT * FROM certificates WHERE serialnum =  $row2[SerialNo]";

                                    $result = mysqli_query($con, $query);
                                    $resultguard = mysqli_query($con, $queryguard); //guardian query
                                    $resultprog = mysqli_query($con, $queryprog); //programme query
                                    $resultcert = mysqli_query($con, $querycert); //cert query


                                    if ($result->num_rows < 1) {
                                        $_SESSION['error'] = 'Cannot find Applicant serial number';
                                    } else {
                                        $row = $result->fetch_assoc();
                                        // if(password_verify($pincode, $row['password'])){
                                        if (is_array($row)) {

                                            $_SESSION['serialnum'] = $row['SerialNo'];

                                    ?>
                                    <div class="card mb-4 py-3 border-bottom-success">
                                <div class="card-body">
                                            <form action="" method="post" enctype="multipart/form-data">

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Name : </label>
                                                            <label style="color: blue;"><?php echo $row['Title']. " ". $row['Firstname']. " ".$row['Middlename']." ". $row['Lastname']; ?> </label>
                                                     </div>
                                                    </div>
                                            
                                                </div>
                                                <div class="row">
                                                   
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label class="form-label">Gender : </label>
                                                            <label><?php echo $row['Gender']; ?></label>
                                                   
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <!-- Email input -->
                                                        <div class="form-outline">
                                                            <label class="form-label" for="form8Example5">Date of Birth : </label>
                                                            <label class="form-label" for="form8Example5"><?php echo $row['DOB']; ?></label>
                                                            <!-- <input type="date" name="dob" class="form-control" required placeholder="dd/mm/year" /> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <!-- Name input -->
                                                        <div class="form-outline">
                                                            <label class="form-label" for="form8Example3">National ID : </label>
                                                            <label class="form-label" for="form8Example3"><?php echo $row['NationalID']; ?></label>
                                                            <!-- <input type="text" name="nationalID" class="form-control" required /> -->
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Religion : </label>
                                                            <label><?php echo $row['Religion']; ?></label>
                                               
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <!-- Email input -->
                                                        <div class="form-outline">
                                                            <label class="form-label" for="form8Example5">Country of Birth : </label>
                                                            <label class="form-label" for="form8Example5"><?php echo $row['COB']; ?></label>
                                                            <!-- <input type="text" name="cob" class="form-control" required /> -->
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <!-- Name input -->
                                                        <div class="form-outline">
                                                            <label class="form-label" for="form8Example3">Phone : </label>
                                                            <label class="form-label" for="form8Example3"><?php echo $row['Phone']; ?></label>
                                                            <!-- <input type="text" name="phone" class="form-control" required /> -->
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <!-- Email input -->
                                                        <div class="form-outline">
                                                            <label class="form-label" for="form8Example5">Email : </label>
                                                            <label class="form-label" for="form8Example5"><?php echo $row['email']; ?></label>
                                                            <!-- <input type="email" name="email" class="form-control" required /> -->
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <!-- Email input -->
                                                        <div class="form-outline">
                                                            <label class="form-label" for="form8Example5">Nationality : </label>
                                                            <label class="form-label" for="form8Example5"><?php echo $row['nationality']; ?></label>
                                                            <!-- <input type="text" name="nationality" class="form-control" required /> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label class="form-label" for="form8Example5">Physically Disabled : </label>
                                                            <label class="form-label" for="form8Example5"><?php echo $row['pysicalDisability']; ?></label>
                                                            
                              </div>
                                                    </div>
                                                    <div class="col">
                                                        <!-- Name input -->
                                                        <div class="form-outline">
                                                            <label class="form-label" for="form8Example3">Actual Disability : </label>
                                                            <label class="form-label" for="form8Example3"><?php echo $row['ActualDisability']; ?></label>
                                                            <!-- <input type="text" name="ActualDisability" class="form-control" required /> -->
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <!-- Email input -->
                                                        <div class="form-outline">
                                                            <label class="form-label" for="form8Example5">Marital Status : </label>
                                                            <label class="form-label" for="form8Example5"><?php echo $row['maritalStatus']; ?></label>
                                                            <!-- <input type="text" name="maritalStatus" class="form-control" required="required" /><br> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <!-- <input type="submit" name="save" value="Save and Continue" class="btn btn-primary mb-3"> -->
                                                        <!-- <a  class="btn btn-primary mb-3" href="dashboard.php">Done</a> -->
                                                    </div>
                                                </div>
                                            </form>
                                </div>
                                    </div>
                                        <?php
                                        }
                                    }
                                    // Guardian display
                                    if ($resultguard->num_rows < 1) {
                                        $_SESSION['error'] = 'Cannot find Applicant serial number';
                                    } else {
                                        $rowguard = $resultguard->fetch_assoc();
                                        // if(password_verify($pincode, $row['password'])){
                                        if (is_array($rowguard)) { ?>

                                            <!-- // display -->
                                            <h4 style="text-align: center;" class="text-theme-colored mt-0 pt-5">Applicant Guardian Information</h4>
                                            <!-- <h5 style="color: red;">Note: All submitted information cannot be updated in this section</h5> -->
                                            <div class="card mb-4 py-3 border-bottom-info">
                                <div class="card-body">
                                   
                                            <form action="" method="post" enctype="multipart/form-data">

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Name : </label>
                                                            <label><?php echo $rowguard['name']; ?> </label>

                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <!-- Name input -->
                                                        <div class="form-outline">
                                                            <label class="form-label" for="form8Example4">Phone Number : </label>
                                                            <label class="form-label" for="form8Example4"><?php echo $rowguard['phone']; ?></label>
                                                            <!-- <input type="text" name="firstname" id="form8Example4" class="form-control" required /> -->
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <!-- Email input -->
                                                        <div class="form-outline">
                                                            <label class="form-label" for="form8Example5">Residential Town : </label>
                                                            <label class="form-label" for="form8Example5"><?php echo $rowguard['town']; ?></label>
                                                            <!-- <input type="text" name="middlename" class="form-control" required /> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <!-- Name input -->
                                                        <div class="form-outline">
                                                            <label class="form-label" for="form8Example3">Digital Address : </label>
                                                            <label class="form-label" for="form8Example3"><?php echo $rowguard['digitalAddress']; ?></label>
                                                            <!-- <input type="text" name="lastname" class="form-control" required /> -->
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label class="form-label">House Number : </label>
                                                            <label><?php echo $rowguard['housenumber']; ?></label>

                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <!-- Email input -->
                                                        <div class="form-outline">
                                                            <label class="form-label" for="form8Example5">Street Name : </label>
                                                            <label class="form-label" for="form8Example5"><?php echo $rowguard['streetname']; ?></label>
                                                            <!-- <input type="date" name="dob" class="form-control" required placeholder="dd/mm/year" /> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                </div>
                            </div>
                                        <?php
                                        }
                                    }
                                    // programms

                                    if ($resultprog->num_rows < 1) {
                                        $_SESSION['error'] = 'Cannot find Applicant serial number';
                                    } else {
                                        $rowprog = $resultprog->fetch_assoc();
                                        // if(password_verify($pincode, $row['password'])){
                                        if (is_array($rowprog)) {  ?>

                                            <!-- // display -->
                                            <h4 style="text-align: center;" class="text-theme-colored mt-0 pt-5">Applicant Programme Information</h4>
                                            <!-- <h5 style="color: red;">Note: All submitted information cannot be updated in this section</h5> -->
                                            <div class="card mb-4 py-3 border-bottom-warning">
                                                <div class="card-body">

                                                    <form action="" method="post" enctype="multipart/form-data">

                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Entry Qualification : </label>
                                                                    <label><?php echo $rowprog['EntryQualification']; ?> </label>

                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <!-- Name input -->
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="form8Example4">First Choice : </label>
                                                                    <label class="form-label" for="form8Example4"><?php echo $rowprog['firstChoice']; ?></label>
                                                                    <!-- <input type="text" name="firstname" id="form8Example4" class="form-control" required /> -->
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <!-- Email input -->
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="form8Example5">Second Choice : </label>
                                                                    <label class="form-label" for="form8Example5"><?php echo $rowprog['secondChoice']; ?></label>
                                                                    <!-- <input type="text" name="middlename" class="form-control" required /> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <!-- Name input -->
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="form8Example3">Third Choice : </label>
                                                                    <label class="form-label" for="form8Example3"><?php echo $rowprog['thirdChoice']; ?></label>
                                                                    <!-- <input type="text" name="lastname" class="form-control" required /> -->
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="form-label">Session Preference : </label>
                                                                    <label><?php echo $rowprog['sessionPreference']; ?></label>

                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <!-- Email input -->
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="form8Example5">Program Option : </label>
                                                                    <label class="form-label" for="form8Example5"><?php echo $rowprog['programOption']; ?></label>
                                                                    <!-- <input type="date" name="dob" class="form-control" required placeholder="dd/mm/year" /> -->
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col">
                                                                <!-- Name input -->
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="form8Example3">Year of Admission : </label>
                                                                    <label class="form-label" for="form8Example3"><?php echo $rowprog['yrofAdmission']; ?></label>
                                                                    <!-- <input type="text" name="lastname" class="form-control" required /> -->
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="form-label">Previous School : </label>
                                                                    <label><?php echo $rowprog['previousSchool']; ?></label>

                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <!-- Email input -->
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="form8Example5">Program of Study : </label>
                                                                    <label class="form-label" for="form8Example5"><?php echo $rowprog['programStudy']; ?></label>
                                                                    <!-- <input type="date" name="dob" class="form-control" required placeholder="dd/mm/year" /> -->
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col">
                                                                <!-- Name input -->
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="form8Example3">Year Completed : </label>
                                                                    <label class="form-label" for="form8Example3"><?php echo $rowprog['yearcompleted']; ?></label>
                                                                    <!-- <input type="text" name="lastname" class="form-control" required /> -->
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="form-label">Class Obtained : </label>
                                                                    <label><?php echo $rowprog['classobtain']; ?></label>

                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <!-- Email input -->
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="form8Example5">Student Number : </label>
                                                                    <label class="form-label" for="form8Example5"><?php echo $rowprog['stunumber']; ?></label>
                                                                    <!-- <input type="date" name="dob" class="form-control" required placeholder="dd/mm/year" /> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                    <?php

                                        }
                                    }

                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                
                
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Done</button>
                    <!-- <a class="btn btn-primary" href="login.html">Logout</a> -->
                </div>
            </div>
        </div>
    </div>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
<!--                         
            //SerialNo`, `Title`, `Firstname`, `Middlename`, `Lastname`, `Gender`, `DOB`, `NationalID`, `Religion`, `COB`, `Phone`, `email`,
                                    // `nationality`, `pysicalDisability`, `ActualDisability`, `maritalStatus`, `DOA`, `password`, `serialStatus`, `admStatus -->
                                    
</div>

             
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website <?php echo date("Y"); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>





    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>