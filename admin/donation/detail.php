<?php
  session_start();
  include('../../includes/lib.php');
  include_once('../../includes/donation.php');
  include_once('../../includes/donator.php');

  checkAdminSession();

  $pageTitle = lang("Donation Details");
  $row = new Donation(null);
  include('../../template/header.php');


  if ($_SERVER['REQUEST_METHOD'] === 'GET') 
  {

    if(isset($_GET['id']))
    {
      $id = $_GET['id'];
      $result = getDonationById($id);

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
    if(isset($_POST['deleteDonation']))
    {
      if(isset($_GET['id']))
      {
        $id = $_POST['id'];
        $delete = deleteDonation($id);
        if($delete ==  true)
        {
  
          $_SESSION["message"] = lang("Donation Deleted successfuly!");          
          $_SESSION["success"] = lang("Donation Deleted successfuly!");          
          header('Location:'. $PATH_EMPLOYEE_DONATION .'index.php');
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
                            <?php echo lang("Donation Details"); ?>
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="index.php">
                            <i class="me-1" data-feather="arrow-left"></i>
                            <?php echo lang("Back to Donations List"); ?>
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
                <!-- Donation details card-->
                <div class="card mb-4">
                    <div class="card-header"><?php echo lang("Donation Details"); ?></div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <input type="hidden" name="id" id="id" value="<?php echo $row['id'];?>" readonly />
                                <!-- Form Group (name)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="name"><?php echo lang("Name"); ?></label>
                                    <input class="form-control" id="name" name="name" type="text" placeholder="<?php echo lang("Name"); ?>"
                                        value="<?php echo $row['name'];?>" readonly />
                                </div>
                                <!-- Form Group (details)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="details"><?php echo lang("Details"); ?></label>
                                    <input class="form-control" id="details" name="details" type="text" placeholder="<?php echo lang("Details"); ?>"
                                        value="<?php echo $row['details'];?>" readonly />
                                </div>
                                <!-- Form Group (quantity)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="quantity"><?php echo lang("Quantity"); ?></label>
                                    <input class="form-control" id="quantity" name="quantity" type="text" placeholder="<?php echo lang("Quantity"); ?>"
                                        value="<?php echo $row['quantity'];?>" readonly />
                                </div>
                                <!-- Form Group (photo)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="photo"><?php echo lang("Photo"); ?></label>
                                    <input class="form-control" id="photo" name="photo" type="file" placeholder="<?php echo lang("Photo"); ?>"
                                        value="<?php echo $row['photo'];?>" readonly />
                                </div>
                                <!-- Form Group (state)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="state"><?php echo lang("State"); ?></label>
                                    <input class="form-control" id="state" name="state" type="text" placeholder="<?php echo lang("State"); ?>"
                                        value="<?php echo $row['state'];?>" readonly />
                                </div>
                                <!-- Form Group (added_date)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="added_date"><?php echo lang("Added Date"); ?></label>
                                    <input class="form-control" id="added_date" name="added_date" type="date" placeholder="<?php echo lang("Added Date"); ?>"
                                        value="<?php echo $row['added_date'];?>" readonly />
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