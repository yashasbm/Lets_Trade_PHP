<?php
require_once("config.php");

?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>New Post</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <div class="navigationBar d-flex justify-content-between">
        <div class="pageName">
            <h1 class="display-4">Create a new Post</h1>
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

        .postTable{
            margin-top: 20px;
            box-shadow: 5px 10px 5px 10px #d3d3d3;
            width: 40vw;
            border-radius: 10px;
        }

         td{
            padding-top: 10px;
            padding-right: 15px;
        }

        th{
            padding-left: 10px;
        }

        tr{
            padding-bottom: 10px;
        }


    </style>

</head>

<body>


<form class="d-flex justify-content-center" name="createNewPost" action="newPost.php" method="post" enctype="multipart/form-data">
    <!-- Table goes in the document BODY -->
    <table class="postTable">
        <thead>
        <!-- Display CRUD options in TH format -->



        <!--table for new post-->

        <tr>
            <th>Product Name</th>
            <td><input class="form-control" type="text" name="productname" value="" required></td>
        </tr>

        <tr>
            <th>Estimate Price</th>
            <td><input class="form-control" type="text" name="estimateprice" value="" required></td>
        </tr>

        <tr>
            <th>Category</th>
            <td><input class="form-control" type="text" name="category" value="" required></td>
        </tr>

        <tr>
            <th>Quality</th>
            <td><input class="form-control" type="text" name="quality" value="" required></td>
        </tr>

        <tr>
            <th>Year Of Purchase</th>
            <td><input class="form-control" type="text" name="yearofpurchase" value=""></td>
        </tr>

        <tr>
            <th>Warranty</th>
            <td><input class="form-control" type="text" name="warranty" value="" required></td>
        </tr>
        <tr>
            <th>Product Description</th>
            <td><input class="form-control" type="text" name="description" value="" required></td>
        </tr>
        <tr>
            <th>Distance willing to travel?</th>
            <td><input class="form-control" type="text" name="traveldistance" value="" required></td>
        </tr>

        <tr>
            <th>Image</th>
            <td><input type="file" name="image" id="image" value="" required></td>
        </tr>

        <tr>
            <td><input class="btn btn-outline-primary" type="Submit" name="submit" id="submit" value="Post"></td>
        </tr>
        </thead>
    </table>
</form>


</body>

</html>
<script>
    $(document).ready(function(){
        $('#submit').click(function(){
            var img_name=$('#image').val();
            if(img_name ==''){
                alert("Insert Image");
                return false;

            }
            else
            {
                var extension =$('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])==-1){
                    alert("Invalid Image");
                    $('#image').val('');
                    return false;
                }
            }
        }





    });
</script>
<?php
session_start();

require_once("config.php");
$pname=null;
$eprice=null;
$category=null;
$quality=null;
$yop=null;
$warranty=null;
$description=null;
$traveldistance=null;
$uemail=null;
$file=null;

if(isset($_POST['submit'])){



    $pname = $_POST['productname'];
    $eprice = $_POST['estimateprice'];
    $category = $_POST['category'];
    $quality = $_POST['quality'];
    $yop = $_POST['yearofpurchase'];
    $warranty = $_POST['warranty'];
    $description = $_POST['description'];
    $traveldistance = $_POST['traveldistance'];
    $uemail = $_SESSION['login_user'];

    $character_array = array_merge(range(0,9),range(0, 9));
    $pid = "";
    for ($i = 0; $i < 6; $i++) {
        $pid .= $character_array[rand(
            0, (count($character_array) - 1)
        )];
    }

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $file= addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $query= "INSERT INTO allposts(Email,
                     pid,
	     ProductName,
		EstimatePrice,
		Category,
		Quality,
		Description,
		YearOfPurchase,
		Warranty,
        TravelDistance,
        Image) VALUES ('$uemail','$pid','$pname','$eprice','$category','$quality','$description','$yop','$warranty','$traveldistance','$file')";

    if(mysqli_query($mysqli,$query)){

        echo'<script> alert("Image inserted into database")</script>';
    }

}
?>




