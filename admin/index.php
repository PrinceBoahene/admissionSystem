<?php

require '../web_files/connect.php';

//SerialNo`, `Title`, `Firstname`, `Middlename`, `Lastname`, `Gender`, `DOB`, `NationalID`, `Religion`, `COB`, `Phone`, `email`,
// `nationality`, `pysicalDisability`, `ActualDisability`, `maritalStatus`, `DOA`, `password`, `serialStatus`, `admStatus
//check if serial number exist





$username = "";
$pass = "";


if(isset($_POST['submit'])){

// header("location: web_files/dashboard.php");

  $username = $_POST['username'];
$pass = $_POST['pass'];
// Query it out the serial number and the pin from DB


$sql = "SELECT * FROM adm WHERE username = '$username' AND password ='$pass'";
		$query = $con->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find Applicant serial number';
		}
		else{
			$row = $query->fetch_assoc();
			// if(password_verify($pincode, $row['password'])){
        if(is_array($row)){
        session_start();
			
        $_SESSION['username'] = $row['username'];
        $_SESSION['contact'] = $row['contact'];
//check if admstatus is pending and serial is active
header("location: dashboard.php");

// Echo $_SESSION['serialnum'];

//SerialNo`, `Title`, `Firstname`, `Middlename`, `Lastname`, `Gender`, `DOB`, `NationalID`, `Religion`, `COB`, `Phone`, `email`,
// `nationality`, `pysicalDisability`, `ActualDisability`, `maritalStatus`, `DOA`, `password`, `serialStatus`, `admStatus
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
        echo 'Incorrect pass';
			}
		}


}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<!-- index-mp-layout102:13-->
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="LearnPress | Education & Courses HTML Template" />
<meta name="keywords" content="academy, course, education, education html theme, #, learning," />


<!-- Page Title -->
<!-- <title>KsTU</title> -->
<!-- Stylesheet -->
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../css/style-main.css" rel="stylesheet" type="text/css">
<link href="../css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">



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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <h3 class="text-theme-colored mt-0 pt-5" style="text-align: center;">Undergraduate Online Application Portal</h3>
              <hr>
              <div class="row">
              </div>
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login with your Username and Password</h1>
                                    </div>
                                    <form class="user" action="index.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Serial Number..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pass" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="PIN">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input type="submit"  name="submit" class="btn btn-primary btn-user btn-block">
                                           
                                        <!-- <hr> -->
                                        
                                    </form> 
                                    <div class="text-center">
                                        <!-- <a class="small" href="forgetpassword.php">Forgot Password?</a> -->
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgetpassword.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <!-- <a class="small" href="forgetpassword.php">Forgot Password?</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
   

    </div>
     <!-- Footer -->
     <footer id="footer" class="footer bg-black-222" data-bg-img="images/footer-bg.png">
    <div class="container pt-30 pb-30">
    <div class="footer-bottom bg-black-222">
        <p style="text-align: center; color: #fff;">Copyright <?php echo date("Y"); ?> @ Kumasi Technical University</p>
    </div>
    </div>
  </footer>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>





