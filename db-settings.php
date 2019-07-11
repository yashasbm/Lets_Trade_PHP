<?php
/**
 * PraviinM
 */

//Development Database Informatio
$db_host = "localhost"; //Host address (most likely localhost)
$db_name = "crud_database"; //Name of Database
$db_user = "root"; //Name of database user
$db_pass = ""; //Password for database user



$db_host1 = "localhost"; //Host address (most likely localhost)
$db_name1 = "crud_database"; //Name of Database
$db_user1 = "root"; //Name of database user
$db_pass1 = ""; //Password for database user



//following variable declaration is for next class :)
GLOBAL $errors;
GLOBAL $successes;

$errors = array();
$successes = array();

/* Create a new mysqli object with database connection parameters */

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
GLOBAL $mysqli;

$dbconnection = new mysqli($db_host, $db_user, $db_pass, $db_name);

/*if (mysqli_connect_errno()) {
    //display the reason for mysql connection error.
    echo "connection failed: " . mysqli_connect_errno();
    exit();

} else {
    echo "connection successful";
}*/

?>
