<?php
//serialPinSend.php
require("web_files/connect.php");

session_start();



require ('././Zenoph/Notify/AutoLoader.php');
use Zenoph\Notify\Enums\AuthModel;
use Zenoph\Notify\Request\NotifyRequest;
use Zenoph\Notify\Request\CreditBalanceRequest;
use Zenoph\Notify\Request\AuthRequest;
use Zenoph\Notify\Request\SMSRequest;

// $_SESSION['serial']
if(isset($_SESSION['serialdigit']) || isset($_SESSION['pin']) ){
    $serial = $_SESSION['serialdigit'];
    $pin = $_SESSION['pin'];
    $phone = $_SESSION['phone'];
   //SerialNo`, `Title`, `Firstname`, `Middlename`, `Lastname`, `Gender`, `DOB`, `NationalID`, `Religion`, `COB`, `Phone`, `email`,
// `nationality`, `pysicalDisability`, `ActualDisability`, `maritalStatus`, `DOA`, `password`, `serialStatus`, `admStatus

    // SELECT `id`, `voters_id`, `password`, `firstname`, `lastname`, `contact`, `photo` FROM `voters`
    $query = "SELECT SerialNo,password,Firstname,`Middlename`,Lastname,Phone FROM candidatedetails WHERE SerialNo = '$serial'";

if($result6 = mysqli_query($con, $query)) {

if($row = mysqli_fetch_assoc($result6)){
    if($row['Middlename'] == "") {
        $stuname = $row['Lastname']." ".$row['Firstname'];
    }else{
  $stuname = $row['Middlename']." ".$row['Lastname']." ".$row['Firstname'];
    }
    $contact = $row['Phone'];


//  set up the sms integration
try {
    // set host
    NotifyRequest::setHost('api.smsonlinegh.com');

    
      // initialise authentication request object
  $ar = new AuthRequest();

  // set API key authentication
  $ar->setAuthModel(AuthModel::API_KEY);
  $ar->setAuthApiKey("fe412a8328e39b9096207a02b3c17cb1dda55dbc885907c2f9e332c195d20c1a");

  // authenticate for auth profile
  $ap = $ar->authenticate();

   // Initialise SMS request with the authentication profile
   $sr = new SMSRequest($ap);

   // set message properties and submit
   $sr->setMessage("Dear $stuname, \r\nPlease here are your credentials for KsTU Admission Application. \r\nSerial # :  '$serial' \r\nPassword : $pin");

   $sr->setSender("KsTU");
   $sr->addDestination($phone);
   $sr->submit();
 
   // Initialise balance request with the authentication profile
   $br = new CreditBalanceRequest($ap);
   $bRes = $br->submit();
$_SESSION['success'] = 'Serial Number added successfully';
// echo 'Serial Number added successfully';
   header("location: web_files/login.php");
} 

catch (Exception $ex) {
//    echo  "SMS not sent. ".$ex->getMessage()." Check your internet Connection";
    $_SESSION['error'] =  "SMS not sent. ".$ex->getMessage()." Check your internet Connection";
   header("location: index.php");

}


            }
            else{ 
                // echo "Message sent Unsuccessfully.";
    $_SESSION['error'] ="Message sent Unsuccessfully.";
   header("location: index.php");

                }
                }else
            // echo "Query not set";
             
            $_SESSION['error']= mysqli_connect_error();
   header("location: index.php");
}
//if is not set
else
// echo "not set to the button. ". $_SESSION['serialdigit']." " .$_SESSION['pin'];
header("location: index.php");

// 
?>





