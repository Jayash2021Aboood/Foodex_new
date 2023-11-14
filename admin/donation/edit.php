<?php
  session_start();

  include('../../includes/lib.php');
  include_once('../../includes/donation.php');
  include_once('../../includes/donator.php');
  checkAdminSession();

  $pageTitle = lang("Edit Donation");
  //$row = new Donation(null);
   $id =  $name =  $details =  $quantity =  $photo = $photo_old =  $state =  $added_date =  $donator_id = "";
  //$id = $name = $manager = $managerPhone = $agent = $agentPhone = $kindergarten = $earlyChildhood = $elementary = $intermediate = $secondary = $active = "";
  include('../../template/header.php'); 
  $errors = array();


  if ($_SERVER['REQUEST_METHOD'] === 'GET') 
  {
    if(isset($_GET['id']))
    {
      $_SESSION["message"] = '';
      $id = $_GET['id'];
      $result = getDonationById($id);

      if( count( $result ) > 0)
      {
        $row = $result[0];
        $id = $row['id'];
        $name = $row['name'];
        $details = $row['details'];
        $quantity = $row['quantity'];
        $photo = $row['photo'];
        $state = $row['state'];
        $added_date = $row['added_date'];
        $donator_id = $row['donator_id'];
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
    if(isset($_POST['updateDonation']))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $details = $_POST['details'];
        $quantity = $_POST['quantity'];
      $photo_old = $_POST['photo_old'];
      $photo = uploadImage('photo', DIR_PHOTOES, $photo_old);
        $state = $_POST['state'];
        $added_date = $_POST['added_date'];
        $donator_id = $_POST['donator_id'];
      if( empty($name)){
        $errors[] = "<li>" . lang("Name is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Name is requierd") . "</li>";
        }
      if( empty($details)){
        $errors[] = "<li>" . lang("Details is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Details is requierd") . "</li>";
        }
      if( empty($quantity)){
        $errors[] = "<li>" . lang("Quantity is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Quantity is requierd") . "</li>";
        }
      if( empty($photo)){
        $errors[] = "<li>" . lang("Photo is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Photo is requierd") . "</li>";
        }
      if( empty($state)){
        $errors[] = "<li>" . lang("State is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("State is requierd") . "</li>";
        }
      if( empty($donator_id)){
        $errors[] = "<li>" . lang("Donator is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Donator is requierd") . "</li>";
        }
      
      if(count($errors) == 0)
      {

        $result = getDonationById($id);
        if( count( $result ) > 0)
          $row = $result[0];
        
        $update = updateDonation( $id,  $name,  $details,  $quantity,  $photo,  $state,  $added_date,  $donator_id, );
        if($update ==  true)
        {
  
          $_SESSION["message"] = lang("Donation Updated successfuly!");
          $_SESSION["success"] = lang("Donation Updated successfuly!");
          header('Location:'. $PATH_EMPLOYEE_DONATION .'index.php');
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
                            <?php echo lang("Edit Donation"); ?>
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
                                <input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
                                <!-- Form Group (name)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="name"><?php echo lang("Name"); ?></label>
                                    <input class="form-control" id="name" name="name" type="text" placeholder="<?php echo lang("Name"); ?>"
                                        value="<?php echo $name;?>" required />
                                </div>
                                <!-- Form Group (details)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="details"><?php echo lang("Details"); ?></label>
                                    <input class="form-control" id="details" name="details" type="text" placeholder="<?php echo lang("Details"); ?>"
                                        value="<?php echo $details;?>" required />
                                </div>
                                <!-- Form Group (quantity)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="quantity"><?php echo lang("Quantity"); ?></label>
                                    <input class="form-control" id="quantity" name="quantity" type="text" placeholder="<?php echo lang("Quantity"); ?>"
                                        value="<?php echo $quantity;?>" required />
                                </div>
                                <!-- Form Group (photo)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="photo"><?php echo lang("Photo"); ?></label>
                                    <input id="photo_old" name="photo_old" type="hidden" value="<?php echo $photo;?>" />
                                    <input class="form-control" id="photo" name="photo" type="file" placeholder="<?php echo lang("Photo"); ?>"
                                        value="<?php echo $photo;?>" <?php if( !isset($photo) || empty($photo)) echo 'required';?> />
                                </div>
                                <!-- Form Group (state)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="state"><?php echo lang("State"); ?></label>
                                    <input class="form-control" id="state" name="state" type="text" placeholder="<?php echo lang("State"); ?>"
                                        value="<?php echo $state;?>" required />
                                </div>
                                <!-- Form Group (added_date)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="added_date"><?php echo lang("Added Date"); ?></label>
                                    <input class="form-control" id="added_date" name="added_date" type="date" placeholder="<?php echo lang("Added Date"); ?>"
                                        value="<?php echo $added_date;?>"  />
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
 
                            </div>
                            <!-- Submit button-->
                            <button name="updateDonation" class="btn btn-success" type="submit"><?php echo lang("Save"); ?></button>
                            <a href="index.php" class="btn btn-danger" type="button"><?php echo lang("Back To List"); ?></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include('../../template/footer.php'); ?>

