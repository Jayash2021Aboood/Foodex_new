<?php
  session_start();
  include('../../includes/lib.php');
  include_once('../../includes/donation.php');
  include_once('../../includes/donator.php');
  checkAdminSession();

  $pageTitle = lang("Donations");
?>

<?php include('../../template/header.php'); ?>
<?php include('../../template/startNavbar.php'); ?>


<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="users"></i></div>
                            <?php echo lang("Donation List"); ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <?php $all = getAllDonations(); ?>
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th><?php echo lang("ID"); ?></th>
                            <th><?php echo lang("Name"); ?></th>
                            <th><?php echo lang("Details"); ?></th>
                            <th><?php echo lang("Quantity"); ?></th>
                            <th><?php echo lang("Photo"); ?></th>
                            <th><?php echo lang("State"); ?></th>
                            <th><?php echo lang("Added Date"); ?></th>
                            <th><?php echo lang("Donator"); ?></th>
                            <th><?php echo lang("Actions"); ?></th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Details</th>
                                            <th>Quantity</th>
                                            <th>Photo</th>
                                            <th>State</th>
                                            <th>Added Date</th>
                                            <th>Donator</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot> -->
                    <tbody>

                        <!-- <tr> 
                                            <td>Name</td>
                                            <td>Mananger</td>
                                            <td>Mananger Phone</td>
                                            <td>Agent</td>
                                            <td>Agent Phone</td>
                                            <td>Active</td>
                                            <td>
                                                <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"
                                                    type="button" data-bs-toggle="modal"
                                                    data-bs-target="#editDonationModal"><i
                                                        data-feather="edit"></i></button>
                                                <a class="btn btn-datatable btn-icon btn-transparent-dark" href="#!"><i
                                                        data-feather="trash-2"></i></a>
                                            </td>
                                        </tr> -->
                        <?php
                                        foreach($all as $row)
                                        {

                                        ?>

                        <tr>
                                <td> <?php echo($row['id']); ?> </td>
                                  <td> <?php echo($row['name']); ?> </td>
                                  <td> <?php echo($row['details']); ?> </td>
                                  <td> <?php echo($row['quantity']); ?> </td>
                                  <td> <?php if(!empty($row['photo'])){ ?> <a href="<?php echo($PATH_PHOTOES  . $row['photo']); ?>"
                                    target="_blank">View</a>
                                 <?php }?>
                            </td>
                                <td> <?php echo($row['state']); ?> </td>
                                  <td> <?php echo($row['added_date']); ?> </td>
                                  <td> <?php
                                    $Donator = getDonatorById($row['donator_id']) [0];
                                    echo$Donator['name']; 
                                    ?>
                            </td>

                            <td>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark me-2"
                                    href="edit.php?id=<?php echo($row['id']); ?>">
                                    <i class="text-primary" data-feather="edit"></i>
                                </a>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark"
                                    href="delete.php?id=<?php echo($row['id']); ?>">
                                    <i class="text-danger" data-feather="trash-2"></i>
                                </a>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark"
                                    href="detail.php?id=<?php echo($row['id']); ?>">
                                    <i class="text-success" data-feather="eye"></i>
                                </a>
                            </td>
                        </tr>
                        <?php }?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Create Donation modal-->
    <div class="modal fade" id="createDonationModal" tabindex="-1" role="dialog" aria-labelledby="createDonationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createDonationModalLabel">Create New Donation</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-0">
                            <label class="mb-1 small text-muted" for="formDonationName">Donation
                                Name</label>
                            <input class="form-control" id="formDonationName" type="text"
                                placeholder="Enter Donation name..." />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger-soft text-danger" type="button"
                        data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary-soft text-primary" type="button">Create New
                        Donation</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Donation modal-->
    <div class="modal fade" id="editDonationModal" tabindex="-1" role="dialog" aria-labelledby="editDonationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDonationModalLabel">Edit Donation</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-0">
                            <label class="mb-1 small text-muted" for="formDonationName">Donation
                                Name</label>
                            <input class="form-control" id="formDonationName" type="text"
                                placeholder="Enter Donation name..." value="Sales" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger-soft text-danger" type="button"
                        data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary-soft text-primary" type="button">Save
                        Changes</button>
                </div>
            </div>
        </div>
    </div>
</main>




<?php include('../../template/footer.php'); ?>


