<?php include 'admin-menu.php' ?>
<?php include '../../../PHP/message.php' ?>
<?php include 'admin-navbar.php' ?>

<?php
$con = require "../../../PHP/database.php";

$query = "select * from owner";

$result = mysqli_query($con, $query);

?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Landlords/</span> Landlord Details
    </h4>
    <?php
    if (isset($_SESSION["Landlord_delete"])) {

        showMessage($_SESSION["Landlord_delete"], "success");
        unset($_SESSION["Landlord_delete"]);

    }
    ?>
    <?php
    if (isset($_SESSION["Landlord_delete_fail"])) {

        showMessage($_SESSION["Landlord_delete_fail"], "danger");
        unset($_SESSION["Landlord_delete_fail"]);


    }
    ?>
    <?php
    if (isset($_SESSION["Landlord_edit"])) {

        showMessage($_SESSION["Landlord_edit"], "success");
        unset($_SESSION["Landlord_edit"]);



    }
    ?>
    <?php
    if (isset($_SESSION["Landlord_edit_fail"])) {

        showMessage($_SESSION["Landlord_edit_fail"], "danger");
        unset($_SESSION["Landlord_edit_fail"]);


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
                            <th>Landlord</th>
                            <th>Username</th>
                            <th>Number</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Registration Date</th>
                            <th>Modified Date</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <?php while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <td>
                                    <?php echo $row['Owner_ID'] ?>
                                </td>
                                <td>
                                    <img src="<?php echo "../../../uploads/landlord/" . $row['Owner_img'] ?>" height="75px"
                                        width="auto" alt="User Profile">
                                </td>
                                <td><strong>
                                        <?php echo $row['Owner_FirstName'] . " " . $row['Owner_LastName'] ?>
                                    </strong>
                                </td>
                                <td>
                                    <?php echo $row['Owner_Username'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Owner_Number'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Owner_Email'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Owner_City'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Owner_RegisterDate'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Owner_ModifiedDate'] ?>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form action="admin-landlord-edit.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row['Owner_ID'] ?>">
                                                <button type="submit" class="btn btn-outline-info dropdown-item"
                                                    name="edit"><i class="bx bx-edit-alt me-1"></i>Edit</button>
                                            </form>
                                            <form action="../../../PHP/admin/landlord-delete.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row['Owner_ID'] ?>">
                                                <button type="submit" class="btn btn-outline-secondary dropdown-item"
                                                    name="delete"><i class="bx bx-trash me-1"></i>Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                </td>

                            </tr>


                        <?php }

                            $con->close();
                            ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'admin-footer.php' ?>