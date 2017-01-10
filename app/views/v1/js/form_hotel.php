<script type="text/javascript">
var addfas=jQuery;
	addfas.noConflict();
		var rowNum = 0;
		addfas('#add_item').on( "click", function(e){
			e.preventDefault();
			var i = ++rowNum;
			 addfas('#itemRows').append('<div class="form-group" id="rowNum'+i+'">'+
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
		
		
	</script>