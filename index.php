<?php get_header(); ?>

<main id="content" class="column col-8 col-mx-auto">
    <section id="hero">
    <?php $hero_image = get_field('hero_background'); ?>
        <div class="hero hero-lg text-center <?php if ($hero_image): echo 'text-white'; endif; ?>" style="background-image: url(<?php if ($hero_image): echo esc_url( $hero_image['url'] ); endif;?>)">
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
            <?php 
            $hero_button_1 = get_field('hero_button_1');
            if( $hero_button_1 ): 
                $hero_button_1_url = $hero_button_1['url'];
                $hero_button_1_title = $hero_button_1['title'];
                $hero_button_1_target = $hero_button_1['target'] ? $hero_button_1['target'] : '_self';
                ?>
                <a role="button" href="<?php echo esc_url( $hero_button_1_url ); ?>" target="<?php echo esc_attr( $hero_button_1_target ); ?>"><?php echo esc_html( $hero_button_1_title ); ?></a>
            <?php endif; ?>
            <?php 
            $hero_button_2 = get_field('hero_button_2');
            if( $hero_button_2 ): 
                $hero_button_2_url = $hero_button_2['url'];
                $hero_button_2_title = $hero_button_2['title'];
                $hero_button_2_target = $hero_button_2['target'] ? $hero_button_2['target'] : '_self';
                ?>
                <a role="button" class="<?php echo ($hero_image) ? 'contrast outline' : 'secondary outline'; ?>" href="<?php echo esc_url( $hero_button_2_url ); ?>" target="<?php echo esc_attr( $hero_button_2_target ); ?>"><?php echo esc_html( $hero_button_2_title ); ?></a>
            <?php endif; ?>
        </div>
    </section>
    <?php if( have_rows('clients') ): ?>
        <style>
            .swiper {
                width: 100%;
                height: 100%;
            }

            .swiper-slide {
                text-align: center;
                font-size: 18px;
                background: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .swiper-slide img {
                display: flex;
            }
        </style>
        <section>
            <div class="swiper client-logos-slider">
                <div class="swiper-wrapper">
                    <?php while( have_rows('clients') ): the_row(); 
                    $image = get_sub_field('client_logo');
                    ?>
                    <div class="swiper-slide">
                        <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                var swiper = new Swiper(".client-logos-slider", {
                    slidesPerView: 4,
                    spaceBetween: 30,
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    }
                });
            });
        </script>
    <?php endif; ?>
    <section class="container">
        <h2>Highlighted Projects</h2>
        <div class="columns">
        <?php
        // The Query.
        $last_three_projects = new WP_Query(array(
            'post_type' => array('project'),
            'post_status' => array('publish'),
            'post_per_page' => '3'
        ));

        // The Loop.
        if ( $last_three_projects->have_posts() ) {
            while ( $last_three_projects->have_posts() ) {
                $last_three_projects->the_post();
                echo '<div class="column col-4">';
                echo '<article class="card relative">';
                echo '<div class="card-image">' . the_post_thumbnail( 'full', array('class' => 'img-responsive') ) . '</div>';
                echo '<header class="card-header"><h3 class="card-title"><a href="#" class="stretched-link">' . esc_html( get_the_title() ) . '</a></h3></header>';
                
                echo '<p class="card-body">' . get_the_excerpt() . '</p>';
                $project_duration = get_field('project_duration');
                if( $project_duration ): ?>
                <footer class="card-footer">
                <dl>
                    <dt>Project Duration:</dt>
                    <dd>Started: <?php echo $project_duration['project_date_started']; ?></dd>
                    <dd><?php echo $project_duration['project_ongoing'][0] ? 'Ongoing' : 'Ended: ' . $project_duration['project_date_ended']; ?></dd>
                    <dt>Funds Raised:</dt>
                    <dd><?php echo (get_field('funds_raised')) ? '$' . number_format(get_field('funds_raised')) : ''; ?></dd>
                </dl>
                </footer>
                <?php endif;
                echo '</article>';
                echo '</div>';
            }
        }
        ?>
        </div>
    </section>
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

<?php wp_footer(); ?>
<?php get_footer(); ?>
