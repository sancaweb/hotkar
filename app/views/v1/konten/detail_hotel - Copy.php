<!DOCTYPE html>
<html>
  <?php $this->output(TEMPLATE.'header');?>
  <body id="top" class="thebg" >
	<?php $this->output(TEMPLATE.'top_menu');?>
	
	<div class="container breadcrub">
	    <div>
			<?php //echo $view_detail_hotel->id;?>
		</div>
		<div class="clearfix"></div>
		<div class="brlines"></div>
	</div>	

	<!-- CONTENT -->
	<div class="container">
		<div class="container pagecontainer offset-0">
			<!-- SLIDER -->
			<div class="col-md-8 details-slider">
			<div id="jssor_1" style="
				display: block;
				text-align: start;
				float: none;
				position: relative;
				top: 10px;
				right: auto;
				bottom: auto;
				left: auto;
				z-index: auto;
				width: 728px;
				height: 471px;
				margin: 0px;
				overflow: hidden;
				background-color: #24262e;">
				<!-- Loading Screen -->
				<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
					<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
					<div style="position:absolute;display:block;background:url('<?php echo $this->uri->baseUri.STYLE;?>new_carousel/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
				</div>
				<div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 730px; height: 356px; overflow: hidden;">
					<?php 
						if($view_detail_hotel){
							$view_detail_hotel=$view_detail_hotel;
								if($this->hotel->get_gambar_hotel_by_idHotel($view_detail_hotel->id)){
									$gambar_hotel=$this->hotel->get_gambar_hotel_by_idHotel($view_detail_hotel->id);
									foreach($gambar_hotel as $gambar_hotel){
										?>
										<div data-p="144.50">
											<img data-u="image" src="<?php echo $this->uri->baseUri.'upload/gambar_hotel/'.$gambar_hotel->url_gambar;?>" />
											<img data-u="thumb" src="<?php echo $this->uri->baseUri.'upload/gambar_hotel/thumbs/'.$gambar_hotel->url_gambar;?>" />
										</div>
										
										<?php
									}
								}
								if($this->pengaturan->get_nama_kec_karawang_byId($view_detail_hotel->kecamatan)){
									$nama_kecamatan=$this->pengaturan->get_nama_kec_karawang_byId($view_detail_hotel->kecamatan)->nama_kec;
								}else{
									$nama_kecamatan='';
								}
						}
					?>
				</div>		
				<!-- Thumbnail Navigator -->
				<div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:700px;height:100px;" data-autocenter="1">
					<!-- Thumbnail Item Skin Begin -->
					<div data-u="slides" style="cursor: default;">
						<div data-u="prototype" class="p">
							<div class="w">
								<div data-u="thumbnailtemplate" class="t"></div>
							</div>
							<div class="c"></div>
						</div>
					</div>
					<!-- Thumbnail Item Skin End -->
				</div>
				<!-- Arrow Navigator -->
				<span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
				<span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
			</div>
			<!-- #endregion Jssor Slider End -->	
			</div>
			
			
				<?php
					$bintang_maxnya=$this->review->rata_bintang_by_Idhotel($id_hotel);
						if($bintang_maxnya){
							$bintang_maxnya=$this->review->rata_bintang_by_Idhotel($id_hotel);
						}else{
							$bintang_maxnya=0;
						}
						
						if($bintang_maxnya <= 0){
							$bintang_max="1";
							$bintang_max2="0";
							
						}else{
							$bintang_max=number_format($bintang_maxnya,0);
							$bintang_max2=number_format($bintang_maxnya,1);
						}
						
						$jumlah_review=$this->review->hitung_rev_by_Idhotel($id_hotel);
						
						$rekom_yes=$this->review->hitung_rekom_yes_by_Idhotel($id_hotel);
						$total_rekom=$this->review->hitung_rekomAll_by_Idhotel($id_hotel);
						if($rekom_yes == 0 || $total_rekom == 0 ){
							$rating=0;
							$persen_rekom=0;
						}else{
							$rating=$this->rating->rating($rekom_yes,$total_rekom);						
							
							
							$persen_rekom=number_format(($rekom_yes / $total_rekom)*100,0);
						}
						
						$limit_rev=1;							
							if($this->review->good_review($id_hotel,$limit_rev)){
								$good_review=$this->review->good_review($id_hotel,$limit_rev);
								$testimoni=$good_review->testimoni;
								$nama_guest=$good_review->nama_guest;
								$asal_kota=$good_review->asal_kota;
							}else{
								$good_review="Belum ada review";
							}
						//batas disini
						$rata_bintang=$this->review->rata_bintang_by_Idhotel($id_hotel);
						
				?>
			<!-- RIGHT INFO -->			
			<div class="col-md-4 detailsright offset-0">
				<div class="padding20">
					<h4 class="lh1"><?php echo $nama_hotel->nama_hotel;?></h4>
					<span class="opensans size13 grey"><?php echo $nama_kecamatan;?></span><br/>
					<img src="<?php echo $this->uri->baseUri.STYLE;?>images/smallrating-<?php echo $bintang_max;?>.png" alt=""/>
				</div>
				
				<div class="line3"></div>
				
				<div class="hpadding20">
					<h2 class="opensans slim green2">Wonderful!</h2>
				</div>
				
				<div class="line3 margtop20"></div>
				
				<div class="col-md-6 bordertype1 padding20">
					<span class="opensans size30 bold grey2"><?php echo $persen_rekom;?>%</span><br/>
					of guests<br/>recommend
				</div>
				<div class="col-md-6 bordertype2 padding20">
					<span class="opensans size30 bold grey2"><?php echo $bintang_max2;?></span>/5<br/>
					guest ratings
				</div>
				
				<div class="col-md-6 bordertype3">
					<img src="<?php echo $this->uri->baseUri.STYLE;?>images/user-rating-<?php echo $rating;?>.png" alt=""/><br/>
					<?php echo $jumlah_review;?> reviews
				</div>
				<div class="col-md-6 bordertype3">
				</div>
				<div class="clearfix"></div><br/>
				<div class="hpadding20">
					<div class="cpadding0 mt-10">
						<span class="icon-quote"></span>
						<p class="opensans size16 grey2"><?php echo $testimoni;?><br/>
						<span class="lato lblue bold size13"><i>by <?php echo $nama_guest;?> from <?php echo $asal_kota;?></i></span></p> 
					</div>
				</div>
				<!--
				<div class="hpadding20">
					<a href="#" class="add2fav margtop5">Add to favourite</a>
					<a href="#" class="booknow margtop20 btnmarg">Book now</a>
				</div>
				-->
			</div>
			<!-- END OF RIGHT INFO -->
		
		</div>
		<!-- END OF container-->
		
		<div class="container mt25 offset-0">
		
			<div class="col-md-8 pagecontainer2 offset-0">		
				<ul class="nav nav-tabs" id="myTab">
					<li class=""><a data-toggle="tab" href="#info"><span class="summary"></span><span class="hidetext">Info</span>&nbsp;</a></li>
					<li class="active"><a data-toggle="tab" href="#roomrates"><span class="rates"></span><span class="hidetext">Room rates</span>&nbsp;</a></li>
					<li class=""><a data-toggle="tab" href="#fasilitas"><span class="preferences"></span><span class="hidetext">Fasilitas Hotel</span>&nbsp;</a></li>
					<li class=""><a data-toggle="tab" href="#reviews"><span class="reviews"></span><span class="hidetext">Reviews</span>&nbsp;</a></li>
				</ul>			
				<div class="tab-content4" >
					<!-- TAB 1 -->				
					<div id="info" class="tab-pane fade " style="padding:10px;">
						<p class="hpadding20">
							<?php if($view_detail_hotel){
							echo $view_detail_hotel->informasi;
						}
							
						?>	
						</p>

						<div class="line4"></div>						
					</div>
					<!-- TAB 2 -->
					<div id="roomrates" class="tab-pane fade active in">
					    <div class="hpadding20">
							<p class="hpadding20 dark">Room type</p>
							<div class="clearfix"></div>
						</div>
						
						<div class="line2"></div>
						<?php
							if($kamar_hotel){
								foreach($kamar_hotel as $kamar_hotel){
									
									?>									
									<div class="padding20">						
										<div class="col-md-4 offset-0">
											
											<ul class="rslides">
											<?php
												if($this->hotel->viewall_gambar_kamar_byIDkamar($kamar_hotel->id)){
													$gambar_kamar=$this->hotel->viewall_gambar_kamar_byIDkamar($kamar_hotel->id);
													foreach($gambar_kamar as $gambar_kamar){
														?>
														<li><img src="<?php echo $this->uri->baseUri.'upload/gambar_kamar/'.$gambar_kamar->url_gambar;?>" alt="" class="fwimg"/></li>
														<?php
													}
												}else{
													?>
													<li><img src="<?php echo $this->uri->baseUri.'upload/gambar_kamar/blank.jpg';?>" alt="" class="fwimg"/></li>
													<?php
												}
											?>
											</ul>
											
												<span class="opensans green size24"><?php echo 'Rp. '.number_format($kamar_hotel->harga,0,'','.');?>	</span>
												<span class="opensans lightgrey size12">/Malam</span><br/>
												<span class="lred bold"><?php echo $kamar_hotel->jumlah_ketersediaan;?> Kamar kosong</span><br/>
										</div>
										<div class="col-md-8 offset-0">											
											<div class="col-md-12 mediafix1">
												<h4 class="opensans dark bold margtop1"><?php echo $kamar_hotel->nama_kamar;?></h4>
												<span class="opensans lightgrey size16">Jumlah Tamu <?php echo $kamar_hotel->kapasitas;?> Orang Dewasa</span>
												<div class="clearfix"></div>
												<div class="line2"></div>
											<form id="form_checkin" class="form-inline" data-toggle="validator" enctype="multipart/form-data" role="form" method="post" action="<?php echo $this->uri->baseUri;?>index.php/booking/booking_form">
											<input type="hidden" name="id_kamar" value="<?php echo $kamar_hotel->id;?>" readonly>
											<?php
													if(isset($checkin) AND isset($checkout)){
														$checkin=$checkin;
														$checkout=$checkout;
														
														$val_checkin='value="'.$checkin.'"';
														$val_checkout='value="'.$checkout.'"';
														
													}else{
														$val_checkin='placeholder="yy-mm-dd"';
														$val_checkout='placeholder="yy-mm-dd"';
													}
												?>
												<script>
												//------------------------------
												//Picker
												//------------------------------
												jQuery(function() {
												"use strict";
													jQuery( "#datepicker<?php echo $kamar_hotel->id.'0';?>,#datepicker<?php echo $kamar_hotel->id.'1';?>" ).datepicker({
														dateFormat: "yy-mm-dd",
														minDate: "+1"
													});
												});
												
												</script>
											<div class="clearfix pbottom15"></div>
											<div class="form-group">
												<label for="checkin" class="size13">Checkin</label>
												<input name="checkin" type="text" class="form-control mySelectCalendar" id="datepicker<?php echo $kamar_hotel->id.'0';?>"  <?php echo $val_checkin;?>/>
											</div>
											
											<div class="form-group">
												<label for="checkout" class="size13">Checkout</label>
												<input name="checkout" type="text" class="form-control mySelectCalendar" id="datepicker<?php echo $kamar_hotel->id.'1';?>" <?php echo $val_checkout;?>/>
											</div>

											<div class="form-group">
											<label for="jumlah_kamar" class="size13">Jumlah Kamar</label>
											<select class="form-control" name="jml_kamar" >
											<?php  
											for ($x = 1; $x <= 10; $x++) {
											  echo '<option value="'.$x.'">'.$x.'</option>';
											}
											?>  

											</select>
											</div>
											<br/>
											<br/>
											<button type="button" class="bookbtn mt1 btn-lg" data-toggle="collapse" data-target="#info_kamar<?php echo $kamar_hotel->id;?>">
											View Detail
											</button>
											<input type="submit" class="bookbtn mt1 btn-lg" value="Book Now">

											</form>	
											</div>
																	
										</div>
										<div class="padding20">	
										<div id="info_kamar<?php echo $kamar_hotel->id;?>" class="collapse">
											<div class="hpadding20">
											<div class="clearfix"></div>
											<div class="line2"></div>
												<?php echo $kamar_hotel->informasi;?>
											</div>
										<div class="clearfix"></div>										
											<div class="line2"></div>
											<!-- Collapse 8 -->	
												<button type="button" class="collapsebtn2" data-toggle="collapse" data-target="#collapse8<?php echo $kamar_hotel->id;?>">
												  Fasilitas Kamar <span class="collapsearrow"></span>
												</button>
												
												<div id="collapse8<?php echo $kamar_hotel->id;?>" class="collapse in">
													<div class="hpadding20">
													
													<?php
							
														if($this->hotel->get_fasilitas_kamar_by_idKamar($kamar_hotel->id)){
															$fasilitas_kamar=$this->hotel->get_fasilitas_kamar_by_idKamar($kamar_hotel->id);
															$page=0;
															$limit=3;
															foreach ($fasilitas_kamar as $fasilitas_kamar){
															$page++;
															if($this->hotel->get_fasilitas_kamar_by_idKamar_page($fasilitas_kamar->id_kamar,$page,$limit)){
																$data_fasilitas_kamar=$data_fasilitas=$this->hotel->get_fasilitas_kamar_by_idKamar_page($fasilitas_kamar->id_kamar,$page,$limit);
																foreach($data_fasilitas_kamar as $data_fasilitas_kamar){
																	?>
																	<div class="col-md-4">
																		<ul class="checklist">									
																			<li><?php echo $data_fasilitas_kamar->fasilitas_kamar;?></li>									
																		</ul>									
																	</div>
																		
																	<?php
																}
															}
															}
														}
														
													?>								
													</div>
													<div class="clearfix"></div>
												</div>
												<!-- End of collapse 8 -->	
											
										<div class="clearfix"></div>
										
											<div class="line2"></div>
												<button type="button" class="bookbtn mt1 btn-lg" data-toggle="collapse" data-target="#info_kamar<?php echo $kamar_hotel->id;?>">
												  <i class="fa fa-window-close-o" aria-hidden="true"></i>
													Tutup
												</button>
												<button href="<?php echo $this->uri->baseUri.'index.php/booking/booking_form/'.base64_encode($view_detail_hotel->id).'/'.base64_encode($kamar_hotel->id);?>" class="bookbtn mt1 btn-lg">Book Now</button>
											<div class="line2"></div>
											<div class="clearfix"></div>
										</div>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="line2"></div>
									
									<?php
								}
							}
						?>			
						
					</div>
					
					<!-- TAB 3 -->					
					<div id="fasilitas" class="tab-pane fade">
						<div class="hpadding20">						
						<?php							
								if($fasilitas_hotel){
									$page=0;
									$limit=3;
									foreach ($fasilitas_hotel as $fasilitas_hotel){
									$page++;
									if($this->hotel->get_fasilitas_hotel_by_idHotel_page($fasilitas_hotel->id_hotel,$page,$limit)){
										$data_fasilitas_hotel=$this->hotel->get_fasilitas_hotel_by_idHotel_page($fasilitas_hotel->id_hotel,$page,$limit);
										foreach($data_fasilitas_hotel as $data_fasilitas_hotel){
											?>
											<div class="col-md-4">
												<ul class="checklist">									
													<li><?php echo $data_fasilitas_hotel->fasilitas_hotel;?></li>									
												</ul>									
											</div>
												
											<?php
										}
									}
									}
								}
								
							?>
							
							<div class="line4"></div>
							
						</div>
						
						
					</div>
					
					<!-- TAB 5 -->					
					<div id="reviews" class="tab-pane fade ">
						<div class="line4"></div>
						
						<div class="hpadding20">
							<div class="col-md-6 offset-0">
								<div class="scircle left">
								<?php if($rata_kebersihan){
									echo number_format($rata_kebersihan,1);
								};?>								
								</div>
								<div class="sctext left margtop15">Kebersihan</div>
								<div class="clearfix"></div>
								<div class="scircle left">
								<?php if($rata_kenyamanan){
									echo number_format($rata_kenyamanan,1);
								};?></div>
								<div class="sctext left margtop15">Kenyamanan Kamar</div>
								<div class="clearfix"></div>								
							</div>
							<div class="col-md-6 offset-0">
								<div class="scircle left">
								<?php if($rata_pelayanan){
									echo number_format($rata_pelayanan,1);
								};?></div>
								<div class="sctext left margtop15">Pelayanan</div>
								<div class="clearfix"></div>
								<div class="scircle left">
								<?php if($rata_fasilitas){
									echo number_format($rata_fasilitas,1);
								};?></div>
								<div class="sctext left margtop15">Fasilitas</div>			
								<div class="clearfix"></div>										
							</div>	
							<div class="clearfix"></div>
							
							<br/>
						</div>
						
							
						<div class="line2"></div>
						
						<div class="hpadding20"><div class="clearfix"></div>
						<span class="opensans dark size16 bold">Apa kata mereka ?	</span>
						</div>						
						<div class="line2"></div>
						<div id="review_scroll" >
						<?php $this->output(TEMPLATE.'konten/review_tab');?>
						<p id="loader"><img src="<?php echo $this->uri->baseUri;?>style/images/ajax-loader.gif"></p>
						
						</div>
						
						<div class="hpadding20"><div class="clearfix"></div>
						<input type="hidden" id="page_rev" value="1" readonly>
						<button id="rev_habis" class="btn btn-primary btn-lg btn-block" onclick="loadmore()">Show More</button>
						</div>	
						
						<div class="clearfix"></div>
						<div class="line2"></div>
						<div class="hpadding20">
							<span class="opensans dark size16 bold">Testimonial</span>
						</div>
						
						<div class="line2"></div>
							
						<div class="hpadding20" id="alertnya">						
						
						</div>
						<div class="hpadding20">
							
						<form id="form_rev" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" role="form" method="POST" action="<?php echo $this->uri->baseUri;?>index.php/data_json/input_review">
							
							<input type="hidden" name="id_hotel" value="<?php echo $view_detail_hotel->id;?>">
							<div class="form-group">
							  <label class="col-sm-3 control-label">Rating :</label>
							  <div class="col-sm-9 layout-slider">
								<label class="radio-inline">
										<input type="radio" name="bintang" id="inlineRadio1" value="1"> 
										<img src="<?php echo $this->uri->baseUri.STYLE;?>images/bigrating-1.png">
									</label>
									<label class="radio-inline">
									  <input type="radio" name="bintang" id="inlineRadio2" value="2"> 
									  <img src="<?php echo $this->uri->baseUri.STYLE;?>images/bigrating-2.png">
									</label>
							  </div>
							</div>	
							
							<div class="form-group">
							  <label class="col-sm-3 control-label"></label>
							  <div class="col-sm-9 layout-slider">
								
									<label class="radio-inline">
									  <input type="radio" name="bintang" id="inlineRadio3" value="3" > 
									  <img src="<?php echo $this->uri->baseUri.STYLE;?>images/bigrating-3.png">
									</label>
									<label class="radio-inline">
									  <input type="radio" name="bintang" id="inlineRadio3" value="4"> 
									  <img src="<?php echo $this->uri->baseUri.STYLE;?>images/bigrating-4.png">
									</label>
									<label class="radio-inline">
									  <input type="radio" name="bintang" id="inlineRadio3" value="5" checked> 
									  <img src="<?php echo $this->uri->baseUri.STYLE;?>images/bigrating-5.png" >
									</label>
							  </div>
							</div>	
							
							<div class="form-group">
							  <label for="slider1" class="col-sm-3 control-label">Kebersihan :</label>
							  <div class="col-sm-9 layout-slider">
								<span class="cstyle01">
								<input id="Slider1" type="slider" name="kebersihan" value="0;4.2" />
								</span>
							  </div>
							</div>							
							
							<div class="form-group">
							  <label for="slider2" class="col-sm-3 control-label">Kenyamanan :</label>
							  <div class="col-sm-9 layout-slider">
								<span class="cstyle01">
								<input id="Slider2" type="slider" name="kenyamanan" value="0;4.2" /></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label for="slider4" class="col-sm-3 control-label">Pelayanan :</label>
							  <div class="col-sm-9 layout-slider">
								<span class="cstyle01">
								<input id="Slider3" type="slider" name="pelayanan" value="0;4.2" /></span>
							  </div>
							</div>
							<div class="form-group">
							  <label for="slider5" class="col-sm-3 control-label">Fasilitas :</label>
							  <div class="col-sm-9 layout-slider">
								<span class="cstyle01">
								<input id="Slider4" type="slider" name="fasilitas" value="0;4.2" /></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label for="nama_guest" class="col-sm-3 control-label">Nama :</label>
							  <div class="col-sm-9" id="nama_guest_grup" >
								<input name="nama_guest" type="text" class="form-control input-lg" id="nama_hotel" value="" required>
							  
							  </div>
							</div>
							
							<div class="form-group">
							  <label for="auto_kabkot" class="col-sm-3 control-label">Asal Kota :</label>
							  <div class="col-sm-9" id="auto_kabkot_grup">
								<input name="asal_kota" type="text" class="form-control input-lg" id="auto_kabkot" value="" required>
							  </div>
							</div>
							
							<div class="form-group">
							  <label for="judul" class="col-sm-3 control-label">Judul :</label>
							  <div class="col-sm-9" id="judul_komentar_grup">
								<input name="judul" type="text" class="form-control input-lg" id="judul_komentar" value="" required>
							  </div>
							</div>
							
							<div class="form-group">
							  <label for="testimoni" class="col-sm-3 control-label">Testimoni :</label>
							  <div class="col-sm-9" id="testimoni_grup">
							  <textarea id="testimoni" class="form-control" name="testimoni"></textarea>
							  </div>
							</div>
							<div class="form-group">
							  <label for="rekomendasi" class="col-sm-3 control-label">Rekomendasikan? :</label>
							  <div class="col-sm-9">
								<select name="rekomendasi" class="form-control">
									<option value="1">Yes</option>
									<option value="0">No</option>
								</select>
							  </div>
							</div>
							
							<div class="form-group">
							
							  <label for="judul" class="col-sm-3 control-label"></label>
							  <div class="col-sm-9">
							<button type="submit" class="btn-search4 margtop20">Submit</button>	
							  </div>
							</div>
							
						</form>
						</div>
						
						<div class="line2"></div>
						<div class="clearfix"></div>

					</div>		
				</div>
			</div>
			
			<div class="col-md-4" >
				
				<?php $this->output(TEMPLATE.'sidebar/right_assistence');?>
				
				<br/>
				
				<div class="pagecontainer2 mt20 alsolikebox">
					<div class="cpadding1">
						<span class="icon-location"></span>
						<h3 class="opensans">Hotel Terdekat</h3>
						<div class="clearfix"></div>
					</div>
					<?php
						if($view_detail_hotel){
							$limit_related=3;
							if($this->hotel->related_hotel($view_detail_hotel->kecamatan,$limit_related)){
								$data_related=$this->hotel->related_hotel($view_detail_hotel->kecamatan,$limit_related);
								foreach($data_related as $data_related_hotel){
									if($data_related_hotel->id == $view_detail_hotel->id){
										
									}else{
										
										if($this->hotel->harga_terendah_kamar_byIdhotel($data_related_hotel->id)){
											$harga_rendah=$this->hotel->harga_terendah_kamar_byIdhotel($data_related_hotel->id)->harga;
										}else{
											$harga_rendah=0;
										}
										
										$bintang_hotel=$this->review->rata_bintang_by_Idhotel($data_related_hotel->id);
										if($bintang_hotel){
											$bintang_hotel=$this->review->rata_bintang_by_Idhotel($data_related_hotel->id);
										}else{
											$bintang_hotel=0;
										}						
										if($bintang_hotel <= 0){
											$bintang_hotel_max="1";
											$bintang_hotel_max2="1";
											
										}else{
											$bintang_hotel_max=number_format($bintang_hotel,0);
											$bintang_hotel_max2=number_format($bintang_hotel,1);
										}
									?>										
										<div class="cpadding1 ">
										<div class="row">
											<div class="col-md-4 left">											
												<a href="<?php echo $this->uri->baseUri.'index.php/hotel/detail/'.base64_encode($data_related_hotel->id);?>">
												<img src="<?php echo $this->uri->baseUri.STYLE;?>images/smallthumb-1.jpg" class="left mr20" alt=""/>
												</a>
											</div>
											<div class="col-md-8 right">
												<a href="<?php echo $this->uri->baseUri.'index.php/hotel/detail/'.base64_encode($data_related_hotel->id);?>" class="dark"><b><?php echo $data_related_hotel->nama_hotel;?></b></a><br/>
												<span class="opensans green bold size14"><?php echo 'Rp. '.number_format($harga_rendah,0,'','.');?></span> <span class="grey">/ malam</span><br/>
												
												<img src="<?php echo $this->uri->baseUri.STYLE;?>images/filter-rating-<?php echo $bintang_hotel_max;?>.png" alt=""/>
											
											</div>
										</div>
										
										<div class="line5"></div>
										</div>
									<?php
										
									}
								}
							}
						}
					?>
					<br/>
				
					
				</div>				
			
			</div>
			
		</div>
		
		
		
	</div>
	<!-- END OF CONTENT -->
	
	
	


	
	
	<!-- FOOTER -->
	<?php $this->output(TEMPLATE.'footer');?>
	<?php $this->output(TEMPLATE.'footer_script');?>
	
  </body>
</html>
