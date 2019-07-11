<?php
/**
 * PraviinM
 */
?>


<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>
        Create Account
    </title>

    <div>
        <h1 class="display-4">Create Account</h1>
    </div>
    <!-- Style -- Can also be included as a file usually style.css -->
    <style type="text/css">

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

<?php require_once("config.php"); ?>

<form name="createNewRecord" action="createAccount_INSERT.php" method="post">
    <!-- Table goes in the document BODY -->
    <table class="table-style-three d-flex justify-content-center ">
        <thead>
        <!-- Display CRUD options in TH format -->
        <tr>
            <th>First Name</th>
            <td><input class="form-control" type="text" name="firstname" value="" required></td>
        </tr>

        <tr>
            <th>Last Name</th>
            <td><input class="form-control" type="text" name="lastname" value="" required></td>
        </tr>

        <tr>
            <th>City</th>
            <td><input class="form-control" type="text" name="city" value="" required></td>
        </tr>

        <tr>
            <th>Zip</th>
            <td><input class="form-control" type="text" name="zip" value="" required></td>
        </tr>

        <tr>
            <th>Date Of Birth</th>
            <td><input class="form-control" type="text" name="dateofbirth" value=""></td>
        </tr>

        <tr>
            <th>Email</th>
            <td><input class="form-control" type="text" name="emailaddress" value="" required></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><input class="form-control" type="text" name="password1" value="" required></td>
        </tr>
        <tr>
            <th>Confirm Password</th>
            <td><input class="form-control" type="text" name="password2" value="" required></td>
        </tr>

        <tr>
            <th>Phone</th>
            <td><input class="form-control" type="text" name="phonenumber" value="" required></td>
        </tr>

        <tr>
            <td><input class="btn btn-outline-primary " type="Submit" name="submit" value="submit"></td>
        </tr>
        </thead>
    </table>
<a href="index.php" class="d-flex justify-content-center">Already have an accoount? Login!</a>


</form>
</body>
</html>




