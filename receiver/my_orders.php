<?php
  session_start();
  include('../includes/lib.php');
  include_once('../includes/receiver_order.php');
  include_once('../includes/donation.php');
  include_once('../includes/donator.php');
  include_once('../includes/receiver.php');
  checkReceiverSession();

  $pageTitle = lang("My Orders");
?>

<?php include('../template/header.php'); ?>
<?php include('../template/startNavbar.php'); ?>


<!-- Start All Receiver's Donation List  -->
<!-- ================================== -->

<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="users"></i></div>
                            <?php echo lang("My Order List"); ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <?php $all = getAllOrdersByReceiverID($_SESSION["userID"]  ?? 0); ?>
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th><?php echo lang("ID"); ?></th>
                            <th><?php echo lang("Donation"); ?></th>
                            <th><?php echo lang("Details"); ?></th>
                            <th><?php echo lang("Quantity"); ?></th>
                            <th><?php echo lang("Donator"); ?></th>
                            <th><?php echo lang("Order Date"); ?></th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Donation</th>
                                            <th>Donator</th>
                                            <th>Receiver</th>
                                            <th>Order Date</th>
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
                                                    data-bs-target="#editReceiver OrderModal"><i
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
                                  <td> <?php
                                    $Donation = getDonationById($row['donation_id']) [0];
                                    echo$Donation['name']; 
                                    ?>
                            </td>
                            <td> <?php echo $Donation['details']; ?> </td>
                            <td> <?php echo $Donation['quantity']; ?> </td>

                                <td> <?php
                                    $Donator = getDonatorById($row['donator_id']) [0];
                                    echo$Donator['name']; 
                                    ?>
                            </td>
                                <td> <?php echo($row['order_date']); ?> </td>
                        </tr>
                        <?php }?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Create Receiver Order modal-->
    <div class="modal fade" id="createReceiver OrderModal" tabindex="-1" role="dialog" aria-labelledby="createReceiver OrderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createReceiver OrderModalLabel">Create New Receiver Order</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-0">
                            <label class="mb-1 small text-muted" for="formReceiver OrderName">Receiver Order
                                Name</label>
                            <input class="form-control" id="formReceiver OrderName" type="text"
                                placeholder="Enter Receiver Order name..." />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger-soft text-danger" type="button"
                        data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary-soft text-primary" type="button">Create New
                        Receiver Order</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Receiver Order modal-->
    <div class="modal fade" id="editReceiver OrderModal" tabindex="-1" role="dialog" aria-labelledby="editReceiver OrderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editReceiver OrderModalLabel">Edit Receiver Order</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-0">
                            <label class="mb-1 small text-muted" for="formReceiver OrderName">Receiver Order
                                Name</label>
                            <input class="form-control" id="formReceiver OrderName" type="text"
                                placeholder="Enter Receiver Order name..." value="Sales" />
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



<?php include('../template/footer.php'); ?>