<?php
  session_start();
  include('../../includes/lib.php');
  include_once('../../includes/receiver.php');
  checkAdminSession();


  
  $pageTitle = lang("Add Receiver");
  include('../../template/header.php'); 
  $errors = array();


  if ($_SERVER['REQUEST_METHOD'] === 'POST') 
  {
    if(isset($_POST['addReceiver']))
    {


      $name = $_POST['name'];

      $location = $_POST['location'];

      $phone = $_POST['phone'];

      $email = $_POST['email'];

      $password = $_POST['password'];

      $active = ( isset( $_POST['active']))? 1:0;

      if( empty($name)){
        $errors[] = "<li>" . lang("Name is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Name is requierd") . "</li>";
        }
      if( empty($location)){
        $errors[] = "<li>" . lang("Location is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Location is requierd") . "</li>";
        }
      if( empty($phone)){
        $errors[] = "<li>" . lang("Phone is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Phone is requierd") . "</li>";
        }
      if( empty($email)){
        $errors[] = "<li>" . lang("Email is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Email is requierd") . "</li>";
        }
      if( empty($password)){
        $errors[] = "<li>" . lang("Password is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Password is requierd") . "</li>";
        }
  
      if(count($errors) == 0)
      {
        $add = addReceiver(
                                    $name,
                                    $location,
                                    $phone,
                                    $email,
                                    $password,
                                    $active,
                                    );
        if($add ==  true)
        {
          $_SESSION["message"] = lang("Receiver Added successfuly!");
          $_SESSION["success"] = lang("Receiver Added successfuly!");
          header('Location:'. $PATH_EMPLOYEE_RECEIVER .'index.php');
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
                           <?php echo lang("Add Receiver"); ?>
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="index.php">
                            <i class="me-1" data-feather="arrow-left"></i>
                            <?php echo lang("Back to Receivers List"); ?>
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
                <!-- Receiver details card-->
                <div class="card mb-4">
                    <div class="card-header"><?php echo lang("Receiver Details"); ?></div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (name)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="name"><?php echo lang("Name"); ?></label>
                                    <input class="form-control" id="name" name="name" type="text" placeholder="<?php echo lang("Name"); ?>"
                                        value="" required  />
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="location"><?php echo lang("Location"); ?></label>
                                    <input class="form-control" id="location" name="location" type="text" placeholder="<?php echo lang("Location"); ?>"
                                        value="" required  />
                                </div>
                                <!-- Form Group (phone)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="phone"><?php echo lang("Phone"); ?></label>
                                    <input class="form-control" id="phone" name="phone" type="tel" placeholder="<?php echo lang("Phone"); ?>"
                                        value="" required  />
                                </div>
                                <!-- Form Group (email)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="email"><?php echo lang("Email"); ?></label>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="<?php echo lang("Email"); ?>"
                                        value="" required  />
                                </div>
                                <!-- Form Group (password)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="password"><?php echo lang("Password"); ?></label>
                                    <input class="form-control" id="password" name="password" type="password" placeholder="<?php echo lang("Password"); ?>"
                                        value="" required  />
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="active" name="active"
                                        type="checkbox" />
                                    <label class="form-check-label" for="active"><?php echo lang("Active"); ?></label>
                                </div>
                            </div>
                            <!-- Submit button-->
                            <button name="addReceiver" class="btn btn-success" type="submit"><?php echo lang("Save"); ?></button>
                            <a href="index.php" class="btn btn-danger" type="button"><?php echo lang("Back To List"); ?></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include('../../template/footer.php'); ?>



