<?php
 
function getGoogleNewsFeed($feed_url) {
     
    $content = file_get_contents($feed_url);
    $x = new SimpleXmlElement($content);
     
    echo "<ul>";
     
    foreach($x->channel->item as $entry) {
	echo "<div class='rss-item'>";
		echo  "<div class='rss-title'>".$entry->title."</div>";
		echo "<li><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></li>";
	echo "</div>";
    }
    echo "</ul>";
}
?>