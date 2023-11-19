<?php
  session_start();
  include('../../includes/lib.php');
  include_once('../../includes/receiver_order.php');
  include_once('../../includes/donation.php');
  include_once('../../includes/donator.php');
  include_once('../../includes/receiver.php');
  checkAdminSession();


  
  $pageTitle = lang("Add Receiver Order");
  include('../../template/header.php'); 
  $errors = array();


  if ($_SERVER['REQUEST_METHOD'] === 'POST') 
  {
    if(isset($_POST['addReceiver Order']))
    {


      $donation_id = $_POST['donation_id'];

      $donator_id = $_POST['donator_id'];

      $receiver_id = $_POST['receiver_id'];

      $order_date = $_POST['order_date'];

      if( empty($donation_id)){
        $errors[] = "<li>" . lang("Donation is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Donation is requierd") . "</li>";
        }
      if( empty($donator_id)){
        $errors[] = "<li>" . lang("Donator is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Donator is requierd") . "</li>";
        }
      if( empty($receiver_id)){
        $errors[] = "<li>" . lang("Receiver is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Receiver is requierd") . "</li>";
        }
  
      if(count($errors) == 0)
      {
        $add = addReceiverOrder(
                                    $donation_id,
                                    $donator_id,
                                    $receiver_id,
                                    $order_date,
                                    );
        if($add ==  true)
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
  }
?>

<?php include('../../template/startNavbar.php'); ?>



<!-- Content -->
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fa fa-school"></i></div>
                           <?php echo lang("Add Receiver Order"); ?>
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="index.php">
                            <i class="me-1" data-feather="arrow-left"></i>
                            <?php echo lang("Back to Receiver Orders List"); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-xl-12">
                <!-- Receiver Order details card-->
                <div class="card mb-4">
                    <div class="card-header"><?php echo lang("Receiver Order Details"); ?></div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (donation_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="donation_id"><?php echo lang("Donation"); ?></label>
                                    <select class="form-select" name="donation_id" id="donation_id" required>
                                        <option selected disabled value=""><?php echo lang("Select a Donation"); ?>:</option>
                                        <?php foreach(getAllDonations() as $Donation) { ?>
                                        <option value="<?php echo $Donation['id']; ?>"> <?php echo $Donation['name']; ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>

                                <!-- Form Group (donator_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="donator_id"><?php echo lang("Donator"); ?></label>
                                    <select class="form-select" name="donator_id" id="donator_id" required>
                                        <option selected disabled value=""><?php echo lang("Select a Donator"); ?>:</option>
                                        <?php foreach(getAllDonators() as $Donator) { ?>
                                        <option value="<?php echo $Donator['id']; ?>"> <?php echo $Donator['name']; ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>

                                <!-- Form Group (receiver_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="receiver_id"><?php echo lang("Receiver"); ?></label>
                                    <select class="form-select" name="receiver_id" id="receiver_id" required>
                                        <option selected disabled value=""><?php echo lang("Select a Receiver"); ?>:</option>
                                        <?php foreach(getAllReceivers() as $Receiver) { ?>
                                        <option value="<?php echo $Receiver['id']; ?>"> <?php echo $Receiver['name']; ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>

                                <!-- Form Group (order_date)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="order_date"><?php echo lang("Order Date"); ?></label>
                                    <input class="form-control" id="order_date" name="order_date" type="date" placeholder="<?php echo lang("Order Date"); ?>"
                                        value=""   />
                                </div>
                            </div>
                            <!-- Submit button-->
                            <button name="addReceiver Order" class="btn btn-success" type="submit"><?php echo lang("Save"); ?></button>
                            <a href="index.php" class="btn btn-danger" type="button"><?php echo lang("Back To List"); ?></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include('../../template/footer.php'); ?>



