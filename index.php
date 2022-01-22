<?php
// create serial and PIN for all application with disable status in the database and send SMS serial & PIN
require 'web_files/connect.php';



if (isset($_POST['submitBtn'])) {

  //generate auto serial & PIN number
$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$set1 = '1234567890';
$serial = substr(str_shuffle($set1), 0, 10); //serial number
$pin = substr(str_shuffle($set), 0, 6);  //PIN


  $fname= $_POST['cname']; 
  $lname = $_POST['ltName'];
  $midname = $_POST['Midname'];  
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $formType = $_POST['formType'];

  // echo $fname . ", " . $lname . ", " . $email . ", " . $phone . ", " . $formType . ", " . $serial . ", " . $pin;
//SerialNo`, `Title`, `Firstname`, `Middlename`, `Lastname`, `Gender`, `DOB`, `NationalID`, `Religion`, `COB`, `Phone`, `email`,
// `nationality`, `pysicalDisability`, `ActualDisability`, `maritalStatus`, `DOA`, `password`, `serialStatus`, `admStatus
//check if serial number exist
$query = "SELECT SerialNo FROM candidatedetails";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
if ($serial != $row['SerialNu']) {
  // insert first Student Number for first Student
  // if($stuNum =)
  $queryCheck = "SELECT `candidateID` FROM candidatedetails";
$resultcheck = mysqli_query($con, $queryCheck);
  if(mysqli_num_rows($resultcheck) < 1) {
    $stuNumber = '0518000000';
  $insertQuery =  "INSERT INTO `candidatedetails` (`candidateID`,`SerialNo`,`Firstname`,`Middlename`,`Lastname`,`email`,`Phone`,`formtype`, `password`) VALUES 
  ('$stuNumber ','$serial','$fname', '$midname','$lname','$email','$phone','$formType', '$pin')";
  }else{
    $insertQuery =  "INSERT INTO `candidatedetails` (`SerialNo`,`Firstname`,`Middlename`,`Lastname`,`email`,`Phone`,`formtype`, `password`) VALUES 
    ('$serial','$fname', '$midname','$lname','$email','$phone','$formType', '$pin')";
  }
    $insertQueryResult = mysqli_query($con, $insertQuery);
    if($insertQueryResult){
      session_start();
      $_SESSION['serialdigit'] = $serial;
      $_SESSION['pin'] = $pin;
      $_SESSION['phone'] = $phone;

  header("location: serialPinSend.php");
      
    }else{
      echo "check details";
    }

  } //end if check serial deuplicate
}else{

}


?>





<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="shortcut icon" href="https://apply.kstu.edu.gh/public/assets/img/favicon.ico">
    <meta name="csrf-token" content="E8E2Ro49oHs9xhyvBIVHfufzfZsHyJM7F86dztKX">
    <title>Kumasi Technical University | Admissions</title>
    <meta name="description" content="Official Online Admission site for Kumasi Technical University" />

    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
    <!-- uikit -->
    <link rel="stylesheet" href="https://apply.kstu.edu.gh/public/assets/css/uikit.almost-flat.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="https://apply.kstu.edu.gh/public/libs/select2/select2.min.css" type="text/css" media="all">
    <!-- altair admin -->
    <link rel="stylesheet" href=" https://apply.kstu.edu.gh/public/assets/css/main.min.css" type="text/css" media="all">

    <link rel="stylesheet" href="https://apply.kstu.edu.gh/public/libs/sweet/sweet-alert.min.css" media="all">
        <!-- font awesome -->
    <link rel="stylesheet" href="https://apply.kstu.edu.gh/public/assets/fonts/font-awesome.min.css" media="all">

    <!-- altair admin login page -->
    <link rel="stylesheet" href="https://apply.kstu.edu.gh/public/assets/css/login_page.min.css" />
        <link rel="stylesheet" href="https://apply.kstu.edu.gh/public/chat_css/bottom.css" media="all">

