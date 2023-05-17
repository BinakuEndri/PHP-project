<?php
$con = require "../database.php";

if (!empty($_POST["id"])) {
    $id = $_POST["id"];
    $complainQuery = "select * from complains where ID = '$id' ";
    $complainResultt = mysqli_query($con, $complainQuery);

    if (mysqli_num_rows($complainResultt) == 0) {
        echo "No Complain Found";
    }

    $complainn = mysqli_fetch_assoc($complainResultt);


    $complainTittle = $complainn["Title"];
    $complainMessage = $complainn["Message"];
    $complainTenant = $complainn["Reciver_ID"];
    $complainLandlord = $complainn["Sender_ID"];
    $complainReply = $complainn["Reply"];


    $landlordQuery = "Select * from owner where Owner_ID = '$complainLandlord'";
    $landlordResult = mysqli_query($con, $landlordQuery);

    if (mysqli_num_rows($landlordResult) == 0) {
        echo "No Landlord Found";
    }
    $landlord = mysqli_fetch_assoc($landlordResult);



    $landlord_id = $landlord["Owner_ID"];
    $landlord_name = $landlord["Owner_FirstName"] . " " . $landlord["Owner_LastName"];

    $tenantQuery = "Select * from tenant where Tenant_ID = '$complainTenant'";
    $tenantResult = mysqli_query($con, $tenantQuery);
    if (mysqli_num_rows($tenantResult) == 0) {
        echo "No Tenant Found";
    }
    $tenant = mysqli_fetch_assoc($tenantResult);

    $tenant_id = $tenant["Tenant_ID"];
    $tenant_name = $tenant["Tenant_FirstName"] . " " . $tenant["Tenant_LastName"];


    ?>
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Basic with Icons</h5>
            <small class="text-muted float-end">Merged input group</small>
        </div>
        <div class="card-body">
            <form method="POST" action="../../../PHP/tenant/complainReply.php" id="mainForm">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Your Name</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="tenantId" value="<?= $landlord_id ?>">
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                placeholder="<?= $landlord_name ?>" aria-label="<?= $landlord_name ?>"
                                aria-describedby="basic-icon-default-fullname2" name="landlordId"
                                value="<?= $landlord_name ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tenant
                        Name</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="tenantId" value="<?= $tenant_id ?>">
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                placeholder="<?= $tenant_name ?>" aria-label="<?= $tenant_name ?>"
                                aria-describedby="basic-icon-default-fullname2" name="landlordId"
                                value="<?= $tenant_name ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tittle</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">

                            <input type="text" class="form-control" id="basic-icon-default-tittle" placeholder="Tittle"
                                aria-label="Title" aria-describedby="basic-icon-default-" name="tittle"
                                value="<?= $complainTittle ?>" readonly>

                        </div>
                    </div>
                </div>


                <div class="row mb-3">
                    <label class="col-sm-2 form-label" for="basic-icon-default-message">Complain Message</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <textarea id="basic-icon-default-message" class="form-control"
                                style="min-height: 150px; max-height: 150px;" placeholder="<?= $complainMessage ?>"
                                aria-describedby="basic-icon-default-message2" name="message" readonly></textarea>
                        </div>
                    </div>
                </div>

                <?php if ($complainReply == null) { ?>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-message">Reply</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <textarea id="basic-icon-default-message" class="form-control"
                                    style="min-height: 100px; max-height: 150px;"
                                    placeholder="Hi, Do you want to reply  to <?= $landlord_name ?>"
                                    aria-label="Hi, Do you want to reply  to  <?= $landlord_name ?>"
                                    aria-describedby="basic-icon-default-message2" name="reply"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button type="submit" name="submitReply" class="btn btn-primary">Reply</button>
                        </div>
                    </div>

                <?php } else { ?>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-message">Reply</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <textarea id="basic-icon-default-messagee" class="form-control"
                                    style="min-height: 100px; max-height: 150px;" placeholder="<?= $complainReply ?>"
                                    aria-label="Hi, Do you want to reply  to  <?= $landlord_name ?>" value="<?= $complainReply ?>"
                                    aria-describedby="basic-icon-default-message2" name="reply"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button type="button" id="updateButton" name="updateReply" class="btn btn-primary">Update</button>
                            <button type="button" id="deleteButton" name="deleteReply" class="btn btn-danger">Delete
                                Reply</button>

                        </div>
                    </div>

                    <script>
                        $(document).ready(function () {
                            $("#basic-icon-default-messagee").val("<?= $complainReply ?>");
                            $("#updateButton").click(function () {
                                $("#mainForm").attr("action", "../../../PHP/tenant/updateComplainReply.php");
                                $("#updateButton").attr("type", "submit");
                                $("#updateButton").click();

                            });
                            $("#deleteButton").click(function () {
                                $("#mainForm").attr("action", "../../../PHP/tenant/deleteComplainReply.php");
                                $("#deleteButton").attr("type", "submit");
                                $("#deleteButton").click();


                            });

                        });
                    </script>
                <?php } ?>
            </form>
        </div>
    </div>
    <?php


} else {
    echo "No Complain Found";
}
?>