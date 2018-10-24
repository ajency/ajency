		<aside id="sidebar">
		<?php	
		$dt_sidebars = get_post_meta($post->ID, 'dt_all_sidebars', true);
		if(!empty($dt_sidebars)) { 
			if (function_exists("dt_sidebar")) {
			dt_sidebar($dt_sidebars);
			}
			else {
				dynamic_sidebar( $dt_sidebars );
			}
		}

		else {
			if ( is_active_sidebar( 'sidebar' ) ) { 
				dynamic_sidebar( 'sidebar' ); 
				}		
			}
		?>
		</aside>