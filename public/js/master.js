$(function() {
	if(!$('#birthday').val()) {
		$('#birthday').val($('#birthday').attr("defaultValue"));
	}

	$('#birthday').focus(function(evt) {
		var defVal = $('#birthday').attr("defaultValue");
		if($(this).val() == defVal) {
			$(this).val("");
		}
	});

	$('#birthday').blur(function(evt) {
		if(!$('#birthday').val()) {
			$('#birthday').val($('#birthday').attr("defaultValue"));
		}
	});
});