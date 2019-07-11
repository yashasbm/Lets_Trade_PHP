<?php
require_once("config.php");

$allrecords = fetchUserData();

?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>My Account</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <div class="navigationBar d-flex justify-content-between">
        <div class="pageName">
            <h1 class="display-4">Update Account Information</h1>
        </div>
        <div class="otherButtons">
            <a href="feed.php" class=" mx-auto align-middle accountButton">Feed</a>
            <a href="myAccount.php" class=" mx-auto align-middle accountButton">My Account</a>
            <a href="logout.php" class="align-middle logoutButton">Logout</a>
        </div>
    </div>

    <style>

        .navigationBar{
            height: 60px;
        }

        .pageName{
            height: 50px;
            text-align: center;
            float: left;
        }

        .tradeLogo{
        }

        .logoImage{
            height: 60px;
            width: 100px;
        }

        .otherButtons{
            margin-top: 15px;
            height: 30px;
        }

        .accountButton{
            background-color: grey;
            color: #fff;
            padding: 8px;
            border-radius: 20px;

        }

        .logoutButton{
            margin: 0px;
            background-color: grey;
            color: #fff;
            padding: 8px;
            border-radius: 20px;
        }

        .updateTable{
            margin: 20px;
        }


        table.table-style-three{
        }

        thead{
            box-shadow: 5px 10px 5px 10px #d3d3d3;
            width: 40vw;
            padding-left: 70px;
            border-radius: 20px;
        }

        td{
            padding: 6px;
        }


    </style>

</head>

<body>

<form class="updateTable" name="updateAccount" action="updateAccount.php" method="post">
    <!-- Table goes in the document BODY -->
    <table class="table-style-three d-flex justify-content-center ">
        <?php
        foreach($allrecords as $displayRecords) { ?>

        <?php } ?>
        <thead>
        <!-- Display CRUD options in TH format -->
        <tr>
            <th>First Name</th>
            <td><input class="form-control" type="text" name="firstname" value="<?php print $displayRecords['firstname']; ?>" required></td>
        </tr>

        <tr>
            <th>Last Name</th>
            <td><input class="form-control" type="text" name="lastname" value="<?php print $displayRecords['lastname']; ?>" required></td>
        </tr>

        <tr>
            <th>City</th>
            <td><input class="form-control" type="text" name="city" value="<?php print $displayRecords['city']; ?>" required></td>
        </tr>

        <tr>
            <th>Zip</th>
            <td><input class="form-control" type="text" name="zip" value="<?php print $displayRecords['zip']; ?>" required></td>
        </tr>

        <tr>
            <th>Date Of Birth</th>
            <td><input class="form-control" type="text" name="dateofbirth" value="<?php print date("Y-m-d", strtotime($displayRecords['dateofbirth'])); ?>"></td>
        </tr>

        <tr>
            <th>Phone</th>
            <td><input class="form-control" type="text" name="phonenumber" value="<?php print $displayRecords['phonenumber']; ?>" required></td>
        </tr>


        <tr>
            <th>Password</th>
            <td><input class="form-control" type="text" name="password" value="<?php print $displayRecords['password']; ?>" required></td>
        </tr>


        <tr>
            <td><input class="btn btn-outline-primary " type="Submit" name="submit" value="Update"></td>
        </tr>
        </thead>
    </table>

</form>

</body>

</html>

<?php

error_reporting(E_ALL ^ E_NOTICE);
print_r($_POST);

if(isset($_POST['submit'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $dob = $_POST['dateofbirth'];
    $ph = $_POST['phonenumber'];
    $password=$_POST['password'];

    $updateAccountInfo = updateAccount($fname,$lname,$city,$zip,$dob,$ph,$password);

}



echo $updateAccountInfo;
?>







