jQuery(document).ready(function() {

	// PORTFOLIO GRID IN AND OUT EFFECT //
	jQuery('.grid-item-on-hover').hover(function(){
		jQuery(this).animate({ opacity: 0.9 }, 200);
	}, function(){
			jQuery(this).animate({ opacity: 0 }, 200);
		});
		
	
	jQuery('.homepage-grid[id*="gridwrapper_"]').each( function() { 

		var $div = jQuery(this);

		var token = $div.data('token');
		var settingObj = window['dt_grid_' + token];	
		
		var $container = jQuery(".grid_"+settingObj.id+"");
		
		$container.imagesLoaded( function(){
			$container.isotope({
				itemSelector: 'li',
				animationEngine: 'jquery',
				masonry: {
					columnWidth: 5
				}
	        });
		});
		  
		var $optionSets = jQuery('#gridwrapper_'+settingObj.id+' #options .option-set'),
			$optionLinks = $optionSets.find('a');

		$optionLinks.click(function(){
			var $this = jQuery(this);
			// don't proceed if already selected
			if ( $this.hasClass('selected') ) {
				return false;
			}
			var $optionSet = $this.parents('.option-set');
			$optionSet.find('.selected').removeClass('selected');
			$this.addClass('selected');
	  
			// make option object dynamically, i.e. { filter: '.my-filter-class' }
			var options = {},
				key = $optionSet.attr('data-option-key'),
				value = $this.attr('data-option-value');
			// parse 'false' as false boolean
			value = value === 'false' ? false : value;
			options[ key ] = value;
			if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
			  // changes in layout modes need extra logic
			  changeLayoutMode( $this, options )
			} else {
			  // otherwise, apply new options
			  $container.isotope( options );
			}
			
			return false;
		});		
		
	});
});