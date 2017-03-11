<!DOCTYPE HTML>
<HTML>
<?php
//Resource; w3c.org
$myfile = fopen("/var/www/cse330/module2/feedback.txt", "a") or die("Unable to open file!"); //either appends or file or creates new one if it doesnt exist
$message =(string) $_POST['feedback']; //holds whatever was typed in the box,cast as string to be safe
fwrite($myfile, $message); //writing to file
fwrite("\r");
fclose($myfile);
?>
<head>
	<title>
	Ray and Malik's File Sharing Website
	</title>
	Ray and Malik's File Sharing Website


<p>Enter Username:<br></P>
<form name = "input" action="loginLogic.php" method = "get">
	Username: <input type="text" name="user"/>
<input type="submit" value="Log In"/>
</form>
<form action = "login.php" method = "post">
	<label>
		What did you think of our website? Tell us!<br>
		<textarea cols=50 rows=8 name="feedback"></textarea>
	</label><br>
		<input type="submit" name="feedback_send" value="Send us feedback">

	</form>
</body>
</HTML>
