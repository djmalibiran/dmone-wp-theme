<?php
// The Query.
$the_query = new WP_Query('post_type');

// The Loop.
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<h3>' . esc_html( get_the_title() ) . '</h3>';
        echo the_excerpt();
	}
} else {
	esc_html_e( 'Sorry, no posts matched your criteria.' );
}
// Restore original Post Data.
wp_reset_postdata();
