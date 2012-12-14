<?php
function getFeed($feed_url) {
	
	$content = file_get_contents($feed_url);
	
	$xml = simplexml_load_string(file_get_contents($feed_url));
	
	$feedcontent=array();
	$i=0;
	$doc=new DOMDocument();
    
	$namespaces = $xml->getNameSpaces(true);
	
	foreach ($xml ->channel[0]->item as $item) {
		
		$feedcontent[$i][0]=$item->title;
		$feedcontent[$i][2]=$item->link;
		$content = $item->children($namespaces['content']);

		$string= (string)trim($content->encoded);

		@$doc->loadHTML($string);
	
		$tag=$doc->getElementsByTagName('img');

		foreach($tag as $tags)
		{
			$img=$tags->getAttribute('src');
			$feedcontent[$i][1]=$img;
			break;
		}
		$i++;
	}
return $feedcontent;
}
?>
