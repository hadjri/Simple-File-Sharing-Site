<!DOCTYPE html>
<HTML>
	<head><title>Uploading</title></head>
<?php

session_start();
$username = $_SESSION['username'];
 
// Get the filename and make sure it is valid
$filename = basename($_FILES['uploadedfile']['name']);
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo "Invalid filename";
	exit;
}
 
// Get the username and make sure it is valid

if( !preg_match('/^[\w_\-]+$/', $username) ){
	echo "User name is: $username";
	echo "Invalid username";
	exit;
}
 
$full_path = sprintf("/var/www/cse330/module2/srv/uploads/%s/%s", $username, $filename);
 echo($full_path);
if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
	header("Location: upload_success.php");
	exit;
}else{
	header("Location: upload_failure.php");
	exit;
}
 
?>
</HTML>
