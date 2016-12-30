<div class="container mt-130 z-index100">		
  <div class="row">
	<div class="col-md-12">
		<div class="bs-example bs-example-tabs cstyle04">	
			<div class="tab-content3" id="myTabContent">
				
				<div id="hotel" class="tab-pane fade active in">
					<form id="form_checkin" data-toggle="validator" enctype="multipart/form-data" role="form" method="POST" action="<?php echo $this->uri->baseUri;?>index.php/hotel/pencarian">
					<div class="w50percent">
						<div class="wh90percent textleft">
							<span class="opensans size18">Cari Hotel</span>
							<input id="auto_complete" name="cari_hotel" type="text" class="form-control input-lg" placeholder="Nama Hotel atau Kecamatan" required>
						</div>
					</div>
							
							<div class="w50percent">
								<div class="wh50percent left">
								<div class="wh90percent textleft">
									<span class="opensans size13"><b>Check in date</b></span>
									<input name="checkin" type="text" class="form-control mySelectCalendar input-lg" id="datepicker" placeholder="yy-mm-dd"/>
								</div>
								</div>
								
								<div class="wh50percent right ">
								<div class="wh90percent textleft">
									<span class="opensans size13"><b>Check out date</b></span>
									<input name="checkout" type="text" class="form-control mySelectCalendar input-lg" id="datepicker2" placeholder="yy-mm-dd"/>
								</div>
								</div>
							
							</div>
						
						<div class="right">
							<button type="submit" class="btn-search"><i class="fa fa-search" aria-hidden="true"></i>
							Cari Hotel</button>
							
						</div>
					
				</form>
				</div>
				<!--End of 2nd tab -->
			</div>
			
			
				
		</div>
	</div>
  </div>
</div>

