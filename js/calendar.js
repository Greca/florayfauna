$(function(){
	
	if ( $('#showCalendar').length ) { 
		$('#showCalendar').click(function(){
			$('#oldCalendar').show();
			return false;
		});
	}
});