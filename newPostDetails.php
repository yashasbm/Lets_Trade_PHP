<?php
/**
 * Created by PhpStorm.
 * User: sacha
 * Date: 5/12/2019
 * Time: 2:05 AM
 */
require_once("config.php");
?>


<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN'
    'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <div class="navigationBar d-flex justify-content-between">
        <div class="pageName">
            <h5 class="display-4">Product Details</h5>
        </div>
        <div class="tradeLogo">
            <img class="logoImage" src="https://images.cdn4.stockunlimited.net/clipart/handshake-icon_1504506.jpg" class="rounded" alt="logo">
        </div>
        <div class="otherButtons">
            <a href="feed.php" class=" mx-auto align-middle accountButton">Feed</a>
            <a href="myAccount.php" class=" mx-auto align-middle accountButton">My Account</a>
            <a href="logout.php" class="align-middle logoutButton">Logout</a>
        </div>
    </div>


    <style>

        body{
            height:100vh;

        }

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
            height: 50px;
            width: 100px;
            border: none;
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

        a{
            text-decoration: none !important;
        }



        #container{
            height: 80vh;
        }

        #image{
            width: 400px;
            height: 600px;

        }
        img {
            object-fit: contain;
            height: 80vh;
            width: 600px;
        }

        #details{
            float:right;
            margin-top:-600px;
            height: 80vh;
            width: 630px;
            box-shadow: 5px 10px 5px 10px #d3d3d3;
        }

        td{
            padding: 10px;
            width: 20vw;
        }


        .contactButton{
            margin: 10px;
        }

        .contactBtn{
            font-size: 16pt;
            background-color: #5993e5;
            color: #fff;
            border-radius: 20px;
            padding: 8px;
        }



    </style>
</head>
<body>

<?php

require_once("config.php");
$pid = $_GET['pid'];
$query = "SELECT * FROM allposts WHERE pid = '$pid'";

$result = mysqli_query($mysqli, $query);
while ($row = mysqli_fetch_array($result)) {
    $pname =            $row['ProductName'];
    $eprice =           $row['EstimatePrice'];
    $category =         $row['Category'];
    $quality=           $row['Quality'];
    $yop=               $row['YearOfPurchase'];
    $warranty=          $row['Warranty'];
    $description=       $row['Description'];
    $traveldistance=    $row['TravelDistance'];
    $remail=            $row['Email'];
    $alertMessage = "Request sent to user";
    global $pid;

    $pid = $row['pid'];
    echo "<div id='container' >";
    echo  '<div id= "image">
                    <img src="data:image/jpg;base64,' . base64_encode($row['Image']) . '"/>
                    </div>';
    echo "<div id='details'>";
    echo "<table><tr><td><div id='pname'><label><strong>Product Name :</strong></label> <br><td>".$pname."</td><br></div></td></tr></table>";
    echo "<table><tr><td><div id='eprice'><label><strong>Estimate Price:</strong></label> <br><td>".$eprice."</td></div></td></tr></table>";
    echo "<table><tr><td><div id='category'><label><strong>Category :</strong></label> <br><td>".$category."</td></div></td></tr</table>";
    echo "<table><tr><td><div id='quality'><label><strong>Quality :</strong></label> <br><td>".$quality."</td></div></td></tr></table>";
    echo "<table><tr><td><div id='yop'><label><strong>Year Of Purchase :</strong></label> <br><td>".$yop."</td></div></td></tr></table>";
    echo "<table><tr><td><div id='warranty'><label><strong>Warranty :</strong></label> <br><td>".$warranty."</td></tr></div></td></tr></table>";
    echo "<table><tr><td><div id='description'><label><strong>Description :</strong></label> <br><td>".$description."</td></div></td></tr></table>";
    echo "<table><tr><td><div id='traveldistance'><label><strong>Distance :</strong></label> <br><td>".$traveldistance."</td></div></td></tr></table>";
    echo "</div>";
    echo"</div>";
    echo "<div class='contactButton d-flex justify-content-center'>";
    echo"<a class='contactBtn' href='contact.php?pid=".$pid."&remail=".$remail."'>Contact</a>";
    echo "</div>";

}
?>


</body>

</html>





