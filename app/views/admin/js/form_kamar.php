<script type="text/javascript">
		var rowNum = 0;
		$('#add_item').on( "click", function(e){
			e.preventDefault();
			var i = ++rowNum;
			 $('#itemRows').append('<div class="form-group" id="rowNum'+i+'">\
				<input type="hidden" name="pengulang_fasilitas_kamar[]" value="'+i+'">\
				  <label for="fasilitas_kamar" class="col-sm-2 control-label">\
				  <i class="fa fa-hand-o-right" aria-hidden="true"></i>\
				  </label>\
				  <div class="col-sm-8">\
				  <input type="text" name="fasilitas_kamar[]" class="form-control input-lg" id="fasilitas_kamar" placeholder="Fasilitas kamar" required>\
				  </div>\
				  <div class="col-sm-2">\
				  <a class="btn btn-primary" onclick="removeRow('+i+');">\
					<i class="fa fa-minus-square"></i> Hapus\
				  </a>\
				  </div>\
				</div>');
					
		});
		function removeRow(i) {
			jQuery('#rowNum'+i).remove();
		}
		
		/*validation */
		var password = document.getElementById("password")
		  , confirm_password = document.getElementById("repassword");

		function validatePassword(){
		  if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Password tidak sesuai.");
		  } else {
			confirm_password.setCustomValidity('');
		  }
		}

		password.onchange = validatePassword;
		confirm_password.onkeyup = validatePassword;
	</script>
	
<script type="text/javascript">
	var rowNumGbr = 0;
		$('#add_itemGbr').on( "click", function(e){
			e.preventDefault();
			var x = ++rowNumGbr;
			 $('#itemRowsGbr').append('<div class="form-group" id="rowNumGbr'+x+'">\
			 <input type="hidden" name="pengulang_gambar[]" value="'+x+'">\
				  <label class="col-sm-2 control-label">\
				  <i class="fa fa-hand-o-right" aria-hidden="true"></i>\
				  </label>\
				  <div class="col-sm-8">\
					<input name="foto'+x+'" type="file" class="" id="foto" required>\
				  </div>\
				  <div class="col-sm-2">\
				  <a class="btn btn-primary" onclick="removeRowGbr('+x+');">\
					<i class="fa fa-minus-square"></i> Hapus\
				  </a>\
				  </div>\
				</div>');
					
		});
		function removeRowGbr(x) {
			jQuery('#rowNumGbr'+x).remove();
		}

</script>