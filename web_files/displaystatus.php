<?php
session_start();
require 'connect.php';




//   $title = $_POST['title'];
//   $fname= $_POST['firstname']; 
//   $mname = $_POST['middlename'];  
//   $lname = $_POST['lastname'];  
//   $gender = $_POST['gender'];  
//   $dob = $_POST['dob'];  
//   $nationID = $_POST['nationalID'];  
//   $religion = $_POST['religion'];  
//   $cob = $_POST['cob'];  
//   $phone = $_POST['phone'];  
//   $email = $_POST['email'];  
//   $nationality = $_POST['nationality'];  
//   $physicalDisabled = $_POST['physicalDisabled'];  
//   $ActualDisability = $_POST['ActualDisability'];  
//   $maritalStatus = $_POST['maritalStatus'];  
//   $doa = date('Y-m-d');
  // save codes
  



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

      <li class="nav-item ">
        <a class="nav-link" href="displayall.php"> <!-- href="bio_data.php"-->
          <i class="fas fa-fw fa-database"></i>
          <span>Application Details</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="displaystatus.php">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Application Status</span></a>
      </li>

<!-- 
      Divider -->
      <!-- <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" >
          <i class="fas fa-fw fa-tasks"></i>
          <span>Programme & Grades</span></a>
      </li> -->

      <!-- Divider -->
      <!-- <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" >
          <i class="fas fa-fw fa-envelope"></i>
          <span>Certifications</span></a>
      </li> -->

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
              <div class="col-md-12 col-md-push-1">
                <div class="bg-lightest border-1px p-30 mb-0">
                  <h3 class="text-theme-colored mt-0 "> Applications Details</h3>
                  <h4 style="text-align: center;" class="text-theme-colored mt-0 pt-5">Applicant Application Status Information</h4>
                  <h5 style="color: red;">Note: Only the university management can accept this application.</h5>
                 
           

               <?php   // query with serial number
                      //SerialNo`, `Title`, `Firstname`, `Middlename`, `Lastname`, `Gender`, `DOB`, `NationalID`, `Religion`, `COB`, `Phone`, `email`,
// `nationality`, `pysicalDisability`, `ActualDisability`, `maritalStatus`, `DOA`, `password`, `serialStatus`, `admStatus
//check if serial number exist
  $query = "SELECT * FROM candidatedetails WHERE SerialNo = $_SESSION[serialnum]";
    $result = mysqli_query($con,$query);

    if($result->num_rows < 1){
        $_SESSION['error'] = 'Cannot find Applicant serial number';
    }
    else{
        $row = $result->fetch_assoc();
        // if(password_verify($pincode, $row['password'])){
    if(is_array($row)){
    
            $_SESSION['serialnum'] = $row['SerialNo'];
 
             ?>
                  <form action="" method="post" enctype="multipart/form-data">

                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Name : </label>
                          <label style="color: blue;"><?php echo $row['Title']." " .$row['Lastname']. " ".$row['Middlename']. " ".$row['Firstname']; ?> </label>
                          
                        </div>
                      </div>
                    
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Application Date : </label>
                          <label style="color: blue;"><?php echo $row['DOA']; ?> </label>
                          
                        </div>
                      </div>
                    
                    </div>
                    <div class="row">
                      <div class="col">
                        <!-- Name input -->
                        <div class="form-outline">
                          <label class="form-label" for="form8Example3">Admission Status : </label>
                            <?php if($row['admStatus']==0){
                              ?>
                          <label class="form-label" for="form8Example3"> <a  class="btn btn-warning mb-1" >Pending</a> </label>
                 
                         
                         <?php
                            }
                          
                          else{
                            ?>
                         <label class="form-label" for="form8Example3"> <a  class="btn btn-success mb-1" >Accepted</a> </label>
                         <br><br>
                         <a  class="btn btn-primary mb-3" href="printApplication.php">Print Admission Letter</a>
                         <?php
                          } ?>
                          <!-- <input type="text" name="lastname" class="form-control" required /> -->
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col">
                        <!-- <input type="submit" name="save" value="Save and Continue" class="btn btn-primary mb-3"> -->
                        <a  class="btn btn-primary mb-3" href="displayall.php">Done</a>
                      </div>
                    </div>
                    
                  </form>
<?php
   }
}

?>

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
          <a class="btn btn-primary" href="logout.php">Logout</a>
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