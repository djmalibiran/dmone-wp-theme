<?php get_header(); ?>

<main id="content" class="column col-xl-12 col-8 col-mx-auto">
    <!-- Hero -->
    <section id="hero">
    <?php $hero_image = get_field('hero_background'); ?>
        <div class="hero hero-lg text-center <?php if ($hero_image): echo 'text-light'; endif; ?>" style="background-image: url(<?php if ($hero_image): echo esc_url( $hero_image['url'] ); endif;?>)">
            <?php
            if (get_field('hero_title')) {
                echo '<h1 class="display-5 fw-bold">' . esc_html(get_field('hero_title')) . '</h1>';
            }
            ?>
            <?php
            if (get_field('hero_text')) {
                echo '<p>' . esc_html(get_field('hero_text')) . '</p>';
            }
            ?>
            <div>
                <?php 
                $hero_button_1 = get_field('hero_button_1');
                if( $hero_button_1 ): 
                    $hero_button_1_url = $hero_button_1['url'];
                    $hero_button_1_title = $hero_button_1['title'];
                    $hero_button_1_target = $hero_button_1['target'] ? $hero_button_1['target'] : '_self';
                    ?>
                    <a role="button" class="btn btn-primary btn-lg" href="<?php echo esc_url( $hero_button_1_url ); ?>" target="<?php echo esc_attr( $hero_button_1_target ); ?>"><?php echo esc_html( $hero_button_1_title ); ?></a>
                <?php endif; ?>
                <?php 
                $hero_button_2 = get_field('hero_button_2');
                if( $hero_button_2 ): 
                    $hero_button_2_url = $hero_button_2['url'];
                    $hero_button_2_title = $hero_button_2['title'];
                    $hero_button_2_target = $hero_button_2['target'] ? $hero_button_2['target'] : '_self';
                    ?>
                    <a role="button" class="btn" href="<?php echo esc_url( $hero_button_2_url ); ?>" target="<?php echo esc_attr( $hero_button_2_target ); ?>"><?php echo esc_html( $hero_button_2_title ); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section>
        <?php the_content(); ?>
    </section>

    

    

    <!-- Posts -->
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
                wp_reset_postdata();
            } else {
                esc_html_e( 'Sorry, no posts matched your criteria.' );
            };
        ?>
    </section>

    <!-- CTA -->
    <?php $cta_heading = get_field('cta_heading', 'option'); ?>
    <?php $cta_short_paragraph = get_field('cta_short_paragraph', 'option'); ?>
    <?php if ($cta_heading && $cta_short_paragraph) : ?>
        <section id="cta">
            <h2><?php echo $cta_heading; ?></h2>
            <p><?php echo $cta_short_paragraph; ?></p>
        </section>
    <?php endif; ?>
</main>

<?php wp_footer(); ?>
<?php get_footer(); ?>
