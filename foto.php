<?php 

require_once 'bibliotecas/mpdf/mpdf.php';

if(isset($_GET['download'])) :

	$nomeImagem = $_GET['download'];

	$html = "<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
	<img src=\"certificados/$nomeImagem\" width=\"1200px\">
	</body>
	</html>";

	$mpdf=new mPDF('c', 'A4-L'); 
	$mpdf->SetDisplayMode('fullpage');
	$mpdf->WriteHTML($html);
	$mpdf->Output();
	
endif;