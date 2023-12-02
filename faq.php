<?php
  session_start();
  include('includes/lib.php');
  $pageTitle = "FAQ";

  ?>

<?php include('template/header.php'); ?>





<?php include('template/startNavbar.php'); ?>

<!-- محتوى الصفحة -->
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="life-buoy"></i></div>
                            <?php echo lang('FAQ! Need Help ?'); ?> 
                        </h1>
                        <div class="page-header-subtitle"><?php echo lang('What are you looking for? Our knowledge base is here to help.'); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4">
        <!-- <h4 class="mb-0 mt-5">Main Categories</h4> -->
        <hr class="mt-2 mb-4" />
        <!-- Knowledge base main category card 1-->
        <a class="card card-icon lift lift-sm mb-4" href="#">
            <div class="row g-0">
                <div class="col-auto card-icon-aside bg-primary"><i class="text-white-50" data-feather="compass"></i>
                </div>
                <div class="col">
                    <div class="card-body py-4">
                        <h5 class="card-title text-primary mb-2"><?php echo lang('What is the purpose of the platform?'); ?></h5>
                        <p class="card-text mb-1"><?php echo lang('It is a platform that acts as an intermediary between the Donator and the receiver which helps the donator to save the additional food (leftover) in a safe way and let the people who want food to take this additional food in proper way.'); ?></p>
                        <!-- <div class="small text-muted">5 articles in this category</div> -->
                    </div>
                </div>
            </div>
        </a>
        <!-- Knowledge base main category card 2-->
        <a class="card card-icon lift lift-sm mb-4" href="#">
            <div class="row g-0">
                <div class="col-auto card-icon-aside bg-secondary"><i class="text-white-50" data-feather="users"></i>
                </div>
                <div class="col">
                    <div class="card-body py-4">
                        <h5 class="card-title text-secondary mb-2"><?php echo lang('Can I log in to my account immediately?'); ?></h5>
                        <p class="card-text mb-1"><?php echo lang('as a donator and receiver you can\'t log in into your account until the admin accept it.'); ?></p>
                    </div>
                </div>
            </div>
        </a>
        <!-- Knowledge base main category card 3-->
        <a class="card card-icon lift lift-sm mb-4" href="#">
            <div class="row g-0">
                <div class="col-auto card-icon-aside bg-teal"><i class="text-white-50" data-feather="book"></i></div>
                <div class="col">
                    <div class="card-body py-4">
                        <h5 class="card-title text-teal mb-2"><?php echo lang('How do I change my password?'); ?></h5>
                        <p class="card-text mb-1"><?php echo lang('Click on your image in the corner then go to my Profiles and change the password.'); ?></p>
                    </div>
                </div>
            </div>
        </a>
        <!-- Knowledge base main category card 4-->
        <a class="card card-icon lift lift-sm mb-4" href="#">
            <div class="row g-0">
                <div class="col-auto card-icon-aside bg-primary"><i class="text-white-50" data-feather="compass"></i>
                </div>
                <div class="col">
                    <div class="card-body py-4">
                        <h5 class="card-title text-primary mb-2"><?php echo lang('How are the financial transactions in the Foodex website?'); ?></h5>
                        <p class="card-text mb-1"><?php echo lang('Our website doesn\'t ask for any financial tips or payment.'); ?></p>
                    </div>
                </div>
            </div>
        </a>

        <!-- Knowledge base main category card 1-->
        <a class="card card-icon lift lift-sm mb-4" href="#">
            <div class="row g-0">
                <div class="col-auto card-icon-aside bg-primary"><i class="text-white-50" data-feather="compass"></i>
                </div>
                <div class="col">
                    <div class="card-body py-4">
                        <h5 class="card-title text-primary mb-2"><?php echo lang('What products are available?'); ?></h5>
                        <p class="card-text mb-1"><?php echo lang('There are many foods available that you can visit the Foodex website and order from it.'); ?></p>
                        <!-- <div class="small text-muted">5 articles in this category</div> -->
                    </div>
                </div>
            </div>
        </a>
        <!-- Knowledge base main category card 2-->
        <a class="card card-icon lift lift-sm mb-4" href="#">
            <div class="row g-0">
                <div class="col-auto card-icon-aside bg-secondary"><i class="text-white-50" data-feather="users"></i>
                </div>
                <div class="col">
                    <div class="card-body py-4">
                        <h5 class="card-title text-secondary mb-2"><?php echo lang('As a donator how can I add the leftover food?'); ?></h5>
                        <p class="card-text mb-1"><?php echo lang('You can add any food items you want by clicking the “Donate” box, then specifying the food item characteristics.'); ?></p>
                    </div>
                </div>
            </div>
        </a>
        <!-- Knowledge base main category card 3-->
        <a class="card card-icon lift lift-sm mb-4" href="#">
            <div class="row g-0">
                <div class="col-auto card-icon-aside bg-teal"><i class="text-white-50" data-feather="book"></i></div>
                <div class="col">
                    <div class="card-body py-4">
                        <h5 class="card-title text-teal mb-2"><?php echo lang('Can I still add items if I confirmed the order?'); ?></h5>
                        <p class="card-text mb-1"><?php echo lang('You can\'t add more items due to the completion of order, but you can order again.'); ?></p>
                    </div>
                </div>
            </div>
        </a>
        <!-- Knowledge base main category card 4-->
        <a class="card card-icon lift lift-sm mb-4" href="#">
            <div class="row g-0">
                <div class="col-auto card-icon-aside bg-primary"><i class="text-white-50" data-feather="compass"></i>
                </div>
                <div class="col">
                    <div class="card-body py-4">
                        <h5 class="card-title text-primary mb-2"><?php echo lang('where can I find my order?'); ?></h5>
                        <p class="card-text mb-1"><?php echo lang('from your profile in the side menu (my orders).'); ?></p>
                    </div>
                </div>
            </div>
        </a>


        <!-- Knowledge base main category card 1-->
        <a class="card card-icon lift lift-sm mb-4" href="#">
            <div class="row g-0">
                <div class="col-auto card-icon-aside bg-primary"><i class="text-white-50" data-feather="compass"></i>
                </div>
                <div class="col">
                    <div class="card-body py-4">
                        <h5 class="card-title text-primary mb-2"><?php echo lang('Can I redirect my order?'); ?></h5>
                        <p class="card-text mb-1"><?php echo lang('Your orders cannot be redirected after confirming it. But you can change your location first then order.'); ?></p>
                        <!-- <div class="small text-muted">5 articles in this category</div> -->
                    </div>
                </div>
            </div>
        </a>
        <!-- Knowledge base main category card 2-->
        <a class="card card-icon lift lift-sm mb-4" href="#">
            <div class="row g-0">
                <div class="col-auto card-icon-aside bg-secondary"><i class="text-white-50" data-feather="users"></i>
                </div>
                <div class="col">
                    <div class="card-body py-4">
                        <h5 class="card-title text-secondary mb-2"><?php echo lang('How can I contact customer services?'); ?></h5>
                        <p class="card-text mb-1"><?php echo lang('in the footer (end of the page) there are email address and phone number to help you.'); ?></p>
                    </div>
                </div>
            </div>
        </a>

        <!-- Knowledge base rating-->
        <div class="text-center mt-5">
            <h4 class="mb-3"><?php echo lang('Was this page helpful?'); ?></h4>
            <div class="mb-3">
                <button class="btn btn-primary mx-2 px-3" role="button">
                    <i class="me-2" data-feather="thumbs-up"></i>
                    <?php echo lang('Yes'); ?>
                </button>
                <button class="btn btn-primary mx-2 px-3" role="button">
                    <i class="me-2" data-feather="thumbs-down"></i>
                    <?php echo lang('No'); ?>
                </button>
            </div>
            <div class="text-small text-muted"><em><?php echo lang('29 people found this page helpful so far!'); ?></em></div>
        </div>
    </div>
</main>


<?php include('template/footer.php') ?>