<?php
  session_start();
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  $pageTitle = "Signin as Donator";
  include('includes/lib.php');
  include('includes/webuser.php');
  include('includes/donator.php');
   
  $errors = array();

  if ($_SERVER['REQUEST_METHOD'] === 'POST') 
  {
    if(isset($_POST['createAccount']))
    {

      $type = $_POST['type'];

      $name = $_POST['name'];

      $corporate_field = $_POST['corporate_field'];

      $phone = $_POST['phone'];

      $email = $_POST['email'];

      $password = $_POST['password'];

      $confirm_password = $_POST['confirm_password'];


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
        else
        {
            if(isUserExist($email))
            {
                $errors[] = "<li>try again with another email.</li>";
                $_SESSION["fail"] .= "<li>try again with another email.</li>";
            }
        }
      if( empty($password)){
        $errors[] = "<li>Password is requierd.</li>";
        $_SESSION["fail"] .= "<li>Password is requierd.</li>";
        }
        
        // ============================  Custom Validation
        
        if( empty($confirm_password)){
          $errors[] = "<li>confirm_password is requierd.</li>";
          $_SESSION["fail"] .= "<li>confirm_password is requierd.</li>";
          }
  
        if( $password != $confirm_password ){
          $errors[] = "<li>passwords must be matched </li>";
          $_SESSION["fail"] .= "<li>passwords must be matched </li>";
          }


      if(count($errors) == 0)
      {
        
        $webUser = addWebUser($email,'d');
        if($webUser == true)
        {
            $add = addDonator( $type, $name, $corporate_field, $phone, $email, $password, 0);
            if($add ==  true)
            {
                $donators = select("select * from donator where email like '$email' and password like '$password';");
                if(count($donators) > 0)
                {

                    if($donators[0]['active'] != true){
                        $_SESSION["message"] = "create account successfuly your account will accept in next 24 hours";
                        $_SESSION["success"] = "create account successfuly your account will accept in next 24 hours";
                        header('Location: index.php');
                        exit();
                    }

                    $_SESSION["userID"] = $donators[0]['id'];
                    $_SESSION["user"] = $email;
                    $_SESSION["userType"] = 'd';
                    $_SESSION['success'] = "Welcome ".$donators[0]['name'];
                    
                    header('Location: donator/index.php');
                    exit();
                }
            }
            else
            {
                $_SESSION["message"] = "Error when Adding Data";
                $_SESSION["fail"] = "Error when Adding Data";
                $errors[] = "Error when Adding Data";
            }
        }
        else
        {
            redirectToReferer("error When Create New Users ... contact administrator");
        }
        
      }
      else
      {
        redirectToReferer($errors);
      }
  
    }
  }
  ?>

<?php include('template/header.php'); ?>





<?php include('template/startNavbar.php'); ?>

<main>
    <div class="container-xl px-4">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <!-- Basic registration form-->
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header justify-content-center">
                        <h3 class="fw-light my-4"><?php echo lang("Create Donator Account"); ?></h3>
                    </div>
                    <div class="card-body">
                        <!-- Registration form-->
                        <form id="myForm" action="" method="POST" enctype="multipart/form-data">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (type)-->
                                <div class="col-md-6 mb-3">
                                    <label class="small mb-1" for="type"><?php echo lang("Account Type"); ?></label>
                                    <select class="form-select" name="type" id="type" required>
                                        <option selected value="individual"><?php echo lang("individual"); ?></option>
                                        <option value="corporate"><?php echo lang("corporate"); ?></option>
                                    </select>
                                </div>
                                <!-- Form Group (name)-->
                                <div class="col-md-6 mb-3">
                                    <label class="small mb-1" for="name"><?php echo lang("Name"); ?></label>
                                    <input class="form-control" id="name" name="name" type="text" placeholder="<?php echo lang("Name"); ?>"
                                        value="" required  />
                                </div>
                                <!-- Form Group (corporate_field)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="corporate_field"><?php echo lang("Corporate Field"); ?></label>
                                    <input class="form-control" id="corporate_field" name="corporate_field" type="text" placeholder="<?php echo lang("Corporate Field"); ?>"
                                        value=""   />
                                </div>
                                <!-- Form Group (phone)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="phone"><?php echo lang("Phone"); ?></label>
                                    <input class="form-control" id="phone" name="phone" type="tel" placeholder="<?php echo lang("Phone"); ?>"
                                        value="" required  />
                                </div>
                                <!-- Form Group (email)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="email"><?php echo lang("Email"); ?></label>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="<?php echo lang("Email"); ?>"
                                        value="" required  />
                                </div>
                                <!-- Form Group (password)-->
                                <div class="col-md-6 mb-3">
                                    <label class="small mb-1" for="password"><?php echo lang("Password"); ?></label>
                                    <input class="form-control" id="password" name="password" type="password" placeholder="<?php echo lang("Password"); ?>"
                                        value="" required  />
                                </div>
                                <!-- Form Group (confirm_password)-->
                                <div class="col-md-6 mb-3">
                                    <label class="small mb-1" for="confirm_password"><?php echo lang("Confirm Password"); ?></label>
                                    <input class="form-control" id="confirm_password" name="confirm_password"
                                        type="password" placeholder="<?php echo lang("Confirm Password"); ?>" value="" required />
                                </div>
                            </div>
                            <!-- Submit button-->
                            <button name="createAccount" class="btn btn-success" type="submit"><?php echo lang("Create Account"); ?></button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include('template/footer.php') ?>