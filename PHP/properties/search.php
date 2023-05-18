<?php

$con = require "../database.php";

// get data from ajax

if (isset($_POST["keyword"])) {
    $keyword = $_POST["keyword"];
    $query = "SELECT * FROM property WHERE Property_City LIKE '%$keyword%' OR Property_Address LIKE '%$keyword%' OR Property_Type LIKE '%$keyword%' OR Property_Number LIKE '%$keyword%'";

    $result = $con->query($query);
}

if (isset($_POST["rentValue"])) {
    $value = $_POST["rentValue"];

    $min = $value[0];
    $max = $value[1];

    $query = "SELECT * FROM property WHERE RentAmount BETWEEN $min AND $max";

    $result = $con->query($query);


}

if (mysqli_num_rows($result) > 0) {
    $properties = $result->fetch_all(MYSQLI_ASSOC);

    ?>


    <div id="list-type1" class="proerty-th">
        <?php // make a for each of all properties 
            foreach ($properties as $prope) {
                $property_name = $prope['Property_Number'] . " " . $prope['Property_Type'];
                $property_size = $prope['Size'];
                $property_rent = $prope['RentAmount'];
                $property_img = $prope['Property_Cover'];
                $property_city = $prope['Property_City'];
                $property_address = $prope['Property_Address'];
                $property_id = $prope['Property_ID'];
                ?>
            <div class="col-sm-6 col-md-4 p0">
                <div class="box-two proerty-item">
                    <div class="item-thumb">
                        <a href="property.php?id=<?= $property_id ?>"><img src="../uploads/property/<?= $property_img ?>"></a>
                    </div>

                    <div class="item-entry overflow">
                        <h5><a href="property.php?id=<?= $property_id ?>">
                                <?php echo $property_name . " " . $property_city ?>
                            </a></h5>
                        <div class="dot-hr"></div>
                        <span class="pull-left"><b> Area :</b>
                            <?= $property_size ?> m2
                        </span>
                        <span class="proerty-price pull-right"> $
                            <?= $property_rent ?>
                        </span>
                        <p style="display: none;">Suspendisse ultricies Suspendisse ultricies Nulla quis
                            dapibus nisl. Suspendisse ultricies commodo arcu nec pretium ...</p>
                        <div class="property-icon">
                            <img src="assets/img/icon/bed.png">(5)|
                            <img src="assets/img/icon/shawer.png">(2)|
                            <img src="assets/img/icon/cars.png">(1)
                        </div>
                    </div>


                </div>
            </div>
        <?php } ?>
    </div>


    <?php

} else {

}

$con->close();


?>