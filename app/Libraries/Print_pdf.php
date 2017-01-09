<?php
namespace Libraries;
use Resources, Models, Libraries;

class Print_pdf {
    
    public function __construct(){
        //parent::__construct();		
		$this->pdf = Resources\Import::vendor('mpdf60/mpdf');
    }
	public function cetak($filename="contoh",$nama_pemesan='nama_pemesan')
	{
		$filename=$filename;
		$nama_pemesan=$nama_pemesan;
		$this->pdf->mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0); 
 
		$this->pdf->SetDisplayMode('fullpage');
		 
		$this->pdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
		$file=$this->uri->baseUri.'tmp_voucher/voucher_email.php';
		//$this->pdf->WriteHTML(file_get_contents($file));
		$html='
			<!DOCTYPE html>
			<html>
			<head>
				<title>Print Invoice</title>
			   <style>
			   *
			{
				margin:0;
				padding:0;
				font-family:Arial;
				font-size:10pt;
				color:#000;
			}
			body
			{
				width:100%;
				font-family:Arial;
				font-size:10pt;
				margin:0;
				padding:0;
			}
			 
			p
			{
				margin:0;
				padding:0;
			}
			 
			#wrapper
			{
				width:180mm;
				margin:0 15mm;
				border:0.1mm dashed #220044; 
				border-radius: 2mm;
				background-clip: border-box;
				padding:1mm;
			}

			 
			.page
			{
				height:297mm;
				width:210mm;
				page-break-after:always;
			}

			#table_border
			{
				border-left: 1px solid #ccc;
				border-top: 1px solid #ccc;
				 
				border-spacing:0;
				border-collapse: collapse; 
				 
			}
			 
			#table_border td 
			{
				border-right: 1px solid #ccc;
				border-bottom: 1px solid #ccc;
				padding: 2mm;
			}
			 
			#table_border.heading
			{
				height:50mm;
			}
			 
			h1.heading
			{
				font-size:14pt;
				color:#000;
				font-weight:normal;
			}
			 
			h2.heading
			{
				font-size:9pt;
				color:#000;
				font-weight:normal;
			}
			 
			hr
			{
				color:#ccc;
				background:#ccc;
			}
			 
			#invoice_body
			{
				height: auto;
				/* height: 149mm; */
			}
			 
			#invoice_body , #invoice_total
			{   
				width:100%;
			}
			#invoice_body table , #invoice_total table
			{
				width:100%;
				border-left: 1px solid #ccc;
				border-top: 1px solid #ccc;

				border-spacing:0;
				border-collapse: collapse; 
				 
				margin-top:5mm;
				margin-bottom:2mm;
			}
			 
			#invoice_body table td , #invoice_total table td
			{
				text-align:center;
				font-size:9pt;
				border-right: 1px solid #ccc;
				border-bottom: 1px solid #ccc;
				padding:2mm 0;
			}
			 
			#invoice_body table td.mono  , #invoice_total table td.mono
			{
				font-family:monospace;
				text-align:right;
				padding-right:3mm;
				font-size:10pt;
			}
			 
			#footer
			{   
				width:180mm;
				margin:0 15mm;
				padding-bottom:3mm;
			}
			#footer table
			{
				width:100%;
					 
				border-spacing:0;
				border-collapse: collapse; 
			}
			#footer table td
			{
				width:25%;
				text-align:center;
				font-size:9pt;
			}
			   
			   </style>
			</head>
			<body>
			<div id="wrapper" >
				<p style="text-align:left; font-weight:bold; padding-top:5mm;">
				<img src="tmp_voucher/logo2.png" style="width:50%">
				</p>
				<br />
				<table class="heading" style="width:100%;">
					<tr>
						<td >
							<table >
								<tr>
									<td style="width:80mm;" colspan="3">
									<h1 class="heading"><b><u>Customer Detail</u></b></h1></td>
								</tr>
								<tr>
								<td style="width:12mm;"><b>Nama</b></td>
								<td style="width:1mm;">:</td>
								<td style="width:67mm;">'.$nama_pemesan.'</td>			
								</tr>
								<tr>
								<td><strong>Phone</strong></td>
								<td >:</td>
								<td>0998786876</td>			
								</tr>
								<tr>
								<td><strong>Email</strong></td>
								<td >:</td>
								<td>email@mail.com</td>			
								</tr>
							</table>
							
