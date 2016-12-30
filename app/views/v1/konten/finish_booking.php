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
					<span class="size16px bold dark left">
					<i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Proses Verifikasi Pembayaran				
					</span>					
					<div class="clearfix"></div>
					<div class="line4"></div>
					<p id="pesannya">Mohon Tunggu beberapa saat, pembayaran anda sedang kami verifikasi dalam waktu:</p>
					<div class="center">
					<div class="col-md-12">
					<div class="line4"></div>
					<div class="alert alert-info">
					<i class="icon fa fa-check"></i>
					<h3>No Pemesanan: <strong><?php echo $no_pesanan;?></strong></h3>
					<input type="hidden" id="no_pesanan" value="<?php echo $no_pesanan;?>">	
					<div id="waktu_mundur"></div>
					<p class="center">Voucher Hotel akan secara otomatis terkirim jika verifikasi berhasil.</p>
					</div>
						<div class="line2"></div>											
					</div>
					</div>
					<!-- MODAL ALERT -->
					
					<br/>
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
				<div class="pagecontainer2 paymentbox grey">
					<div class="hpadding20">
					<h3 class="opensans"><i class="fa fa-bed" aria-hidden="true"></i>&nbsp;Info Pemesanan</h3>
						<div class="line4"></div>
						<img src="<?php echo $this->uri->baseUri.'upload/gambar_hotel/thumbs/'.$gambar_hotel->url_gambar;?>" style="width:71px; height:71px;"width="71px" height="71px" class="left margright20" alt=""/>
						<span class="opensans size18 dark bold"><?php echo $data_hotel->nama_hotel;?></span></br/>
						<span class="opensans size13 grey"><?php echo $nama_kecamatan;?></span><br/>
						<img src="<?php echo $this->uri->baseUri.STYLE;?>images/bigrating-5.png" alt=""/><br/>
						<?php $room_ratenya=$total_bayar / $selisih_hari / $jml_kamar;?>
						<span class="lred2 bold size18">Room Rate: <?php echo 'Rp. '.number_format($room_ratenya,0,'','.');?> /malam</span>
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