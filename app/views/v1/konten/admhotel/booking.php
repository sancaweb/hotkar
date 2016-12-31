<div class="tab-pane active" id="bookings">
<div class="padding40">

	<table class="table table-bordered  mt-10">
	<tr class="grey opensans">
		<td class="center">
		<span class="size30 slim lh4 dark"><?php echo $totalAll_booking;?></span><br/>
		<span class="size12">All</span>		
		</td>
		<td class="center"><span class="size30 slim lh4 dark"><?php echo $all_done;?></span><br/><span class="size12">All Done</span></td>
		<td class="center"><span class="size30 slim lh4 dark"><?php echo $paid_to_you;?></span><br/><span class="size12">Paid To You</span></td>
		<td class="center"><span class="size30 slim lh4 dark"><?php echo $total_checked;?></span><br/><span class="size12">Checked In</span></td>
		<td class="center"><span class="size30 slim lh4 dark"><?php echo $payment_verified;?></span><br/><span class="size12">Siap Checkin</span></td>
		<td class="center"><span class="size30 slim lh4 dark"><?php echo $masih_proses;?></span><br/><span class="size12">Transaksi Masih Proses</span></td>
		
	</tr>
	</table>
	<br/>
	
	<span class="dark size20">DATA BOOKING</span>
	<div class="line4"></div>
	<?php if(isset($alert)){
		echo $alert;
	}?>
	<br/>
	<?php
		if($data_booking){
			$tes=0;
			foreach($data_booking as $data_booking){
				$tes++;
				$nama_kamar=$this->hotel->view_kamar_byId($data_booking->id_kamar)->nama_kamar;
				$tgl_checkin=new DateTime($data_booking->checkin);
				$tgl_checkout=new DateTime($data_booking->checkout);
				$selisih_hari=$tgl_checkin->diff($tgl_checkout)->days;
				
				if($data_booking->status == '4'){
					$class_btn="btn-warning";
				}elseif($data_booking->status == '5'){
					$class_btn="btn-info";
				}elseif($data_booking->status == '6'){
					$class_btn="btn-success";
				}elseif($data_booking->status == '7'){
					$class_btn="btn-default disabled";
				}else{
					$class_btn="btn-danger";
				}
				?>
					<div class="col-md-6 offset-0">
						<a href="#"><img alt="" class="left mr20" src="<?php echo $this->uri->baseUri.STYLE;?>images/smallthumb-1.jpg"></a>
						<a class="dark" href="#"><b><?php echo $data_booking->nama_guest.' / '.$data_booking->no_pesanan;?></b></a><br/>
						<span class="dark size12"><?php echo $nama_kamar;?>. Book Date: <?php echo $data_booking->book_date;?></span><br/>
						<span class="opensans green bold size14"><?php echo $data_booking->checkin.' <strong>Sampai</strong> '.$data_booking->checkout;?></span> <span class="grey">(<?php echo $selisih_hari;?> Malam)</span><br>
					</div>
					<div class="col-md-4">
						<span class="grey"><?php echo $data_booking->permintaan;?></span>
					</div>
					
					<div class="col-md-2 offset-0 btn-group">
						<button type="button" class="btn dropdown-toggle btn-lg <?php echo $class_btn;?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php if($data_booking->status == 7){echo 'Transaksi Selesai';}else{ echo 'Action';}?> <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu">
							<li><a href="#" data-toggle="modal" data-target="#detail_order<?php echo $data_booking->id;?>" class="btn btn-lg">
							<i class="fa fa-search-plus" aria-hidden="true"></i>
							View Detail</a>
							</li>							
							<li role="separator" class="divider"></li>
							<li>
							<a id="btn_status" href="#" data-toggle="modal" data-target="#ubah_status<?php echo $data_booking->id;?>" class="btn btn-lg">
							<i class="fa fa-file-text-o" aria-hidden="true"></i>
							Status Pemesanan</a>
							</li>
						  </ul>
						
					
					</div>
					<div class="clearfix"></div>
					<div class="line4"></div>
					<!-- Modal Detail -->
					<div class="modal fade bs-example-modal-lg" id="detail_order<?php echo $data_booking->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog modal-lg">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title">Detail Pemesanan dengan Nomor: <strong><?php echo $data_booking->no_pesanan;?></strong></h4>
						  </div>
						  <div class="modal-body">
							<form class="form-horizontal" >
									<?php 
									$status_booking=$this->booking->view_order_status_byId($data_booking->status);
										if($status_booking){											
											$ket_status=$status_booking->keterangan;
										}else{
											$status_booking='Belum selesai';
											$ket_status='Status gak ada.';
										}
											
									?>
								  <div class="box-body">
									<div class="form-group">
									  <label for="no_pesanan" class="col-sm-3 control-label">Status Pemesanan :</label>									 
									 <div class="col-sm-9">
										<input type="text" id="no_pesanan" class="form-control input-lg" value="<?php echo $ket_status;?>" readonly>										
									  </div>
									</div>
									
									<div class="form-group">
									  <label for="nama_guest" class="col-sm-3 control-label">Nama Guest :</label>
									  <div class="col-sm-9">
										<input type="text" class="form-control input-lg" id="nama_guest" value="<?php echo $data_booking->nama_guest;?>" readonly>
									  </div>
									</div>
									
									<div class="form-group">
									  <label for="telepon" class="col-sm-3 control-label">Telepon :</label>
									  <div class="col-sm-9">
										<input type="text" id="telepon" class="form-control input-lg" value="<?php echo $data_booking->tlp;?>" readonly>
									  </div>
									</div>
									
									<div class="form-group">
									  <label for="email" class="col-sm-3 control-label">Email :</label>
									  <div class="col-sm-9">
										<input type="text" id="email" class="form-control input-lg" value="<?php echo $data_booking->email;?>" readonly>
									  </div>
									</div>
									<?php if($this->hotel->view_kamar_byId($data_booking->id_kamar)){
										$nama_kamar=$this->hotel->view_kamar_byId($data_booking->id_kamar)->nama_kamar;
									}else{
										$nama_kamar='Nama kamar tidak ada,';
									}?>
																		
									<div class="form-group">
									  <label for="kamar" class="col-sm-3 control-label">Kamar :</label>
									  <div class="col-sm-7">
											<input type="text" id="kamar" class="form-control input-lg" value="<?php echo $nama_kamar;?>" readonly>										
									  </div>									  
									  <div class="col-sm-2">
										<div class="input-group">
											<input type="text" class="form-control input-lg" value="<?php echo $data_booking->jml_kamar;?>" readonly>
										<span class="input-group-addon" id="basic-addon1">Kamar</span>
										</div>
									  </div>
									</div>
									
									<div class="form-group">
									  <label for="checkin" class="col-sm-3 control-label">Checkin :</label>
									  <div class="col-sm-3">
											<input type="text" id="checkin" class="form-control input-lg" value="<?php echo $data_booking->checkin;?>" readonly>										
									  </div>
										<label for="checkin" class="col-sm-2 control-label">Checkout :</label>
									  <div class="col-sm-4">									  
										<div class="col-sm-7">
											<input type="text" id="kamar" class="form-control input-lg" value="<?php echo $data_booking->checkout;?>" readonly>
										</div>
										<div class="col-sm-5">
										<input type="text" id="kamar" class="form-control input-lg" value="<?php echo $selisih_hari.' Hari';?>" readonly>
										</div>
										
									  </div>
									</div>
									
									<div class="form-group">
									  <label for="total_bayar" class="col-sm-3 control-label">Total Bayar :</label>
									  									  
									  <div class="col-sm-9">
										<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">Rp</span>
											<input type="text" id="total_bayar" class="form-control input-lg" value="<?php echo number_format($data_booking->total_bayar,0,'','.');?>" readonly>
										
										</div>
									  </div>
									</div>
									
									<div class="form-group">
									  <label for="permintaan" class="col-sm-3 control-label">Permintaan :</label>
									  <div class="col-sm-9">
										<textarea class="form-control" rows="3" readonly><?php echo $data_booking->permintaan;?></textarea>
									  </div>
									</div>
											  									
									<div class="clearfix"></div>
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
					<!-- END Modal Detail -->
					
					<!-- Modal Status -->
					<div class="modal fade bs-example-modal-lg" id="ubah_status<?php echo $data_booking->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog modal-lg">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title">Ubah status Pemesanan dengan Nomor: <strong><?php echo $data_booking->no_pesanan;?></strong></h4>
						  </div>
						  <div class="modal-body">							
								  <div class="box-body">
									<?php 
								if($this->booking->view_order_status_byId($data_booking->status)){
									$status_booking=$this->booking->view_order_status_byId($data_booking->status);
									if($data_booking->status == '4'){
										?>
										<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4>
										<i class="icon fa fa-check"></i> 
										Status pemesanan ini: <?php echo $status_booking->keterangan;?><br/>										
										</h4>
										<a href="<?php echo $this->uri->baseUri;?>index.php/admhotel/checked_in_room/<?php echo base64_encode($data_booking->id).'/'.base64_encode($data_booking->no_pesanan);?>" class="btn btn-primary btn-block btn-lg">Pemesan Sudah Checkin</a>										
										</div>
										<?php
									}elseif($data_booking->status == '5'){
										?>
										<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4>
										<i class="icon fa fa-check"></i> 
										Status pemesanan ini: <?php echo $status_booking->keterangan;?><br/>	
										<i class="icon fa fa-check"></i> 
										Pemesan sudah melakukan Checkin hotel, menunggu pembayaran dari HotelKarawang.com ke Hotel.
										</h4>							
										</div>
										<?php
									}elseif($data_booking->status == '6'){
										?>
										<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4>
										<i class="icon fa fa-check"></i> 
										Status pemesanan ini: <?php echo $status_booking->keterangan;?><br/>	
										<i class="icon fa fa-check"></i> 
										<?php echo $status_booking->instruksi;?>
										</h4>
											<a class="btn btn-primary btn-block btn-lg">Klaim Pembayaran</a>										
										</div>
										<?php
									}else{
										?>
										<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4>
										<i class="icon fa fa-check"></i> 
										Status pemesanan ini: <?php echo $status_booking->keterangan;?><br/>	
										<i class="icon fa fa-check"></i> 
										Pemesan belum menyelesaikan proses pembayaran.
										</h4>							
										</div>
										<?php
									}
									
									
								}else{
									$status_booking='Belum selesai';
								}
									?>		  									
									<div class="clearfix"></div>
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
					<!-- END Modal ubah status -->
				<?php
			}
		}
	?>
	<!--
	<ul class="pagination right paddingbtm20">
	  <li class="disabled"><a href="#">«</a></li>
	  <li><a href="#">1</a></li>
	  <li><a href="#">2</a></li>
	  <li><a href="#">3</a></li>
	  <li><a href="#">»</a></li>
	</ul>
	-->
	

</div>
</div>