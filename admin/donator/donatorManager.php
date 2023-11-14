<?php
session_start();

include('../../includes/lib.php');
include_once('../../includes/donator.php');
checkAdminSession();

function acceptDonator($id)
{
  $sql =
    "UPDATE donator SET active = 1
      WHERE id = $id ";
  return query($sql);
}

function rejectDonator($id)
{
  $sql =
    "UPDATE donator SET active = 0
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
      $errors[] = "<li>you must select donator.</li>";
      $_SESSION["fail"] .= "<li>you must select donator.</li>";
    }


    // =======================  Statrt Custom Validation code


    // =======================  End Custom  Validation code

    if (count($errors) == 0) {

      $result = getDonatorById($id);
      if (count($result) > 0)
        $row = $result[0];

      // =======================  Statrt Custom  code
      // =======================  End Custom  code

      $update = acceptDonator($id);
      if ($update ==  true) {

        redirectToRefererSuccess("Donator Accepted successfuly!");
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
      $errors[] = "<li>you must select donator.</li>";
      $_SESSION["fail"] .= "<li>you must select donator.</li>";
    }


    // =======================  Statrt Custom Validation code


    // =======================  End Custom  Validation code

    if (count($errors) == 0) {

      $result = getDonatorById($id);
      if (count($result) > 0)
        $row = $result[0];

      // =======================  Statrt Custom  code
      // =======================  End Custom  code

      $update = rejectDonator($id);
      if ($update ==  true) {

        redirectToRefererSuccess("Donator Rejected successfuly!");
      } else {
        redirectToReferer("Error when Update Data");
      }
    } else {
      redirectToRefererSuccess();
    }
  }
}

redirectToRefererSuccess();
