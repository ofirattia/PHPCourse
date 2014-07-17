<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <link rel="stylesheet" href="style.css" />
    
</head>
<body>
<?php require_once "include/functions.php"; ?>
<div id="wrap">
 
<ul id="nav">
<li><a href="#content_1" class="selected">Google News</a></li>

</ul>
 
    <div id="mainContent">
 
        <div id="content_1" class="rss-box">
            <?php getGoogleNewsFeed("http://news.google.com/?output=rss"); ?>
        </div><!--end content 1-->
    </div><!--end main content -->
 
</div><!--end wrap-->
</body>
</html>