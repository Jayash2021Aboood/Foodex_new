<?php
  session_start();
  include('../../includes/lib.php');
  include_once('../../includes/book.php');
  include_once('../../includes/author.php');
  include_once('../../includes/publisher.php');
  include_once('../../includes/section.php');
  include_once('../../includes/language.php');
  checkAdminSession();


  
  $pageTitle = lang("Add Book");
  include('../../template/header.php'); 
  $errors = array();


  if ($_SERVER['REQUEST_METHOD'] === 'POST') 
  {
    if(isset($_POST['addBook']))
    {


      $name = $_POST['name'];

      $number_copies = $_POST['number_copies'];

      $publish_date = $_POST['publish_date'];

      $detail = $_POST['detail'];

      $book_image = uploadImage('book_image',DIR_PHOTOES);

      $book_file = uploadImage('book_file',DIR_PHOTOES);

      $author_id = $_POST['author_id'];

      $publisher_id = $_POST['publisher_id'];

      $section_id = $_POST['section_id'];

      $language_id = $_POST['language_id'];

      if( empty($name)){
        $errors[] = "<li>" . lang("Name is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Name is requierd") . "</li>";
        }
      if( empty($number_copies)){
        $errors[] = "<li>" . lang("Number Copies is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Number Copies is requierd") . "</li>";
        }
      if( empty($publish_date)){
        $errors[] = "<li>" . lang("Publish Date is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Publish Date is requierd") . "</li>";
        }
      if( empty($author_id)){
        $errors[] = "<li>" . lang("Author is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Author is requierd") . "</li>";
        }
      if( empty($publisher_id)){
        $errors[] = "<li>" . lang("Publisher is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Publisher is requierd") . "</li>";
        }
      if( empty($section_id)){
        $errors[] = "<li>" . lang("Section is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Section is requierd") . "</li>";
        }
      if( empty($language_id)){
        $errors[] = "<li>" . lang("Language is requierd") . "</li>";
        $_SESSION["fail"] .= "<li>" . lang("Language is requierd") . "</li>";
        }
  
      if(count($errors) == 0)
      {
        $add = addBook(
                                    $name,
                                    $number_copies,
                                    $publish_date,
                                    $detail,
                                    $book_image,
                                    $book_file,
                                    $author_id,
                                    $publisher_id,
                                    $section_id,
                                    $language_id,
                                    );
        if($add ==  true)
        {
          $_SESSION["message"] = lang("Book Added successfuly!");
          $_SESSION["success"] = lang("Book Added successfuly!");
          header('Location:'. $PATH_ADMIN_BOOK .'index.php');
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
                           <?php echo lang("Add Book"); ?>
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="index.php">
                            <i class="me-1" data-feather="arrow-left"></i>
                            <?php echo lang("Back to Books List"); ?>
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
                <!-- Book details card-->
                <div class="card mb-4">
                    <div class="card-header"><?php echo lang("Book Details"); ?></div>
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
                                <!-- Form Group (number_copies)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="number_copies"><?php echo lang("Number Copies"); ?></label>
                                    <input class="form-control" id="number_copies" name="number_copies" type="text" placeholder="<?php echo lang("Number Copies"); ?>"
                                        value="" required  />
                                </div>
                                <!-- Form Group (publish_date)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="publish_date"><?php echo lang("Publish Date"); ?></label>
                                    <input class="form-control" id="publish_date" name="publish_date" type="date" placeholder="<?php echo lang("Publish Date"); ?>"
                                        value="" required  />
                                </div>
                                <!-- Form Group (detail)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="detail"><?php echo lang("Detail"); ?></label>
                                    <input class="form-control" id="detail" name="detail" type="text" placeholder="<?php echo lang("Detail"); ?>"
                                        value=""   />
                                </div>
                                <!-- Form Group (book_image)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="book_image"><?php echo lang("Book Image"); ?></label>
                                    <input class="form-control" id="book_image" name="book_image" type="file" placeholder="<?php echo lang("Book Image"); ?>"
                                        value=""   />
                                </div>
                                <!-- Form Group (book_file)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="book_file"><?php echo lang("Book File"); ?></label>
                                    <input class="form-control" id="book_file" name="book_file" type="file" placeholder="<?php echo lang("Book File"); ?>"
                                        value=""   />
                                </div>
                                <!-- Form Group (author_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="author_id"><?php echo lang("Author"); ?></label>
                                    <select class="form-select" name="author_id" id="author_id" required>
                                        <option selected disabled value=""><?php echo lang("Select a Author"); ?>:</option>
                                        <?php foreach(getAllAuthors() as $Author) { ?>
                                        <option value="<?php echo $Author['id']; ?>"> <?php echo $Author['name']; ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>

                                <!-- Form Group (publisher_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="publisher_id"><?php echo lang("Publisher"); ?></label>
                                    <select class="form-select" name="publisher_id" id="publisher_id" required>
                                        <option selected disabled value=""><?php echo lang("Select a Publisher"); ?>:</option>
                                        <?php foreach(getAllPublishers() as $Publisher) { ?>
                                        <option value="<?php echo $Publisher['id']; ?>"> <?php echo $Publisher['name']; ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>

                                <!-- Form Group (section_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="section_id"><?php echo lang("Section"); ?></label>
                                    <select class="form-select" name="section_id" id="section_id" required>
                                        <option selected disabled value=""><?php echo lang("Select a Section"); ?>:</option>
                                        <?php foreach(getAllSections() as $Section) { ?>
                                        <option value="<?php echo $Section['id']; ?>"> <?php echo $Section['name']; ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>

                                <!-- Form Group (language_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="language_id"><?php echo lang("Language"); ?></label>
                                    <select class="form-select" name="language_id" id="language_id" required>
                                        <option selected disabled value=""><?php echo lang("Select a Language"); ?>:</option>
                                        <?php foreach(getAllLanguages() as $Language) { ?>
                                        <option value="<?php echo $Language['id']; ?>"> <?php echo $Language['name']; ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>

                            </div>
                            <!-- Submit button-->
                            <button name="addBook" class="btn btn-success" type="submit"><?php echo lang("Save"); ?></button>
                            <a href="index.php" class="btn btn-danger" type="button"><?php echo lang("Back To List"); ?></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include('../../template/footer.php'); ?>



