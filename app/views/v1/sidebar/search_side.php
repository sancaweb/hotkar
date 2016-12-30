<?php
	if(isset($jumlah_pencarian)){
		$jumlah_pencarian=$jumlah_pencarian;
	}else{
		$jumlah_pencarian=0;
	}
?>
<!-- TOP TIP -->
	<div class="filtertip">
		<div class="padding20">
			<p class="size13"><span class="size18 bold "><?php echo $jumlah_pencarian;?></span> Hasil Pencarian</p>
			
		</div>
		<div class="tip-arrow"></div>
	</div>

<div class="bookfilters hpadding20">
	<div class="clearfix"></div><br/>
	
	<div class="hotelstab2 none">
	<form id="form_checkin" data-toggle="validator" enctype="multipart/form-data" role="form" method="POST" method="POST" action="<?php echo $this->uri->baseUri;?>index.php/hotel/pencarian">
		<span class="opensans size13">Cari Hotel</span>
		<input id="auto_complete" name="cari_hotel" type="text" class="form-control input-lg" placeholder="Nama Hotel atau Kecamatan">
		
		<div class="clearfix pbottom15"></div>
			<span class="opensans size13">Check in date</span>
			<input name="checkin" type="text" class="form-control mySelectCalendar input-lg" id="datepicker" placeholder="yy-mm-dd"/>
		<div class="clearfix pbottom15"></div>		
			<span class="opensans size13">Check out date</span>
				<input name="checkout" type="text" class="form-control mySelectCalendar input-lg" id="datepicker2" placeholder="yy-mm-dd"/>
			
		
		<div class="clearfix pbottom15"></div>
		

		<div class="clearfix"></div>
		<div class="line2"></div>
		<i class="fa fa-search" aria-hidden="true"></i><button type="submit" class="btn-search3">
 Cari Hotel</button>
		</form>
	</div>
				
		
</div>