</head>
<body class="login_page" id='app'>
    
<div id="payModal" class="uk-modal">
 <div class="uk-modal-dialog">
     <a class="uk-modal-close uk-close"></a>
     <div class="uk-grid uk-container-center">
       <h2>Enter your details to proceed</h2>
               <div class="uk-width-1-1">
        <!-- <h4> This feature is currently under maintenance </h4>
         <p>
           Purchase your Electronic Voucher (E-Voucher) from any networked branch of GCB Bank in Ghana.
         </p> -->
         <!-- id="ropayForm" -->
          <form action="index.php" method="POST"  class="uk-form uk-form-horizontal ">
             <fieldset data-uk-margin>
             <legend class="uk-text-danger">Enter your details to proceed</legend>
             <div class="uk-form-row">
               <label class="uk-form-label" for="cname">Firstname *</label>
               <input placeholder="e.g. John" name="cname" value="" name="firstname" type="text" required >
               <div id="fName" class="uk-hidden uk-text-danger uk-text-small uk-text-center">Firstname is required</div>
             </div>
             <div class="uk-form-row">
               <label class="uk-form-label" for="Midname">Middle Name *</label>
               <input placeholder="e.g. Kwaku" name="Midname" value="" name="Midname" type="text" >
               <div id="lName" class="uk-hidden uk-text-danger uk-text-small uk-text-center">Optional</div>
             </div>
             <div class="uk-form-row">
               <label class="uk-form-label" for="ltName">Lastname *</label>
               <input placeholder="e.g. Snow" name="ltName" value="" name="lastname" type="text" required="">
               <div id="lName" class="uk-hidden uk-text-danger uk-text-small uk-text-center">Lastname is required</div>
             </div>
             <div class="uk-form-row">
               <label class="uk-form-label" for="email">Email *</label>
               <input placeholder="e.g. john@gmail.com" name="email" name="email" value="" type="email" required="">
               <div id="custEmail" class="uk-hidden uk-text-danger uk-text-small uk-text-center">Email is missing or invalid</div>
             </div>
             <div class="uk-form-row">
               <label class="uk-form-label" for="phone">Phone Number *</label>
               <input placeholder="e.g. 055 458 1278" name="phone" value="" name="phone" type="text" required>
               <div id="custPhone" class="uk-hidden uk-text-danger uk-text-small uk-text-center">Phone Number is required</div>
             </div>
             <div class="uk-form-row">
               <label class="uk-form-label" for="formType">Form Type *</label>
               <select class="" name="formType" value="" name="form_type" required >
                 <option value="">-- Select --</option>
                 <option value="HND">Undergraduate Applicant (GHc100.00)</option>
                 <option value="PGT">Postgraduate Applicant (GHc200.00)</option>
                 
               </select>
               <div id="formTypeHelp" class="uk-hidden uk-text-danger uk-text-small uk-text-center">Form Type is required</div>
             </div>
             <div class="uk-form-row ">
               <br>
               <div class="uk-text-middle">
                 <!-- <input type="hidden" name="_token" value="E8E2Ro49oHs9xhyvBIVHfufzfZsHyJM7F86dztKX"> -->
                 <input name="submitBtn" type="submit" value="Submit" class="uk-button uk-button-success uk-width-1-1">
               </div>
             </div>
             </fieldset>
         </form> 
       </div>
     </div>
 </div>
