<!-- MODAL Input -->
<div class="modal fade bs-example-modal-lg" id="inputHotel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		<h4 class="modal-title">Input Data Kamar</h4>
	  </div>
	  <div class="modal-body">
		<form class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" role="form" method="POST" action="<?php echo $this->uri->baseUri;?>index.php/adm_hotel/pro_input_hotel">
			  
			  <div class="box-body">
				<div class="form-group">
				  <label for="nama_hotel" class="col-sm-2 control-label">NAMA HOTEL :</label>
				  <div class="col-sm-10">
					<input type="text" name="nama_hotel" class="form-control input-lg" id="nama_hotel" placeholder="Nama Hotel" required>
				  </div>
				</div>
				<div class="form-group">
				  <label for="alamat" class="col-sm-2 control-label">ALAMAT :</label>
				  <div class="col-sm-10">
					<textarea name="alamat" class="form-control" rows="3" id="alamat" placeholder="Alamat" required></textarea>
				  </div>
				</div>
				
				<div class="form-group">
				  <label for="kecamatan" class="col-sm-2 control-label">KECAMATAN :</label>
				  <div class="col-sm-10">
					
				  <select name="kecamatan" class="form-control select2" style="width: 100%;" required>
                     <option value=''>-Silahkan pilih kecamatan-</option>
					 <?php if($data_kec_karawang){
						  foreach($data_kec_karawang as $data_kec_karawang){
							  ?>
							  <option value="<?php echo $data_kec_karawang->id;?>"><?php echo $data_kec_karawang->nama_kec;?></option>
							  <?php
						  }
					  }?>
					  
                    </select>
				  </div>
				</div>
				<div class="form-group">
				  <label for="mytextarea" class="col-sm-2 control-label">INFO HOTEL :</label>
				  <div class="col-sm-10">
					<textarea name="informasi" id="mytextarea" class="form-control" rows="3" placeholder="Informasi Hotel"></textarea>
				  </div>
				</div>
				<div id="itemRowsGbr">
				<div class="form-group" >
				<input type="hidden" name="pengulang_gambar[]" value="0">
				  <label class="col-sm-2 control-label">FOTO :
				  </label>
				  <div class="col-sm-10">
					<input name="foto0" type="file" class="" id="foto" required>
				  </div>
				</div>
				</div>
				<div class="form-group" >
				  <label class="col-sm-2 control-label">
				  </label>
				  <div class="col-sm-10">
				   <a class="btn btn-app" id="add_itemGbr">
					<i class="fa fa-plus-square"></i> Tambah Gambar
				  </a>				  
				  </div>
				</div>
				
				<div id="itemRows">
				<div class="form-group" >
				<input type="hidden" name="pengulang_fasilitas_hotel[]" value="0">
				  <label for="fasilitas_hotel" class="col-sm-2 control-label">FASILITAS HOTEL:
				  </label>
				  <div class="col-sm-10">
				  <input type="text" name="fasilitas_hotel[]" class="form-control input-lg" id="fasilitas_hotel" placeholder="Fasilitas Hotel" required>
				  </div>
				</div>
				</div>
				
				<div class="form-group" >
				  <label class="col-sm-2 control-label">
				  </label>
				  <div class="col-sm-10">
				   <a class="btn btn-app" id="add_item">
					<i class="fa fa-plus-square"></i> Tambah Fasilitas
				  </a>				  
				  </div>
				</div>
				
				<div class="clearfix"></div>
				<hr/>
				<?php
					$randomstring=$this->randomstring->randomstring(4);
					$username=date('ymd').$randomstring;
				?>
				<div class="form-group">
				  <label for="username" class="col-sm-2 control-label">Username :</label>
				  <div class="col-sm-10">
					<input name="username" type="text" class="form-control input-lg" id="username" value="<?php echo $username;?>" readonly>
				  </div>
				</div>
				
				
				<div class="form-group">
				  <label for="password" class="col-sm-2 control-label">Password :</label>
				  <div class="col-sm-10">
					<input name="password" type="password" class="form-control input-lg" id="password" placeholder="Password" required>
				  <p class="help-block"></p>
				  </div>
				</div>
				<div class="form-group">
				  <label for="repassword" class="col-sm-2 control-label">Retype Password :</label>
				  <div class="col-sm-10">
					<input type="password" class="form-control input-lg" id="repassword" placeholder="Ketik Ulang Password" required>
				
				  </div>
				</div>
				<div class="form-group">
				  <label for="nama_pengguna" class="col-sm-2 control-label">Nama Pengguna:</label>
				  <div class="col-sm-10">
					<input name="nama_pengguna" type="text" class="form-control input-lg" id="nama_pengguna" placeholder="Nama Pengguna untuk user hotel ini" required>
				  </div>
				</div>
				<div class="form-group">
				  <label for="email" class="col-sm-2 control-label">Email:</label>
				  <div class="col-sm-10">
					<input name="email" type="text" class="form-control input-lg" id="email" placeholder="Email untuk user hotel ini" required>
				  </div>
				</div>
				
				
			  </div><!-- /.box-body -->
			  <div class="modal-footer">
				<a class="btn btn-danger" data-dismiss="modal">
				<i class="fa fa-window-close" aria-hidden="true"></i>
					Close</a>
				<input type="submit" class="btn btn-primary" value="Input">
			  </div>
			</form>
	  </div>
	</div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>