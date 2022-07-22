<?php

require_once('db.php');

 if (!isset($_POST['name']) && !isset($_POST['coordinates']) ){
   die("Error incomplete HTTP request");
 }

 if (strlen($_POST['name']) < 3  || strlen($_POST['coordinates'])<5) {

   die("Error please fill in the form");

 }

//filter all inputs for securing
$POSTV = filter_input_array(INPUT_POST,
    ['name' => FILTER_SANITIZE_STRING,
     'coordinates' => FILTER_SANITIZE_STRING,
     'address' => FILTER_SANITIZE_STRING,
    ]
);
$name = $POSTV['name'];
$coordinates = $POSTV['coordinates'];
$address = $POSTV['address'];
$addr = $_SERVER['REMOTE_ADDR'];
$agent = $_SERVER['HTTP_USER_AGENT'];

$query= "INSERT INTO checkin (id, name, coordinates, address, ip_address, user_agent)
VALUES (NULL,'$name','$coordinates', '$address', '$addr','$agent')";

$result=mysqli_query($dbCon, $query);

if (!$result) {

  echo mysqli_error($dbCon);

} else {

echo "User Check In Feedback Posted";
}
 ?>
