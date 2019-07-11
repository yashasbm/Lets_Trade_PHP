<?php
/**
 * Created by PhpStorm.
 * User: sacha
 * Date: 5/8/2019
 * Time: 2:32 AM
 */

/**
 * Final Project - Sanjana Chandrashekar
 */


?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN'
        'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>

    <div class="navigationBar d-flex justify-content-between">
        <div class="pageName">
            <h1 class="display-4">Feed</h1>
        </div>
        <div class="tradeLogo">
            <img class="logoImage" src="https://images.cdn4.stockunlimited.net/clipart/handshake-icon_1504506.jpg" class="rounded" alt="logo">
        </div>
        <div class="otherButtons">
            <a href="newPost.php" class=" mx-auto align-middle accountButton">New Post</a>
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

        .outerbox{
            height: 300px;
            width: 290px;
            text-align: center;
            margin: 12px;
            float: left;
            box-shadow: 5px 10px 5px 5px #d3d3d3;
            border-radius: 10px;
            padding: 0;
            overflow: hidden;

        }

        a{
            text-decoration: none !important;
        }

        .image{
            height: 200px;
            width: 200px;
            padding-left: 25px;
            padding-top: 5px;
        }

        .outerbox:hover {
            box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);

        }

        img {
            object-fit: contain;
            height: 200px;
            width: 200px;
            overflow: hidden;
        }

        #pname {
            float: left;
            width: 125px;
            height: 60px;
        }
        #eprice{
            float: left;
            margin-top: -60px;
            margin-left: 125px;
            width: 125px;
            height: 60px;
        }

        .myAccount {
            float: right;
            margin-top: -45px;
            margin-right: 80px;
        }

        .logout {
            float: right;
            margin-top: -45px;
        }


    </style>

</head>
<body>

<?php require_once("config.php"); ?>



</body>
</html>
<?php

require_once("config.php");
$query = "SELECT * FROM allposts";

$result = mysqli_query($mysqli,$query);
while ($row = mysqli_fetch_array($result)) {
    $pname = $row['ProductName'];
    $eprice = $row['EstimatePrice'];
    global $pid;
    $pid = $row['pid'];

    echo "<div id='container' class='outerbox'>
               <a href='newPostDetails.php?pid=".$pid."'>";
        echo '
            <div id= "image" class="image">
            
            <!--fetches the path of the image file-->
                <img src="data:image/jpg;base64,' . base64_encode($row['Image']) . '"/>
            ';
        echo "<div id='pname'><label><strong>Product Name</strong></label> <br>".$pname."</div>";
        echo "<div id='eprice'><label><strong>Estimate Price</strong></label> <br>".$eprice."</div>";
    echo "</a></div></div>";

}
?>





















