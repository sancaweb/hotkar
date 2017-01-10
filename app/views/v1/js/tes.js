$(function() {
   loadResults(0);
    $('.country').scroll(function() {
      if($("#loading").css('display') == 'none') {
        if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
           var limitStart = $("#results li").length;
           loadResults(limitStart); 
        }
      }
	}); 
 
function loadResults(limitStart) {
	$("#loading").show();
    $.ajax({
        url: "request.php",
        type: "post",
        dataType: "json",
        data: {
            limitStart: limitStart
        },
        success: function(data) {
               $.each(data, function(index, value) {
               $("#results").append("<li id='"+index+"'>"+value+"</li>");
             });
             $("#loading").hide();
        }
    });
};
});