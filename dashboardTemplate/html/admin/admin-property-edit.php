<?php include 'admin-menu.php' ?>
<?php include 'admin-navbar.php' ?>

<?php
$con = require "../../../PHP/database.php";

if (isset($_POST['edit'])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM property WHERE Property_ID = '$id'";
    $result = $con->query($query);
    $row = $result->fetch_assoc();

    $type = $row["Property_Type"];
    $number = $row["Property_Number"];
    $city = $row["Property_City"];
    $address = $row["Property_Address"];
    $rent = $row["RentAmount"];
    $img = $row["Property_Cover"];
    $img2 = $row["Property_img_2"];
    $img3 = $row["Property_img_3"];
    $img4 = $row["Property_img_4"];
    $img5 = $row["Property_img_5"];
    $ownerid = $row["Property_Owner"];


}

?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Landlords/ </span>Edit Landlord:
        <?php echo $number ?>
    </h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Register Form</h5>
                    <small class="text-muted float-end">
                        <?php echo $number . " " . $type ?>
                    </small>
                </div>
                <div class="card-body">
                    <form action="../../../PHP/admin/property-edit.php" method="Post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-fullname">Proerty Number</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" id="basic-icon-default-fullname"
                                            placeholder="Proerty Number" aria-label="Proerty Number" value="<?php echo $number?>"
                                            aria-describedby="basic-icon-default-fullname2" name="number" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-company">Property Type</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                                class="bx bx-buildings"></i></span>
                                        <input type="text" id="basic-icon-default-company" class="form-control"
                                            placeholder="Property Type" aria-label="Property Type" value="<?php echo $type?>"
                                            aria-describedby="basic-icon-default-company2" name="type" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-company">Property City</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                                class="bx bx-buildings"></i></span>
                                        <input type="text" id="basic-icon-default-company" class="form-control"
                                            placeholder="Property City" aria-label="Property City" value="<?php echo $city?>"
                                            aria-describedby="basic-icon-default-company2" name="city" />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-company">Property Address</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                                class="bx bx-user"></i></span>
                                        <input type="text" id="basic-icon-default-company" class="form-control"
                                            placeholder="Property Address" aria-label="Property Address" value="<?php echo $address?>"
                                            aria-describedby="basic-icon-default-company2" name="address" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-company">Rent Amount</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                                class="bx bx-user"></i></span>
                                        <input type="text" id="basic-icon-default-company" class="form-control"
                                            placeholder="Property Address" aria-label="Property Address" value="<?php echo $rent?>"
                                            aria-describedby="basic-icon-default-company2" name="rent" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="defaultSelect" class="form-label">Default select</label>
                                    <select id="defaultSelect" class="form-select" name="owner">
                                        <?php 
                                            $owner_query = "SELECT Owner_ID as id, Owner_FirstName as name , Owner_LastName as surname from owner Where Owner_ID = '$ownerid'";
                                            $res = mysqli_query($con,$owner_query);

                                            $owner = $res->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $owner['id']?>"><?php echo $owner['name'] . " " . $owner['surname']?></option>

                                        <?php

                                        $query1 = "select * from owner";

                                        $resultt = mysqli_query($con, $query1);


                                        while ($row1 = mysqli_fetch_assoc($resultt)) {
                                            ?>
                                            <option value="<?php echo $row1['Owner_ID'] ?>">
                                                <?php echo $row1['Owner_FirstName'] . " " . $row1['Owner_LastName'] ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-9"> 
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-phone">Cover Photo</label>
                                            <div class=" input-group input-group-merge">
                                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                        class="bx bx-phone"></i></span>
                                                <input type="hidden" name="img1" value="<?php echo $img ?>">
                                                <input type="file" class="form-control" name="image1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3"> 
                                        <label class="form-label" for="basic-icon-default-phone">Cover Photo: </label>
                                        <div>
                                            <img src="<?php echo "../../../uploads/property/" . $img ?>" alt="user"
                                                height="60px" width="100px">
                                            </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-9"> 
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-phone">Second Photo</label>
                                            <div class=" input-group input-group-merge">
                                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                        class="bx bx-phone"></i></span>
                                                <input type="hidden" name="img2" value="<?php echo $img2 ?>">
                                                <input type="file" class="form-control" name="image2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3"> 
                                        <label class="form-label" for="basic-icon-default-phone">Second Photo: </label>
                                        <div>
                                            <img src="<?php echo "../../../uploads/property/" . $img2 ?>" alt="user"
                                                height="60px" width="100px">
                                            </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-9"> 
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-phone">Third Photo</label>
                                            <div class=" input-group input-group-merge">
                                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                        class="bx bx-phone"></i></span>
                                                <input type="hidden" name="img3" value="<?php echo $img3 ?>">
                                                <input type="file" class="form-control" name="image3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3"> 
                                        <label class="form-label" for="basic-icon-default-phone">Third Photo: </label>
                                        <div>
                                            <img src="<?php echo "../../../uploads/property/" . $img3 ?>" alt="user"
                                                height="60px" width="100px">
                                            </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-9"> 
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-phone">Fourth Photo</label>
                                            <div class=" input-group input-group-merge">
                                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                        class="bx bx-phone"></i></span>
                                                <input type="hidden" name="img4" value="<?php echo $img4 ?>">
                                                <input type="file" class="form-control" name="image4">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3"> 
                                        <label class="form-label" for="basic-icon-default-phone">Fourth Photo: </label>
                                        <div>
                                            <img src="<?php echo "../../../uploads/property/" . $img4 ?>" alt="user"
                                                height="60px" width="100px">
                                            </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-9"> 
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-phone">Fifth Photo</label>
                                            <div class=" input-group input-group-merge">
                                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                        class="bx bx-phone"></i></span>
                                                <input type="hidden" name="img5" value="<?php echo $img5 ?>">
                                                <input type="file" class="form-control" name="image5">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3"> 
                                        <label class="form-label" for="basic-icon-default-phone">Fifth Photo: </label>
                                        <div>
                                            <img src="<?php echo "../../../uploads/property/" . $img5 ?>" alt="user"
                                                height="60px" width="100px">
                                            </div>
                                    </div>
                                    
                                </div>
                               
                                    <input type="hidden" value="<?php echo $id ?>" name="id">
                                    <button type="submit" class="btn btn-primary" name="edit">
                                        Edit
                                    </button>
                            </div>

                           
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php


$con->close();
?>
<?php include 'admin-footer.php' ?>