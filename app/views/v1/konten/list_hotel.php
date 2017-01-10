<!DOCTYPE html>
<html>
  <?php $this->output(TEMPLATE.'header');?>
  <body id="top" class="thebg" >
    
	
	<!-- Top wrapper -->	
	<?php $this->output(TEMPLATE.'top_menu'); ?>
	<!-- /Top wrapper -->
	<div class="container breadcrub">
	    <div>
		
		</div>
		<div class="clearfix"></div>
		<div class="brlines"></div>
	</div>	
	<!-- CONTENT -->
	<div class="container">
		<div class="container pagecontainer offset-0">	

			<!-- FILTERS -->
			<div class="col-md-3 filters offset-0">
			<?php $this->output(TEMPLATE.'sidebar/search_side');
			?>
			<?php //$this->output(TEMPLATE.'sidebar/filter_side');?>
			</div>
			<!-- END OF FILTERS -->
			
			<!-- LIST CONTENT-->
			<div class="rightcontent col-md-9 offset-0">
			
				<div class="itemscontainer offset-1">

				<?php if(isset($hasil_cari_hotel)){
					if($hasil_cari_hotel){
					$urutan=0;
					foreach($hasil_cari_hotel as $data){
						$urutan++;
						if($this->hotel->getone_gambar_hotel_by_idHotel($data->id)){
							$gambar_hotel=$this->hotel->getone_gambar_hotel_by_idHotel($data->id)->url_gambar;
						}else{
							$gambar_hotel='blank.jpg';
						}
						$jumlah_review=$this->review->hitung_rev_by_Idhotel($data->id);
						
						$bintang_maxnya=$this->review->rata_bintang_by_Idhotel($data->id);
						if($bintang_maxnya){
							$bintang_maxnya=$this->review->rata_bintang_by_Idhotel($data->id);
						}else{
							$bintang_maxnya=0;
						}						
						if($bintang_maxnya <= 0){
							$bintang_max="1";
						}else{
							$bintang_max=number_format($bintang_maxnya,0);
						}
							
							$rekom_yes=$this->review->hitung_rekom_yes_by_Idhotel($data->id);
							$total_rekom=$this->review->hitung_rekomAll_by_Idhotel($data->id);
							$rating=$this->rating->rating($rekom_yes,$total_rekom);
							
						if($this->pengaturan->get_nama_kec_karawang_byId($data->kecamatan)){
							$nama_kecamatan=$this->pengaturan->get_nama_kec_karawang_byId($data->kecamatan)->nama_kec;
						}else{
							$nama_kecamatan='';
						}
							
						?>
						
				<div class="offset-2"><hr class="featurette-divider3"></div>
						<div class="col-md-4">
							<div class="listitem">
								<img src="<?php echo $this->uri->baseUri.'upload/gambar_hotel/'.$gambar_hotel;?>" alt="<?php echo $data->nama_hotel;?>"/>
								<div class="liover"></div>
								<a class="fav-icon" href="#"></a>
								<a class="book-icon" href="<?php echo $this->uri->baseUri;?>index.php/hotel/detail/<?php echo base64_encode($data->id);?>"></a>
							</div>
							<div class="itemlabel2">
								<div class="labelleft">			
									<b><?php echo $data->nama_hotel;?></b><br/>
									<p class="grey"><strong><?php echo $nama_kecamatan;?></strong></p>
									<div class="line2"></div>
									<img src="<?php echo $this->uri->baseUri.STYLE;?>images/filter-rating-<?php echo $bintang_max;?>.png" width="60" alt=""/><br/>
									<img src="<?php echo $this->uri->baseUri.STYLE;?>images/user-rating-<?php echo $rating;?>.png" width="60" alt=""/><br/>
									<span class="size11 grey"><?php echo $jumlah_review;?> Reviews. </span><br/><br/>
									
									<?php 
									 if($this->hotel->harga_terendah_kamar_byIdhotel($data->id)){
										 $harga_kamar_terendah=$this->hotel->harga_terendah_kamar_byIdhotel($data->id)->harga;
									 }else{
										 $harga_kamar_terendah=000;
									 }
									?>
									<span class="green size18"><b><?php echo 'Rp. '.number_format($harga_kamar_terendah,0,'','.');?></b></span>									
									<span class="size11 grey">/malam</span>
									<div class="line2"></div>
									<a style="float:right;" href="<?php echo $this->uri->baseUri;?>index.php/hotel/detail/<?php echo base64_encode($data->id);?>" class="bookbtn mt1 btn-lg">Pilih Kamar</a>
									
								</div>
							</div>
						</div>
						<?php
						if($urutan % 3 ==0){
							echo '
								<div class="clearfix"></div>
								<div class="offset-2"><hr class="featurette-divider3"></div>
							';
						}
					}
					}
					
				}?>
					

				</div>	
				<!-- End of offset1-->		
				<div class="clearfix"></div>
				<div class="offset-2"><hr class="featurette-divider3"></div>
				
				<?php if(isset($viewall_hotel)){
					if($viewall_hotel){
						$urutan2=0;
					foreach($viewall_hotel as $viewall_hotel){
						$urutan2++;
						if($this->hotel->getone_gambar_hotel_by_idHotel($viewall_hotel->id)){
							$gambar_hotel=$this->hotel->getone_gambar_hotel_by_idHotel($viewall_hotel->id)->url_gambar;
						}else{
							$gambar_hotel='blank.jpg';
						}
						
						if($this->hotel->harga_terendah_kamar_byIdhotel($viewall_hotel->id)){
							 $harga_kamar_terendah=$this->hotel->harga_terendah_kamar_byIdhotel($viewall_hotel->id)->harga;
						 }else{
							 $harga_kamar_terendah=000;
						 }
						 
							 $jumlah_review=$this->review->hitung_rev_by_Idhotel($viewall_hotel->id);
							
							$bintang_maxnya=$this->review->rata_bintang_by_Idhotel($viewall_hotel->id);
							if($bintang_maxnya){
								$bintang_maxnya=$this->review->rata_bintang_by_Idhotel($viewall_hotel->id);
							}else{
								$bintang_maxnya=0;
							}						
							if($bintang_maxnya <= 0){
								$bintang_max="1";
							}else{
								$bintang_max=number_format($bintang_maxnya,0);
							}
								
								$rekom_yes=$this->review->hitung_rekom_yes_by_Idhotel($viewall_hotel->id);
								$total_rekom=$this->review->hitung_rekomAll_by_Idhotel($viewall_hotel->id);
								$rating=$this->rating->rating($rekom_yes,$total_rekom);
						
							if($this->pengaturan->get_nama_kec_karawang_byId($viewall_hotel->kecamatan)){
								$nama_kecamatan=$this->pengaturan->get_nama_kec_karawang_byId($viewall_hotel->kecamatan)->nama_kec;
							}else{
								$nama_kecamatan='';
							}
						 
						?>
						<div class="col-md-4">
							<div class="listitem">
								<img src="<?php echo $this->uri->baseUri.'upload/gambar_hotel/'.$gambar_hotel;?>" alt="<?php echo $viewall_hotel->nama_hotel;?>"/>
								<div class="liover"></div>
								<a class="fav-icon" href="#"></a>
								<a class="book-icon" href="<?php echo $this->uri->baseUri;?>index.php/hotel/detail/<?php echo base64_encode($viewall_hotel->id);?>"></a>
							</div>
							<div class="itemlabel2">
								<div class="labelleft">			
									<b><?php echo $viewall_hotel->nama_hotel;?></b><br/>
									<p class="grey"><strong><?php echo $nama_kecamatan;?></strong></p>
									<div class="line2"></div>
									<img src="<?php echo $this->uri->baseUri.STYLE;?>images/filter-rating-<?php echo $bintang_max;?>.png" width="60" alt=""/><br/>
									<img src="<?php echo $this->uri->baseUri.STYLE;?>images/user-rating-<?php echo $rating;?>.png" width="60" alt=""/><br/>
									<span class="size11 grey"><?php echo $jumlah_review;?> Reviews. </span><br/><br/>
									
									<?php 
									 if($this->hotel->harga_terendah_kamar_byIdhotel($viewall_hotel->id)){
										 $harga_kamar_terendah=$this->hotel->harga_terendah_kamar_byIdhotel($viewall_hotel->id)->harga;
									 }else{
										 $harga_kamar_terendah=000;
									 }
									?>
									<span class="green size18"><b><?php echo 'Rp. '.number_format($harga_kamar_terendah,0,'','.');?></b></span>									
									<span class="size11 grey">/malam</span>
									<div class="line2"></div>
									<a style="float:right;" href="<?php echo $this->uri->baseUri;?>index.php/hotel/detail/<?php echo base64_encode($viewall_hotel->id);?>" class="bookbtn mt1 btn-lg">Pilih Kamar</a>
									
								</div>
							</div>
						</div>
						<?php
						if($urutan2 % 3 ==0){
							echo '
								<div class="clearfix"></div>
								<div class="offset-2"><hr class="featurette-divider3"></div>
							';
						}
					}
					?>
					<div class="clearfix"></div>
								
				
				<div class="hpadding20">
				
					<ul class="pagination right paddingbtm20">
					  <?php if ($pageLinks): ?>
						
						<?php foreach ($pageLinks as $paging): ?>
							<?php echo '<li>'.$paging; ?></li>
							
						<?php endforeach; ?>
					
							<?php endif; ?>
					</ul>

				</div>
					
					<?php
					}
				}?>
				

			</div>
			<!-- END OF LIST CONTENT-->
			
		

		</div>
		<!-- END OF container-->
		
	</div>
	<!-- END OF CONTENT -->
	


	
	
	<!-- FOOTER -->
<?php $this->output(TEMPLATE.'footer');?>
<?php $this->output(TEMPLATE.'footer_script');?>
	
	
  </body>
</html>
