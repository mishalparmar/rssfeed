<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mishal | RSS Feed</title>
<link href="css/table.css" rel="stylesheet">
</head>
<?php

require_once('header.php');
require_once("includes/getFeed.php");
?>
<body><div>

<?php


	$feedurl=$_SESSION['feedurl'];
//	echo $_SESSION['feedurl'];
?>

<div>

<?php

	$xml = simplexml_load_string(file_get_contents($feedurl));
	echo"<div align='center' class='hero-unit'> <h1>";
	print($xml->channel[0]->title);
	echo "</h1> </div>";
?>

</div>
<div>
<table class="table table-hover"  >
<tr>
<th>  Index <th> Title <th> Image </tr>
<?php
$link=array();
	$feedcontent=getFeed($feedurl);
	$i=0;
	foreach($xml->channel[0]->item as $item){
		
	$link[$i]=$item->link;
	$i++;
	}
	$i=1;
	foreach($feedcontent as $key){
	
		echo "<tr> <td> ".$i." </td>";
		echo " <td> <a href=".$link[$i-1].">".$key[0]."</a> </td>";
		echo"<Td><img src=".$key[1]." height=50px width=50px> </td></tr>";
		$i++;

	}
?>


</table>
</div>

</body>
</html>