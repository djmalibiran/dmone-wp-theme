<?php get_header(); ?>

<main id="content">
    <section>
        <h2>Recent Posts</h2>
        <?php
            // The Query.
            $last_three_posts = new WP_Query(array(
                'post_type' => array('post'),
                'post_status' => array('publish'),
                'posts_per_page' => '3'
            ));

            // The Loop.
            if ( $last_three_posts->have_posts() ) {
                while ( $last_three_posts->have_posts() ) {
                    $last_three_posts->the_post();
                    echo '<h3>' . esc_html( get_the_title() ) . '</h3>';
                    echo the_excerpt();
                }
            } else {
                esc_html_e( 'Sorry, no posts matched your criteria.' );
            }
        ?>
    </section>

</main>

<?php get_footer(); ?>
