<?php
session_start();

include('../../includes/lib.php');
include_once('../../includes/receiver.php');
checkAdminSession();

function acceptReceiver($id)
{
  $sql =
    "UPDATE receiver SET active = 1
      WHERE id = $id ";
  return query($sql);
}

function rejectReceiver($id)
{
  $sql =
    "UPDATE receiver SET active = 0
      WHERE id = $id ";
  return query($sql);
}


$id =  "";
// include('../../template/header.php'); 
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // =======================================================================
  // ======================== Change State To Accept =======================
  // =======================================================================

  if (isset($_POST['changeStateToAccept'])) {

    $id = $_POST['id'];


    if (empty($id)) {
      $errors[] = "<li>you must select receiver.</li>";
      $_SESSION["fail"] .= "<li>you must select receiver.</li>";
    }


    // =======================  Statrt Custom Validation code


    // =======================  End Custom  Validation code

    if (count($errors) == 0) {

      $result = getReceiverById($id);
      if (count($result) > 0)
        $row = $result[0];

      // =======================  Statrt Custom  code
      // =======================  End Custom  code

      $update = acceptReceiver($id);
      if ($update ==  true) {

        redirectToRefererSuccess("Receiver Accepted successfuly!");
      } else {
        redirectToReferer("Error when Update Data");
      }
    } else {
      redirectToRefererSuccess();
    }
  }



  // =======================================================================
  // ======================== Change State To Reject =======================
  // =======================================================================

  if (isset($_POST['changeStateToReject'])) {
    $id = $_POST['id'];


    if (empty($id)) {
      $errors[] = "<li>you must select receiver.</li>";
      $_SESSION["fail"] .= "<li>you must select receiver.</li>";
    }


    // =======================  Statrt Custom Validation code


    // =======================  End Custom  Validation code

    if (count($errors) == 0) {

      $result = getReceiverById($id);
      if (count($result) > 0)
        $row = $result[0];

      // =======================  Statrt Custom  code
      // =======================  End Custom  code

      $update = rejectReceiver($id);
      if ($update ==  true) {

        redirectToRefererSuccess("Receiver Rejected successfuly!");
      } else {
        redirectToReferer("Error when Update Data");
      }
    } else {
      redirectToRefererSuccess();
    }
  }
}

redirectToRefererSuccess();
