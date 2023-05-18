<?php include 'landlord-menu.php' ?>
<?php include 'landlord-navbar.php';

include '../../../PHP/message.php';


$landlord_id = $landlord['Owner_ID'];
$landlord_name = $landlord['Owner_FirstName'] . "" . $landlord['Owner_LastName'];
$landlord_img = $landlord['Owner_img'];
//write a query to select the user that ownes the property
$queryy = "SELECT t.Tenant_ID, t. Tenant_FirstName, t.Tenant_LastName, t.Tenant_Img, p.Property_ID 
            FROM tenant t, property p 
            WHERE t.Tenant_Property = p.Property_ID AND p.Property_Owner = '$landlord_id' ";

$resultt = mysqli_query($con, $queryy);



?>




<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row" style="display: flex; align-items: center; justify-content: center;">
        <?php
        if (isset($_SESSION["Complain_Success"])) {
            showMessage($_SESSION["Complain_Success"], "success");
            unset($_SESSION["Complain_Success"]);


        }
        ?>
        <?php
        if (isset($_SESSION["EmptyFields"])) {

            showMessage($_SESSION["EmptyFields"], "warning");
            unset($_SESSION["EmptyFields"]);

        }
        ?>
        <?php
        if (isset($_SESSION["Complain_edit"])) {
            showMessage($_SESSION["Complain_edit"], "success");
            unset($_SESSION["Complain_edit"]);


        }
        ?>
        <?php
        if (isset($_SESSION["Complain_edit_fail"])) {

            showMessage($_SESSION["Complain_edit_fail"], "warning");
            unset($_SESSION["Complain_edit_fail"]);

        }
        ?>


        <!-- Basic with Icons -->
        <div class="col-8" id="mainDiv">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Basic with Icons</h5>
                    <small class="text-muted float-end">Merged input group</small>
                </div>
                <div class="card-body" id="theForm">
                    <form method="POST" action="../../../PHP/landlord/complain.php" id="form">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Your Name</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="landlordId" value="<?= $landlord_id ?>">
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="<?= $landlord_name ?>" aria-label="<?= $landlord_name ?>"
                                        aria-describedby="basic-icon-default-fullname2" name="landlordName"
                                        value="<?= $landlord_name ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tenant
                                Name</label>
                            <div class="col-sm-10">

                                <select id="defaultSelect" class="form-select" name="tenantId">
                                    <?php
                                    while ($tenant = mysqli_fetch_assoc($resultt)) {


                                        $tenant_id = $tenant["Tenant_ID"];
                                        $tenant_name = $tenant["Tenant_FirstName"] . " " . $tenant["Tenant_LastName"];
                                        $property = $tenant["Property_ID"];
                                        ?>
                                        <option value="<?= $tenant_id ?>">
                                            <?= $tenant_name ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tittle</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">

                                    <input type="text" class="form-control" id="basic-icon-default-tittle"
                                        placeholder="Tittle" aria-label="Title" aria-describedby="basic-icon-default-"
                                        name="tittle" value="">

                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="basic-icon-default-message">Complain</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <textarea id="basic-icon-default-message" class="form-control"
                                        placeholder="Hi, Do you have a something to talk to <?= $tenant_name ?>"
                                        aria-label="Hi, Do you have a something to talk to <?= $tenant_name ?>"
                                        aria-describedby="basic-icon-default-message2" name="message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end align-items-center">
                            <div class="col-sm-10" id="div1">
                                <input type="hidden" name="id" id="inputId" value="">
                                <button type="submit" id="sendButton" name="sendButton"
                                    class="btn btn-primary">Send</button>

                            </div>
                            <div class="col-sm-7" id="div2" hidden="true">
                                <span class="badge bg-label-danger me-1" id="backToSend" style="cursor: pointer">
                                    Back to send</span>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <?php

    $complainsQuery = "select * from complains where Sender_ID = '$landlord_id' ";
    $complainsResult = mysqli_query($con, $complainsQuery);



    ?>
    <div class="card">
        <h5 class="card-header">Hoverable rows</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Sender/Reciver</th>
                        <th>Title</th>
                        <th>Message</th>
                        <th>Date Sent</th>
                        <th>Responded</th>
                        <th>Date Responded</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php while ($complain = mysqli_fetch_assoc($complainsResult)) {

                        $complain_id = $complain["ID"];
                        $complain_tittle = $complain["Title"];
                        $complain_message = $complain["Message"];
                        $complain_response = $complain["Reply"];
                        $complain_date = $complain["Date"];
                        $complain_response_date = $complain["Reply_Date"];
                        $complain_tenant_Id = $complain["Reciver_ID"];

                        $message = substr($complain_message, 0, 10) . "...";

                        $query = "Select * from tenant where Tenant_ID = '$complain_tenant_Id'";
                        $result = mysqli_query($con, $query);
                        $tenant = mysqli_fetch_assoc($result);

                        $tenant_id = $tenant["Tenant_ID"];
                        $tenant_name = $tenant["Tenant_FirstName"] . " " . $tenant["Tenant_LastName"];
                        $tenant_img = $tenant["Tenant_Img"];

                        ?>

                        <tr>
                            <td>
                                <ul class="list-unstyled m-0 d-flex align-items-center">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar pull-up" title="" data-bs-original-title="<?= $landlord_name ?>">
                                        <img src="../../../uploads/landlord/<?= $landlord_img ?>" alt="Avatar"
                                            class="rounded-circle">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar pull-up" title="" data-bs-original-title="<?= $tenant_name ?>">
                                        <img src="../../../uploads/tenant/<?= $tenant_img ?>" alt="Avatar"
                                            class="rounded-circle">
                                    </li>

                                </ul>
                            </td>
                            <td><strong>
                                    <?= $complain_tittle ?>
                                </strong></td>
                            <td>
                                <?= $message ?>
                            </td>
                            <td>
                                <?= $complain_date ?>
                            </td>

                            <td>
                                <?php if ($complain_response != null)
                                    $var = "-success";
                                else
                                    $var = "-danger"; ?>
                                <span class="badge bg-label<?= $var ?> me-1" id="getResponse" 
                                    <?php if ($complain_response != null) {?>

                                        onclick="getResponse(this)"
                                        value="<?= $complain_id ?>" style="cursor: pointer"
                                    <?php } ?>

                                    >


                                    <?php if ($complain_response != null)
                                        echo "Responded";
                                    else
                                        echo "Not Responded" ?>
                                    </span>
                                </td>
                                <td>
                                <?= $complain_response_date ?>
                            </td>
                            <td>
                                <?php if ($complain_response == null) { ?>

                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <input type="hidden" name="id" id="complainId" value="<?= $complain_id ?>">
                                            <button type="button" id="buttonId" onclick="editButton(this)"
                                                value="<?= $complain_id ?>" class="btn btn-outline-info dropdown-item"
                                                name="edit"><i class="bx bx-edit-alt me-1"></i>Edit</button>
                                            <form action="../../../PHP/admin/landlord-delete.php" method="POST">
                                                <input type="hidden" name="id" value="<?= $complain_id ?>">
                                                <button type="submit" class="btn btn-outline-secondary dropdown-item"
                                                    name="delete"><i class="bx bx-trash me-1"></i>Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                <?php } ?>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {

        $('#backToSend').click(function () {

            var button = document.getElementById("sendButton");

            button.innerHTML = "Send";
            var div1 = document.getElementById("div1");
            var div2 = document.getElementById("div2");
            div1.classList.remove("col-sm-3");
            div1.classList.add("col-sm-10");
            div2.setAttribute("hidden", "true");

            var input = document.getElementById("inputId");
            input.value = "";

            var form = document.getElementById("form");
            form.action = "../../../PHP/landlord/complain.php";
            $('#basic-icon-default-tittle').val("");
            $('#basic-icon-default-message').val("");
        });
    });
    function editButton(element) {
        var id = element.getAttribute("value");
        setDataToTittle(id);
        changeAddButton();
    }
    function setDataToTittle(id) {
        var id = id;
        $.ajax({
            url: "../../../PHP/landlord/complainData.php",
            method: "POST",
            data: { id: id },
            success: function (data) {
                var values = JSON.parse(data);
                $("theForm").show();
                $('#basic-icon-default-tittle').val(values.input1);
                $('#basic-icon-default-message').val(values.input2);
            }
        })
    }

    function changeAddButton() {
        var button = document.getElementById("sendButton");
        button.innerHTML = "Update";
        var div1 = document.getElementById("div1");
        var div2 = document.getElementById("div2");
        div1.classList.remove("col-sm-10");
        div1.classList.add("col-sm-3");
        div2.removeAttribute("hidden");
        var input = document.getElementById("inputId");
        input.value = document.getElementById("complainId").value;

        var form = document.getElementById("form");
        form.action = "../../../PHP/landlord/complain-update.php";
    }

    function getResponse(element) {
        var id = element.getAttribute("value");

        $.ajax({
            url: "../../../PHP/landlord/complainData.php",
            method: "POST",
            data: { idd: id },
            success: function (data) {
                $("#mainDiv").html(data);

                $("theForm").hide;

            }
        });

    }



</script>
<?php include 'landlord-footer.php' ?>