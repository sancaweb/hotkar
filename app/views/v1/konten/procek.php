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
			
			<!-- CONTENT -->
			
			
				<?php
				if($data_pesanan){
					$data_pesanan=$data_pesanan;
					$status_order=$this->booking->view_order_status_byId($data_pesanan->status);
					?>
					<div class="col-md-12 pagecontainer2 offset-0">
					<div class="clearfix"></div>
					<p class="aboutarrow"></p><div class="clearfix"></div>
					<div class="line3"></div>
					
					<div class="hpadding50c">
										
						<p class="lato size22 slim ">
						<div class="alert alert-success alert-dismissable textcenter">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h3><i class="icon fa fa-check"></i> Status Pemesanan: <?php echo $status_order->keterangan;?></h3>
						<h4><i class="fa fa-id-card-o" aria-hidden="true"></i> <?php echo $status_order->instruksi;?></h4>
						
						</div>
						</p>
						<br/>
						<div class="line3"></div>
				</div>
				<!-- END CONTENT -->	
			</div>
			<br/>
				<!-- CONTENT -->
				<div class="col-md-12 pagecontainer2 offset-0">
					<div class="line3"></div>
					
					<div class="hpadding20">
						<div class="padding30 grey">
						<span class="size16px bold dark left">Review Data Pemesanan: <strong><?php echo $data_pesanan->no_pesanan;?></strong></span>
						<div class="roundstep active right">1</div>
						<div class="clearfix"></div>
						<div class="line4"></div><br/><br/>
						<form class="form-horizontal">				
							
							<div class="form-group">
								  <label for="nama_guest" class="col-sm-4 control-label">Nama :</label>
								  <div class="col-sm-8" id="nama_guest_grup" >							  
									<input type="text" class="form-control input-lg" value="<?php echo $data_pesanan->nama_guest;?>" disabled>
								  <span id="helpBlock" class="help-block lgrey">Isi nama sesuai KTP/SIM/Paspor* </span>
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="no_tlp" class="col-sm-4 control-label">No Telepon :</label>
								  <div class="col-sm-8" id="nama_guest_grup" >
									<input type="text" class="form-control input-lg" value="<?php echo $data_pesanan->tlp;?>" disabled>
								  <span id="helpBlock" class="help-block lgrey">Contoh: 08123456 </span>
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="email" class="col-sm-4 control-label">Email :</label>
								  <div class="col-sm-8" id="nama_guest_grup" >
									<input type="email" class="form-control input-lg" value="<?php echo $data_pesanan->email;?>" disabled>
								  <span id="helpBlock" class="help-block lgrey">contoh: contoh@hotelkarawang.com	* </span>
								  </div>
								  
								</div>
								
								<div class="form-group">
								  <label for="permintaan" class="col-sm-4 control-label">Permintaan Khusus (Optional) :</label>
								  <div class="col-sm-8" id="testimoni_grup">
								  <textarea name="permintaan" class="form-control" disabled><?php echo $data_pesanan->permintaan;?></textarea>
								  <span id="helpBlock" class="help-block lgrey">Permintaan terpenuhi atau tidak, tergantung kebijakan hotel bersangkutan. hotelkarawang.com tidak bertanggung jawab apabila pihak hotel tidak memenuhi permintaan khusus anda.</span>
								  </div>
								</div>
								
								<div class="clearfix"></div>

								<br/>
								<br/>
								<span class="size16px bold dark left">Transfer Bank</span>
								<div class="roundstep right">2</div>
								<div class="clearfix"></div>
								<div class="line4"></div>
								
								<div class="row">
								  <div class="col-md-4">
									<div class="itemlabel_bank">
									<div class="radio">
									  <label>
									  
										<input type="radio" id="optionsRadios1" value="1" <?php if($data_pesanan->bank_transfer==1){echo 'checked';}?> disabled>
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
										<input type="radio" id="optionsRadios1" value="2" <?php if($data_pesanan->bank_transfer==2){echo 'checked';}?> disabled>
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
										<input type="radio" id="optionsRadios1" value="3" <?php if($data_pesanan->bank_transfer==3){echo 'checked';}?> disabled>
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
							</div>
						<br/>
						<div class="line3"></div>
				<div class="clearfix"></div>
				<br/><br/>
				</div>
				<!-- END CONTENT -->	
			</div>
					
					<?php
				}else{
					?>
					<div class="col-md-12 pagecontainer2 offset-0">
					<div class="clearfix"></div>
					<p class="aboutarrow"></p><div class="clearfix"></div>
					<div class="line3"></div>
					
					<div class="hpadding50c">
										
						<p class="lato size22 slim ">
						<div class="alert alert-success alert-dismissable textcenter">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h3><i class="fa fa-times size40" aria-hidden="true"></i><br/>
						Data Pemesanan tidak ditemukan.<br/>Pastikan anda memasukan No.Pesanan dengan benar.</h3>
						
						
						</div>
						</p>
						<br/>
						<div class="line3"></div>
				</div>
				<!-- END CONTENT -->	
			</div>
					<?php
				}
			?>
			
		
		
	</div>
	</div>
	<!-- END OF CONTENT -->
	
	<!-- FOOTER -->
	
	<div class="footerbgblack">
		<div class="container">		
			
			<div class="col-md-3">
				<span class="ftitleblack">Let's socialize</span>
				<div class="scont">
					<a href="#" class="social1b"><img src="<?php echo $this->uri->baseUri.STYLE;?>images/icon-facebook.png" alt=""/></a>
					<a href="#" class="social2b"><img src="<?php echo $this->uri->baseUri.STYLE;?>images/icon-twitter.png" alt=""/></a>
					<a href="#" class="social3b"><img src="<?php echo $this->uri->baseUri.STYLE;?>images/icon-gplus.png" alt=""/></a>
					<a href="#" class="social4b"><img src="<?php echo $this->uri->baseUri.STYLE;?>images/icon-youtube.png" alt=""/></a>
					<br/><br/><br/>
					<a href="#"><img src="<?php echo $this->uri->baseUri.STYLE;?>images/logosmal2.png" alt="" /></a><br/>
					<span class="grey2">&copy; 2013  |  <a href="#">Privacy Policy</a><br/>
					All Rights Reserved </span>
					<br/><br/>
					
				</div>
			</div>
			<!-- End of column 1-->
			
			<div class="col-md-3">
				<span class="ftitleblack">Travel Specialists</span>
				<br/><br/>
				<ul class="footerlistblack">
					<li><a href="#">Golf Vacations</a></li>
					<li><a href="#">Ski & Snowboarding</a></li>
					<li><a href="#">Disney Parks Vacations</a></li>
					<li><a href="#">Disneyland Vacations</a></li>
					<li><a href="#">Disney World Vacations</a></li>
					<li><a href="#">Vacations As Advertised</a></li>
				</ul>
			</div>
			<!-- End of column 2-->		
			
			<div class="col-md-3">
				<span class="ftitleblack">Travel Specialists</span>
				<br/><br/>
				<ul class="footerlistblack">
					<li><a href="#">Weddings</a></li>
					<li><a href="#">Accessible Travel</a></li>
					<li><a href="#">Disney Parks</a></li>
					<li><a href="#">Cruises</a></li>
					<li><a href="#">Round the World</a></li>
					<li><a href="#">First Class Flights</a></li>
				</ul>				
			</div>
			<!-- End of column 3-->		
			
			<div class="col-md-3 grey">
				<span class="ftitleblack">Newsletter</span>
				<div class="relative">
					<input type="email" class="form-control fccustom2black" id="exampleInputEmail1" placeholder="Enter email">
					<button type="submit" class="btn btn-default btncustom">Submit<img src="<?php echo $this->uri->baseUri.STYLE;?>images/arrow.png" alt=""/></button>
				</div>
				<br/><br/>
				<span class="ftitleblack">Customer support</span><br/>
				<span class="pnr">1-866-599-6674</span><br/>
				<span class="grey2">office@travel.com</span>
			</div>			
			<!-- End of column 4-->			
		
			
		</div>	
	</div>
	
	<div class="footerbg3black">
		<div class="container center grey"> 
		<a href="#">Home</a> | 
		<a href="#">About</a> | 
		<a href="#">Last minute</a> | 
		<a href="#">Early booking</a> | 
		<a href="#">Special offers</a> | 
		<a href="#">Blog</a> | 
		<a href="#">Contact</a>
		<a href="#top" class="gotop scroll"><img src="<?php echo $this->uri->baseUri.STYLE;?>images/spacer.png" alt=""/></a>
		</div>
	</div>
	
	
	<!-- Javascript  -->
	<?php $this->output(TEMPLATE.'footer_script');?>
  </body>
</html>
