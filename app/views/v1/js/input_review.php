<script>
// magic.js
var jaxrev=jQuery;
	jaxrev.noConflict();
	
jaxrev(document).ready(function() {

	// process the form
	jaxrev('#form_rev').submit(function(event) {

		jaxrev('.form-group').removeClass('has-error'); // remove the error class
		jaxrev('.help-block').remove(); // remove the error text

		// get the form data
		// there are many ways to get this data using jQuery (you can use the class or id also)
		var formData = {
			'id_hotel' 				: jaxrev('input[name=id_hotel]').val(),
			'bintang' 			: jaxrev('input[name=bintang]').val(),
			'kebersihan' 	: jaxrev('input[name=kebersihan]').val(),
			'kenyamanan' 	: jaxrev('input[name=kenyamanan]').val(),
			'pelayanan' 	: jaxrev('input[name=pelayanan]').val(),
			'fasilitas' 	: jaxrev('input[name=fasilitas]').val(),
			'nama_guest' 	: jaxrev('input[name=nama_guest]').val(),
			'asal_kota' 	: jaxrev('input[name=asal_kota]').val(),
			'judul' 	: jaxrev('input[name=judul]').val(),
			'testimoni' 	: jaxrev('#testimoni').val(),
			'rekomendasi' 	: jaxrev('input[name=rekomendasi]').val(),
		};

		// process the form
		jaxrev.ajax({
			type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
			url 		: '<?php echo $this->uri->baseUri;?>index.php/data_json/input_review', // the url where we want to POST
			data 		: formData, // our data object
			dataType 	: 'json', // what type of data do we expect back from the server
			encode 		: true
		})
			// using the done promise callback
			.done(function(data) {

				// log data to the console so we can see
				console.log(data); 

				// here we will handle errors and validation messages
				if ( ! data.success) {
					
					// handle errors for nama_guest ---------------
					if (data.errors.nama_guest) {
						jaxrev('#nama_guest_grup').addClass('has-error'); // add the error class to show red input
						jaxrev('#nama_guest_grup').append('<div class="help-block">' + data.errors.name + '</div>'); // add the actual error message under our input
					}

					// handle errors for auto_kabkot_grup ---------------
					if (data.errors.asal_kota) {
						jaxrev('#auto_kabkot_grup').addClass('has-error'); // add the error class to show red input
						jaxrev('#auto_kabkot_grup').append('<div class="help-block">' + data.errors.asal_kota + '</div>'); // add the actual error message under our input
					}

					// handle errors for judul_komentar_grup ---------------
					if (data.errors.judul) {
						jaxrev('#judul_komentar_grup').addClass('has-error'); // add the error class to show red input
						jaxrev('#judul_komentar_grup').append('<div class="help-block">' + data.errors.superheroAlias + '</div>'); // add the actual error message under our input
					}
					
					// handle errors for testimoni_grup ---------------
					if (data.errors.testimoni) {
						jaxrev('#testimoni_grup').addClass('has-error'); // add the error class to show red input
						jaxrev('#testimoni_grup').append('<div class="help-block">' + data.errors.superheroAlias + '</div>'); // add the actual error message under our input
					}

				} else {

					// ALL GOOD! just show the success message!
					jaxrev('#alertnya').append('<div class="alert alert-success alert-dismissable">'+
							'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
							'<h4>	<i class="icon fa fa-check"></i>' + data.message + '</h4>'+
							'</div>');
					
					if (data.rekom == 1){
						var sanrekom = '<img src="<?php echo $this->uri->baseUri.STYLE;?>images/check.png" alt=""/><span class="green">Recommended for Everyone</span>';
					}else{
						var sanrekom = '<img src="<?php echo $this->uri->baseUri.STYLE;?>images/delete_old.png" alt=""/><span class="red">Not Recommended</span>';
					}
					
					jaxrev("#review_scroll").append('<div class="hpadding20">'+						
									'<div class="col-md-4 offset-0 center">'+
										'<div class="padding20">'+
											'<div class="bordertype5">'+
												'<div class="circlewrap">'+
													'<img src="<?php echo $this->uri->baseUri.STYLE;?>images/user-avatar.jpg" class="circleimg" alt=""/>'+												
													'<span>'+data.rata_nilai+'/span>'+
												'</div>'+
												'<span class="dark">by '+data.nama_guest+'</span><br/>'+
												'from '+data.asal_kota+'<br/>'+
											'</div>	'+										
										'</div>'+
									'</div>'+
									'<div class="col-md-8 offset-0">'+
										'<div class="padding20">'+
											'<span class="opensans size16 dark">'+data.judul+'</span><br/>'+
											'<span class="opensans size13 lgrey">'+data.tanggal+'</span><br/>'+
											'<p>'+data.testimoni+'</p>'+	
											'<ul class="circle-list">'+
												'<li>'+data.kebersihan+'</li>'+
												'<li>'+data.kenyamanan+'</li>'+
												'<li>'+data.pelayanan+'</li>'+
												'<li>'+data.fasilitas+'</li>'+
											'</ul>'+
											'<br/>'+
												''+sanrekom+''+
										'</div>'+
									'</div>'+
									'<div class="clearfix"></div>'+
								'</div>'+
								'<div class="line2"></div>');
								
					jaxrev('form')[0].reset();
					
					// usually after form submission, you'll want to redirect
					// window.location = '/thank-you'; // redirect a user to another page

				}
			})

			// using the fail promise callback
			.fail(function(data) {

				// show any errors
				// best to remove for production
				console.log(data);
			});

		// stop the form from submitting the normal way and refreshing the page
		event.preventDefault();
	});

});
</script>