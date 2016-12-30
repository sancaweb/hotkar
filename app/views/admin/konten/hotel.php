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
		  <a class="btn btn-app" data-toggle="modal" data-target="#inputHotel">
				<i class="fa fa-plus-square"></i> Tambah Hotel
			  </a>
			  <?php $this->output('admin/form/edit_hotel');?>
			  <?php $this->output('admin/form/input_hotel');?>
			  <?php $this->output('admin/konten/detail_hotel');?>
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
			  <th>No</th>
			  <th>Foto</th>
			  <th>Nama Hotel</th>
			  <th>Alamat</th>
			  <th>Jumlah Kamar</th>
			  <th style="width:200px;"></th>
			</tr>
			</thead>
			<tbody>
			<?php
				if($viewall_hotel){
					$no=$no;
					foreach($viewall_hotel as $data){
						$no++;
						
						if($this->hotel->getone_gambar_hotel_by_idHotel($data->id)){
							$url_gambar=$this->hotel->getone_gambar_hotel_by_idHotel($data->id);
							
							$url_gambar='/upload/gambar_hotel/'.$url_gambar->url_gambar;
						}else{
							$url_gambar='/upload/gambar_hotel/blank.jpg';
						}
						$jumlah_kamar=$this->hotel->hitung_kamar_by_idHotel($data->id);
						?>
						
			<tr>
			  <td><?php echo $no;?></td>
			  <td><img src="<?php echo $this->uri->baseUri.$url_gambar;?>" class="img-responsive img-thumbnail" style="width:200px;"></td>
			  <td><?php echo $data->nama_hotel;?></td>
			  <td><?php echo $data->alamat;?></td>
			  <td><?php echo $jumlah_kamar;?></td>
			  <td>
			  
			  
				<div class="btn-group <?php if($no %5 ==0){echo 'dropup';} ?>">
				  <button type="button" class="btn btn-success btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Menu <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu">
					<li><a class="btn btn-default btn-lg" data-toggle="modal" data-target="#editHotel<?php echo $data->id;?>">
						<i class="fa fa-pencil-square-o"></i> Edit
					  </a>
					</li>
					
					<li>
						<a class="btn btn-default btn-lg" data-toggle="modal" data-target="#detailHotel<?php echo $data->id;?>">
							<i class="fa fa-search"></i> View Detail
						  </a>
					</li>
					<li>
						<a href="<?php echo $this->uri->baseUri;?>index.php/adm_hotel/view_kamar/<?php echo base64_encode($data->id);?>" class="btn btn-default btn-lg" >
							<i class="fa fa-plus-square"></i> View Kamar
						  </a>
					</li>
				  </ul>
				</div>			  
				
				</td>
			</tr>
			
						<?php
					}
				}
			?>
			
			</tbody>
			<tfoot>
			<tr>
			<td colspan="2">
				<span class="label label-success">Total Hotel: <?php echo $total_hotel;?></span>
			</td>
			  <td colspan="4">
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
		  </table>
		</div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div>
  </div>
</section><!-- /.content -->