</div>
    <div class="md-card">
        <div class="md-card-content">
            <!--<div class="uk-grid"  style="align-content: center;">-->
                <!--<div class="login_heading">-->
                        <div class="login_heading">
                            <div >
                                <img src="https://apply.kstu.edu.gh/public/assets/img/new_header.png" class="thumbnail" style="height: 160px;" /> 
                            </div>
                            
                            <!--<span class="uk-text-muted uk-text-upper uk-text-small">Admissions Portal</span>-->
                        </div>
                    <!--<h3 class="">KUMASI TECHNICAL UNIVERSITY</h3>-->
                    
                <!--</div>    -->
                <!--<div class="uk-width-medium-1-2">-->
                <!--    <div class="login_heading">-->
                <!--        <img src="https://apply.kstu.edu.gh/public/assets/img/mini-banner.jpg" class="thumbnail" style="height: 80px;" />-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="uk-width-medium-1-2">-->
                <!--    <h4>KUMASI TECHNICAL UNIVERSITY</h4>-->
                <!--</div>-->
   
            <!--</div>-->

        </div>
    </div>
    <div class="uk-grid">
        
      <div class="uk-width-medium-7-12" >
        <div class="md-card">
          <div class="md-card-content">
            <div class="" style="line-height:120%; height: 1100px; padding-left: 40px; padding-top: 5px; padding-right: 40px;">

     <h3 class=""><em>INSTRUCTIONS TO APPLICANTS</em></h3>
     
     <!-- <h3 style="color:green;cursor: pointer;" onclick="window.open('https://app.ropaygh.com/verify_payment','winName','menubar=yes,scrollbars=yes,resizable=yes,width=800,height=900')">Click Here To Retrieve Evoucher Bought</h3> -->
     <!-- <h3>A. E-VOUCHER FROM BANKS</h3>
     <p>
       Purchase Kumasi Technical University Admission Electronic Voucher (E-Voucher) from the following banks:
     </p>
        <ul>
            <li>Zenith Bank Branches</li>
            <li>Access Bank Branches</li>
            <li>Consolidated Bank Ghana Branches</li>
            <li>Universal Merchant Bank</li>
            
        </ul>
     
     <h3>B. E-VOUCHER OBTAINED FROM POST OFFICE</h3>
     <p>
       Visit any branch of Ghana Post to purchase Kumasi Technical University 
        Admission Electronic Voucher
     </p> -->
     
     <h3>A. E-VOUCHER OBTAINED FROM  MOBILE MONEY (ALL NETWORKS)</h3>
          <ol>
          <!-- payModal -->
               <li>Click on the button below, a pop up window will show for you to fill in your details.</li>
               <br>
               <li>Fill the payment platform form and select <em>The Mobile Money Type</em> from the Payment Options</li><br>
               <li>Click Submit, then an SMS and/or Email containing the E-voucher details (Serial Number and PIN) will be sent to you. In addition,<br> the E-voucher details (Serial Number and the PIN) will also be displayed on the Admission Login page. </li>
               <br><em><a href="#payModal" class="md-btn md-btn-warning md-btn md-btn-block" data-uk-modal id="getSerial">BUY SERIAL/PIN USING MOBILE MONEY</a></em>
         
              </ol>
          
<!--           
         <h3>D. E-VOUCHER FROM SHORT CODE (USSD)</h3>
         <ol>
             <li>Dial *389*610#</li>
             <li>Select purchase form</li>
             <li>Select purchase form</li>
             <li>Select the type of form</li>
             <li>Enter your full name</li>
             <li>Select payment option</li>
             <li>Follow the instructions</li>
             <li>Receive E-Voucher from SMS</li>
         </ol> -->
         
      <h3> APPLICATION PROCEDURE</h3>
          <ol>
               <li>Log on to the online Admissions System with the <em>Serial Number and PIN</em>
               </li>
               <li>Follow steps on the Online Admission system to complete your application
               </li>
                <li>
                   Undergraduate Applicants are not required to submit hard copies of the online application form. However, Mature Applicants should download and print the completed online application forms and attach one passport pictures, one result slip: and submit in person below.
                </li>
                <!-- <li>
                    MTech applicants must in addition to the above, attach two (2) referees' reports.
                </li> -->
                 Post the documentation to the address below: <br>
                  <p> <strong><i>
                      COMPUTER SCIENCE DEPARTMENT <br>
                      The Department Head <br>
                      Kumasi Technical University <br>
                      Kumasi, Ashanti Region,<br>
                      Ghana</i>
                 </strong>
                 </p>
               </li>
          </ol>
          <div class="" style="padding-left: 25px;">

            <p><em>Note: All applicants should submit their application form and relevant documents in person. Follow the link below </em></p>
