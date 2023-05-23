<?php
$con = require "../PHP/database.php";

class Properties
{
    private $conn;

    public function setCon($conn)
    {
        $this->conn = $conn;
    }

    public function getAllProperties()
    {

        $sql = "SELECT * FROM property";
        $result = mysqli_query($this->conn, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;

    }

    public function getRecentProperies()
    {
        $sql = "SELECT * FROM property ORDER BY Property_RegisterDate DESC LIMIT 3";
        $result = mysqli_query($this->conn, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getPropertiesById($id)
    {

        $sql = "SELECT * FROM property WHERE Property_ID = $id";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;

    }
    public function getPropertiesByOwnerId($id)
    {

        $sql = "SELECT * FROM property WHERE Owner_ID = $id";
        $result = mysqli_query($this->conn, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;

    }

    public function getPropertiesByMinRent($rent)
    {
        $sql = "SELECT * FROM property WHERE Property_Rent >= $rent";
        $result = mysqli_query($this->conn, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getPropertiesByMaxRent($rent)
    {
        $sql = "SELECT * FROM property WHERE Property_Rent <= $rent";
        $result = mysqli_query($this->conn, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getPropertiesByMinArea($area)
    {
        $sql = "SELECT * FROM property WHERE size >= $area";
        $result = mysqli_query($this->conn, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getPropertiesByMaxArea($area)
    {
        $sql = "SELECT * FROM property WHERE size <= $area";
        $result = mysqli_query($this->conn, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getPropertyByCity($city)
    {
        $sql = "SELECT * FROM property WHERE Property_City = '$city'";
        $result = mysqli_query($this->conn, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getPropertyByRangeRent($min, $max)
    {
        $sql = "Select * from property where Property_Rent between $min and $max";
        $result = mysqli_query($this->conn, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;

    }
    function getPropertyByRangeArea($min, $max)
    {
        $this->getPropertiesByMinArea($min);
        $this->getPropertiesByMaxArea($max);
    }

    public function getPropertyByType($type)
    {
        $sql = "SELECT * FROM property WHERE Property_Type LIKE '$type'%";
        $result = mysqli_query($this->conn, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getAllCitiesFromProperties()
    {
        $sql = "SELECT DISTINCT Property_City FROM property";
        $result = mysqli_query($this->conn, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

}

$property = new Properties();
$property->setCon($con);

return $property;
//$property->setCon($con);

//$property->getAllProperties();


// write a for each loop to display all propertie



?>