<?php
/*Sanjana Chandrashekar*/
print_r($_POST);
require_once("config.php");
// Assigning $_POST values to individual variables for reuse.
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$dob = $_POST['dateofbirth'];
$email = $_POST['emailaddress'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$ph = $_POST['phonenumber'];

    $input = "SELECT * FROM user WHERE EmailAddress = '$email'";
    $res= mysqli_query($mysqli,$input) or die(mysqli_error($mysqli));
    if (mysqli_num_rows($res) >0) {
        echo "Account already exists";
        //header('Location:http://localhost/finalProject/FirstCRUD/index.php');
    } else {
        echo "Account does not exist";
        $createuser = createNewUser($fname,$lname,$city,$zip,$dob,$email,$password1,$password2,$ph);
        echo "Account created";
        //header('Location:http://localhost/finalProject/FirstCRUD/feed.php');
    }
//Creating a variable to hold the "@return boolean value returned by function createNewUser - is boolean 1 with
//successfull and 0 when there is an error with executing the query .
$newuser = createNewUser($fname, $lname,$city,$zip,$dob,$email,$password1, $password2, $ph);
echo $newuser;
header('Location:index.php');
?>


