<?php
  session_start();
  include('../includes/lib.php');
  include_once('../includes/receiver_order.php');
  include_once('../includes/donation.php');
  include_once('../includes/donator.php');
  include_once('../includes/receiver.php');

  checkReceiverSession();
  
  if(!isset($_SESSION['userID'])){
    header("Location: ".$PATH_SERVER. "login.php");
    exit;
  }


  
  //$pageTitle = "Add Booking";
  //include('../template/header.php'); 
  $errors = array();


  if ($_SERVER['REQUEST_METHOD'] === 'POST') 
  {
    
    // =======================================================================
    // ======================== Customer Adding Booking ======================
    // =======================================================================
    if(isset($_POST['orderDonation']))
    {

      $donation_id = $_POST['donation_id'];

      if( empty($donation_id)){
        $errors[] = "<li>" . lang("Donation is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Donation is requierd") . "</li>";
        }

        if(count($errors) > 0)
        redirectToReferer();
      
        $donation = getDonationById($donation_id);

        if($donation == null){
          redirectToReferer("this donation does not found");
        }

      $donator_id = $donation [0] ['donator_id'];

      $receiver_id = $_SESSION['userID'];

      $order_date = date('Y-m-d H:i:s');

      if( empty($donator_id)){
        var_dump($donator_id);
        exit;
        $errors[] = "<li>" . lang("Donator is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Donator is requierd") . "</li>";
        }
      if( empty($receiver_id)){
        $errors[] = "<li>" . lang("Receiver is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Receiver is requierd") . "</li>";
        }
  


      if(count($errors) == 0)
      {
        $add = addReceiverOrder( $donation_id, $donator_id, $receiver_id, $order_date);
        $result = query("update donation set state = 'sold out' where id = $donation_id");
        if($add ==  true && $result == true)
        {
          $_SESSION["message"] = lang("Receiver Order Added successfuly!");
          $_SESSION["success"] = lang("Receiver Order Added successfuly!");
          header('Location:'. $PATH_EMPLOYEE_RECEIVER_ORDER .'index.php');
          exit();
        }
        else
        {
          $_SESSION["message"] = lang("Error when Adding Data");
          $_SESSION["fail"] = lang("Error when Adding Data");
          $errors[] = lang("Error when Adding Data");
        }
        
      }
  
    }
 
    redirectToReferer();
  }
  redirectToReferer();
?>