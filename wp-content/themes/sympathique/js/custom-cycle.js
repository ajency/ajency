jQuery(document).ready(function() {	

	jQuery('div.del_cycle[id^="cycle_"]').each( function() { 
	
		var $div = jQuery(this);
		var token = $div.data('token');
		var settingObj = window['dt_cycle_' + token];		
	
		jQuery("#cycle_"+settingObj.id+"").cycle({		
			fx: "fade",		
			after:function (){        
				jQuery(this).parent().css("height", jQuery(this).height() +30 );
			},   		
			timeout: settingObj.slidetime,   	
			speed: 800	
		});		
		
	});		
	
});	