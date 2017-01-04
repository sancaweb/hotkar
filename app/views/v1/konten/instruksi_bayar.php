<!DOCTYPE html>
<html>
	<?php $this->output(TEMPLATE.'header');?>
  <body id="top" class="thebg" >
    
	<?php $this->output(TEMPLATE.'top_menu');?>
	
	<div class="container breadcrub">
	    <div>
			
		</div>
		<div class="clearfix"></div>
		<div class="brlines"></div>
	</div>	

	<!-- CONTENT -->
	<div class="container">

		
		<div class="container mt25 offset-0">
			
			
			<!-- LEFT CONTENT -->
			<?php 
			$id_hotel=$data_kamar->id_hotel;
			if($this->hotel->view_detail_hotel_byId($data_kamar->id_hotel)){
				$data_hotel=$this->hotel->view_detail_hotel_byId($data_kamar->id_hotel);
			}
			$total_rev=$this->review->hitung_rev_by_Idhotel($id_hotel);
			$total_rekom=$this->review->hitung_rekom_by_Idhotel($id_hotel);
			if($total_rev==0 || $total_rekom==0){
				$persen_rekom=0;
			}else{
				$persen_rekom=ceil(($total_rekom / $total_rev)*100);
			}	
			
			//$rata_rating=number_format($this->review->rata_penilaian($id_hotel)/4,1);
			$rata_rating=number_format($this->review->rata_penilaian($id_hotel),1);
			$tgl_checkin=new DateTime($checkin);
			$tgl_checkout=new DateTime($checkout);
			
			$selisih_hari=$tgl_checkin->diff($tgl_checkout)->days;
			if($this->hotel->getone_gambar_hotel_by_idHotel($id_hotel)){
				$gambar_hotel=$this->hotel->getone_gambar_hotel_by_idHotel($id_hotel);
			}else{
				$gambar='blank.jpg';
			}
			
			if($this->pengaturan->get_nama_kec_karawang_byId($data_hotel->kecamatan)){
				$nama_kecamatan=$this->pengaturan->get_nama_kec_karawang_byId($data_hotel->kecamatan)->nama_kec;
			}else{
				$nama_kecamatan='';
			}
						
			?>
			<div class="col-md-8 pagecontainer2 offset-0">
				<div class="padding30 grey">				
				
				<div class="alert alert-info">
					<h2><i class="icon fa fa-check"></i> Petunjuk Pembayaran. (Batas waktu 1 Jam)</h2>
					
					<?php
					 if($book_date){
						 $book_datenya=$book_date;
						 $date_create=date_create($book_datenya);
						 
						 $book_date_format=date_format($date_create, 'F d, Y H:i:s');
						 
						 $date_time=new DateTime($book_date_format);
						 $date_modify=date_modify($date_time, "+1 hour");
						 $date_for_count=date_format($date_modify, 'F d, Y H:i:s');
						 $waktu_sekarang=date('F d, Y H:i:s');
						 
						 if($date_for_count < $waktu_sekarang){
							 $date_count='';
						 }else{
							 $date_count=$date_for_count;
						 }
					 }
				?>
				</div>
				<div class="alert alert-info">
					<?php if($no_pesanan){
						$no_pesanan=$no_pesanan;
					}?>
					
					<h3><i class="fa fa-hand-o-right" aria-hidden="true"></i> Catat No. Pesanan Anda : 
					<i class="fa fa-barcode" aria-hidden="true"></i> <?php echo $no_pesanan;?></h3>
				</div>
				
					<span class="size16px bold dark left">
					<i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Lakukan Transfer					
					</span>
					<div class="roundstep active right">1</div>
					<div class="clearfix"></div>
					<div class="line4"></div>
					<p>Mohon transfer sesuai jumlah harga total ke rekening bank di bawah ini:</p>
					<div class="center">
					<div class="col-md-12">
					<div class="line4"></div>
						<span class="green size18"><b>Nama Bank</b></span>				
						<p class="grey2 size16"><strong>BCA</strong></p>
						<div class="line2"></div>											
						<span class="green size18"><b>Nomer Rekening</b></span>
						<p class="grey2 size16"><strong>012345678</strong></p>
						<div class="line2"></div>											
						<span class="green size18"><b>Nama Pemilik</b></span>
						<p class="grey2 size16"><strong>HotelKarawang.com</strong></p>
						<div class="line2"></div>										
						<span class="green size18"><b>Total Bayar</b></span>
						<p class="grey2 size16"><strong>
							<strong><?php echo 'Rp. '.number_format($total_bayar,0,'','.');?> </strong>
						</strong></p>
						<p class="red size18">(Jangan di bulatkan)</p>
						<div class="line2"></div>											
						</div>
					</div>
					<br/>
					<br/>
					<span class="size16px bold dark left">
					<i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Konfirmasikan Pembayaran				
					</span>
					<div class="roundstep active right">2</div>
					<div class="clearfix"></div>
					<div class="line3"></div><br/>
					<p>Setelah anda melakukan transfer ke rekening dan dengan jumlah yang sesuai, 
					segera konfirmasikan pembayaran anda dengan mengklik tombol dibawah ini.</p>
					
					<?php if($date_count==''){
						?>
						<button id="button_konfirmasi" class="center btn-danger margtop20 btn-block" disabled>Mohon maaf, batas waktu pembayaran anda sudah habis. <br/>Silahkan ulangi kembali pemesanan.!</button>
						<?php
					}else{
						?>
						<a href="<?php echo $this->uri->baseUri.'index.php/booking/finish_booking/'.base64_encode($id_pesanan);?>" id="button_konfirmasi" class="bluebtn margtop20 btn-block center">Konfirmasi Pembayaran</a>
						<?php
					}?>
					
					
					<div class="clearfix"></div>
					<div class="line4"></div>
					<div class="alert alert-info">
					Informasi Penting:<br/>
					<p class="size12">• Pemesanan ini tidak dapat di <i>Refund</i>.</p>
					<p class="size12">• Saat checkin harap menenujukan KTP/SIM/Paspor dan tanda pengenal resmi lainnya.</p>
					<p class="size12">• Kesalahan dalam proses transfer akan mengakibatkan terhambatnya proses verifikasi pembayaran.</p>
					</div>
				</div>
		
			</div>
			<!-- END OF LEFT CONTENT -->			
			
			<!-- RIGHT CONTENT -->
			<div class="col-md-4" >
				<div class="pagecontainer2 needassistancebox grey">
					<div class="hpadding20">						
						<h3 class="opensans"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;Sisa Waktu Pembayaran</h3>
						<div class="line4"></div>
						<?php
							if($date_count == ''){
								?>
								<p class="size18 red center" > Waktu Anda sudah habis, silahkan ulangi kembali pemesanan.</p>
								<?php
							}else{
								?>
								<p class="size14 grey" id="waktu_mundur"></p>
								<?php
							}
						?>
						
					</div>
				</div>
				<br/>
				<div class="pagecontainer2 paymentbox grey">
					<div class="hpadding20">
					<h3 class="opensans"><i class="fa fa-bed" aria-hidden="true"></i>&nbsp;Info Pemesanan</h3>
						<div class="line4"></div>
						<img src="<?php echo $this->uri->baseUri.'upload/gambar_hotel/thumbs/'.$gambar_hotel->url_gambar;?>" style="width:71px; height:71px;"width="71px" height="71px" class="left margright20" alt=""/>
						<span class="opensans size18 dark bold"><?php echo $data_hotel->nama_hotel;?></span></br/>
						<span class="opensans size13 grey"><?php echo $nama_kecamatan;?></span><br/>
						<img src="<?php echo $this->uri->baseUri.STYLE;?>images/bigrating-5.png" alt=""/><br/>
						<span class="lred2 bold size18">Room Rate: <?php echo 'Rp. '.number_format($data_kamar->harga,0,'','.');?> /malam</span>
					<div class="line3"></div>
					<table class="table table-bordered">
						<tr>
							<td>Guests recommendations</td>
							<td class="center green bold"><?php echo $persen_rekom;?>%</td>
						</tr>
						<tr>
							<td>Guest ratings</td>
							<td class="center green bold" style="width:30%;"><?php echo $rata_rating;?> / 10</td>
						</tr>
						</table>
					</div>
					<div class="line3"></div>
					
					<div class="hpadding30 margtop30">
						
							<table class="table table-bordered margbottom20">
							<tr>
								<td colspan=2>
								<span class="lblue bold size18">Data Pesanan</span>
								</td>
							</tr>
							
							<tr>
								<td colspan=2>
								<span class="dark"><?php echo $jml_kamar;?> Kamar</span>: <br/><?php echo $data_kamar->nama_kamar;?>
								</td>
							</tr>
							<tr>							
								<td colspan=2><span class="dark"><?php echo $selisih_hari;?> Malam</span>: <br/><?php echo date("M d, Y",strtotime($checkin)).'-'.date("M d, Y",strtotime($checkout));?></td>
							</tr>
							<tr>
							</tr>
						</table>
					</div>	
					<div class="line3"></div>

				</div><br/>
				
				<?php $this->output(TEMPLATE.'sidebar/right_assistence');?>
				
				<br/>
			</div>
			<!-- END OF RIGHT CONTENT -->
			
			
		</div>
		
		
	</div>
	<!-- END OF CONTENT -->
	

	
	
	<!-- FOOTER -->
	<?php $this->output(TEMPLATE.'footer');?>
	<?php $this->output(TEMPLATE.'footer_script');?>
	
  </body>
</html>