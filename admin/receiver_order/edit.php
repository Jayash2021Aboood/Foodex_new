<?php
  session_start();

  include('../../includes/lib.php');
  include_once('../../includes/receiver_order.php');
  include_once('../../includes/donation.php');
  include_once('../../includes/donator.php');
  include_once('../../includes/receiver.php');
  checkAdminSession();

  $pageTitle = lang("Edit Receiver Order");
  //$row = new Receiver Order(null);
   $id =  $donation_id =  $donator_id =  $receiver_id =  $order_date = "";
  //$id = $name = $manager = $managerPhone = $agent = $agentPhone = $kindergarten = $earlyChildhood = $elementary = $intermediate = $secondary = $active = "";
  include('../../template/header.php'); 
  $errors = array();


  if ($_SERVER['REQUEST_METHOD'] === 'GET') 
  {
    if(isset($_GET['id']))
    {
      $_SESSION["message"] = '';
      $id = $_GET['id'];
      $result = getReceiver OrderById($id);

      if( count( $result ) > 0)
      {
        $row = $result[0];
        $id = $row['id'];
        $donation_id = $row['donation_id'];
        $donator_id = $row['donator_id'];
        $receiver_id = $row['receiver_id'];
        $order_date = $row['order_date'];
      }
      else
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
    if(isset($_POST['updateReceiver Order']))
    {
        $id = $_POST['id'];
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

        $result = getReceiver OrderById($id);
        if( count( $result ) > 0)
          $row = $result[0];
        
        $update = updateReceiver Order( $id,  $donation_id,  $donator_id,  $receiver_id,  $order_date, );
        if($update ==  true)
        {
  
          $_SESSION["message"] = lang("Receiver Order Updated successfuly!");
          $_SESSION["success"] = lang("Receiver Order Updated successfuly!");
          header('Location:'. $PATH_EMPLOYEE_RECEIVER ORDER .'index.php');
          exit();
        }
        else
        {
          $_SESSION["message"] = lang("Error when Update Data");
          $_SESSION["fail"] = lang("Error when Update Data");
          $errors[] = lang("Error when Update Data");
        }
        
      }
      else
      {
      }
  
    }
  }
?>

<?php include('../../template/startNavbar.php'); ?>


<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fa fa-school"></i></div>
                            <?php echo lang("Edit Receiver Order"); ?>
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
                                <input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
                                <!-- Form Group (donation_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="donation_id"><?php echo lang("Donation"); ?></label>
                                    <select class="form-select" name="donation_id" id="donation_id" required>
                                        <option disabled value=""><?php echo lang("Select a Donation"); ?>:</option>
                                        <?php foreach(getAllDonations() as $Donation) { ?>
                                        <option <?php if($donation_id == $Donation['id']) echo "selected" ?> value="<?php echo $Donation['id']; ?>"> <?php echo $Donation['name']; ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                                <!-- Form Group (donator_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="donator_id"><?php echo lang("Donator"); ?></label>
                                    <select class="form-select" name="donator_id" id="donator_id" required>
                                        <option disabled value=""><?php echo lang("Select a Donator"); ?>:</option>
                                        <?php foreach(getAllDonators() as $Donator) { ?>
                                        <option <?php if($donator_id == $Donator['id']) echo "selected" ?> value="<?php echo $Donator['id']; ?>"> <?php echo $Donator['name']; ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                                <!-- Form Group (receiver_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="receiver_id"><?php echo lang("Receiver"); ?></label>
                                    <select class="form-select" name="receiver_id" id="receiver_id" required>
                                        <option disabled value=""><?php echo lang("Select a Receiver"); ?>:</option>
                                        <?php foreach(getAllReceivers() as $Receiver) { ?>
                                        <option <?php if($receiver_id == $Receiver['id']) echo "selected" ?> value="<?php echo $Receiver['id']; ?>"> <?php echo $Receiver['name']; ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                                <!-- Form Group (order_date)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="order_date"><?php echo lang("Order Date"); ?></label>
                                    <input class="form-control" id="order_date" name="order_date" type="date" placeholder="<?php echo lang("Order Date"); ?>"
                                        value="<?php echo $order_date;?>"  />
                                </div>
 
                            </div>
                            <!-- Submit button-->
                            <button name="updateReceiver Order" class="btn btn-success" type="submit"><?php echo lang("Save"); ?></button>
                            <a href="index.php" class="btn btn-danger" type="button"><?php echo lang("Back To List"); ?></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include('../../template/footer.php'); ?>

