<script>

/*validation */
	var new_password = document.getElementById("new_password");
	var confirm_password = document.getElementById("confirm_password");

	function validatePassword(){
	  if(new_password.value != confirm_password.value) {
		confirm_password.setCustomValidity("Password tidak sesuai.");
	  } else {
		confirm_password.setCustomValidity('');
	  }
	}

	new_password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
	
// magic.js
var ditus=jQuery;
	ditus.noConflict();
	
ditus(document).ready(function() {
	
ditus('#loader').hide();
// process the form
	ditus('#form_user').submit(function(event) {
		ditus('#loader').show();
		ditus('.old_pass').removeClass('has-error'); // remove the error class
		ditus('.help-block').remove(); // remove the error text
		ditus("#alertnya").replaceWith('<div id="alertnya"></div>');
		
		var formData = {
			'id_user' 		: ditus('input[name=id_user]').val(),
			'username' 		: ditus('input[name=username]').val(),
			'nama_pengguna' : ditus('input[name=nama_pengguna]').val(),
			'email' 		: ditus('input[name=email]').val(),
			'old_password' 		: ditus('input[name=old_password]').val(),
			'new_password' 		: ditus('input[name=new_password]').val(),
		};
		
		// process the form
		ditus.ajax({
			type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
			url 		: '<?php echo $this->uri->baseUri;?>index.php/data_json/edit_user', // the url where we want to POST
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
					if (data.errors.cek_user) {
						ditus('#old_pass').addClass('has-error'); // add the error class to show red input
						ditus('#old_pass').append('<div class="help-block">' + data.errors.cek_user + '</div>'); // add the actual error message under our input
					}
					ditus('#alertnya').append('<div class="alert alert-warning alert-dismissable">'+
							'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
							'<h4>	<i class="icon fa fa-check"></i> Edit User gagal, pastikan semua field sudah terisi dengan benar.: '+ data.errors.cek_user + '</h4>'+
							''+data.username+
							'</div>');							
					ditus('#loader').hide();
				} else {
					
					// ALL GOOD! just show the success message!
					
					ditus('#alertnya').append('<div class="alert alert-success alert-dismissable">'+
							'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
							'<h4>	<i class="icon fa fa-check"></i>' + data.message + '</h4>'+
							'</div>');
							
					ditus('input[name=id_user]').val(data.id_user),
					ditus('input[name=username]').val(data.username),
					ditus('input[name=nama_pengguna]').val(data.nama_pengguna),
					ditus('input[name=email]').val(data.email),
					
					// usually after form submission, you'll want to redirect
					// window.location = '/thank-you'; // redirect a user to another page
				ditus('#loader').hide();
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