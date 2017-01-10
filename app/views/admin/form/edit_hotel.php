<?php
	if($viewall_hotel_modal_edit){
		foreach($viewall_hotel_modal_edit as $edit_hotel){
			?>
			<!-- MODAL Detail -->
<div class="modal fade bs-example-modal-lg" id="editHotel<?php echo $edit_hotel->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		<h4 class="modal-title">Edit Hotel</h4>
	  </div>
	  <div class="modal-body">
		<form class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" role="form" method="POST" action="<?php echo $this->uri->baseUri;?>index.php/adm_hotel/pro_edit_hotel">
			  <input type="hidden" name="id_hotel" value="<?php echo $edit_hotel->id;?>" >
			  
			  <div class="box-body">
				<div class="form-group">
				  <label for="nama_hotel" class="col-sm-2 control-label">NAMA HOTEL :</label>
				  <div class="col-sm-10">
					<input name="nama_hotel" type="text" class="form-control input-lg" id="nama_hotel" value="<?php echo $edit_hotel->nama_hotel;?>" required>
				  </div>
				</div>
				<div class="form-group">
				  <label for="alamat" class="col-sm-2 control-label">ALAMAT :</label>
				  <div class="col-sm-10">
					<textarea name="alamat" class="form-control" rows="3" id="alamat" required><?php echo $edit_hotel->alamat;?></textarea>
				  </div>
				</div>
				<div class="form-group">
				  <label for="kecamatan" class="col-sm-2 control-label">KECAMATAN :</label>
				  <div class="col-sm-10">
				  <select name="kecamatan" class="form-control select2" style="width: 100%;" required>
                     <option value=''>-Silahkan pilih kecamatan-</option>
					 <?php if($data_kec_karawang){
						  foreach($data_kec_karawang as $data_kec_karawangdit){
							  ?>
								<option value='<?php echo $data_kec_karawangdit->id;?>'
								<?php if($data_kec_karawangdit->id==$edit_hotel->kecamatan){echo ' selected';}?>><?php echo $data_kec_karawangdit->nama_kec;?></option>
							  <?php
						  }
					  }?>
					  
                    </select>
				  </div>
				</div>
				<div class="form-group">
				  <label for="mytextarea_edit" class="col-sm-2 control-label">INFO HOTEL :</label>
				  <div class="col-sm-10">
				  
				  <textarea name="informasi" id="mytextarea_edit" class="form-control" rows="3" placeholder="Informasi Hotel" required><?php echo $edit_hotel->informasi;?></textarea>
				  </div>
				</div>
				
				
				<?php
					if($this->hotel->get_gambar_hotel_by_idHotel($edit_hotel->id)){
						$gambar_hotel=$this->hotel->get_gambar_hotel_by_idHotel($edit_hotel->id);
						
						$page=0;
						$no=0;
						foreach($gambar_hotel as $gambar_hotel){
							$page++;
							$limit=4;
							
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
										
							if($this->hotel->get_gambar_hotel_by_idHotel_page($edit_hotel->id,$page, $limit)){
								$url_gambar=$this->hotel->get_gambar_hotel_by_idHotel_page($edit_hotel->id,$page, $limit);
									
								foreach($url_gambar as $url_gambar){
									
									  ?>
									  <div class="col-sm-2">
									  <a href="<?php echo $this->uri->baseUri.'upload/gambar_hotel/'.$url_gambar->url_gambar;?>" data-lightbox="lightbox<?php echo $url_gambar->url_gambar;?>" data-title="Gambar Hotel">
										<img src="<?php echo $this->uri->baseUri.'upload/gambar_hotel/thumbs/'.$url_gambar->url_gambar;?>" class="img-responsive img-thumbnail">
									  </a>
									  <input  type="checkbox" name="hapus_foto<?php echo $no;?>" value="<?php echo $url_gambar->id;?>"> Hapus
									  </div>
								<?php 
									
									$no++;
								}
									}?>
									</div>
									<?php
						}
					}
				?>
				
				<div id="itemRowsGbrz">
				<div class="form-group" >
				<input type="hidden" name="pengulang_gambar[]" value="0">
				  <label class="col-sm-2 control-label">FOTO :
				  </label>
				  <div class="col-sm-10">
					<input name="foto0" type="file" class="input-lg" id="foto">
				  </div>
				</div>
				</div>
				<div class="form-group" >
				  <label class="col-sm-2 control-label">
				  </label>
				  <div class="col-sm-10">
				   <a class="btn btn-app" id="add_itemGbrz">
					<i class="fa fa-plus-square"></i> Tambah Gambar
				  </a>				  
				  </div>
				</div>
				
				  <?php 
					$fasilitas_hotel=$this->hotel->get_fasilitas_hotel_by_idHotel($edit_hotel->id);
					if($fasilitas_hotel){
						$page2=0;
						$no2=0;
						  $limit=2;
					  foreach($fasilitas_hotel as $fasilitas_hotel){
						  $page2++;
						  ?>
						<div class="form-group" >
						  <label for="fasilitas_hotel" class="col-sm-2 control-label">
						  <?php				  
							if($page2 ==1){
							  echo 'FASILITAS HOTEL:';
							  }
						  ?>
						  </label>
						  <?php
							if($this->hotel->get_fasilitas_hotel_by_idHotel_page($edit_hotel->id,$page2, $limit)){
								$data_fasilitas=$this->hotel->get_fasilitas_hotel_by_idHotel_page($edit_hotel->id,$page2, $limit);
								foreach($data_fasilitas as $data_fasilitas){
									?>
									<div class="col-sm-5">
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span>
										  <input name="old_fasilitas_hotel<?php echo $no2;?>" type="text" class="form-control input-lg" value="<?php echo $data_fasilitas->fasilitas_hotel;?>" >
										<span class="input-group-addon" id="basic-addon1">
										<input  type="checkbox" name="hapus_fasilitas<?php echo $no2;?>" value="<?php echo $data_fasilitas->id;?>">
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
				  
				  <div id="itemRowsz">
					<div class="form-group" >
					<input type="hidden" name="pengulang_fasilitas_hotel[]" value="0">
					  <label for="fasilitas_hotel" class="col-sm-2 control-label">FASILITAS HOTEL:
					  </label>
					  <div class="col-sm-10">
					  <input type="text" name="fasilitas_hotel[]" class="form-control input-lg" id="fasilitas_hotel" value='' placeholder="Fasilitas Hotel">
					  </div>
					</div>
					</div>
					
					<div class="form-group" >
					  <label class="col-sm-2 control-label">
					  </label>
					  <div class="col-sm-10">
					   <a class="btn btn-app" id="add_itemz">
						<i class="fa fa-plus-square"></i> Tambah Fasilitas
					  </a>				  
					  </div>
					</div>
				<div class="clearfix"></div>
				<hr/>
				<div class="modal-header">
				<div class="alert alert-success alert-dismissable">
					
					<h4>	<i class="icon fa fa-check"></i>Edit akun hanya bisa dilakukan di halaman user.
					<a href="" type="button" class="btn btn-primary btn-lg btn-block">
					<i class="fa fa-user" aria-hidden="true"></i>
					Edit User</a>
					</h4>
				</div>
			  </div>
				<div class="form-group">
				<?php					
					if($this->user_back->get_user_byID($edit_hotel->user_id)){
						$user_back=$this->user_back->get_user_byID($edit_hotel->user_id);
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
					<input type="submit" class="btn btn-primary" value="Edit">
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
