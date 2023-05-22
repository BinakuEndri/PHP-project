<?php include 'landlord-menu.php' ?>
<?php include 'landlord-navbar.php' ?>

<?php
$con = require "../../../PHP/database.php";
$id = $landlord["Owner_ID"];
$sql = "select *
FROM tenant
INNER JOIN property ON tenant.Tenant_Property = property.Property_ID
INNER JOIN owner ON property.Property_Owner = owner.Owner_ID
WHERE Owner_ID = '$id'";

$result = mysqli_query($con, $sql);
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Edit Tenants</span>
    </h4>


    <!-- Basic Layout -->
    <div class="row">
        <div class="card">
            <h5 class="card-header">Edit Tenants</h5>
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
                                    <img src="<?php echo "../../../uploads/tenant/" . $row['Tenant_Img'] ?>" height="75px"
                                        width="auto" alt="User Profile">
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
                                            <form action="landlord-tenant-edit.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row['Tenant_ID'] ?>">
                                                <button type="submit" class="btn btn-outline-info dropdown-item"
                                                    name="edit"><i class="bx bx-edit-alt me-1"></i>Edit</button>
                                            </form>
                                            <form action="../../../PHP/landlord/landlord-tenant-delete.php" method="POST">
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

<?php include 'landlord-footer.php' ?>