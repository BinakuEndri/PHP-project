<?php include 'landlord-menu.php' ?>
<?php include '../../../PHP/message.php' ?>
<?php include 'landlord-navbar.php' ?>

<?php
$con = require "../../../PHP/database.php";
$id = $landlord["Owner_ID"];

$query = "select * from property where Property_Owner ='$id'";


$result = mysqli_query($con, $query);
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Property/</span> Property Details
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
                            <th>Image</th>
                            <th>Type</th>
                            <th>Number</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Size</th>
                            <th>Rent Amount</th>
                            <th>Action</th>

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
                                    <img src="<?php echo "../../../uploads/property/" . $row['Property_Cover'] ?>"
                                        width="100px" height="75px">
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
                                    <?php echo $row['Size'] ?>
                                </td>
                                <td>
                                    <?php echo $row['RentAmount'] ?>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form action="landlord-property-edit.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row['Property_ID'] ?>">
                                                <button type="submit" class="btn btn-outline-info dropdown-item"
                                                    name="edit"><i class="bx bx-edit-alt me-1"></i>Edit</button>
                                            </form>
                                            <form action="../../../PHP/landlord/landlord-property-delete.php" method="POST">
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

<?php include 'landlord-footer.php' ?>