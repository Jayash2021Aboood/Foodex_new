<?php
  session_start();

  include('../../includes/lib.php');
  include_once('../../includes/donator.php');
  checkAdminSession();

  $pageTitle = lang("Edit Donator");
  //$row = new Donator(null);
   $id =  $type =  $name =  $corporate_field =  $phone =  $email =  $password =  $active = "";
  //$id = $name = $manager = $managerPhone = $agent = $agentPhone = $kindergarten = $earlyChildhood = $elementary = $intermediate = $secondary = $active = "";
  include('../../template/header.php'); 
  $errors = array();


  if ($_SERVER['REQUEST_METHOD'] === 'GET') 
  {
    if(isset($_GET['id']))
    {
      $_SESSION["message"] = '';
      $id = $_GET['id'];
      $result = getDonatorById($id);

      if( count( $result ) > 0)
      {
        $row = $result[0];
        $id = $row['id'];
        $type = $row['type'];
        $name = $row['name'];
        $corporate_field = $row['corporate_field'];
        $phone = $row['phone'];
        $email = $row['email'];
        $password = $row['password'];
        $active = ( isset( $row['active']))? 1:0;
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
    if(isset($_POST['updateDonator']))
    {
        $id = $_POST['id'];
        $type = $_POST['type'];
        $name = $_POST['name'];
        $corporate_field = $_POST['corporate_field'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $active = ( isset( $_POST['active']))? 1:0;
      if( empty($type)){
        $errors[] = "<li>" . lang("Type is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Type is requierd") . "</li>";
        }
      if( empty($name)){
        $errors[] = "<li>" . lang("Name is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Name is requierd") . "</li>";
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

        $result = getDonatorById($id);
        if( count( $result ) > 0)
          $row = $result[0];
        
        $update = updateDonator( $id,  $type,  $name,  $corporate_field,  $phone,  $email,  $password,  $active, );
        if($update ==  true)
        {
  
          $_SESSION["message"] = lang("Donator Updated successfuly!");
          $_SESSION["success"] = lang("Donator Updated successfuly!");
          header('Location:'. $PATH_EMPLOYEE_DONATOR .'index.php');
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
                            <?php echo lang("Edit Donator"); ?>
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="index.php">
                            <i class="me-1" data-feather="arrow-left"></i>
                            <?php echo lang("Back to Donators List"); ?>
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
                <!-- Donator details card-->
                <div class="card mb-4">
                    <div class="card-header"><?php echo lang("Donator Details"); ?></div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
                                <!-- Form Group (type)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="type"><?php echo lang("Type"); ?></label>
                                    <input class="form-control" id="type" name="type" type="text" placeholder="<?php echo lang("Type"); ?>"
                                        value="<?php echo $type;?>" required />
                                </div>
                                <!-- Form Group (name)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="name"><?php echo lang("Name"); ?></label>
                                    <input class="form-control" id="name" name="name" type="text" placeholder="<?php echo lang("Name"); ?>"
                                        value="<?php echo $name;?>" required />
                                </div>
                                <!-- Form Group (corporate_field)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="corporate_field"><?php echo lang("Corporate Field"); ?></label>
                                    <input class="form-control" id="corporate_field" name="corporate_field" type="text" placeholder="<?php echo lang("Corporate Field"); ?>"
                                        value="<?php echo $corporate_field;?>"  />
                                </div>
                                <!-- Form Group (phone)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="phone"><?php echo lang("Phone"); ?></label>
                                    <input class="form-control" id="phone" name="phone" type="tel" placeholder="<?php echo lang("Phone"); ?>"
                                        value="<?php echo $phone;?>" required />
                                </div>
                                <!-- Form Group (email)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="email"><?php echo lang("Email"); ?></label>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="<?php echo lang("Email"); ?>"
                                        value="<?php echo $email;?>" required />
                                </div>
                                <!-- Form Group (password)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="password"><?php echo lang("Password"); ?></label>
                                    <input class="form-control" id="password" name="password" type="password" placeholder="<?php echo lang("Password"); ?>"
                                        value="<?php echo $password;?>" required />
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="active" name="active"
                                        type="checkbox"
                                        <?php if($active == 1) echo 'checked';?> />
                                    <label class="form-check-label" for="active"><?php echo lang("Active"); ?></label>
                                </div>
 
                            </div>
                            <!-- Submit button-->
                            <button name="updateDonator" class="btn btn-success" type="submit"><?php echo lang("Save"); ?></button>
                            <a href="index.php" class="btn btn-danger" type="button"><?php echo lang("Back To List"); ?></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include('../../template/footer.php'); ?>

