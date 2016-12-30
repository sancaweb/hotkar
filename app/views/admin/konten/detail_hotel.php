<?php
	if($viewall_hotel_modal_detail){
		foreach($viewall_hotel_modal_detail as $detail_hotel){
			?>
			<!-- MODAL Detail -->
<div class="modal fade bs-example-modal-lg" id="detailHotel<?php echo $detail_hotel->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		<h4 class="modal-title">Detail Hotel</h4>
	  </div>
	  <div class="modal-body">
		<form class="form-horizontal" >
			  
			  <div class="box-body">
				<div class="form-group">
				  <label for="nama_hotel" class="col-sm-2 control-label">NAMA HOTEL :</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control input-lg" id="nama_hotel" value="<?php echo $detail_hotel->nama_hotel;?>" readonly>
				  </div>
				</div>
				<div class="form-group">
				  <label for="alamat" class="col-sm-2 control-label">ALAMAT :</label>
				  <div class="col-sm-10">
					<textarea name="alamat" class="form-control" rows="3" id="alamat" readonly><?php echo $detail_hotel->alamat;?></textarea>
				  </div>
				</div>
				<div class="form-group">
				  <label for="kecamatan" class="col-sm-2 control-label">KECAMATAN :</label>
				  <div class="col-sm-10">
					<input name="kecamatan" class="form-control input-lg" value="<?php echo $this->pengaturan->get_nama_kec_karawang_byId($detail_hotel->kecamatan)->nama_kec;?>" readonly>
				  </div>
				</div>
				<div class="form-group">
				  <label for="mytextarea" class="col-sm-2 control-label">INFO HOTEL :</label>
				  <div class="col-sm-10">
				  <?php echo $detail_hotel->informasi;?>
				  </div>
				</div>
				<?php
					if($this->hotel->get_gambar_hotel_by_idHotel($detail_hotel->id)){
						$gambar_hotel=$this->hotel->get_gambar_hotel_by_idHotel($detail_hotel->id);
						
						$page=0;
						foreach($gambar_hotel as $gambar_hotel){
							$page++;
							$limit=2;
							
									?>
									<div class="form-group" >
									  <label class="col-sm-2 control-label">
										<?php 
											if($page==1){
												echo 'FOTO :';
											}
										?>
									  </label>
									  <?php
										
							if($this->hotel->get_gambar_hotel_by_idHotel_page($detail_hotel->id,$page, $limit)){
								$url_gambar=$this->hotel->get_gambar_hotel_by_idHotel_page($detail_hotel->id,$page, $limit);
								
								foreach($url_gambar as $url_gambar){
									  ?>
									  <div class="col-sm-5">
									  <a href="<?php echo $this->uri->baseUri.'upload/gambar_hotel/'.$url_gambar->url_gambar;?>" data-lightbox="lightbox<?php echo $url_gambar->url_gambar;?>" data-title="Gambar Hotel">
										<img src="<?php echo $this->uri->baseUri.'upload/gambar_hotel/thumbs/'.$url_gambar->url_gambar;?>" class="img-responsive img-thumbnail" style="width:80%;">
									  </a>
									  </div>
								<?php } 
									}?>
									</div>
									<?php
						}
					}
				?>
				
				
				  
				  <?php 
					$fasilitas_hotel=$this->hotel->get_fasilitas_hotel_by_idHotel($detail_hotel->id);
					if($fasilitas_hotel){
						$i=0;
					  foreach($fasilitas_hotel as $fasilitas_hotel){
						  $i++;
						  ?>
				<div class="form-group" >
				  <label for="fasilitas_hotel" class="col-sm-2 control-label">
				  <?php				  
					if($i ==1){
					  echo 'FASILITAS HOTEL:';
					  }
				  ?>
				  </label>
				  <div class="col-sm-10 input-group">
						  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span>
						  <input type="text" class="form-control input-lg" value="<?php echo $fasilitas_hotel->fasilitas_hotel;?>" readonly>
						 
				  
				  </div>
				</div>
						  <?php
					  }
				  }?>
				
				<div class="clearfix"></div>
				<hr/>
				<div class="form-group">
				<?php
					
					if($this->user_back->get_user_byID($detail_hotel->user_id)){
						$user_back=$this->user_back->get_user_byID($detail_hotel->user_id);
						$username=$user_back->username;
						$nama_pengguna=$user_back->nama_pengguna;
						$email=$user_back->email;
					}else{
						$username='Username Tidak Ditemukan';
						$nama_pengguna='Nama Pengguna Tidak Ditemukan';
						$email='Email Tidak Ditemukan';
					}
				?>
				  <label for="username" class="col-sm-2 control-label">Username :</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control input-lg" id="username" value="<?php echo $username;?>" readonly>
				  </div>
				</div>
				<div class="form-group">
				  <label for="nama_pengguna" class="col-sm-2 control-label">Nama Pengguna:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control input-lg" id="nama_pengguna" value="<?php echo $nama_pengguna;?>" readonly>
				  </div>
				</div>
				<div class="form-group">
				  <label for="email" class="col-sm-2 control-label">Email:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control input-lg" id="email" value="<?php echo $email;?>" readonly>
				  </div>
				</div>
				
			  </div><!-- /.box-body -->
			  <div class="modal-footer">
				<a class="btn btn-danger" data-dismiss="modal">
				<i class="fa fa-window-close" aria-hidden="true"></i>
					Close</a>
			  </div>
			</form>
	  </div>
	</div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
			<?php
		}
	}
?>
