<?php
	if($viewall_pemesanan_modal_edit){
		foreach($viewall_pemesanan_modal_edit as $edit_pemesanan){
			if($this->hotel->view_nama_hotel_byID($edit_pemesanan->id_hotel)){
				$nama_hotel=$this->hotel->view_nama_hotel_byID($edit_pemesanan->id_hotel)->nama_hotel;
			}else{
				$nama_hotel='Nama Hotel tidak tersedia, mungkin telah dihapus.';
			}
			
			if($this->hotel->view_namaKamar_byID($edit_pemesanan->id_kamar)){
				$nama_kamar=$this->hotel->view_namaKamar_byID($edit_pemesanan->id_kamar)->nama_kamar;
			}else{
				$nama_kamar='Nama Kamar tidak tersedia, mungkin telah dihapus.';
			}
			?>
			<!-- MODAL edit -->
<div class="modal fade bs-example-modal-lg" id="detailpesanan<?php echo $edit_pemesanan->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		<h4 class="modal-title">Detail Pemesanan <strong><?php echo $edit_pemesanan->no_pesanan;?></strong></h4>
	  </div>
	  <div class="modal-body">
		<form class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" role="form" method="POST" action="<?php echo $this->uri->baseUri;?>index.php/adm_booking/edit_pemesanan">
			  <input name="id_pemesanan" type="hidden" value="<?php echo $edit_pemesanan->id;?>" >
			  <div class="box-body">
				<div class="form-group">
				  <label for="nama_hotel" class="col-sm-2 control-label">Nama Hotel :</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control input-lg" id="nama_hotel" value="<?php echo $nama_hotel;?>" readonly>
				  </div>
				</div>
				
				<div class="form-group">
					  <label for="kamar" class="col-sm-2 control-label">Kamar :</label>
					  <div class="col-sm-8">
							<input type="text" id="kamar" class="form-control input-lg" value="<?php echo $nama_kamar;?>" readonly>										
					  </div>									  
					  <div class="col-sm-2">
						<div class="input-group">
							<input type="text" class="form-control input-lg" value="<?php echo $edit_pemesanan->jml_kamar;?>" readonly>
						<span class="input-group-addon" id="basic-addon1">Kamar</span>
						</div>
					  </div>
					</div>
				
				<?php
					$tgl_checkin=new DateTime($edit_pemesanan->checkin);
					$tgl_checkout=new DateTime($edit_pemesanan->checkout);
					$selisih_hari=$tgl_checkin->diff($tgl_checkout)->days;
				?>
				<div class="form-group">
					  <label for="checkin" class="col-sm-2 control-label">Checkin :</label>
					  <div class="col-sm-3">
							<input type="text" id="checkin" class="form-control input-lg" value="<?php echo $edit_pemesanan->checkin;?>" readonly>										
					  </div>
					  
						<label for="checkin" class="col-sm-2 control-label">Checkout :</label>
					  <div class="col-sm-5">									  
						<div class="col-sm-7">
							<input type="text" id="kamar" class="form-control input-lg" value="<?php echo $edit_pemesanan->checkout;?>" readonly>
						</div>
						<div class="col-sm-5">
						<input type="text" id="kamar" class="form-control input-lg" value="<?php echo $selisih_hari.' Hari';?>" readonly>
						</div>
						
					  </div>
					</div>
				
				<div class="clearfix"></div>
				<hr/>
				<div class="form-group">
				  <label for="nama_guest" class="col-sm-2 control-label">Nama Guest :</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control input-lg" id="nama_guest" value="<?php echo $edit_pemesanan->nama_guest;?>" readonly>
				  </div>
				</div>
				<div class="form-group">
				  <label for="email" class="col-sm-2 control-label">Email :</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control input-lg" id="email" value="<?php echo $edit_pemesanan->email;?>" readonly>
				  </div>
				</div>
				
				<div class="form-group">
				  <label for="tlp" class="col-sm-2 control-label">Telepon :</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control input-lg" id="tlp" value="<?php echo $edit_pemesanan->tlp;?>" readonly>
				  </div>
				</div>
				
				<div class="form-group">
				  <label for="tlp" class="col-sm-2 control-label">Status :</label>
				  <div class="col-sm-10">
				  
				  <select name="status" class="form-control input-lg">
				  <?php
					if($list_status){
						$no=0;
						foreach ($list_status as $data_status){
							if($data_status->id == $edit_pemesanan->status){echo 'selected';}
							$no++;
							?>
							<option <?php if($data_status->id == $edit_pemesanan->status){echo 'selected';};?> value="<?php echo $data_status->id;?>" ><?php echo $data_status->id;?>-<?php echo $data_status->keterangan;?></option>
							<?php
						}
					}else{
						?>
							<option <?php echo $selected;?> value="" >Status Pemesanan tidak ditemukn</option>
						<?php
					}
				  
				  ?>
					
				  </select>
					
				  </div>
				</div>
				
				<div class="clearfix"></div>
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
