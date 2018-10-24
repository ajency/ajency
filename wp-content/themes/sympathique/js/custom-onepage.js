jQuery(document).ready(function() {
	jQuery('#mainnav').onePageNav({
		currentClass: 'active',
		filter: ':not(.external)',
		begin: function() {
		console.log('start')
		},
		end: function() {
		console.log('stop')
		}
	});
});