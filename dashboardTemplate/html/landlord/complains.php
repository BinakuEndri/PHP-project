<?php include 'landlord-menu.php' ?>
<?php include 'landlord-navbar.php';

include '../../../PHP/message.php';

?>

<div class="container-xxl flex-grow-1 container-p-y">
    <?php
        if (isset($_SESSION["Complain_Reply"])) {
            showMessage($_SESSION["Complain_Reply"], "success");
            unset($_SESSION["Complain_Reply"]);


        }
        ?>
        <?php
        if (isset($_SESSION["Complain_reply_fail"])) {

            showMessage($_SESSION["Complain_reply_fail"], "danger");
            unset($_SESSION["Complain_reply_fail"]);

        }
        ?>
    <?php

    $landlord_id = $landlord['Owner_ID'];
    $landlord_name = $landlord['Owner_FirstName'] . "" . $landlord['Owner_LastName'];
    $landlord_img = $landlord['Owner_img'];
    //write a query to select the user that ownes the property
    $queryy = "SELECT t.Tenant_ID, t. Tenant_FirstName, t.Tenant_LastName, t.Tenant_Img, p.Property_ID 
            FROM tenant t, property p 
            WHERE t.Tenant_Property = p.Property_ID AND p.Property_Owner = '$landlord_id' ";

    $resultt = mysqli_query($con, $queryy);



    $complainsQuery = "select * from complains where Reciver_ID = '$landlord_id' ";
    $complainsResult = mysqli_query($con, $complainsQuery);


    ?>

    <div class="row" style="display: flex; align-items: center; justify-content: center;">
    

        <!-- Basic with Icons -->
        <div class="col-8" id="mainDiv">
            <!-- DATA TO BE FETCH BY PHP AJAX -->
        </div>
    </div>
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
                        $complain_tenant_id = $complain["Sender_ID"];



                        $message = substr($complain_message, 0, 10) . "...";

                        $sql = "Select * from tenant where Tenant_ID = '$complain_tenant_id'";

                        $tenantResult = mysqli_query($con, $sql);

                        $tenant = $tenantResult->fetch_assoc();

                        $tenant_name = $tenant["Tenant_FirstName"] . "" . $tenant["Tenant_LastName"];
                        $tenant_img = $tenant["Tenant_Img"];

                        ?>
                        <tr>
                            <td>
                                <ul class="list-unstyled m-0 d-flex align-items-center">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar pull-up" title="" data-bs-original-title="<?= $tenant_name ?>">
                                        <img src="../../../uploads/tenant/<?= $tenant_img ?>" alt="Avatar"
                                            class="rounded-circle">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar pull-up" title="" data-bs-original-title="<?= $landlord_name ?>">
                                        <img src="../../../uploads/landlord/<?= $landlord_img ?>" alt="Avatar"
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
                                <span class="badge bg-label<?= $var ?> me-1" id="fetchData" onclick="fetchData(this)" value="<?= $complain_id ?>"
                                    style="cursor:pointer">


                                    <?php if ($complain_response != null)
                                        echo "Responded";
                                    else
                                        echo "Respond" ?>
                                    </span>
                                </td>
                                <td>
                                <?= $complain_response_date ?>
                            </td>
                        </tr>

                        <?php

                    } ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
<script>

    $(document).ready(function () {

        //    $("#fetchData").click(function () {
        //        var id = $("#complainIDD").val();
        //        console.log(id);
        //        $.ajax({
        //            url: "../../../PHP/landlord/showRespondForm.php",
        //            method: "POST",
        //            data: { id: id },
        //            success: function (data) {
        //                $("#mainDiv").html(data);
        //            }
        //        })

        //    });

    });

    function fetchData(elment) {
        var id = elment.getAttribute("value");
        console.log(id);
        $.ajax({
            url: "../../../PHP/landlord/showRespondForm.php",
            method: "POST",
            data: { id: id },
            success: function (data) {
                $("#mainDiv").html(data);
            }
        });
    }


</script>


<?php include 'landlord-footer.php' ?>