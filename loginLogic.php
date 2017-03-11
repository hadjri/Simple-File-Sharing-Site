
<!DOCTYPE HTML>
<HTML>
<head><title>Logging in</title></head>
<?php
$h = fopen("/var/www/cse330/module2/users.txt", "r");
 $curUserName = (string)$_GET["user"];
$validUser = 0;
//check input again users name after casting as string
while( !feof($h)){
    if (empty($curUserName)){
        break;
    }
    $s = fgets($h);
    if ((string)trim($curUserName) == (string)trim($s)){
       $validUser = 1;
        break;
    }
}
fclose($h);
if ($validUser ==1){
     echo "Welcome Back!  " ,  $curUserName, "<br>";
     session_start();
     $_SESSION["username"] = $curUserName;
     header("refresh:3; url=upload.php");
}
else {
    echo "Wrong Username";
    header( "refresh:3; url=login.php" ); 
    exit;  
}
?>

