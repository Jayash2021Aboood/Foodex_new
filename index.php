<?php
  session_start();
  include('includes/lib.php');
  include('includes/donation.php');
  $pageTitle = "Home";

  ?>

<?php include('template/header.php'); ?>





<?php include('template/startNavbar.php'); ?>


<!-- donations -->
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between mt-5">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title text-primary">
                            <?php echo lang('Latest Donations'); ?>
                        </h1>
                    </div>
                    <div class="col-6 mb-3 text-start">
                        <a href="donation_list.php"> <?php echo lang("see more"); ?> →</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl">
        <!-- Nested row for non-featured blog posts-->
        <div class="row">
            <?php
                $all = getAllDonationsBySearch("",6);
                if(!(count($all) > 0)) echo /*html*/'<div class="col text-center"> <h2 class="text-danger" >No Donations Found To Display. </h2></div>'; 
                else{ 
                    foreach($all as  $row)
                    {
            ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <!-- Blog post-->
                <div class="card mb-4">
                    <a href="donation.php?id=<?php echo $row['id'] ?>"><img class="card-img-top"
                            src="<?php echo $PATH_PHOTOES . $row['photo'] ?? 'book_default.jpg'; ?>"
                            alt="<?php echo $row['photo'] ?>"></a>
                    <div class="card-body">
                        <div class="small text-muted"><?php echo $row['donator_name']; ?></div>
                        <h2 class="card-title h4"><?php echo $row['name']; ?></h2>
                        <p class="card-text"><?php echo $row['details']; ?></p>
                        <p class="card-text"><?php echo displayAvailableCount($row['quantity']); ?>
                        </p>
                        <div class="small text-muted"><?php echo $row['added_date']; ?></div>
                        <div class="text-end">
                            <a class="btn btn-primary btn-sm"
                                href="donation.php?id=<?php echo $row['id'] ?>"><?php echo lang('Read more'); ?> →</a>

                        </div>
                    </div>
                </div>
            </div>
            <?php }} ?>
        </div>
    </div>
</main>




<?php include('template/footer.php') ?>