<?php

/**
 * Handling File Uploads
 *
 */

$error = null;
$output = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo "<p>";

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo "File is valid, and was successfully uploaded.\n";
} else {
   echo "Upload failed";
}

echo "</p>";
echo '<pre>';
echo 'Here is some more debugging info:';
print_r($_FILES);
print "</pre>";
}
?>
<!DOCTYPE html>
<html>
    <title>Text File Processor</title>
    <style type="text/css">
        body { font-family: Verdana, sans-serif; }
        form dl dt { float: left; clear: left; width: 12em; text-align: right; margin-bottom: 1em; }
        form dl dd { float: left; clear: right; margin-bottom: 1em; margin-left: 1em; }
        div.error { border: 1px dashed #a00; background-color: #fcc; padding: 3px; }
        pre { border: 1px solid black; padding: 3px; clear: both; }
    </style>

    <body>
        <h1>Text File Processor</h1>
<?php if ($error): ?>
        <div class="error">ERROR: <?php echo $error; ?></div>
<?php endif; ?>
        
               <form enctype="multipart/form-data" action="002-file-uploads.php" method="POST">
					<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
					Send this file: <input name="userfile" type="file" />
					<input type="submit" value="Send File" />
				</form>
          

    </body>
</html>
<?php


