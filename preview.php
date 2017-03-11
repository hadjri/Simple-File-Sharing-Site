<!DOCTYPE HTML>
<HTML>
     <head><title>Preview</title>
    <?php
    session_start();
    $username = $_SESSION['username'];
    $delete = $_POST["delete"];
    $preview = $_POST["preview"];
    $file = rtrim($_POST["FILE"],"\"");
    $s = sprintf("/var/www/cse330/module2/srv/uploads/%s/%s", $username, $file);
    $mType = mime_content_type($s);
    $m = sprintf("Content-Type: %s", $mType);
    if ($preview == "Submit"){
        ob_clean(); //cleaning output buffer to get ready to output file to browser
      header($m);
      readfile($s);
    }
     //if delete was chosen instead, atempt to delete
    if ($delete == "Submit"){
        echo "deleting... <br>";        
        if (unlink($s) == 1){
            echo "File Deleted <br>";
             header("refresh:3; url=upload.php");
        }
    }
    ?>
</HTML>