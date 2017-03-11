<!DOCTYPE HTML>
<HTML>
    <head><title>Byebye!</title></head>
<?php
//terminating session
session_start();
session_unset();

session_destroy();

header("location:login.php");

exit();
?>
</HTML>