<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'root';
$DATABASE_NAME = 'php_rental1';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_error()) {
    exit('Error connecting to the database' . mysqli_connect_error());
}

return $con;
?>