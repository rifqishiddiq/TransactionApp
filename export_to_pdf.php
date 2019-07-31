<?php

	require_once 'dompdf/autoload.inc.php';
	use Dompdf\Dompdf;
	$dompdf = new Dompdf();
	$html = '
	<!DOCTYPE html>
	<html>
	<head>
	  <title>Invoice</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

	<div class="container">
	 <center> 
	 <h2>INVOICE TRANSAKSI</h2>
	 <br>        
	 <table class="table bg-success" border="1">
	 <thead>
	 <tr>
	 <td> <b>NO</b> </td>
	 <td> <b>NAMA PRODUK</b> </td>
	 <td> <b>HARGA</b> </td>
	 <td> <b>QTY</b> </td>
	 <td> <b>SUB TOTAL</b> </td>
	 </tr>

	 ';
	$no = 1;
    $total=$_POST["total"];
    $totqty=$_POST["totqty"];
    $jumlah_produk = count($_POST["nama"]); 
    for($i=0;$i<$jumlah_produk;$i++){
        $qty=$_POST["qty"][$i];
        $nama=$_POST["nama"][$i];
        $harga=$_POST["harga"][$i];
        $subtotal=$_POST["subtotal"][$i];
		$html .= '<tr> <td>' . $no . '</td> <td>' . 
		$nama . '</td> <td> Rp. ' . 
		number_format((float)$harga, 0) . '</td> <td>' . 
		$qty . '</td> <td> Rp. ' . 
		number_format((float)$subtotal, 0) . '</td> </tr>';
		$no++;
	} 
	$html .= '<tr> <td colspan="4	" align="right"><b>Total</b> </td> <td><b> Rp. ' .
	number_format((float)$total, 0) . ' </b></td> </tr> </table>';

	$dompdf->loadHtml($html);
	$dompdf->setPaper('A4', 'landscape');
	$dompdf->render();
	$dompdf->stream("dokumentku", array("Attachment" => 0));
	$dompdf->render();
	$output = $dompdf->output();
	file_put_contents('style', $output);

?>
