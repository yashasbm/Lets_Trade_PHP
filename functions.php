<?php


/*Final Project- 'Sanjana Chandrashekar'*/
session_start();



/*---------------
Create a new user
----------*/

function createNewUser($fname, $lname,$city,$zip, $dob,$email,$password1,$password2,$ph)
{
    global $mysqli;
    //Generate A random userid
    $character_array = array_merge(range('a', 'z'), range(0, 9));
    $rand_string = "";
    for ($i = 0; $i < 6; $i++) {
        $rand_string .= $character_array[rand(
            0, (count($character_array) - 1)
        )];
    }
    // echo $rand_string;
    // echo $fname;
    // echo $lname;
    // echo $dob;
    // echo $email;
    // echo $city;
    //echo $zip;
    $stmt = $mysqli->prepare(
        "INSERT INTO user (
		userid,
		FirstName,
		LastName,
		City,
		Zip,
		DateOfBirth,
		EmailAddress,
        Password,
        ConfirmPassword,
		PhoneNumber,
		active
		)
		VALUES (
		'" . $rand_string . "',
		?,
		?,
		?,
		?,
		?,
		?,
        ?,
        ?,
        ?,
        1
		)"
    );
    $stmt->bind_param("ssssssssi", $fname, $lname, $city, $zip, $dob, $email,$password1,$password2, $ph);
    $result = $stmt->execute();
    $stmt->close();
    return $result;

}

/*
Display all user records
 */


global $mysqli;
function fetchUserData(){
    $useremail = $_SESSION['login_user'];
    global $mysqli;
    $stmt = $mysqli->prepare(
        "SELECT
		FirstName,
		LastName,
		City,
		Zip,
		DateOfBirth,
		EmailAddress,
        PhoneNumber,
        Password
		active
		
		FROM user

        WHERE EmailAddress = '$useremail'

		"
    );
    $stmt->execute();
    $stmt->bind_result(
        $FirstName,
        $LastName,
        $City,
        $Zip,
        $DateOfBirth,
        $EmailAddress,
        $PhoneNumber,
        $Password
    );

    while ($stmt->fetch()) {

        $row[] = array(
            'firstname' => $FirstName,
            'lastname' => $LastName,
            'city' => $City,
            'zip' => $Zip,
            'dateofbirth' => $DateOfBirth,
            'email' => $EmailAddress,
            'phonenumber' => $PhoneNumber,
            'password' => $Password
        );
    }
    $stmt->close();
    return ($row);

}


/* ---------------
To create a new post
*/

function insertPost($pname, $eprice,$category,$quality,$description,$yop,$warranty,$traveldistance,$image)
{
    global $mysqli;
    //Generate A random userid
    $character_array = array_merge(range(0, 9));
    $rand_string = "";
    for ($i = 0; $i < 4; $i++) {
        $rand_string .= $character_array[rand(
            0, (count($character_array) - 1)
        )];
    }
    $stmt = $mysqli->prepare(
        "INSERT INTO allposts (
                      pid,
	     ProductName,
		EstimatePrice,
		Category,
		Quality,
		Description,
		YearOfPurchase,
		Warranty,
        TravelDistance,
        Image
		)
		VALUES (
		'" . $rand_string . "',
		?,
		?,
		?,
		?,
		?,
		?,
        ?,
        ?,
        ?
		)"
    );
    $stmt->bind_param("sssssssssb", $rand_string,$pname, $eprice,$category,$quality,$description,$yop,$warranty,$traveldistance,$image);
    $result = $stmt->execute();
    $stmt->close();
    return $result;

}




/*--------

Update My account

*/

function updateAccount($fname, $lname, $city, $zip, $dob, $ph, $password){

    global $mysqli;
    $email = $_SESSION['login_user'];

    $stmt = $mysqli->prepare(
        "UPDATE user
		SET
		FirstName = ?,
		LastName = ?,
		City = ?,
		Zip = ?,
		DateOfBirth = ?,
		PhoneNumber = ?,
		Password = ?
		WHERE
		EmailAddress = ?
		LIMIT 1"
    );
    $stmt->bind_param("ssssssss", $fname, $lname, $city, $zip, $dob, $ph, $password, $email);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
}


/*------
send request
*/
 function sendRequest($pid,$requestid,$remail,$status)
 {
        global $mysqli;
        $semail= $_SESSION['login_user'];
        $stmt=$mysqli->prepare(
            "INSERT INTO contactrequest (
        SenderEmail,
	    ReceiverEmail,
		requestid,
		pid,
		Status
		)
		VALUES (
		?,
		?,
		?,
		?,
		?
		)"
        );
     $stmt->bind_param("sssss", $semail,$remail, $requestid,$pid,$status);
     $result = $stmt->execute();
     $stmt->close();
     return $result;
 }



 /*
  *
  * ---Status Update
  */
 function statusUpdate($rid,$status){

    global $mysqli;
     $stmt = $mysqli->prepare(
         "UPDATE contactrequest
		SET
		Status = ?
		WHERE
		requestid = ?
		LIMIT 1"
     );
     $stmt->bind_param("ss", $status,$rid);
     $result = $stmt->execute();
     $stmt->close();

     return $result;
}