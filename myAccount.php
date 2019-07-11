<?php
require_once("config.php");
if($_SESSION['login_user']){
    $allrecords = fetchUserData();
}

error_reporting(E_ALL ^ E_NOTICE);


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
            <h1 class="display-4">My Account</h1>
        </div>
        <div class="tradeLogo">
            <img class="logoImage" src="https://images.cdn4.stockunlimited.net/clipart/handshake-icon_1504506.jpg" class="rounded" alt="logo">
        </div>
        <div class="otherButtons">
            <a href="feed.php" class=" mx-auto align-middle accountButton">Feed</a>
            <a href="newPost.php" class=" mx-auto align-middle accountButton">New Post</a>
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

        .account-table{
            margin-top: 20px;
            box-shadow: 5px 10px 5px 10px #d3d3d3;
            width: 40vw;
            height: 60vh;
            border-radius: 10px;
        }

        .account-table td{
            padding: 10px;
        }

        .updateAccount{
            padding: 8px;
            border-radius: 20px;
        }

        .allposts{
         margin-top: 30px;
        }

        #container{
            height: 58vh;
            box-shadow: 5px 10px 5px 10px #d3d3d3;
            margin-bottom: 40px;
            width: 97vw;
            margin-left: 8px;
        }

        #image{
            width: 20vw;
            height: 50vh;
            float: left;

        }
        img {
            object-fit: contain;
            height: 40vh;
            width: 40vw;
            margin-top: 45px;

        }

        #details{
            float:right;
            height: 40vh;
            width: 50vw;
            overflow: hidden;
            height: 58vh;
        }

        td{
            width: 20vw;

        }
        
        #myprodImage{
            float: left;
            height: 55vh;
            box-shadow: 0px 10px #7ac5cd;
            margin: 10px;
        }

        .senderContainer{
            height: 55vh;
            box-shadow: 5px 10px 5px 10px #7ac5cd;
            margin: 10px;
        }

        .myRequest{
            margin-top: 30px;
            width: 80vw;
        }

        .receiverDetails{
            height: 55vh;
            margin: 15px;
            padding: 0px;
            box-shadow: 5px 10px 5px 10px #9bcd9b;

        }

        #senderprodImage{
            float: left;
            height: 55vh;
            box-shadow: 0px 10px #9bcd9b;
            margin: 15px;
            padding: 10px;

        }

        .receivedReq{
            width: 70vw;
        }



</style>

        </head>

<body>

<form class=" d-flex justify-content-center">

<table class="account-table d-flex justify-content-center">

    <thead>
    <?php
    foreach($allrecords as $displayRecords) { ?>

            <tr><th>First Name</th><td><?php print $displayRecords['firstname']; ?></td></tr>
            <tr><th>Last Name</th><td><?php print $displayRecords['lastname']; ?></td></tr>
            <tr><th>City</th><td><?php print $displayRecords['city']; ?></td></tr>
            <tr> <th>Zip</th><td><?php print $displayRecords['zip']; ?></td></tr>
            <tr><th>DateOfBirth</th><td><?php print date("Y-m-d", strtotime($displayRecords['dateofbirth'])); ?></td></tr>
            <tr><th>EmailAddress</th><td><?php print $displayRecords['email']; ?></td></tr>
            <tr><th>Phone Number</th><td><?php print $displayRecords['phonenumber']; ?></td></tr>
            <tr><th><a href="updateAccount.php" class="updateAccount btn btn-outline-primary">Update Account Information</a></th></tr>

    <?php } ?>
    </thead>
</table>
</form>

<table>
    <tr><td><h4>My Trade Posts</h4></td></tr>
</table>


<?php

require_once("config.php");

/*------------------------------------

SESSION

*/
$uemail = $_SESSION{'login_user'};
$query="SELECT * FROM allposts WHERE Email = '$uemail'";
$result = mysqli_query($mysqli, $query);

    while ($row = mysqli_fetch_array($result)) {
        $pname = $row['ProductName'];
        $eprice = $row['EstimatePrice'];
        $category = $row['Category'];
        $quality = $row['Quality'];
        $yop = $row['YearOfPurchase'];
        $warranty = $row['Warranty'];
        $description = $row['Description'];
        $traveldistance = $row['TravelDistance'];
        global $pid;

        $pid = $row['pid'];
        echo "<div id='container' >";
        echo '<div id= "image">
                    <img src="data:image/jpg;base64,' . base64_encode($row['Image']) . '"/>
                    </div>';
        echo "<div id='details'>";
        echo "<table><tr><td><div id='pname'><label><strong>Product Name :</strong></label> <br><td>" . $pname . "</td><br></div></td></tr></table>";
        echo "<table><tr><td><div id='eprice'><label><strong>Estimate Price:</strong></label> <br><td>" . $eprice . "</td></div></td></tr></table>";
        echo "<table><tr><td><div id='category'><label><strong>Category :</strong></label> <br><td>" . $category . "</td></div></td></tr</table>";
        echo "<table><tr><td><div id='quality'><label><strong>Quality :</strong></label> <br><td>" . $quality . "</td></div></td></tr></table>";
        echo "<table><tr><td><div id='yop'><label><strong>Year Of Purchase :</strong></label> <br><td>" . $yop . "</td></div></td></tr></table>";
        echo "<table><tr><td><div id='warranty'><label><strong>Warranty :</strong></label> <br><td>" . $warranty . "</td></tr></div></td></tr></table>";
        echo "<table><tr><td><div id='description'><label><strong>Description :</strong></label> <br><td>" . $description . "</td></div></td></tr></table>";
        echo "<table><tr><td><div id='traveldistance'><label><strong>Distance :</strong></label> <br><td>" . $traveldistance . "</td></div></td></tr></table>";
        echo "<a href='deletePost.php?pid=" . $pid . "' class='btn btn-outline-primary'>Delete Post</a>";
        echo "</div>";
        echo "</div>";

    }

