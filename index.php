<?php
/**
 Final Project - Sanjana Chandrashekar
 */


?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>

<!--Bootstrap CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>




<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>
        Final Project
    </title>
    <style>
        img{
            display: block;
            margin-left: auto;
            margin-right: auto;
            height: 100px;

        }

        input{
            display: block;
            margin-left: auto;
            margin-right: auto;
            height:30px;
            width:150px;

        }

        button{
            display: block;
            margin-left: auto;
            margin-right: auto;

        }
        .cent{
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        h1{
            margin-left:500px;

        }


    </style>


    <!-- Image -->
    <h1 class="display-3">Let's Trade</h1>

</head>
<body>

<?php require_once("config.php"); ?>


<div class="text-center">
    <img src="https://images.cdn4.stockunlimited.net/clipart/handshake-icon_1504506.jpg" class="rounded" alt="logo">
</div>


<!-- login form -->

</form>-->
<form class="inputForm" action="loginValidation.php" method="POST">
    <div class="form-group" >
            <label for="exampleInputEmail1" class="d-flex justify-content-center">Email address</label>
            <input type="email" class="form-control col-md-4" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="Enter Username" name="uname" required">
    </div>
    <div class="form-group ">
        <label for="exampleInputPassword1" class="d-flex justify-content-center">Password</label>
        <input type="password" class="form-control col-md-4" id="exampleInputPassword1"  placeholder="Enter Password" name="psw" required>
    </div>
    <button type="submit" class="btn btn-primary d-flex justify-content-center"value="LOGIN">LOGIN</button></br>
    </div>
<a href="./createAccount.php" class="d-flex justify-content-center">Dont have an account yet? Create one!</a>
</form>
</body>
</html>


<?php


?>