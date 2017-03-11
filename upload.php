<!DOCTYPE HTML>
<HTML>
<head>
	<title>Uploaded Files</title>
	Your Files

<?php
session_start();
//using sessions to pass username information around.
$username = $_SESSION['username'];

if (!empty($_SESSION['username'])){
//resource used for displaying file in directory: http://php.net/manual/en/function.scandir.php
$dir_path = sprintf("/var/www/cse330/module2/srv/uploads/%s", $username);
$dh  = opendir($dir_path);
while (false !== ($filename = readdir($dh))) {
    $files[] = $filename;
}
sort($files);
//Using echo to create a radio button list of files in the directory
echo '<form action = "preview.php" method = "POST">';
for($i = 2; $i < sizeof($files); $i++){
	echo '<input type="radio" name = "FILE" value =',$files[$i];
	echo '" ';
	if ($i == 2){
	echo 'checked>', $files[$i];
	}
	else {
		echo '>', $files[$i];
	}
	echo '<br>';
}
echo '<input type="submit" name = "preview"> Preview <BR>';
echo '<input type ="submit" name = "delete"> Delete';

echo '</form>';
}

else {
	echo "Please log in first! <br>";
}
?>

	<br>
	<br>
<form enctype="multipart/form-data" action="uploader.php" method="POST">
	<p>
		<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
		<label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
	</p>
	<p>
		<input type="submit" value="Upload File" />
	</p>
</form>
<form action = "logout.php" method = "GET">
	<input type = "submit" value = "Logout"/>
	</form>

</HTML>
