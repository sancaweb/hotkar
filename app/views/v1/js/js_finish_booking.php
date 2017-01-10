<script>
var countfin=jQuery;
	countfin.noConflict();
	countfin(document).ready(function() {
	countfin('#waktu_mundur').countdown({
		until: +600, 
		layout: '<div class="itemc"><p>{hn}</p> <span>-{hl}-</span></div> <div class="itemc"><p>{mn}</p> <span>-{ml}-</span></div> <div class="itemc"><p>{sn}</p> <span>-{sl}-</span></div>',
		onExpiry: liftOff				
		});
	
	
	function liftOff() { 
			//alert('Pembayaran ditemukan, Voucher sudah kami kirim ke alamat email anda.'); 
			
		countfin.ajax({
			url:"<?php echo $this->uri->baseUri;?>index.php/data_json/load_status_order",
			data:{
			  no_pesanan :countfin('#no_pesanan').val()
			},
			type:"post", 
			success :function(html){
				if (html)
						{
							countfin("#pesannya").replaceWith(html); 
							
						}
						else 
						{
							countfin("#pesannya").replaceWith(html);
						}
			}
		})
		
		}
	
	});
</script>