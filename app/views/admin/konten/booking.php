<?php
	if(isset($alert)){
		echo $alert;
	}
?>
<section class="content">
  <div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
			<div class="btn-group">
			  <button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				View By Hotel <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">
			  <?php
				if($list_hotel){
					foreach ($list_hotel  as $list_hotel){
						?>
						<li><a href="#"><?php echo $list_hotel->nama_hotel;?></a></li>
						<li role="separator" class="divider"></li>
						<?php
					}
				}else{
					?>
						<li><a href="#">Tida ada data hotel</a></li>
					<?php
				}
			  ?>
			  </ul>
			</div>
		
		  <div class="box-tools">
			<div class="input-group input-group-lg" style="width: 300px;">
			  <input type="text" name="table_search" class="form-control input-lg pull-right" placeholder="Search">
			  <div class="input-group-btn">
				<button class="btn btn-lg btn-default"><i class="fa fa-search"></i></button>
			  </div>
			</div>
		  </div>
		</div><!-- /.box-header -->
		<div class="box-body table-responsive">
		  <table class="table table-hover table-bordered">
		  <thead>
			<tr>
			  <th style="width:20px;">No</th>
			  <th>No Pesanan</th>
			  <th>Nama Guest</th>
			  <th >Hotel</th>
			  <th>Kamar</th>
			  <th>Checkin/Out</th>
			  <th>Jumlah Kamar</th>
			  <th>Total Bayar</th>
			  <th>Status</th>
			  <th style="width:150px;">Action</th>
			</tr>
			</thead>
			<tbody>	
				<?php 
					if($viewall_pemesanan){
						$no=$no;
						foreach($viewall_pemesanan as $viewall_pemesanan){
							$no++;
							if($this->hotel->view_nama_hotel_byID($viewall_pemesanan->id_hotel)){
								$nama_hotel=$this->hotel->view_nama_hotel_byID($viewall_pemesanan->id_hotel)->nama_hotel;
							}else{
								$nama_hotel='Nama Hotel tidak tersedia, mungkin telah dihapus.';
							}
							
							if($this->hotel->view_namaKamar_byID($viewall_pemesanan->id_kamar)){
								$nama_kamar=$this->hotel->view_namaKamar_byID($viewall_pemesanan->id_kamar)->nama_kamar;
							}else{
								$nama_kamar='Nama Kamar tidak tersedia, mungkin telah dihapus.';
							}
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $viewall_pemesanan->no_pesanan;?></td>
								<td><?php echo $viewall_pemesanan->nama_guest;?></td>
								<td><?php echo $nama_hotel;?></td>
								<td><?php echo $nama_kamar;?></td>
									<?php 
										$checkin=date("d M, Y",strtotime($viewall_pemesanan->checkin));
										$checkout=date("d M, Y",strtotime($viewall_pemesanan->checkout));								
										
									?>
								<td><?php echo $checkin.' <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> <br/>'.$checkout;?></td>
								<td><?php echo $viewall_pemesanan->jml_kamar;?></td>
								  <td>
								  <?php echo 'Rp. '.number_format($viewall_pemesanan->total_bayar,0,'','.');?>					  
								  </td>
								  <td>
								  <?php
									if($viewall_pemesanan->status == '4' || $viewall_pemesanan->status == '7'){
										$label='label-success';
									}elseif($viewall_pemesanan->status == '2' || $viewall_pemesanan->status == '5'){
										$label='label-warning';
									}elseif($viewall_pemesanan->status == '1' || $viewall_pemesanan->status == '6'){
										$label='label-info';
									}else{
										$label='label-danger';
									}
								  ?>
								  <span class="label <?php echo $label;?>">
									<?php echo $this->booking->view_order_status_byId($viewall_pemesanan->status)->keterangan;?>
								  </span>
								  </td>
							  <td>
								<div class="btn-group">
								  <button type="button" class="btn btn-primary btn-lg dropdown-toggle" data-toggle="modal" data-target="#detailpesanan<?php echo $viewall_pemesanan->id;?>" >
									View / Edit 
								  </button>
								</div>

							  </td>
							</tr>
							<?php
						}
					}else{
						?>
						<tr>
						 <td colspan="10">						
						  <span class="label label-danger">
					  Data Tidak ditemukan.</span>
						 </td>
						</tr>
						<?php
					}
				?>
										
			</tbody>
			
			<tfoot>
			<tr>
			<td colspan="3">
				<span class="label label-default">Total Booking: <?php echo $total_pemesanan;?></span>
			</td>
			  <td colspan="7">
			  <ul class="pagination pagination-sm no-margin pull-right">
				<?php  if ($pageLinks): ?>
						
						<?php foreach ($pageLinks as $paging): ?>
							<?php echo '<li>'.$paging; ?></li>
							
						<?php endforeach; ?>
					
							<?php endif; ?>
			  </ul>
			  </td>
			</tr>
			</tfoot>
		  </table>
		</div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div>
  </div>
</section><!-- /.content -->
<?php $this->output('admin/form/edit_pemesanan');?>