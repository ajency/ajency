jQuery(document).ready(function() {
	var austDay = new Date(''+ dt_countdown.time +'');
		jQuery('#' + dt_countdown.id + '').countdown({until: austDay});
		jQuery('#year').text(austDay.getFullYear());	
});