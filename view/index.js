function getSlider(){
	var val='';
	$.ajax({
		async: false,
		type: 'POST',
		url: '../pot/slide/view/',
		data: {'token': localStorage.getItem('admin'), 'status': '1'},
		success: function(res){	
			val = res;
		}
	})
	return val;
}