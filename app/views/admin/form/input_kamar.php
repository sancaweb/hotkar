<?php
		
	if(isset($nama_hotel)){
		$nama_hotel=$nama_hotel;
	}else{
		$nama_hotel='Data Hotel tidak ditemukan';
	}
?>
			<!-- MODAL Input -->
			<div class="modal fade bs-example-modal-lg" id="inputKamar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog modal-lg">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title">Input Data Kamar</h4>
				  </div>
				  <div class="modal-body">
					<form class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" role="form" method="POST" action="<?php echo $this->uri->baseUri;?>index.php/adm_hotel/pro_input_kamar">
						  
						  <div class="box-body">
							<div class="form-group">
							  <label for="nama_hotel" class="col-sm-2 control-label">NAMA HOTEL :</label>
							  <div class="col-sm-10">
								<input type="text" name="nama_hotel" class="form-control input-lg" id="nama_hotel" value="<?php echo $nama_hotel;?>" readonly>
								<input type="hidden" name="id_hotel" class="form-control input-lg" id="id_hotel" value="<?php echo $id_hotel;?>" readonly>
							  </div>
							</div>
							<div class="form-group">
							  <label for="nama_kamar" class="col-sm-2 control-label">NAMA KAMAR :</label>
							  <div class="col-sm-10 ">
								<input type="text" name="nama_kamar" class="form-control input-lg" id="nama_kamar" placeholder="Nama Kamar" required>
							  </div>
							</div>
							<div class="form-group">
							  <label for="kapasitas" class="col-sm-2 control-label">KAPASITAS KAMAR :</label>
							  <div class="col-sm-10">
							  <div class="input-group">
								<input name="kapasitas" type="number" class="form-control input-lg" min=0 oninput="validity.valid||(value='');" id="kapasitas" placeholder="Kapasitas Kamar" required>
								 <span class="input-group-addon" id="basic-addon2">Guest</span>
							  </div>
							  </div>
							</div>
							<div class="form-group">
							  <label for="harga" class="col-sm-2 control-label">ROOM RATE :</label>
							  <div class="col-sm-10">
							  <div class="input-group" id="harga"> 
							  <div class="input-group-addon">Rp. </div>
								<input name="harga" type="text" class="form-control input-lg" id="harga" placeholder="Room Rate" required>
							  </div>
							  </div>
							</div>
							
							<div class="form-group">
							  <label for="ketersediaan" class="col-sm-2 control-label">AVAILABLE ROOM :</label>
							  <div class="col-sm-10 ">
								<input name="jumlah_ketersediaan" type="number" min=0 oninput="validity.valid||(value='');" class="form-control input-lg" id="ketersediaan" placeholder="Jumlah Kamar yang Kosong" required>
							  </div>
							</div>
							<div class="form-group">
							  <label for="mytextarea" class="col-sm-2 control-label">INFO KAMAR :</label>
							  <div class="col-sm-10">
								<textarea name="informasi" id="mytextarea" class="form-control" rows="3" placeholder="Informasi Kamar"></textarea>
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
								<input type="hidden" name="pengulang_fasilitas_kamar[]" value="0">
								  <label for="fasilitas_kamar" class="col-sm-2 control-label">FASILITAS KAMAR:
								  </label>
								  <div class="col-sm-10">
								  <input type="text" name="fasilitas_kamar[]" class="form-control input-lg" id="fasilitas_kamar" placeholder="Fasilitas Kamar" required>
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