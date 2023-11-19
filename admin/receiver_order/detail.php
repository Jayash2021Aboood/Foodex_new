<?php
  session_start();
  include('../../includes/lib.php');
  include_once('../../includes/receiver_order.php');
  include_once('../../includes/donation.php');
  include_once('../../includes/donator.php');
  include_once('../../includes/receiver.php');

  checkAdminSession();

  $pageTitle = lang("Receiver Order Details");
  $row = new ReceiverOrder(null);
  include('../../template/header.php');


  if ($_SERVER['REQUEST_METHOD'] === 'GET') 
  {

    if(isset($_GET['id']))
    {
      $id = $_GET['id'];
      $result = getReceiverOrderById($id);

      if( count( $result ) > 0)
        $row = $result[0];

      if($row == null)
      {
          $_SESSION["message"] = lang('There is No data for this id');
          $_SESSION["fail"] = lang('There is No data for this id');
      }

    }
    else
    {
      $_SESSION["message"] = lang('No data for display');
      $_SESSION["fail"] = lang('No data for display');
    }

  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') 
  {
    if(isset($_POST['deleteReceiver Order']))
    {
      if(isset($_GET['id']))
      {
        $id = $_POST['id'];
        $delete = deleteReceiverOrder($id);
        if($delete ==  true)
        {
  
          $_SESSION["message"] = lang("Receiver Order Deleted successfuly!");          
          $_SESSION["success"] = lang("Receiver Order Deleted successfuly!");          
          header('Location:'. $PATH_EMPLOYEE_RECEIVER_ORDER .'index.php');
          exit();
        }
        else
        {
          $_SESSION["message"] = lang("Error when Delete Data");
          $_SESSION["fail"] = lang("Error when Delete Data");

          $errors[] = lang("Error when Delete Data");
        }
      }
      else
      {
        $_SESSION["message"] = lang('No data for Delete');
        $_SESSION["fail"] = lang('No data for Delete');
      }
    }
    else
    {
      $_SESSION["message"] = lang('No data for Delete');
      $_SESSION["fail"] = lang('No data for Delete');
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
                            <?php echo lang("Receiver Order Details"); ?>
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
                                <input type="hidden" name="id" id="id" value="<?php echo $row['id'];?>" readonly />
                                <!-- Form Group (donation_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="donation_id"><?php echo lang("Donation"); ?></label>
                                    <select disabled class="form-select" name="donation_id" id="donation_id" required>
                                        <option disabled value=""><?php echo lang("Select a Donation"); ?>:</option>
                                        <?php foreach(getAllDonations() as $Donation) { ?>
                                        <option <?php if($row['donation_id'] == $Donation['id']) echo "selected" ?> value="<?php echo $Donation['id']; ?>"> <?php echo $Donation['name']; ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                                <!-- Form Group (donator_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="donator_id"><?php echo lang("Donator"); ?></label>
                                    <select disabled class="form-select" name="donator_id" id="donator_id" required>
                                        <option disabled value=""><?php echo lang("Select a Donator"); ?>:</option>
                                        <?php foreach(getAllDonators() as $Donator) { ?>
                                        <option <?php if($row['donator_id'] == $Donator['id']) echo "selected" ?> value="<?php echo $Donator['id']; ?>"> <?php echo $Donator['name']; ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                                <!-- Form Group (receiver_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="receiver_id"><?php echo lang("Receiver"); ?></label>
                                    <select disabled class="form-select" name="receiver_id" id="receiver_id" required>
                                        <option disabled value=""><?php echo lang("Select a Receiver"); ?>:</option>
                                        <?php foreach(getAllReceivers() as $Receiver) { ?>
                                        <option <?php if($row['receiver_id'] == $Receiver['id']) echo "selected" ?> value="<?php echo $Receiver['id']; ?>"> <?php echo $Receiver['name']; ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                                <!-- Form Group (order_date)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="order_date"><?php echo lang("Order Date"); ?></label>
                                    <input class="form-control" id="order_date" name="order_date" type="date" placeholder="<?php echo lang("Order Date"); ?>"
                                        value="<?php echo $row['order_date'];?>" readonly />
                                </div>
 
                            </div>
                            <!-- Submit button-->
                            <a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-success" type="button"><?php echo lang("Edit"); ?></a>
                            <a href="index.php" class="btn btn-primary" type="button"><?php echo lang("Back To List"); ?></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Footer -->

<?php include('../../template/footer.php'); ?>
