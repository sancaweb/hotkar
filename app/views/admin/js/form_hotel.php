<script type="text/javascript">
		var rowNum = 0;
		$('#add_item').on( "click", function(e){
			e.preventDefault();
			var i = ++rowNum;
			 $('#itemRows').append('<div class="form-group" id="rowNum'+i+'">'+
				'<input type="hidden" name="pengulang_fasilitas_hotel[]" value="'+i+'">'+
				  '<label for="fasilitas_hotel" class="col-sm-2 control-label">'+
				  '<i class="fa fa-hand-o-right" aria-hidden="true"></i>'+
				  '</label>'+
				  '<div class="col-sm-8">'+
				  '<input value="" type="text" name="fasilitas_hotel[]" class="form-control input-lg" id="fasilitas_hotel" placeholder="Fasilitas Hotel" required>'+
				  '</div>'+
				  '<div class="col-sm-2">'+
				  '<a class="btn btn-primary" onclick="removeRow('+i+');">'+
					'<i class="fa fa-minus-square"></i> Hapus'+
				  '</a>'+
				  '</div>'+
				'</div>');
					
		});
		function removeRow(i) {
			jQuery('#rowNum'+i).remove();
		}
		
		/*validation */
		var password = document.getElementById("password");
		var confirm_password = document.getElementById("repassword");

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
			 $('#itemRowsGbr').append('<div class="form-group" id="rowNumGbr'+x+'">'+
			 '<input type="hidden" name="pengulang_gambar[]" value="'+x+'">'+
				  '<label class="col-sm-2 control-label">'+
				  '<i class="fa fa-hand-o-right" aria-hidden="true"></i>'+
				  '</label>'+
				  '<div class="col-sm-8">'+
					'<input name="foto'+x+'" type="file" class="" id="foto" required>'+
				  '</div>'+
				  '<div class="col-sm-2">'+
				  '<a class="btn btn-primary" onclick="removeRowGbr('+x+');">'+
					'<i class="fa fa-minus-square"></i> Hapus'+
				  '</a>'+
				  '</div>'+
				'</div>');
					
		});
		function removeRowGbr(x) {
			jQuery('#rowNumGbr'+x).remove();
		}

</script>

<script type="text/javascript">
		var rowNumz = 0;
		$('#add_itemz').on( "click", function(e){
			e.preventDefault();
			var iz = ++rowNumz;
			 $('#itemRowsz').append('<div class="form-group" id="rowNumz'+iz+'">'+
				'<input type="hidden" name="pengulang_fasilitas_hotel[]" value="'+iz+'">'+
				  '<label for="fasilitas_hotel" class="col-sm-2 control-label">'+
				  '<i class="fa fa-hand-o-right" aria-hidden="true"></i>'+
				  '</label>'+
				  '<div class="col-sm-8">'+
				  '<input value="" type="text" name="fasilitas_hotel[]" class="form-control input-lg" id="fasilitas_hotel" placeholder="Fasilitas Hotel" required>'+
				  '</div>'+
				  '<div class="col-sm-2">'+
				  '<a class="btn btn-primary" onclick="removeRowz('+iz+');">'+
					'<i class="fa fa-minus-square"></i> Hapus'+
				  '</a>'+
				  '</div>'+
				'</div>');
					
		});
		function removeRowz(iz) {
			jQuery('#rowNumz'+iz).remove();
		}
		
	</script>
	
	
<script type="text/javascript">
	var rowNumGbrz = 0;
		$('#add_itemGbrz').on( "click", function(e){
			e.preventDefault();
			var xz = ++rowNumGbrz;
			 $('#itemRowsGbrz').append('<div class="form-group" id="rowNumGbrz'+xz+'">'+
			 '<input type="hidden" name="pengulang_gambar[]" value="'+xz+'">'+
				  '<label class="col-sm-2 control-label">'+
				  '<i class="fa fa-hand-o-right" aria-hidden="true"></i>'+
				  '</label>'+
				  '<div class="col-sm-8">'+
					'<input name="foto'+xz+'" type="file" class="form-control input-lg" id="foto" required>'+
				  '</div>'+
				 '<div class="col-sm-2">'+
				  '<a class="btn btn-primary" onclick="removeRowGbrz('+xz+');">'+
					'<i class="fa fa-minus-square"></i> Hapus'+
				  '</a>'+
				  '</div>'+
				'</div>');
					
		});
		function removeRowGbrz(xz) {
			jQuery('#rowNumGbrz'+xz).remove();
		}

</script>
<script>
$(function () {
	$(".select2").select2();
});
 
</script>