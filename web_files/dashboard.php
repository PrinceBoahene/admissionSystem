<?php
session_start();
    




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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Bio Data</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href=" ">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Guardian Details</span></a>
            </li>    

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-tasks"></i>
                    <span>Programme & Grades</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['lname']; ?> </span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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
                <div class="container-fluid my-auto">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                <div class="main-container">
                            <div class="row">
                              <div class="col-md-12 col-md-push-8">
                                <div class="bg-lightest border-1px p-30 mb-0">
                            <div class="container-fluid bg-white">
                    <!-- <div class="container-fluid"> -->
                        <h3 class="text-theme-colored mt-0 pt-4 text-center">Welcome to the 2021 / 2022 Kumasi Technical</h3>
                        <h4 style="text-align: center;"> University undergraduate Application</h4> </h4>
                        <p>
                        Kumasi Technical University was established in 1954 as Kumasi Technical Institute (K. T. I. ) to offer craft courses. In 1963, the Institute was converted  to a non-tertiary Polytechnic status under the Ghana Education Service to start offering, in addition, technician diploma and sub- professional courses
                        </p></p>
                        <p>
                        The Polytechnic Law, 1992 (PNDC L.321) elevated the Polytechnic to a tertiary institution to provide high calibre skilled manpower with reference to manufacturing, commerce, science and technology to act as a catalyst for technological development. As a Polytechnic it was one of the famous, elegant and vibrant Polytechnics in Ghana.
                        </p>
                        <p>
                        The Technical University Act 2016, (Act 922) converted  Kumasi Polytechnic to the present Kumasi Technical University with the  aim of providing  higher  education in engineering, applied arts, science technology based disciplines, technical and vocational training.
                        </p>
                        <p>
                            It is a spectacularly beautiful institution, which is located at the heart of the Garden city of West Africa, the capital city of the Ashanti Region of Ghana (Kumasi). It has within the period of its existence become  an important centre for the training not only for Ghana but also for other African countries.
                        </p>
                        <p>FACTS AND FIGURES <br>
Kumasi Technical University is one of Ghana's leading technical universities. It is known for its entrepreneurial character and the training 
of critical manpower needs of industry. Areas of excellence range from social sciences to engineering and the 
sciences. Here are some facts and figures about the University
                            </p>
                            <div>
                                <!-- check if applicant has applied -->
                                <?php
                                if($_SESSION['admStatus']==0){  ?>
                                    <a type="submit" class="btn btn-primary mb-3" href="bio_data.php">Click to apply</a>
                            <?php
                                    }else{ ?>
                                        <a type="submit" class="btn btn-primary mb-3" href="displayall.php">Click to see Application Details</a>
                                     <?php           
                                    }
                                ?>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>    
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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