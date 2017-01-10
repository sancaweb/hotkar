
<script>
var is_loading = false; // initialize is_loading by false to accept new loading
var limit = 3; // limit items per page
var id_hotel = "<?php echo $id_hotel;?>";
var jaxviewrev=jQuery;
	jaxviewrev.noConflict();
jaxviewrev(function() {
    jaxviewrev('#review_scroll').scroll(function() {
        if(jaxviewrev('#review_scroll').scrollTop() + jaxviewrev('#review_scroll').height() == jaxviewrev('#review_scroll').height()) {
            if (is_loading == false) { // stop loading many times for the same page
                // set is_loading to true to refuse new loading
                is_loading = true;
                // display the waiting loader
                jaxviewrev('#loader').show();
                // execute an ajax query to load more statments
                jaxviewrev.ajax({
                    url: '<?php echo $this->uri->baseUri;?>index.php/data_json/load_more_rev',
                    type: 'POST',
                    data: {page:page, limit:limit, id_hotel:id_hotel},
                    success:function(data){
                        // now we have the response, so hide the loader
                        jaxviewrev('#loader').hide();
                        // append: add the new statments to the existing data
                        jaxviewrev('#review_scroll').append(data);
                        // set is_loading to false to accept new loading
                        is_loading = false;
                    }
                });
            }
       }
    });
});
</script>