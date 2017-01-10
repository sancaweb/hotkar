<div class="tab-pane padding40 active" id="profile">

  <!-- Admin top -->
  <div class="col-md-4 offset-0">
	<img src="<?php echo $this->uri->baseUri.STYLE;?>images/user.png" alt="" class="left margright20"/>
	<p class="size12 grey margtop10">
	Selamat datang kembali <br/><span class="lred"><?php echo $this->session->getValue('nama_pengguna');?></span><br/>
	<!-- <a href="#" class="lblue">Change picture</a> -->
	</p>
	<div class="clearfix"></div>
  </div>
  <div class="col-md-4">
  </div>
  <!-- End of Admin top -->
  
  
<div class="clearfix"></div>

<span class="size16 bold">Hotel Profile</span>
<div class="line2"></div>

<!-- COL 1 -->
<div class="col-md-12 offset-0">
<div id="alertnya"></div>
	<form id="form_hotel" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" role="form" method="POST" action="#">
	<input type="hidden" name="id_hotel" value="<?php echo $data_hotel->id;?>" readonly>
	  <div class="box-body">
		<div class="form-group">
		  <label for="nama_hotel" class="col-sm-3 control-label">NAMA HOTEL :</label>
		  <div class="col-sm-9" id="nama_hotel">
			<input type="text" name="nama_hotel" class="form-control input-lg" id="nama_hotel" value="<?php echo $data_hotel->nama_hotel;?>" required>
		  </div>
		</div>
		<div class="form-group">
		  <label for="alamat" class="col-sm-3 control-label">ALAMAT :</label>
		  <div class="col-sm-9" id="alamat">
			<textarea name="alamat" class="form-control" rows="3" id="alamat" required><?php echo $data_hotel->alamat;?></textarea>
		  </div>
		</div>
		
		<div class="form-group">
		  <label for="kecamatan" class="col-sm-3 control-label">KECAMATAN :</label>
		  <div class="col-sm-9">
			
		  <select name="kecamatan" class="select2 select2-container form-control input-lg" style="width: 100%;" required>
			 <option value=''>-Silahkan pilih kecamatan-</option>
			 <?php if($data_kec_karawang){
				  foreach($data_kec_karawang as $data_kec_karawang){
					  ?>
					  <option value="<?php echo $data_kec_karawang->id;?>" <?php 
					  if($data_kec_karawang->id == $data_hotel->kecamatan){echo 'selected';}
					  ?>><?php echo $data_kec_karawang->nama_kec;?></option>
					  <?php
				  }
			  }?>
			  
			</select>
		  </div>
		</div>
		<div class="form-group">
		  <label for="mytextarea" class="col-sm-3 control-label">INFO HOTEL :</label>
		  <div class="col-sm-9">
			<textarea name="informasi" id="mytextarea" class="form-control" rows="3" ><?php echo $data_hotel->informasi;?></textarea>
		  </div>
		</div>
		
		<?php
			if($this->hotel->get_gambar_hotel_by_idHotel($data_hotel->id)){
				$gambar_hotel=$this->hotel->get_gambar_hotel_by_idHotel($data_hotel->id);
				$page=0;
				foreach($gambar_hotel as $gambar_hotel){
					$page++;
					$limit=4;
					
							?>
							<div class="form-group" >
							  <label class="col-sm-3 control-label">
								<?php 
									if($page==1){
										echo 'FOTO :';
									}
								?>
							  </label>
							  <?php
								
					if($this->hotel->get_gambar_hotel_by_idHotel_page($data_hotel->id,$page, $limit)){
						$url_gambar=$this->hotel->get_gambar_hotel_by_idHotel_page($data_hotel->id,$page, $limit);
							
						foreach($url_gambar as $url_gambar){
							
							  ?>
							  <div class="col-sm-2">
							  <a href="<?php echo $this->uri->baseUri.'upload/gambar_hotel/'.$url_gambar->url_gambar;?>" data-lightbox="lightbox" data-title="<?php echo $data_hotel->nama_hotel;?>">
								<img src="<?php echo $this->uri->baseUri.'upload/gambar_hotel/thumbs/'.$url_gambar->url_gambar;?>" class="img-responsive img-thumbnail">
							  </a>
							  </div>
						<?php 
						}
							}?>
							</div>
							<?php
				}
			}
		?>
		<div id="load_div_fasilitas">
		<?php 
		$fasilitas_hotel=$this->hotel->get_fasilitas_hotel_by_idHotel($data_hotel->id);
		if($fasilitas_hotel){
			$page2=0;
			$no2=0;
			  $limit=2;
		  foreach($fasilitas_hotel as $fasilitas_hotel){
			  $page2++;
			  ?>
			<div class="form-group" >
			  <label for="fasilitas_hotel" class="col-sm-3 control-label">
			  <?php				  
				if($page2 ==1){
				  echo 'FASILITAS HOTEL:';
				  }
			  ?>
			  </label>
			  <?php
				if($this->hotel->get_fasilitas_hotel_by_idHotel_page($data_hotel->id,$page2, $limit)){
					$data_fasilitas=$this->hotel->get_fasilitas_hotel_by_idHotel_page($data_hotel->id,$page2, $limit);
					foreach($data_fasilitas as $data_fasilitas){
						?>
						<div class="col-sm-4">
							<div class="input-group">
							  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span>
							  <input name="old_fasilitas_hotel<?php echo $no2;?>" type="text" class="form-control input-lg" value="<?php echo $data_fasilitas->fasilitas_hotel;?>" readonly>
							<span class="input-group-addon" id="basic-addon1">
							<input type="checkbox" name="hapus_fasilitas[]" value="<?php echo $data_fasilitas->id;?>">
							<i class="fa fa-times" aria-hidden="true"></i>
							</span>
							</div>
						  </div>	
						
						<?php
						$no2++;
					}
				}
				
			  ?>
			</div>
			  <?php
		  }
	  }?>
			</div>	  
		<div id="itemRows">
		
		</div>
		
		<div class="form-group" >
		  <label class="col-sm-9 control-label">
		  </label>
		  <div class="col-sm-3">
		   <a class="btn btn-primary btn-lg btn-block" id="add_item">
			<i class="fa fa-plus-square"></i> Tambah Fasilitas
		  </a>				  
		  </div>
		</div>
		<div class="modal-footer">
		<p id="loader"><img src="<?php echo $this->uri->baseUri;?>style/images/ajax-loader.gif"></p>
		<input type="submit" class="btn btn-primary btn-lg btn-block" value="Update Data">
	  </div>
	</form>
		
	  </div><!--/.box-body -->
</div>
<!-- END OF COL 1 -->

<div class="clearfix"></div><br/><br/><br/>

</div>