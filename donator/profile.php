<?php
  session_start();

  include('../includes/lib.php');
  include_once('../includes/donator.php');
  checkDonatorSession();

  $pageTitle = "My Profile";
  
   $id =  $type =  $name = $corporate_field = $phone =  $email =  $password = "";
  
  include('../template/header.php'); 
  $errors = array();


  if ($_SERVER['REQUEST_METHOD'] === 'GET') 
  {
      $_SESSION["message"] = '';
      $id = $_SESSION['userID'];
      $result = getDonatorById($id);

      if( count( $result ) > 0)
      {
        $row = $result[0];
        $id = $_SESSION['userID'];
        $type = $row['type'];
        $name = $row['name'];
        $corporate_field = $row['corporate_field'];
        $phone = $row['phone'];
        $email = $row['email'];
        $password = $row['password'];
        
      }
      else
      {
        $_SESSION["message"] = ' There is No data for this id';
        $_SESSION["fail"] = ' There is No data for this id';
      }

  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') 
  {
    if(isset($_POST['updateDonator']))
    {
        $id = $_SESSION['userID'];
        $type = $_POST['type'];
        $name = $_POST['name'];
        $corporate_field = $_POST['corporate_field'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        
      if( empty($type)){
        $errors[] = "<li>Type is requierd.</li>";
        $_SESSION["fail"] .= "<li>Type is requierd.</li>";
        }
      if( empty($name)){
        $errors[] = "<li>Name is requierd.</li>";
        $_SESSION["fail"] .= "<li>Name is requierd.</li>";
        }
      if( empty($phone)){
        $errors[] = "<li>Phone is requierd.</li>";
        $_SESSION["fail"] .= "<li>Phone is requierd.</li>";
        }
      if( empty($email)){
        $errors[] = "<li>Email is requierd.</li>";
        $_SESSION["fail"] .= "<li>Email is requierd.</li>";
        }
      if( empty($password)){
        $errors[] = "<li>Password is requierd.</li>";
        $_SESSION["fail"] .= "<li>Password is requierd.</li>";
        }
      

      
      if(count($errors) == 0)
      {

        $result = getDonatorById($id);
        if( count( $result ) > 0)
          $row = $result[0];
          $type = $row['type'];
          $email = $row['email'];
          $active = $row['active'];
        
        $update = updateDonator( $id,  $type,  $name, $corporate_field,  $phone,  $email,  $password, $active);
        if($update ==  true)
        {
  
          $_SESSION["message"] = "Donator Updated successfuly!";
          $_SESSION["success"] = "Donator Updated successfuly!";
          header('Location:index.php');
          exit();
        }
        else
        {
          $_SESSION["message"] = "Error when Update Data";
          $_SESSION["fail"] = "Error when Update Data";
          $errors[] = "Error when Update Data";
        }
        
      }
      else
      {
        redirectToReferer();
      }
  
    }
  }
?>

<?php include('../template/startNavbar.php'); ?>


<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fa fa-school"></i></div>
                            My Profile
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="index.php">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Back to Home
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
                    <div class="card-header">My Profile Details </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
                                <!-- Form Group (type)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="type">Type</label>
                                    <input class="form-control" id="type" name="type" type="text"
                                        placeholder="Type" value="<?php echo $type;?>" required />
                                </div>
                                <!-- Form Group (name)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="name">Name</label>
                                    <input class="form-control" id="name" name="name" type="text"
                                        placeholder="Name" value="<?php echo $name;?>" required />
                                </div>
                                <!-- Form Group (corporate_field)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="corporate_field">Corporate Field</label>
                                    <input class="form-control" id="corporate_field" name="corporate_field" type="text" placeholder="Corporate_field"
                                        value="<?php echo $corporate_field;?>" />
                                </div>
                                <!-- Form Group (phone)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="phone">Phone</label>
                                    <input class="form-control" id="phone" name="phone" type="tel" placeholder="Phone"
                                        value="<?php echo $phone;?>" required />
                                </div>
                                <!-- Form Group (email)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="email">Email</label>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Email"
                                        value="<?php echo $email;?>" required readonly />
                                </div>
                                <!-- Form Group (password)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="password">Password</label>
                                    <input class="form-control" id="password" name="password" type="password"
                                        placeholder="Password" value="<?php echo $password;?>" required />
                                </div>

                               
                            </div>
                            <!-- Submit button-->
                            <button name="updateDonator" class="btn btn-success" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include('../template/footer.php'); ?>