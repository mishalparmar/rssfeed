<?php
session_start();
?>
<!DOCTYPE html>
	<head>
		<meta charset="utf-8" />

<link href="css/table.css" rel="stylesheet">
		<!-- Use the ID of your slider here to avoid the flash of unstyled content -->
	  	<style type="text/css">
	  		#featured { width: 565px; height: 290px; background: #009cff url('orbit/loading.gif') no-repeat center center; overflow: hidden; }
	  		/* Want a different Loading GIF - visit http://www.webscriptlab.com/ - that's where we go this one :) */
	  	</style>
		
		<!-- Attach our CSS -->
	  	<link rel="stylesheet" href="orbit.css">	
	  	
		<!--[if IE]>
			<style type="text/css">
				.timer { display: none !important; }
				div.caption { background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
			</style>
		<![endif]-->
	  	
		<!-- Attach necessary scripts -->
		<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
		<script type="text/javascript" src="jquery.orbit.min.js"></script>
		
		<!-- Run the plugin -->
		<script type="text/javascript">
			$(window).load(function() {
				$('#featured').orbit({
					'bullets': true,
					'timer' : true,
					'animation' : 'horizontal-slide'
				});
			});
		</script>
		
	</head>
	<body>
            <?php
			require_once('header.php');
require_once("includes/getFeed.php");



	$feedurl=$_SESSION['feedurl'];


	$feedcontent=getFeed($feedurl);

	$i=0;
?>
<?php

	$xml = simplexml_load_string(file_get_contents($feedurl));
	echo"<div align='center' class='hero-unit'> <h1>";
	print($xml->channel[0]->title);
	echo " </h1> </div>";
?>

		<div id="featured" style="position:fixed; margin-left:27%; margin-top:10%;"> 
        
		<?php	foreach($feedcontent as $key){

		echo "<img src='".$key[1]."' rel='".$i."' height='100%' width='100%'/>";
	
		echo "<span class='orbit-caption' id='".$i."'> ".$key[0]." </span>";
		$i++;
		}
		?>
		</div> 


	
	</body>
</html>