<?php
// connect to database
include 'database.php';

// select the image by id from the database
$id = addslashes($_REQUEST['id']);
$image = mysql_query("SELECT * FROM store WHERE id=$id"); // image is store in an array
$image = mysql_fetch_assoc($image); // query the image
$image = $image['image']; // select only image from the array

header("Content-type: image/jpeg"); // convert binary into image file

echo $image; // display the image
?>