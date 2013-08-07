<?php
// Upload images to mysql database and display images
// by ids.
// Written by Yuttanant Suwansiri 08/07/13
// Credit http://www.youtube.com/watch?v=vFZfJZ_WNC4


// connect to database
include 'database.php';

// file properties
$file = $_FILES['image']['tmp_name'];

// if no picture file is selected
if (!isset($file)) {
	echo "Please select an image.";
} else {
	// get image, image name, and image size
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
	$image_size = getimagesize($_FILES['image']['tmp_name']);

	// check if the file is not an image
	if ($image_size == FALSE) {
		echo "That's not an image.";
	} else {
		// store image name and image file in mysql database
		// check if there's a problem uploading
	    if	(!$insert = mysql_query("INSERT INTO store VALUE ('', '$image_name', '$image')")) {
			echo "Problem uploading";
		} else {
			// display the last uploaded picture
			$lastid = mysql_insert_id();
			echo "Image Uploaded <p/>Your image:<p/><img src=get.php?id=$lastid>";
		}
	}
}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Upload an image</title>
</head>

<body>
<form action="index.php" method="POST" enctype="multipart/form-data">
File: <input type="file" name="image"> <input type="submit" value="Upload">
</form>
</body>
</html>
