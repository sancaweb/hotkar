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
					<span class="size16px bold dark left">Review Data Pemesanan</span>
					<div class="roundstep active right">1</div>
					<div class="clearfix"></div>
					<div class="line4"></div><br/><br/>
					<form class="form-horizontal">				
						
						<div class="form-group">
							  <label for="nama_guest" class="col-sm-4 control-label">Nama :</label>
							  <div class="col-sm-8" id="nama_guest_grup" >							  
								<input type="text" class="form-control input-lg" value="<?php echo $nama_guest;?>" disabled>
							  <span id="helpBlock" class="help-block lgrey">Isi nama sesuai KTP/SIM/Paspor* </span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label for="no_tlp" class="col-sm-4 control-label">No Telepon :</label>
							  <div class="col-sm-8" id="nama_guest_grup" >
								<input type="text" class="form-control input-lg" value="<?php echo $no_tlp;?>" disabled>
							  <span id="helpBlock" class="help-block lgrey">Contoh: 08123456 </span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label for="email" class="col-sm-4 control-label">Email :</label>
							  <div class="col-sm-8" id="nama_guest_grup" >
								<input type="email" class="form-control input-lg" value="<?php echo $email;?>" disabled>
							  <span id="helpBlock" class="help-block lgrey">contoh: contoh@hotelkarawang.com	* </span>
							  </div>
							  
							</div>
							
							<div class="form-group">
							  <label for="permintaan" class="col-sm-4 control-label">Permintaan Khusus (Optional) :</label>
							  <div class="col-sm-8" id="testimoni_grup">
							  <textarea name="permintaan" class="form-control" disabled><?php echo $permintaan;?></textarea>
							  <span id="helpBlock" class="help-block lgrey">Permintaan terpenuhi atau tidak, tergantung kebijakan hotel bersangkutan. hotelkarawang.com tidak bertanggung jawab apabila pihak hotel tidak memenuhi permintaan khusus anda.</span>
							  </div>
							</div>
							
							<div class="clearfix"></div>
					
							<br/>
							<br/>
							<span class="size16px bold dark left">Pilih Bank</span>
							<div class="roundstep right">2</div>
							<div class="clearfix"></div>
							<div class="line4"></div>
							
							<div class="row">
								  <div class="col-md-4">
									<div class="itemlabel_bank">
									<div class="radio">
									  <label>
									  
										<input type="radio" id="optionsRadios1" value="1" <?php if($nama_bank==1){echo 'checked';}?> disabled>
										Transfer ke Bank Mandiri
									  
									  </label>
									</div>
										<div class="center">
										<div class="line4"></div>			
											<span class="dark size24"><b>Bank Mandiri</b></span>
											<div class="line2"></div>											
											<span class="green size18"><b>Nomer Rekening</b></span>
											<p class="grey2 size16"><strong>0875545245</strong></p>
											<div class="line2"></div>											
											<span class="green size18"><b>Nama Pemilik</b></span>
											<p class="grey2 size16"><strong>HotelKarawang.com</strong></p>
											<div class="line2"></div>											
											
										</div>
									</div>
								</div>
								  <div class="col-md-4">
									<div class="itemlabel_bank">
									<div class="radio">
									  <label>
										<input type="radio" id="optionsRadios1" value="2" <?php if($nama_bank==2){echo 'checked';}?> disabled>
										Transfer ke Bank BCA
									  </label>
									</div>
										<div class="center">
										<div class="line4"></div>			
											<span class="dark size24"><b>Bank BCA</b></span>
											<div class="line2"></div>											
											<span class="green size18"><b>Nomer Rekening</b></span>
											<p class="grey2 size16"><strong>012345678</strong></p>
											<div class="line2"></div>											
											<span class="green size18"><b>Nama Pemilik</b></span>
											<p class="grey2 size16"><strong>HotelKarawang.com</strong></p>
											<div class="line2"></div>											
											
										</div>
									</div>
								</div>
								  <div class="col-md-4">
									<div class="itemlabel_bank">
									<div class="radio">
									  <label>
										<input type="radio" id="optionsRadios1" value="3" <?php if($nama_bank==3){echo 'checked';}?> disabled>
										Transfer ke Bank BRI
									  </label>
									</div>
										<div class="center">
										<div class="line4"></div>			
											<span class="dark size24"><b>Bank BNI</b></span>
											<div class="line2"></div>											
											<span class="green size18"><b>Nomer Rekening</b></span>
											<p class="grey2 size16"><strong>34523452345</strong></p>
											<div class="line2"></div>											
											<span class="green size18"><b>Nama Pemilik</b></span>
											<p class="grey2 size16"><strong>HotelKarawang.com</strong></p>
											<div class="line2"></div>											
											
										</div>
									</div>
								</div>							  
							  </div>
					
					<div class="clearfix"></div>					
					<br/>
					<br/>
					<span class="size16px bold dark left">Selesai</span>
					<div class="roundstep right">3</div>
					<div class="clearfix"></div>
					<div class="line4"></div>		
					
					<div class="alert alert-info">
					Informasi Penting:<br/>
					<p class="size12">• Pemesanan ini tidak dapat di <i>Refund</i>.</p>
					<p class="size12">• Saat checkin harap menenujukan KTP/SIM/Paspor dan tanda pengenal resmi lainnya.</p>
					</div>		
					Dengan memilih untuk menyelesaikan pemesanan ini anda telah menyatakan bahwa anda telah membaca dan menyetujui 
					<a href="#" class="clblue"><i>Rules</i> (Aturan)</a>, <a href="#" class="clblue"><i>terms & conditions</i> (Syarat dan Ketentuan)</a> , dan <a href="#" class="clblue">privacy policy (Kebijakan Privasi)</a>.	<br/>		
					</form>
					<form class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" role="form" method="POST" action="<?php echo $this->uri->baseUri;?>index.php/booking/info_pembayaran">
						<input type="hidden" name="checkin" value="<?php echo $checkin;?>" readonly>
						<input type="hidden" name="checkout" value="<?php echo $checkout;?>" readonly>
						<input type="hidden" name="id_kamar" value="<?php echo $data_kamar->id;?>" readonly>
						<input type="hidden" name="id_hotel" value="<?php echo $data_kamar->id_hotel;?>" readonly>
						<input type="hidden" name="jml_kamar" value="<?php echo $jml_kamar;?>" readonly>
						<input type="hidden" name="no_pesanan" value="<?php echo $no_pesanan;?>" readonly>
						
						<input name="nama_guest" type="hidden" class="form-control input-lg" value="<?php echo $nama_guest;?>" readonly>
						<input name="no_tlp" type="hidden" class="form-control input-lg" value="<?php echo $no_tlp;?>" readonly>
						<input name="email" type="hidden" class="form-control input-lg" value="<?php echo $email;?>" readonly>
						<textarea style="display:none;" class="form-control" name="permintaan" readonly><?php echo $permintaan;?></textarea>
						<input type="hidden" name="nama_bank" value="<?php echo $nama_bank;?>" >
						<input type="hidden" name="total_bayar" value="<?php echo $total_bayar;?>" >
						
					<button type="submit" class="bluebtn margtop20">Lanjut Pembayaran</button>	
					
					</form>
			
				</div>
		
			</div>
			<!-- END OF LEFT CONTENT -->			
			
			<!-- RIGHT CONTENT -->
			<div class="col-md-4" >
				
				<div class="pagecontainer2 paymentbox grey">
					<div class="padding30">
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
					<div class="padding30">	
											
						<span class="left size14 dark">Total Pembayaran:</span>
						<span class="right lred2 bold size18">
							<?php echo 'Rp. '.number_format($total_bayar,0,'','.');?>
						</span>
						<div class="clearfix"></div>
					</div>


				</div><br/>
				
				<?php $this->output(TEMPLATE.'sidebar/right_assistence');?>
				
				<br/>
				<!--
				<div class="pagecontainer2 loginbox">
					<div class="cpadding1">
						<span class="icon-lockk"></span>
						<h3 class="opensans">Log in</h3>
						<input type="text" class="form-control logpadding" placeholder="Username">
						<br/>
						<input type="text" class="form-control logpadding" placeholder="Password">
						<div class="margtop20">
							<div class="left">
								<div class="checkbox padding0">
									<label>
									  <input type="checkbox">Remember
									</label>
								</div>
								<a href="#" class="greylink">Lost password?</a><br/>
							</div>
							<div class="right">
								<button class="btn-search5" type="submit" onclick="errorMessage()">Login</button>	
							</div>
						</div>
						<div class="clearfix"></div><br/>
					</div>
				</div><br/>
			-->
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