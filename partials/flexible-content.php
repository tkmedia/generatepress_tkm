<div class="flex_content_rows container">
	<div class="container_wrap">
		<!-- flex_content_cols -->
				
		<?php
		// ID of the current item in the WordPress Loop
		$id = get_the_ID();	
		// check if the flexible content field has rows of data
		if ( have_rows( 'flex_con', $id ) ) : $count = 1;
			// loop through the selected ACF layouts and display the matching partial
			while ( have_rows( 'flex_con', $id ) ) : the_row();
			
				set_query_var( 'count', $count );
				get_template_part( 'partials/flexible-layouts/' . get_row_layout() );
				
			$count++; endwhile;
			
		elseif ( get_the_content() ) :
		// no layouts found
		endif; ?>
					
	</div>
</div>