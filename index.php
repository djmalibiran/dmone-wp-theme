<?php get_header(); ?>

<main id="content">
    <section>
        <div class="hero">
            <?php
            if (get_field('hero_title')) {
                echo '<h1>' . esc_html(get_field('hero_title')) . '</h1>';
            }
            ?>
            <?php
            if (get_field('hero_text')) {
                echo '<p>' . esc_html(get_field('hero_text')) . '</p>';
            }
            ?>
            <?php
            $hero_image = get_field('hero_background');
            if ($hero_image):
            ?>
            <img src="<?php echo esc_url( $hero_image['url'] ); ?>" alt="<?php echo esc_attr( $hero_image['alt'] ); ?>" />
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