						</td>
						<td rowspan="2" valign="top" align="right" style="padding:3mm;">
							<table id="table_border">
								<tr><td>No. Pesanan : </td><td>0xx09809</td></tr>
								<tr><td>Checkin : </td><td>01-Aug-2011</td></tr>
								<tr><td>Checkout : </td><td>01-Aug-2011</td></tr>
								<tr><td></td><td>2 Hari</td></tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
						<table >
								<tr>
									<td style="width:80mm;" colspan="3">
									<h1 class="heading"><b><u>Hotel</u></b></h1></td>
								</tr>
								<tr>
								<td style="width:22mm;"><strong>Nama Hotel<strong></td>
								<td style="width:1mm;">:</td>
								<td style="width:57mm;">Nama Hotelnya</td>			
								</tr>
								<tr>
								<td ><strong>Alamat</strong></td>
								<td >:</td>
								<td >Alamat Hotelnya</td>			
								</tr>
						</table>
						</td>
					</tr>
				</table>
					 
					 
				<div id="content">
					 
					<div id="invoice_body">
						<table>
						<tr style="background:#eee;">
							<td rowspan="2" style="width:5%;"><b>No</b></td>
							<td rowspan="2"><b>Rooms</b></td>
							<td colspan="2" style="width:10%;"><b>Quantity</b></td>
							<td rowspan="2" style="width:15%;"><b>Rate</b></td>
							<td rowspan="2" style="width:15%;"><b>Total</b></td>
						</tr>
						<tr style="background:#eee;">
							<td style="width:10%;"><b>Rooms</b></td>
							<td style="width:10%;"><b>Days</b></td>
						</tr>
						</table>
						 
						<table>
						<tr>
							<td style="width:5%;">1</td>
							<td style="text-align:left; padding-left:10px;">Nama Kamarnya<br />Description : Upgradation of telecrm</td>
							<td class="mono" style="width:10%;">1</td>
							<td class="mono" style="width:10%;">2</td>
							<td style="width:15%;" class="mono">157.00</td>
							<td style="width:15%;" class="mono">157.00</td>
						</tr>      
						 
					</table>
					</div>
					<br/>	
					<div id="invoice_total">
					   Perminataan Khusus :
						<table>
							<tr>
								<td class="mono" style="text-align:center; ">ini adalah permintaan khusus	</td>
								
							</tr>
						</table>
					</div>
					<br />
					<hr />
					<br />
					 
					<table style="width:100%; height:35mm;">
						<tr>
							<td style="width:65%; text-align:left;" valign="top" class="mono">
								Informasi :<br />
								Dianjurkan untuk melakukan pengecekan keaslian voucher ini melalui alamat:<br />
								http://hotelkarawang.com/index.php/booking/cek_pemesanan
							</td>
						</tr>
					</table>
				</div>
				 
				<br />
				</div>
				 
				<htmlpagefooter name="footer">
					<hr />
					<div id="footer"> 
						<table>
							<tr >
							<td><img src="tmp_voucher/phone.png" > &nbsp;<strong>Customer Service</strong></td>
							<td><strong>Customer Service Email</strong></td>
							<td rowspan="2"><img src="tmp_voucher/logo2.png" style="width:25%;"></td>
							</tr>
							<tr>
							<td>085699999</td>
							<td>cs@hotelkarawang.com</td>
							
							</tr>
						</table>
					</div>
				</htmlpagefooter>
				<sethtmlpagefooter name="footer" value="on" />
				 
			</body>
			</html>
		';
		$this->pdf->WriteHTML($html);
				 
		$this->pdf->Output('upload/voucher/'.$filename.'.pdf','F');
		$this->pdf->Output();
		
	}
	
}