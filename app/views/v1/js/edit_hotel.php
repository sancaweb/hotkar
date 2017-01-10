<script>
// magic.js
var dithot=jQuery;
	dithot.noConflict();
	
dithot(document).ready(function() {	
dithot('#loader').hide();

// process the form
	dithot('#form_hotel').submit(function(event) {
		tinyMCE.triggerSave();
		dithot('#loader').show();
		dithot('.form-group').removeClass('has-error'); // remove the error class
		dithot('.help-block').remove(); // remove the error text
		
		var hapus_fasilitasnya = dithot('input[name="hapus_fasilitas[]"]:checked').map(function(){
		  return dithot(this).val();
		}).get();
		
		var fasilitas_hotel = dithot('input[name="fasilitas_hotel[]"]').map(function(){
		  return dithot(this).val();
		}).get();
			
		var formData = {
			'id_hotel' 		: dithot('input[name=id_hotel]').val(),
			'nama_hotel' 		: dithot('input[name=nama_hotel]').val(),
			'alamat' 	: dithot('textarea[name=alamat]').val(),
			'kecamatan' 	: dithot('select[name=kecamatan]').val(),
			'informasi' 	: dithot('#mytextarea').val(),
			'hapus_fasilitas' 	: hapus_fasilitasnya,
			'fasilitas_hotel' 	: fasilitas_hotel,
		};
		// process the form
		dithot.ajax({
			type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
			url 		: '<?php echo $this->uri->baseUri;?>index.php/data_json/edit_hotel', // the url where we want to POST
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
					// handle errors for nama_hotel ---------------
					if (data.errors.nama_hotel) {
						dithot('#nama_hotel').addClass('has-error'); // add the error class to show red input
						dithot('#nama_hotel').append('<div class="help-block">' + data.errors.nama_hotel + '</div>'); // add the actual error message under our input
					}

					// handle errors for auto_kabkot_grup ---------------
					if (data.errors.alamat) {
						dithot('#alamat').addClass('has-error'); // add the error class to show red input
						dithot('#alamat').append('<div class="help-block">' + data.errors.alamat + '</div>'); // add the actual error message under our input
					}

					dithot('#loader').hide();
				} else {
					
					// ALL GOOD! just show the success message!
					
					dithot('#alertnya').append('<div class="alert alert-success alert-dismissable">'+
							'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
							'<h4>	<i class="icon fa fa-check"></i>' + data.message + '</h4>'+
							'</div>');
					
					dithot('input[name=id_hotel]').val(data.id_hotel),
					dithot('input[name=nama_hotel]').val(data.nama_hotel),
					dithot('input[name=alamat]').val(data.alamat),
					dithot('input[name=kecamatan]').val(data.kecamatan),
					dithot('input[name=informasi]').val(data.informasi),
					
					
					dithot.ajax({
						url:"<?php echo $this->uri->baseUri;?>index.php/data_json/load_fasilitas_hotel",
						data:{
						  id_hotel : dithot('input[name=id_hotel]').val()
						},
						type:"post", 
						success :function(html){
							if (html)
								{
									dithot("#load_div_fasilitas").replaceWith(html); 
									
								}
								else 
								{
									dithot("#load_div_fasilitas").replaceWith(html);
								}
						}
					})
						
						dithot("#itemRows").replaceWith('<div id="itemRows"></div>');
					// usually after form submission, you'll want to redirect
					// window.location = '/thank-you'; // redirect a user to another page
				dithot('#loader').hide();
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