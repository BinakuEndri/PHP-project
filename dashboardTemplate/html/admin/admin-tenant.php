<?php include 'admin-menu.php' ?>
<?php include 'admin-navbar.php' ?>

<?php
$con = require "../../../PHP/database.php";

$query = "select * from tenant";

$result = mysqli_query($con, $query);
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Tenat/</span> Tenant Details
    </h4>
    <?php
    if (isset($_SESSION["Tenant_delete"])) {

        showMessage($_SESSION["Tenant_delete"], "success");
        unset($_SESSION["Tenant_delete"]);

    }
    ?>
    <?php
    if (isset($_SESSION["Tenant_delete_fail"])) {

        showMessage($_SESSION["Tenant_delete_fail"], "danger");
        unset($_SESSION["Tenant_delete_fail"]);

    }
    ?>
    <?php
    if (isset($_SESSION["Tenant_edit"])) {

        showMessage($_SESSION["Tenant_edit"], "success");
        unset($_SESSION["Tenant_edit"]);

    }
    ?>
    <?php
    if (isset($_SESSION["Tenant_edit_fail"])) {

        showMessage($_SESSION["Tenant_edit_fail"], "danger");
        unset($_SESSION["Tenant_edit_fail"]);

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
                            <th>Full Name</th>
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
                                    <?php echo $row['Tenant_ID'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Tenant_Img'] ?>
                                </td>
                                <td><strong>
                                        <?php echo $row['Tenant_FirstName'] . " " . $row['Tenant_LastName'] ?>
                                    </strong>
                                </td>
                                <td>
                                    <?php echo $row['Tenant_Username'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Tenant_Number'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Tenant_Email'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Tenant_City'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Tenant_RegisterDate'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Tenant_ModifiedDate'] ?>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form action="admin-tenant-edit.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row['Tenant_ID'] ?>">
                                                <button type="submit" class="btn btn-outline-info dropdown-item"
                                                    name="edit"><i class="bx bx-edit-alt me-1"></i>Edit</button>
                                            </form>
                                            <form action="../../../PHP/admin/tenant-delete.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row['Tenant_ID'] ?>">
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