<div class="deals3">
	<div class="container">	
		<div class="row">
			
			<div class="col-md-6">
				<span class="dtitle">Top Rating Hotel</span>
				<div class="brlines"></div>
				<?php
					if($top_rating_hotel){
						foreach($top_rating_hotel as $top_rating_hotel){
							$id_hotel=$top_rating_hotel->id_hotel;
							$harga=$this->hotel->harga_terendah_kamar_byIdhotel($id_hotel);
							if($harga){
								$harga=$this->hotel->harga_terendah_kamar_byIdhotel($id_hotel)->harga;
							}else{
								$harga=00000;
							}
							$gambar_hotel=$this->hotel->getone_gambar_hotel_by_idHotel($id_hotel);
							if($gambar_hotel){
								$gambar_hotel=$this->hotel->getone_gambar_hotel_by_idHotel($id_hotel)->url_gambar;
							}else{
								$gambar_hotel="blank.jpg";
							}
							$nama_hotel=$this->hotel->view_nama_hotel_byID($id_hotel);
							if($nama_hotel){
								$nama_hotel=$this->hotel->view_nama_hotel_byID($id_hotel)->nama_hotel;
							}else{
								$nama_hotel="Hotel tidak ditemukan";
							}
							?>
						
						<div class="deal">
							<a href="<?php echo $this->uri->baseUri;?>index.php/hotel/detail/<?php echo base64_encode($id_hotel);?>"><img src="<?php echo $this->uri->baseUri.'upload/gambar_hotel/thumbs/'.$gambar_hotel;?>" alt="" class="dealthumb"/></a>
							<div class="dealtitle">
								<p><a href="<?php echo $this->uri->baseUri;?>index.php/hotel/detail/<?php echo base64_encode($id_hotel);?>" class="dark">
								<?php echo $nama_hotel;?></a></p>
								<img src="<?php echo $this->uri->baseUri.STYLE;?>images/smallrating-<?php echo $bintang_max;?>.png" alt="" class="mt-10"/><br/>								
								<img src="<?php echo $this->uri->baseUri.STYLE;?>images/user-rating-<?php echo $rating;?>.png" width="60" alt=""/>
								<span class="size13 grey">- <?php echo $jumlah_review;?> Reviews. </span><br/>
							</div>
							<div class="dealprice">
								<p class="size12 grey lh2">from<span class="price"><?php echo '&nbsp;Rp. '.number_format($harga,0,'','.');?></span><br/>/per malam</p>
							</div>					
						</div>
							
							<?php
						}
					}else{
						if($data_hotel){
							foreach($data_hotel as $data_hotel){
								$harga=$this->hotel->harga_terendah_kamar_byIdhotel($data_hotel->id);
								if($harga){
									$harga=$this->hotel->harga_terendah_kamar_byIdhotel($data_hotel->id)->harga;
								}else{
									$harga=00000;
								}
								$gambar_hotel=$this->hotel->getone_gambar_hotel_by_idHotel($data_hotel->id);
								if($gambar_hotel){
								$gambar_hotel=$this->hotel->getone_gambar_hotel_by_idHotel($data_hotel->id)->url_gambar;
								}else{
									$gambar_hotel="blank.jpg";
								}
								
								$bintang_maxnya=$this->review->rata_bintang_by_Idhotel($data_hotel->id);
								if($bintang_maxnya){
									$bintang_maxnya=$this->review->rata_bintang_by_Idhotel($data_hotel->id);
								}else{
									$bintang_maxnya=0;
								}						
								if($bintang_maxnya <= 0){
									$bintang_max="1";
								}else{
									$bintang_max=number_format($bintang_maxnya,0);
								}
								
								$jumlah_review=$this->review->hitung_rev_by_Idhotel($data_hotel->id);
								
								$rekom_yes=$this->review->hitung_rekom_yes_by_Idhotel($data_hotel->id);
								$total_rekom=$this->review->hitung_rekomAll_by_Idhotel($data_hotel->id);
								$rating=$this->rating->rating($rekom_yes,$total_rekom);
								?>
								<div class="deal">
									<a href="<?php echo $this->uri->baseUri;?>index.php/hotel/detail/<?php echo base64_encode($data_hotel->id);?>"><img src="<?php echo $this->uri->baseUri.'upload/gambar_hotel/thumbs/'.$gambar_hotel;?>" alt="" class="dealthumb"/></a>
									<div class="dealtitle">
										<p><a href="<?php echo $this->uri->baseUri;?>index.php/hotel/detail/<?php echo base64_encode($data_hotel->id);?>" class="dark">
										<?php echo $data_hotel->nama_hotel;?></a></p>
										<img src="<?php echo $this->uri->baseUri.STYLE;?>images/smallrating-<?php echo $bintang_max;?>.png" alt="" class="mt-10"/><br/>								
										<img src="<?php echo $this->uri->baseUri.STYLE;?>images/user-rating-<?php echo $rating;?>.png" width="60" alt=""/>
										<span class="size13 grey">- <?php echo $jumlah_review;?> Reviews. </span><br/>
									</div>
									<div class="dealprice">
										<p class="size12 grey lh2">from<span class="price"><?php echo '&nbsp;Rp. '.number_format($harga,0,'','.');?></span><br/>/per malam</p>
									</div>					
								</div>
								<?php
							}
						}
					}
				?>			
			</div>
			<!-- End of first row-->
			
			<div class="col-md-6">
				<span class="dtitle">Hot Deals</span>
				<div class="brlines"></div>
				<?php if($hot_deals){
					foreach ($hot_deals as $hot_deals){						
						$harga=$this->hotel->harga_terendah_kamar_byIdhotel($hot_deals->id_hotel);
						if($harga){
							$harga=$this->hotel->harga_terendah_kamar_byIdhotel($hot_deals->id_hotel)->harga;
						}else{
							$harga=00000;
						}
						$gambar_hotel=$this->hotel->getone_gambar_hotel_by_idHotel($hot_deals->id_hotel);
						if($gambar_hotel){
						$gambar_hotel=$this->hotel->getone_gambar_hotel_by_idHotel($hot_deals->id_hotel)->url_gambar;
						}else{
							$gambar_hotel="blank.jpg";
						}
						
						$bintang_maxnya=$this->review->rata_bintang_by_Idhotel($hot_deals->id_hotel);
						if($bintang_maxnya){
							$bintang_maxnya=$this->review->rata_bintang_by_Idhotel($hot_deals->id_hotel);
						}else{
							$bintang_maxnya=0;
						}						
						if($bintang_maxnya <= 0){
							$bintang_max="1";
						}else{
							$bintang_max=number_format($bintang_maxnya,0);
						}
						
						$jumlah_review=$this->review->hitung_rev_by_Idhotel($hot_deals->id_hotel);
						
						$rekom_yes=$this->review->hitung_rekom_yes_by_Idhotel($hot_deals->id_hotel);
						$total_rekom=$this->review->hitung_rekomAll_by_Idhotel($hot_deals->id_hotel);
						$rating=$this->rating->rating($rekom_yes,$total_rekom);
						?>
						<div class="deal">
							<a href="<?php echo $this->uri->baseUri;?>index.php/hotel/detail/<?php echo base64_encode($data_hotel->id);?>"><img src="<?php echo $this->uri->baseUri.'upload/gambar_hotel/thumbs/'.$gambar_hotel;?>" alt="" class="dealthumb"/></a>
							<div class="dealtitle">
								<p><a href="<?php echo $this->uri->baseUri;?>index.php/hotel/detail/<?php echo base64_encode($data_hotel->id);?>" class="dark">
								<?php echo $data_hotel->nama_hotel;?></a></p>
								<img src="<?php echo $this->uri->baseUri.STYLE;?>images/smallrating-<?php echo $bintang_max;?>.png" alt="" class="mt-10"/><br/>								
								<img src="<?php echo $this->uri->baseUri.STYLE;?>images/user-rating-<?php echo $rating;?>.png" width="60" alt=""/>
								<span class="size13 grey">- <?php echo $jumlah_review;?> Reviews. </span><br/>
							</div>
							<div class="dealprice">
								<p class="size12 grey lh2">from<span class="price"><?php echo '&nbsp;Rp. '.number_format($harga,0,'','.');?></span><br/>/per malam</p>
							</div>					
						</div>
						<?php
					}
				}else{
					if($data_hotel2){
							foreach($data_hotel2 as $data_hotel2){
								$harga=$this->hotel->harga_terendah_kamar_byIdhotel($data_hotel2->id);
								if($harga){
									$harga=$this->hotel->harga_terendah_kamar_byIdhotel($data_hotel2->id)->harga;
								}else{
									$harga=00000;
								}
								$gambar_hotel=$this->hotel->getone_gambar_hotel_by_idHotel($data_hotel2->id);
								if($gambar_hotel){
								$gambar_hotel=$this->hotel->getone_gambar_hotel_by_idHotel($data_hotel2->id)->url_gambar;
								}else{
									$gambar_hotel="blank.jpg";
								}
								
								$bintang_maxnya=$this->review->rata_bintang_by_Idhotel($data_hotel2->id);
								if($bintang_maxnya){
									$bintang_maxnya=$this->review->rata_bintang_by_Idhotel($data_hotel2->id);
								}else{
									$bintang_maxnya=0;
								}						
								if($bintang_maxnya <= 0){
									$bintang_max="1";
								}else{
									$bintang_max=number_format($bintang_maxnya,0);
								}
								
								$jumlah_review=$this->review->hitung_rev_by_Idhotel($data_hotel2->id);
								
								$rekom_yes=$this->review->hitung_rekom_yes_by_Idhotel($data_hotel2->id);
								$total_rekom=$this->review->hitung_rekomAll_by_Idhotel($data_hotel2->id);
								$rating=$this->rating->rating($rekom_yes,$total_rekom);
								?>
								<div class="deal">
									<a href="<?php echo $this->uri->baseUri;?>index.php/hotel/detail/<?php echo base64_encode($data_hotel2->id);?>"><img src="<?php echo $this->uri->baseUri.'upload/gambar_hotel/thumbs/'.$gambar_hotel;?>" alt="" class="dealthumb"/></a>
									<div class="dealtitle">
										<p><a href="<?php echo $this->uri->baseUri;?>index.php/hotel/detail/<?php echo base64_encode($data_hotel2->id);?>" class="dark">
										<?php echo $data_hotel2->nama_hotel;?></a></p>
										<img src="<?php echo $this->uri->baseUri.STYLE;?>images/smallrating-<?php echo $bintang_max;?>.png" alt="" class="mt-10"/><br/>								
										<img src="<?php echo $this->uri->baseUri.STYLE;?>images/user-rating-<?php echo $rating;?>.png" width="60" alt=""/>
										<span class="size13 grey">- <?php echo $jumlah_review;?> Reviews. </span><br/>
									</div>
									<div class="dealprice">
										<p class="size12 grey lh2">from<span class="price"><?php echo '&nbsp;Rp. '.number_format($harga,0,'','.');?></span><br/>/per malam</p>
									</div>					
								</div>
								<?php
							}
						}
				}?>
				
				
				
							
			</div>
			<!-- End of first row-->			
		</div>
	</div>
</div>
