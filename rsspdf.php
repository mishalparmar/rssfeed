<?php
session_start();
header("Content-Encoding: None", true);
while (ob_get_level()) {
ob_end_clean();
}
require_once("includes/getFeed.php");
require('includes/fpdf.php');
 
	$pdf = new FPDF();
	$feedurl=$_SESSION['feedurl'];	
	$feedcontent=getFeed($feedurl);
	$i=1;
	foreach($feedcontent as $key){		
		$pdf->AddPage();
		$pdf->SetFont('arial','B',16);
		$pdf->AddLink();
		$pdf->MultiCell(0,7,$key[0]);	
		$pdf->Image($key[1],+10,+40,100,100);		
		$i++;	}
	$pdf->Output();
?>
