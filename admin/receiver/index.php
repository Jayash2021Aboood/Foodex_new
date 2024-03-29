<?php
  session_start();
  include('../../includes/lib.php');
  include_once('../../includes/receiver.php');
  checkAdminSession();

  $pageTitle = lang("Receivers");
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
                            <?php echo lang("Receiver List"); ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <?php $all = getAllReceivers(); ?>
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th><?php echo lang("ID"); ?></th>
                            <th><?php echo lang("Name"); ?></th>
                            <th><?php echo lang("Location"); ?></th>
                            <th><?php echo lang("Phone"); ?></th>
                            <th><?php echo lang("Email"); ?></th>
                            <th><?php echo lang("Active"); ?></th>
                            <th><?php echo lang("Actions"); ?></th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Active</th>
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
                                                    data-bs-target="#editReceiverModal"><i
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
                                  <td> <?php echo($row['location']); ?> </td>
                                  <td> <?php echo($row['phone']); ?> </td>
                                  <td> <?php echo($row['email']); ?> </td>
                                  <td> <input type="checkbox" <?php if ($row['active'] == 1) echo 'checked'; ?>> </td>
    
                            <td>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark"
                                    href="delete.php?id=<?php echo($row['id']); ?>">
                                    <i class="text-danger" data-feather="trash-2"></i>
                                </a>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark"
                                    href="detail.php?id=<?php echo($row['id']); ?>">
                                    <i class="text-success" data-feather="eye"></i>
                                </a>
                                <?php if ($row['active'] == 0) { ?>
                                        <form method="post" >
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button name="changeStateToAccept" class="btn btn-info btn-sm" type="submit" 
                                            formaction="receiverManager.php?id=<?php echo $row['id']; ?>"> <?php echo lang("Accept"); ?>
                                            </button>
                                        </form>
                                    <?php } ?>
                                    <?php if ($row['active'] == 1) { ?>
                                        <form method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button name="changeStateToReject" class="btn btn-pink btn-sm" type="submit" 
                                            formaction="receiverManager.php?id=<?php echo $row['id']; ?>"> <?php echo lang("Reject"); ?> </button>
                                        </form>
                                    <?php } ?>


                            </td>
                        </tr>
                        <?php }?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Create Receiver modal-->
    <div class="modal fade" id="createReceiverModal" tabindex="-1" role="dialog" aria-labelledby="createReceiverModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createReceiverModalLabel">Create New Receiver</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-0">
                            <label class="mb-1 small text-muted" for="formReceiverName">Receiver
                                Name</label>
                            <input class="form-control" id="formReceiverName" type="text"
                                placeholder="Enter Receiver name..." />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger-soft text-danger" type="button"
                        data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary-soft text-primary" type="button">Create New
                        Receiver</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Receiver modal-->
    <div class="modal fade" id="editReceiverModal" tabindex="-1" role="dialog" aria-labelledby="editReceiverModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editReceiverModalLabel">Edit Receiver</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-0">
                            <label class="mb-1 small text-muted" for="formReceiverName">Receiver
                                Name</label>
                            <input class="form-control" id="formReceiverName" type="text"
                                placeholder="Enter Receiver name..." value="Sales" />
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


