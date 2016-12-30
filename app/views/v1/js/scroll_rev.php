<script>
var jaxviewrev=jQuery;
	jaxviewrev.noConflict();

function loadmore(){
	var page_rev=parseInt(jaxviewrev('#page_rev').val()) + 1;
	// display the waiting loader
     jaxviewrev('#loader').show();
    jaxviewrev.ajax({
        url:"<?php echo $this->uri->baseUri;?>index.php/data_json/load_more_rev",
        data:{
          id_hotel :jaxviewrev('#id_hotel').val(),
		  page_rev : page_rev
        },
        type:"post", 
        success :function(html){
			if (html)
					{
						jaxviewrev('#loader').hide();
						jaxviewrev("#page_rev").replaceWith('<input type="hidden" id="page_rev" value="'+page_rev+'" readonly>');
						jaxviewrev("#review_scroll").append(html); // menambahkan komentar yang di request dari load_komentar.php ke <div id="content">
						
					}
					else 
					{
						jaxviewrev('#loader').hide();
						jaxviewrev("#rev_habis").replaceWith('<button id="rev_habis" class="btn btn-primary btn-lg btn-block" disabled>Tidak ada komentar lagi</button>');
					}
        }
    })
}


</script>