<a href="web_files/login.php" class="md-btn md-btn-warning md-btn md-btn-block">Click here to apply</a>
          </div>
        <!--<img src="https://apply.kstu.edu.gh/public/assets/img/HTUshortcode.jpeg" class="thumbnail" style="height: 380px;" />-->

</div>
          </div>
        </div>
      </div>
      <!-- <div class="uk-width-medium-3-10">
        <div class="md-card">
          <div class="md-card-content large-padding">
              <div class="large-padding " id="login_form" style="height: 560px;">
                  <div class="login_heading">
                      <img src="https://apply.kstu.edu.gh/public/assets/img/mini-banner.jpg" class="thumbnail" style="height: 80px;" />
                  </div>
                  
            <form method="POST" action="https://apply.kstu.edu.gh/login" accept-charset="UTF-8" autocomplete="off" id="loginForm" novalidate=""><input name="_token" type="hidden" value="E8E2Ro49oHs9xhyvBIVHfufzfZsHyJM7F86dztKX"> -->
                        <!-- <div class="uk-form-row">
                <div class="parsley-row">
                                    <select class="md-input formType" required="" id="formTypes" name="form_type"><option selected="selected" value="">Select Application Type</option><option value="UnderGraduate Applicants">UnderGraduate Applicants</option><option value="PostGraduate Applicants">PostGraduate Applicants</option></select>
                </div>
            </div> -->
            <!-- <div class="uk-form-row">
                <label for="login_serial">Serial No.</label>
                <input class="md-input" type="text" required="" id="login_serial" value="" name="serial" autocomplete="off"/>
            </div>

            <div class="uk-form-row">
                <label for="login_password">Pin Code</label>
                <input class="md-input" type="text" id="login_pin" name="pin" required="" value="" autocomplete="off"/>
            </div>
            <div class="uk-margin-medium-top">
                <button type="submit" style="background-color:#d4bd59;"  class="md-btn md-btn-primary md-btn md-btn-block loginBtn">Login </button>&nbsp; &nbsp;
                
            </div>
            <div class="uk-grid-divider"></div>
            <div>
              <a href="#payModal" style="background-color:#262a42;" class="md-btn md-btn-warning md-btn md-btn-block" data-uk-modal id="getSerial">GET SERIAL/PIN</a>
            </div>
              <div class="uk-grid-divider"></div>
              <a href="https://apply.kstu.edu.gh/applicant" style="background-color:#ed4b11;" class="md-btn md-btn-success md-btn md-btn-block" >Check Admission Status</a>
              <div class="uk-grid-divider"></div>
              
              
              </form>
            </div>
          </div>
        </div>
      </div> -->
      <!--<span class="bottom-right box effect8"><a href="http://icubicle.net/support/1c3efe34d385a51928" target="_blank"><span>&nbsp;Need help? Chat now!</span><img src="https://apply.kstu.edu.gh/public/chat_css/chat_image.jpeg" width="70" height="40"></a></span>-->
    </div>

    <!-- <p style="font-size:14px; padding-top:25px;" align='center' ><small>  <a href='http://www.ropatsystems.com' target='_blank'>Designed by Ropat Systems</a></small></p> -->
    <!-- common functions -->
    <script src="https://apply.kstu.edu.gh/public/assets/js/common.js"></script>
    <!-- uikit functions -->
    <script src="https://apply.kstu.edu.gh/public/assets/js/uikit_custom.js"></script>
    <!-- altair common functions/helpers -->
    <script src="https://apply.kstu.edu.gh/public/assets/js/altair_admin_common.js"></script>
    <!-- altair login page functions -->
	   <script src="https://apply.kstu.edu.gh/public/assets/js/login.min.js"></script>
     <script src="https://apply.kstu.edu.gh/public/libs/select2/select2.full.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
     var modal = UIkit.modal("#infoModal", {bgclose: false});
     //modal.show();
     $('#okBtn').click(function(){
       $('#closer').trigger('click');
     });
     $('.formType').select2();
     $('.loginBtn').click(function(){
       altair_helpers.content_preloader_show();
     });
     $('#ropayForm').submit(function(etv){
       etv.preventDefault();
       $('#submitBtn').html('');
       $('#submitBtn').html('<i class="fa fa-cog fa-spin"></i> Processing ...');
       var formData = new FormData($(this)[0]);
       var Action = $("#ropayForm").attr('action');
       $.ajax({
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           type: "POST",
           url: Action,
           data : formData,
           processData: false,
           contentType: false,
           async: false,
         }).done( function( data, textStatus, jqXHR ) { // data will come from the update method
           $('#submitBtn').html('');
           $('#submitBtn').html('<i class="fa fa-paper-plane"></i> Get Started');
           if (data.code === 1) {
             if (data.url !== null || data.url !== undefined) {
                 setTimeout(function() {
                 window.location.href = data.url;
               }, 4000);
             }
           }
           else if (data.code === 3) {
               $('#custPhone').removeClass('uk-hidden');
               $('#custPhone').text('Invalid Phone Format');
               $('#phone').addClass('uk-form-danger');
               return false;
           }
           else if (data.code === 5) {
               $('#custEmail').removeClass('uk-hidden');
               $('#custEmail').text('Email already used');
               $('#email').addClass('uk-form-danger');
               return false;
           }
           else{
              UIkit.modal.alert("Something went wrong! Please refresh the page and try again");
           }

         }).fail( function( jqXHR ) {
            if (jqXHR.status === 422 ) {
              var resp = jqXHR.responseJSON;
              console.log(resp);
              $.each(resp, function(idx, elem){
                console.log(idx);
                if (idx === 'firstname') {
                  $('#fName').removeClass('uk-hidden');
                  $('#cname').addClass('uk-form-danger');
                }
                if (idx === 'lastname') {
                  $('#lName').removeClass('uk-hidden');
                  $('#ltName').addClass('uk-form-danger');
                }
                if (idx === 'email') {
                  $('#custEmail').removeClass('uk-hidden');
                  $('#email').addClass('uk-form-danger');
                }
                if (idx === 'phone') {
                  $('#custPhone').removeClass('uk-hidden');
                  $('#phone').addClass('uk-form-danger');
                }
                if (idx === 'form_type') {
                  $('#formTypeHelp').removeClass('uk-hidden');
                  $('#formType').addClass('uk-form-danger');
                }
              });
            }
            else {
              UIkit.modal.alert("Something went wrong! Please refresh the page and try again");
            }
         });
     });
     $('#ropayForm45555').submit(function(etv){
       etv.preventDefault();
       var formData = new FormData($(this)[0]);
       var Action = $("#ropayForm").attr('action');
       $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           type: "POST",
           url: Action,
           data : formData,
           processData: false,
           contentType: false,
           async: false,
           success: function (data){
               altair_helpers.content_preloader_hide();
               if (data.code === 1) {

               }
               else if(data.code === 3) {
                 UIkit.modal.alert('Invalid Phone Format');
                 return false;
               }
               else if(data.code === 5) {
                 UIkit.modal.alert('Email Address already used');
                 return false;
               }
               else {
                 UIkit.modal.alert('Sorry! Your request could not be handled at this time. Please try again.');
                 return false;
               }
           },
           fail: function(xhr, vdata){
             console.log(xhr);

           }
       }); //end of ajax function

     });
  });
</script>
</body>

 </html>
