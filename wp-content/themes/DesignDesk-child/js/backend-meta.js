jQuery(document).ready(function () {
	jQuery('#page_template').find('option').each(function() {
		if (jQuery(this).val() == 'page-gallery-standard-pretty.php') {
			// jQuery(this).val('page-gallery-standard.php');
		}
	});
});