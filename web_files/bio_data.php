<?php
session_start();
require 'connect.php';



if (isset($_POST['save'])) {
  $title = $_POST['title'];
  $fname= $_POST['firstname']; 
  $mname = $_POST['middlename'];  
  $lname = $_POST['lastname'];  
  $gender = $_POST['gender'];  
  $dob = $_POST['dob'];  
  $nationID = $_POST['nationalID'];  
  $religion = $_POST['religion'];  
  $cob = $_POST['cob'];  
  $phone = $_POST['phone'];  
  $email = $_POST['email'];  
  $nationality = $_POST['nationality'];  
  $physicalDisabled = $_POST['physicalDisabled'];  
  $ActualDisability = $_POST['ActualDisability'];  
  $maritalStatus = $_POST['maritalStatus'];  
  $doa = date('Y-m-d');
  // save codes
  // query with serial number
  $query = "SELECT SerialNo FROM candidatedetails WHERE SerialNo = '$_SESSION[serialnum]'";
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0) {
// auto generate candidate ID
$admStat = 0;

// date of application
    $insertQuery =  "UPDATE `candidatedetails` SET  `Title` = '$title', `Firstname` ='$fname', `Middlename`='$mname',
       `Lastname` = '$lname', `Gender` = '$gender', `DOB` = '$dob', `NationalID` ='$nationID', `Religion`='$religion', `COB`='$cob', `Phone` ='$phone', `email`='$email', `nationality`='$nationality', 
       `pysicalDisability`='$physicalDisabled', `ActualDisability`='$ActualDisability', `maritalStatus`='$maritalStatus', `DOA`='$doa', `admStatus` = '$admStat' WHERE SerialNo = '$_SESSION[serialnum]'";
    $insertQueryResult = mysqli_query($con, $insertQuery);
    if($insertQueryResult){
  header("location: guardian.php");
      
    }else{
      echo "check details";
    }
        
    }else echo "not saved";

} else {
  // echo "fill all the blank spaces";
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

  <title>KsTU Admission System</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
  <link href="../css/jquery-ui.min.css" rel="stylesheet" type="text/css">
  <link href="../css/animate.css" rel="stylesheet" type="text/css">
  <link href="../css/css-plugin-collections.css" rel="stylesheet" />
  <!-- CSS | menuzord megamenu skins -->
  <link id="menuzord-menu-skins" href="css/menuzord-skins/menuzord-rounded-boxed.css" rel="stylesheet" />
  <!-- CSS | Main style file -->
  <link href="../css/style-main.css" rel="stylesheet" type="text/css">
  <!-- CSS | Preloader Styles -->
  <link href="../css/preloader.css" rel="stylesheet" type="text/css">
  <!-- CSS | Custom Margin Padding Collection -->
  <link href="../css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
  <!-- CSS | Responsive media queries -->
  <link href="../css/responsive.css" rel="stylesheet" type="text/css">
  <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
  <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <!-- <i class="fas fa-laugh-wink"></i> -->
          <i class="fas fa-database"></i>

        </div>
        <div class="sidebar-brand-text mx-3">KsTU ADMISSION SYSTEM</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item active">
        <a class="nav-link" > <!-- href="bio_data.php"-->
          <i class="fas fa-fw fa-database"></i>
          <span>Bio Data</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" >
          <i class="fas fa-fw fa-envelope"></i>
          <span>Guardian Details</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" >
          <i class="fas fa-fw fa-tasks"></i>
          <span>Programme & Grades</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" >
          <i class="fas fa-fw fa-envelope"></i>
          <span>Certifications</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

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


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['lname']; ?></span>
                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->

        <div class="main-content">
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-md-push-1">
                <div class="bg-lightest border-1px p-30 mb-0">
                  <h3 class="text-theme-colored mt-0 "> Bio Data</h3>
                  <h4 style="text-align: center;" class="text-theme-colored mt-0 pt-5">Applicant Basic Information</h4>
                  <h5 style="color: red;">Note: all starred information in this section is required</h5>
                  <form action="bio_data.php" method="post" enctype="multipart/form-data">

                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Title <small style="color: red;">*</small></label>
                          <select name="title" class="form-control required">
                            <option value="select">-Select-</option required>
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Miss">Miss.</option>
                            <option value="Dr.">Dr.</option>
                            <option value="Prof. Dr.">Pro. Dr.</option>
                            <option value="Prof. Eng. Dr.">Ing. Pro. Dr.</option>
                          </select>
                        </div>
                      </div>
                      <div class="col">
                        <!-- Name input -->
                        <div class="form-outline">
                          <label class="form-label" for="form8Example4">First Name <small style="color: red;">*</small></label>
                          <input type="text" name="firstname" id="form8Example4" class="form-control" value="<?php echo $_SESSION['fname']; ?>" required />
                        </div>
                      </div>
                      <div class="col">
                        <!-- Email input -->
                        <div class="form-outline">
                          <label class="form-label" for="form8Example5">Middle Name <small style="color: red;">*</small></label>
                          <input type="text" name="middlename" class="form-control"  value="<?php echo $_SESSION['mname']; ?>" required />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <!-- Name input -->
                        <div class="form-outline">
                          <label class="form-label" for="form8Example3">Last Name <small style="color: red;">*</small></label>
                          <input type="text" name="lastname" class="form-control"  value="<?php echo $_SESSION['lname']; ?>" required />
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label><small>Gender <small style="color: red;">*</small></small></label>
                          <select name="gender" class="form-control required">
                            <option value="Female">-Select-</option required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                          </select>
                        </div>
                      </div>
                      <div class="col">
                        <!-- Email input -->
                        <div class="form-outline">
                          <label class="form-label" for="form8Example5">Date of Birth <small style="color: red;">*</small></label>
                          <input type="date" name="dob" class="form-control" required placeholder="dd/mm/year" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <!-- Name input -->
                        <div class="form-outline">
                          <label class="form-label" for="form8Example3">National ID <small style="color: red;">*</small></label>
                          <input type="text" name="nationalID" class="form-control" required />
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Religion <small style="color: red;">*</small></label>
                          <select name="religion" class="form-control required">
                            <option value="Female">-Select-</option required="required">
                            <option value="Male">Christianity</option>
                            <option value="Female">Islamic</option>
                            <option value="Other">Traditional</option>
                            <option value="Other">Other</option>
                          </select>
                        </div>
                      </div>
                      <div class="col">
                        <!-- Email input -->
                        <div class="form-outline">
                          <label class="form-label" for="form8Example5">Country of Birth <small style="color: red;">*</small></label>
                          <!-- <input type="text" name="cob" class="form-control" required /> -->
                          <select name="cob" class="form-control required">
                            <option value=""> - Select Country</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="International">Other</option>
                          </select>
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col">
                        <!-- Name input -->
                        <div class="form-outline">
                          <label class="form-label" for="form8Example3">Phone <small style="color: red;">*</small></label>
                          <input type="text" name="phone" class="form-control"  value="<?php echo $_SESSION['Phone']; ?>" required />
                        </div>
                      </div>
                      <div class="col">
                        <!-- Email input -->
                        <div class="form-outline">
                          <label class="form-label" for="form8Example5">Email <small style="color: red;">*</small></label>
                          <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" required />
                        </div>
                      </div>
                      <div class="col">
                        <!-- Email input -->
                        <div class="form-outline">
                          <label class="form-label" for="form8Example5">Nationality <small style="color: red;">*</small></label>
                          <select name="nationality" class="form-control required">
                            <option value=""> - Select Nationality</option>
                            <option value="Ghana">Ghanaian</option>
                            <option value="Nigeria">Nigerian</option>
                            <option value="International">Other</option>
                          </select>
                          <!-- <input type="text" name="nationality" class="form-control" required /> -->
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Physically Disabled <small style="color: red;">*</small></label>
                          <select name="physicalDisabled" class="form-control required">
                            <option value="Female">-Select-</option required>
                            <option value="Male">No</option>
                            <option value="Female">Yes</option>
                          </select>
                        </div>
                      </div>
                      <div class="col">
                        <!-- Name input -->
                        <div class="form-outline">
                          <label class="form-label" for="form8Example3">Actual Disability <small style="color: red;">*</small></label>
                          <input type="text" name="ActualDisability" class="form-control" required />
                        </div>
                      </div>
                      <div class="col">
                        <!-- Email input -->
                        <div class="form-outline">
                          <label class="form-label" for="form8Example5">Marital Status <small style="color: red;">*</small></label>
                          <!-- <input type="text" name="maritalStatus" class="form-control" required="required" /><br> -->
                          <select name="maritalStatus" class="form-control required">
                              <option value=""> - Select Marital Status </option>
                              <option value="Single"> Single</option>
                              <option value="Married"> Married</option>
                              <option value="Divorce"> Divorce</option>
                              <option value="other"> Other</option>
                          </select>

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <input type="submit" name="save" value="Save and Continue" class="btn btn-primary mb-3">
                        <!-- <a type="submit" class="btn btn-primary mb-3" href="guardian.php">Save and Continue</a> -->
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- </section> -->
        </div>

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
          <a class="btn btn-primary" href="../index.php">Logout</a>
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

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>