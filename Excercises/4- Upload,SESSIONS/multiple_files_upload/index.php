<?php

$count = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    foreach ($_FILES['files']['name'] as $i => $name) {
        if (strlen($_FILES['files']['name'][$i]) > 1) {
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], 'upload/'.$name)) {
                $count++;
            }
        }
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Directory Upload using webkidriectory</title>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
            a{
                text-decoration: none;
                color: #333;
            }
            body {
                text-align:center;
                background-color:#61b3de;
                font-family:Arial, Helvetica, sans-serif;
                font-size:80%;
                color:#666;
            }
            .wrap {
                background: #f3f8fb;
                width:730px;
                margin:30px auto;
                border: 4px dashed #61b3de;
                border-radius:4px;
                padding: 20px 5px;
            }
            h1 {
                font-family:Georgia, "Times New Roman", Times, serif;
                font-size:170%;
                color:#645348;
                font-style:italic;
                text-decoration:none;
                font-weight:100;
                padding: 10px;
            }	
            .button {
                border-radius: 10px;
                background-color: #61b3de;
                border: 0;
                color: #fff;
                font-weight: bold;
                font-style: italic;
                padding: 6px 15px 5px;
                cursor: pointer;
            }
            input[type="file"]{
                color: transparent;
            }
            input[type="submit"]:hover,:focus{  
                background-position:100px;
            }  
            .msg{
                background: #ddeff8;
                padding: 5px;
                margin-bottom: 15px;
                border: #61b3de dotted 1px;
            }
            .copy{
                margin-top: 20px;
                clear: both;
            }
        </style>
    </head>
    
    <body>
        <div class="wrap">
            <?php
            if ($count > 0) {
                echo "<p class='msg'>{$count} files uploaded</p>\n\n";
            }
            ?>
            <h1>Folder/Directory Upload using HTML and PHP</h1>
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="files[]" id="files" multiple="" directory="" webkitdirectory="" mozdirectory="">
                <input class="button" type="submit" value="Upload" />
            </form>
            
        </div>
    </body>
</html>