?>




<table>
    <thead>
    <tr >
        <td>
            <h4 class="receivedReq">Trade Requests Received</h4>
        </td>
    </tr>
    </thead>
</table>


<?php


/*------------------------
Query for displaying user requests received*/

$query="SELECT * FROM contactrequest WHERE ReceiverEmail = '$uemail'";
$result = mysqli_query($mysqli, $query);

if(mysqli_num_rows($result)===0){
    echo "<div><table><tr><td>No Requests Yet.......</td></tr></table>";
}
else {

    while ($row = mysqli_fetch_array($result)) {
        $reqpid = $row['pid'];
        $semail = $row['SenderEmail'];
        $rid = $row['requestid'];
        $status = $row['Status'];

        $query2 = "SELECT * FROM allposts WHERE pid = '$reqpid'";
        $res = mysqli_query($mysqli, $query2);

        while ($row2 = mysqli_fetch_array($res)) {

            echo '<table><div id= "myprodImage">
                <img src="data:image/jpg;base64,' . base64_encode($row2['Image']) . '"/>
           </div></table>';
        }

        $query3 = "SELECT * FROM user WHERE EmailAddress = '$semail'";
        $rec = mysqli_query($mysqli, $query3);

        while ($row3 = mysqli_fetch_array($rec)) {
            $fname = $row3['FirstName'];
            $lname = $row3['LastName'];
            echo '<div class="senderContainer">';
            echo "<table><tr><td><div id='senderHeader'><label class='text-center'><strong><h5>Sender Details</h5></strong></label> <br></div></td></tr></table>";
            echo "<table><tr><td><div id='sfname'><label><strong>First Name :</strong></label> <br><td>" . $fname . "</td><br></div></td></tr></table>";
            echo "<table><tr><td><div id='slname'><label><strong>Last Name:</strong></label> <br><td>" . $lname . "</td></div></td></tr></table>";
            echo "<table><tr><td><div id='semail'><label><strong>Sender Email ID :</strong></label> <br><td>" . $semail . "</td></div></td></tr></table>";
            echo "<table><tr><td><div id='semail'><label><strong>Status :</strong></label><td>" . $status . "</td></div></td></tr></table>";
            echo "<table><tr><td><div id='accept'><br><a class='btn btn-outline-primary' href='accept.php?rid=" . $rid . "'>Accept Trade</a></div></td></tr></table>";
            echo "<table><tr><td><div id='deny'><a class='btn btn-outline-primary' href='deny.php?rid=" . $rid . "'>Deny</a></div></td></tr></table>";
            echo "</div>";
        }
    }
}

/*
----------------------------------------------

Query for displaying sender details
 */

?>
<table>
    <thead>
    <tr><td><div class="myRequest"><h4>Trade Requests Sent</h4></div></td></tr>
    </thead>
</table>
<?php



/*query for displaying user requests sent*/
$query="SELECT * FROM contactrequest WHERE SenderEmail = '$uemail'";
$result = mysqli_query($mysqli, $query);

if(mysqli_num_rows($result)===0){
    echo "<div><table><tr><td>No trade requests sent.....</td></tr></table></div>";
}
else {
    while ($row = mysqli_fetch_array($result)) {
        $reqpid = $row['pid'];
        $status = $row['Status'];

        if ($status === "Accepted") {
            $remail = $row['ReceiverEmail'];
        } else if ($status === "Denied") {
            $remail = "Request Denied";
        } else {
            $remail = "Request Pending";
        }

        $query2 = "SELECT * FROM allposts WHERE pid = '$reqpid'";
        $res = mysqli_query($mysqli, $query2);

        while ($row2 = mysqli_fetch_array($res)) {


            echo '<table><div id= "senderprodImage">
                <div><h6>Product Image</h6></div>
                <img src="data:image/jpg;base64,' . base64_encode($row2['Image']) . '"/>
           </div></table>';
            echo "<div class='receiverDetails'>";
            echo "<table><tr><td><div id='semail'><label><strong>Status :</strong></label><td>" . $status . "</td></div></td></tr></table>";
            echo "<table><tr><td><div id='semail'><label><strong>Email to Contact :</strong></label><td>" . $remail . "</td></div></td></tr></table>";
            echo "</div>";
        }


    }
}



?>




</body>

</html>



