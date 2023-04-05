<?php include 'admin-menu.php' ?>
<?php include '../../../PHP/message.php' ?>
<?php include 'admin-navbar.php' ?>

<?php
$con = require "../../../PHP/database.php";

$query = "select * from property";


$result = mysqli_query($con, $query);
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Landlords/</span> Landlord Details
    </h4>
    <?php
    if (isset($_SESSION["Property_delete"])) {

        showMessage($_SESSION["Property_delete"], "success");
        unset($_SESSION["Property_delete"]);

    }
    ?>
    <?php
    if (isset($_SESSION["Property_delete_fail"])) {

        showMessage($_SESSION["Property_delete_fail"], "danger");
        unset($_SESSION["Property_delete_fail"]);

    }
    ?>
    <?php
    if (isset($_SESSION["Property_edit"])) {

        showMessage($_SESSION["Property_edit"], "success");
        unset($_SESSION["Property_edit"]);

    }
    ?>
    <?php
    if (isset($_SESSION["Property_edit_fail"])) {

        showMessage($_SESSION["Property_edit_fail"], "danger");
        unset($_SESSION["Property_edit_fail"]);

    }
    ?>

    <!-- Basic Layout -->
    <div class="row">
        <div class="card">
            <h5 class="card-header">Striped rows</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Number</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Rooms</th>
                            <th>Bathrooms</th>
                            <th>Size</th>
                            <th>Kichen</th>
                            <th>Rent Amount</th>
                            <th>Owner</th>
                            <th>Owner</th>


                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <?php while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <td>
                                    <?php echo $row['Property_ID'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Property_Type'] ?>
                                </td>
                                <td><strong>
                                        <?php echo $row['Property_Number'] ?>
                                    </strong>
                                </td>
                                <td>
                                    <?php echo $row['Property_City'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Property_Address'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Rooms'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Bathrooms'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Size'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Kitchen'] ?>
                                </td>
                                <td>
                                    <?php echo $row['RentAmount'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Property_Owner'] ?>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form action="admin-property-edit.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row['Property_ID'] ?>">
                                                <button type="submit" class="btn btn-outline-info dropdown-item"
                                                    name="edit"><i class="bx bx-edit-alt me-1"></i>Edit</button>
                                            </form>
                                            <form action="../../../PHP/admin/property-delete.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row['Property_ID'] ?>">
                                                <button type="submit" class="btn btn-outline-secondary dropdown-item"
                                                    name="delete"><i class="bx bx-trash me-1"></i>Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'admin-footer.php' ?>