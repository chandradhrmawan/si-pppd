<?php
	// error_reporting(0);
	require_once('tcpdf/config/lang/eng.php');
	require_once('tcpdf/tcpdf.php');
	$pageLayout = array(300,400 ); //or array($height, $width) 
	@$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $pageLayout, true, 'UTF-8', false);

	$title = 'Surat Jalan';
	$subject = 'subject';
	
	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('IPC');
	$pdf->SetTitle($title);
	$pdf->SetSubject($subject);
	$pdf->SetKeywords($title.', IPC, NPKTOS');

	// set default header data
	//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING);

	// remove default header/footer
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);

	// set header and footer fonts
	//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	// $pdf->SetDefaultMonospacedFont(TIMES);

	//set margins
	$pdf->SetMargins($left = 4,
					 $top = 4,
					 $right = 4,
					 $keepmargins = false );
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	//set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	//set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	//set some language-dependent strings
	// $pdf->setLanguageArray($l);

	// add a page
	$pdf->AddPage();

	//$pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);

	$pdf->SetFont('courier', '', 8);
	$pdf->setPageOrientation('P');
	
	$barcode_1 = "";
	$detail_content = '123123';

	$border="0";
	$gen_code = "TRX".$detail_content;
	$params = $pdf->serializeTCPDFtagParameters(array($gen_code, 'C39', '', '', 80, 30, 0.4, array('position'=>'S', 'border'=>false, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));
	$barcode_1 .= '<tcpdf method="write1DBarcode" params="'.$params.'" />';

	// debux($detail_content);
	// debux($list_vin);

	$panel_1 = '<div class="container_1">
				<table border="1" cellspacing="2" cellpadding="2">
				<tr>
				<td>
					<table border="'.$border.'" cellspacing="2" cellpadding="2" width="100%">
						<tr>
							<td width="25%"><h2><u>Data Perjalanan</u></h2></td>
							<td></td>
							<td rowspan="7">
							</td>
						</tr>
						<tr>
							<td><h2>Nama Pengemudi : </h2></td>
							<td><h2>'.$data_sewa->nama_supir.'</h2></td>
							
						</tr>
						<tr>
							<td><h2>Tujuan : </h2></td>
							<td><h2>'.$data_sewa->lokasi_tujuan.'</h2></td>
							
						</tr>
						<tr>
							<td><h2>Keperluan : </h2></td>
							<td><h2>'.$data_sewa->tujuan_perjalanan.'</h2></td>
							
						</tr>
						<tr>
							<td><h2>Berangkat Tanggal </h2></td>
							<td><h2>'.view_date_hi($data_sewa->tgl_sewa).'</h2></td>
							
						</tr>
						<tr>
							<td><h2>Kembali Tanggal :</h2></td>
							<td><h2>'.view_date_hi($data_sewa->tgl_kembali).'</h2></td>
							
						</tr>
						<tr>
							<td><h2>Estimasi Jarak Perjalanan :</h2></td>
							<td><h2>'.$data_sewa->jarak.'</h2></td>
							
						</tr>
						<tr>
							<td><h2>Km Berangkat :</h2></td>
							<td><h2>'.$data_sewa->km_akhir.' Km</h2></td>
							
						</tr>
					</table>
					</td>
					</tr>
				</table>
	</div>';

	$panel_1a = '<div class="container_1">
				<table border="1" cellspacing="2" cellpadding="2">
				<tr>
				<td>
					<table border="'.$border.'" cellspacing="2" cellpadding="2" width="100%">
						<tr>
							<td width="25%"><h2><u>Data Pemohon</u></h2></td>
							<td></td>
							<td rowspan="7">
							</td>
						</tr>
						<tr>
							<td><h2>Nama Pemohon : </h2></td>
							<td><h2>'.$data_sewa->nama.'</h2></td>
							
						</tr>
						<tr>
							<td><h2>Nama Jabatan : </h2></td>
							<td><h2>'.$data_sewa->nm_jabatan.'</h2></td>
							
						</tr>
						<tr>
							<td><h2>Tanggal Sewa : </h2></td>
							<td><h2>'.view_date_hi($data_sewa->tgl_sewa).'</h2></td>
							
						</tr>
						<tr>
							<td><h2>Alamat : </h2></td>
							<td><h2>'.$data_sewa->alamat.'</h2></td>
							
						</tr>
					</table>
					</td>
					</tr>
				</table>
	</div>';

	$i=1;
	//foreach($list_vin as $key => $value):
	$panel_2 = "";
	$gen_code_1 = $data_sewa->no_plat;
	$value = '123';

	$params_1 = $pdf->serializeTCPDFtagParameters(array($gen_code_1, 'C39', '', '', 80, 20, 0.4, array('position'=>'S', 'border'=>false, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));
	$barcode_2 = '<tcpdf method="write1DBarcode" params="'.$params_1.'" />';
	
	$panel_2 .= '<div class="container_1">


				<table border="1" cellspacing="2" cellpadding="2" width="100%">
					<tr>
						<td height="80" width="100%"><h2>
							<u>NO POLISI : '.$barcode_2.'</u></h2>
						</td>
						
					</tr>
					
				</table>

				<table border="1" cellspacing="2" cellpadding="2" width="100%">
					<tr>
						<td>
								<table>
									<tr>
										<td><h2><u>Data Kendaraan </u></h2></td>
										<td></td>
									</tr>
									<tr>
										<td><h2>Nama Kendaraan : </h2></td>
										<td><h2>'.$data_sewa->judul.'</h2></td>
									</tr>
									<tr>
										<td><h2>Model : </h2></td>
										<td><h2>'.$data_sewa->model.' </h2></td>
									</tr>
									<tr>
										<td><h2>Transmisi : </h2></td>
										<td><h2>'.$data_sewa->transmisi.'</h2></td>
									</tr>
									
									
								</table>
						</td>
						<td>
								<table>
									<tr>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td><h2>Tenaga : </h2></td>
										<td><h2>'.$data_sewa->tenaga.' </h2></td>
									</tr>
									<tr>
										<td><h2>Nomor Mesin : </h2></td>
										<td><h2>'.$data_sewa->no_mesin.' </h2></td>
									</tr>
									<tr>
										<td><h2>Keterangan : </h2></td>
										<td><h2>'.$data_sewa->keterangan.' </h2></td>
									</tr>
									
								</table>
						</td>
						<td>
								<table>
									<tr>
										<td><h1>Kordinat Perjalanan</h1></td>
									</tr>
									<tr>
										<td><h2>Longitude : <br/>'.$data_sewa->lon.'</h2></td>
									</tr>
									<tr>
										<td><h2>Latitude : <br/>'.$data_sewa->lat.'</h2></td>
									</tr>
								</table>
						</td>
					</tr>
				</table>
	</div> <br/>';
	$i+=1;
	//endforeach;

	$panel_3 = '
	<div class="container">
		<table border="0" cellspacing="2" cellpadding="2">
			<tr>
				<td align="right">
				<br/>
					<h1><u>Jakarta,'.date('d-m-Y H:i').' </u></h1>
					<h1>Petugas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
				</td>
			</tr>
			<tr>
				<td align="right"><br/></td>
			</tr>
			<tr>
				<td align="right"><br/></td>
			</tr>
			<tr>
				<td align="right"><br/></td>
			</tr>
			<tr>
				<td align="right"><br/></td>
			</tr>
			<tr>
				<td align="right">
				<br/>
					<h1><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></h1>
				</td>
			</tr>
		</table>
	</div>
	';
	
	$html = "";
	$html .= '
	<style type="text/css">
		.container_1{
		    border-style: double;
		}
		.cntr{
			text-align: center;
		}
		.logo{
			width: 5px;
		}
		.clear{
			border-right:none;
			border-left:none;
			border-bottom:none;
			border-top:none;
		}
	</style>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Print Receiving Card</title>
	</head>
	<body>

	<div class="container_1">
	<table border="1" cellspacing="2" cellpadding="2">
			<table border="0" cellspacing="2" cellpadding="2">
				<tr>
					<td colspan="1">
						
					</td>
					<td colspan="2" align="center">
						<h1>Surat Jalan</h1>
					</td>
					<td style="text-align:right;">
						<div class="logo">
							
						</div>
					</td>
				</tr>
			</table>


	<table border="0" cellspacing="2" cellpadding="2">
	<tr>
		<td><h2>SIKOPMIL</h2></td>
	</tr>
	</table>
	</table>
	</div>

	<br/>
	'.$panel_1.'
	<br/>
	'.$panel_1a.'
	<br/>
	'.$panel_2.'
	<br/>
	'.$panel_3.'
	<br/>
	</body>
	</html>';



// 	$html_1 = '<h1>Test TCPDF Methods in HTML</h1>
// <h2 style="color:red;">IMPORTANT:</h2>
// <span style="color:red;">If you are using user-generated content, the tcpdf tag can be unsafe.<br />
// You can disable this tag by setting to false the <b>K_TCPDF_CALLS_IN_HTML</b> constant on TCPDF configuration file.</span>
// <h2>write1DBarcode method in HTML</h2>';

// $params = $pdf->serializeTCPDFtagParameters(array('CODE 39', 'C39', '', '', 80, 30, 0.4, array('position'=>'S', 'border'=>true, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));
// $html_1 .= '<tcpdf method="write1DBarcode" params="'.$params.'" />';

// $params = $pdf->serializeTCPDFtagParameters(array('CODE 128', 'C128', '', '', 80, 30, 0.4, array('position'=>'S', 'border'=>true, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));
// $html_1 .= '<tcpdf method="write1DBarcode" params="'.$params.'" />';

// $html_1 .= '<tcpdf method="AddPage" /><h2>Graphic Functions</h2>';

// $params = $pdf->serializeTCPDFtagParameters(array(0));
// $html_1 .= '<tcpdf method="SetDrawColor" params="'.$params.'" />';

// $params = $pdf->serializeTCPDFtagParameters(array(50, 50, 40, 10, 'DF', array(), array(0,128,255)));
// $html_1 .= '<tcpdf method="Rect" params="'.$params.'" />';


// output the HTML content
// $pdf->writeHTML($html, true, 0, true, 0);
	
// print_r($html);die;
// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='10', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

//Close and output PDF document
$pdf->Output($title.'.pdf', 'I'); // END OF FILE