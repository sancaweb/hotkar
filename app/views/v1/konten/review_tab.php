<?php
$id_hotel=$view_detail_hotel->id;
	if($this->review->getall_review_byIDhotel_page($id_hotel)){
		$page=1;
		$limit=5;
		$data_review=$this->review->getall_review_byIDhotel_page($id_hotel,$page,$limit);
		
		foreach ($data_review as $data_review){
			?>
			
			<div class="hpadding20">							
				<div class="col-md-4 offset-0 center">
					<div class="padding20">
						<div class="bordertype5">
							<div class="circlewrap">
								<img src="<?php echo $this->uri->baseUri.STYLE;?>images/user-avatar.jpg" class="circleimg" alt=""/>
								<?php
										$rata_nilai=array($data_review->kebersihan,$data_review->kenyamanan,$data_review->pelayanan,$data_review->fasilitas);
								?>
								<span><?php echo max($rata_nilai);?></span>
							</div>
							<span class="dark">by <?php echo $data_review->nama_guest;?></span><br/>
							from <?php echo $data_review->asal_kota;?><br/>
						</div>
						
					</div>
				</div>
				<div class="col-md-8 offset-0">
					<div class="padding20">
						<span class="opensans size16 dark"><?php echo $data_review->judul;?></span><br/>
						<span class="opensans size13 lgrey"><?php echo date("M d, Y",strtotime($data_review->tanggal));?></span><br/>
						<p><?php echo $data_review->testimoni;?></p>	
						<ul class="circle-list">
							<li><?php echo $data_review->kebersihan;?></li>
							<li><?php echo $data_review->kenyamanan;?></li>
							<li><?php echo $data_review->pelayanan;?></li>
							<li><?php echo $data_review->fasilitas;?></li>
						</ul>
						<br/>
							<?php
								if($data_review->rekom=="1"){
									echo'
										<img src="'.$this->uri->baseUri.STYLE.'images/check.png" alt=""/>
										<span class="green">Recommended for Everyone</span>
									';
									
								}else{
									echo'
										<img src="'.$this->uri->baseUri.STYLE.'images/delete_old.png" alt=""/>
										<span class="red">Not Recommended </span>
									';
								}
							?>						
							
					</div>
				</div>
				<div class="clearfix"></div>
			</div>

			<div class="line2"></div>
			
			<?php
		}
		?>
		<input type="hidden" id="id_hotel" value="<?php echo $id_hotel;?>">		
		<?php
	}
?>