<?php


include 'db.php';

$query="select * from checkin"; // Fetch all the data from the table customers

$result=mysqli_query($dbCon,$query);

?>