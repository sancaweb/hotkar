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
		
		<?php
			if(isset($nama_hotel)){
				?>
				<a class="btn btn-info" data-toggle="modal" data-target="#inputKamar">
				<i class="fa fa-plus-square"></i> Tambah Kamar "<?php echo $nama_hotel;?>"
			  </a>
			  <?php $this->output('admin/form/input_kamar');?>
				<?php
			}else{
				?>
					<a class="btn btn-info" disabled>
						<i class="fa fa-plus-square"></i> Tambah Kamar 
					  </a>
				<?php
			}
		?>
		
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
			  <th>Nama Hotel</th>
			  <th>Nama Kamar</th>
			  <th rowspan="2">Kapasitas</th>
			  <th>Room Rate</th>
			  <th>Available</th>
			  <th style="width:250px;">Action</th>
			</tr>
			</thead>
			<?php
				if(isset($viewall_kamar)){
			?>
			<tbody>
				<?php
					if($viewall_kamar){
						$no=$no;
						foreach($viewall_kamar as $data){
							$no++;
							if(isset($nama_hotel)){
								$nama_hotelnya=$nama_hotel;
							}else{
								if($this->hotel->view_nama_hotel_byID($data->id_hotel)){
									$nama_hotelnya=$this->hotel->view_nama_hotel_byID($data->id_hotel)->nama_hotel;
								}else{
									$nama_hotelnya='Hotel tidak ditemukan';
								}
								
							}
							?>
								
					<tr>
					  <td><?php echo $no;?></td>
					  <td><?php echo $nama_hotelnya;?></td>
					  <td><?php echo $data->nama_kamar;?></td>
					  <td><?php
					  echo $data->kapasitas.' GUEST';
					  ?></td>
					  <td>
					  <?php echo 'Rp. '.number_format($data->harga,0,'','.');?>					  
					  </td>
					  <td>
					  <?php
						if($data->jumlah_ketersediaan > 0){
								echo '<span class="label label-success">'.$data->jumlah_ketersediaan.' Kamar</span>';
							}else{
								echo'<span class="label label-danger">Kamar Penuh</span>';
							}
					  ?></td>
					  <td>
						<a class="btn btn-app" data-toggle="modal" data-target="#detailHotel<?php echo $data->id;?>">
							<i class="fa fa-pencil-square-o"></i> Edit
						  </a>
					  </td>
					</tr>
								
							<?php
						}
					}else{
						?>
									
						
						<tr>
						 <td colspan="5">						
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
			<td colspan="2">
				<span class="label label-success">Total Kamar: <?php echo $total_kamar;?></span>
			</td>
			  <td colspan="5">
			  <ul class="pagination pagination-sm no-margin pull-right">
				<?php if ($pageLinks): ?>
						
						<?php foreach ($pageLinks as $paging): ?>
							<?php echo '<li>'.$paging; ?></li>
							
						<?php endforeach; ?>
					
							<?php endif; ?>
			  </ul>
			  </td>
			</tr>
			</tfoot>
			
			<?php
				
				}else{
					?>
					<tbody>
					<tr>
					 <td colspan="6">
					 
					 <span class="label label-danger">
					 Data Tidak Tersedia, silahkan lakukan pemilihan hotel terlebih dahulu.</span>
					 </td>
					</tr>
					</tbody>
					<?php
				}
			?>
		  </table>
		</div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div>
  </div>
</section><!-- /.content -->