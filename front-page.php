<?php get_header(); ?>

<!-- Main Content -->
<main id="content">

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
                echo '<p class="column col-8 col-mx-auto">' . esc_html(get_field('hero_text')) . '</p>';
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

    <!-- Features -->
    <?php $feature_headline = get_field('feature_headline'); ?>
        <?php if ($feature_headline): ?>
        <section class="container py-5">
            <div class="column col-md-12 col-8 col-mx-auto">
                <h2 class="text-center"><?php echo esc_html($feature_headline); ?></h2>
                <div class="container">
                    <div class="columns">
                        <?php if (have_rows('feature_card')): ?>
                            <?php while (have_rows('feature_card')): the_row();
                            $feature_card_icon = get_sub_field('feature_card_icon');
                            $feature_card_headline = get_sub_field('feature_card_headline');
                            $feature_card_subheadline = get_sub_field('feature_card_subheadline');
                            $feature_card_text = get_sub_field('feature_card_text');
                            $feature_card_link = get_sub_field('feature_card_link');
                            ?>
                            <div class="column col-md-12 col-4 mb-2">
                                <div class="card">
                                    <div class="card-header">
                                        <?php if ($feature_card_headline) : ?>
                                        <div class="card-title">
                                            <?php if ($feature_card_icon): ?>
                                            <?php echo wp_get_attachment_image( $feature_card_icon['id'], array('48', '48'), "", array("class" => "img-responsive mb-2") ); ?>
                                            <?php endif; ?>
                                            <h3 class="h5"><?php echo esc_html($feature_card_headline); ?></h3>
                                        </div>
                                        <?php endif; ?>

                                        <?php if ($feature_card_subheadline) : ?>
                                            <div class="card-subtitle text-gray">
                                                <span><?php echo esc_html($feature_card_subheadline); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if ($feature_card_text): ?>
                                        <div class="card-body">
                                            <p><?php echo esc_html($feature_card_text); ?></p>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($feature_card_link): ?>
                                        <div class="card-footer">
                                            <a href="<?php echo esc_url($feature_card_link['url']); ?>" target="<?php echo esc_attr($feature_card_link['target'] ? $feature_card_link['target'] : '_self'); ?>" class="btn btn-link" aria-label="Learn more about <?php echo esc_html($feature_card_headline); ?>" title="Learn more about <?php echo esc_html($feature_card_headline); ?>">Learn more</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Projects -->
    <?php
    // The Query.
    $last_three_projects = new WP_Query(array(
        'post_type' => array('project'),
        'post_status' => array('publish'),
        'posts_per_page' => '3'
    ));

    // The Loop.
    if ( $last_three_projects->have_posts() ) : ?>
        <section class="container">
            <div class="columns">
                <div class="column col-md-12 col-8 col-mx-auto">
                    <h2 class="text-center">Highlighted Projects</h2>
                    <div class="columns">
                        <?php
                        while ( $last_three_projects->have_posts() ) {
                            $last_three_projects->the_post();
                            echo '<div class="column col-md-12 col-4">';
                            echo '<article class="card relative">';
                            echo '<div class="card-image">';
                            the_post_thumbnail( array(637, 425), array('class' => 'img-responsive') );
                            echo '</div>';
                            echo '<header class="card-header"><h3 class="card-title"><a href="#" class="stretched-link">' . esc_html( get_the_title() ) . '</a></h3></header>';
                            
                            echo '<p class="card-body">' . esc_html( get_the_excerpt() ) . '</p>';

                            $project_duration = get_field('project_duration');
                            if( $project_duration ): ?>
                            <footer class="card-footer">
                            <dl>
                                <dt>Project Duration:</dt>
                                <dd>Started: <?php echo $project_duration['project_date_started']; ?></dd>
                                <dd><?php echo $project_duration['project_ongoing'] ? 'Ongoing' : 'Ended: ' . $project_duration['project_date_ended']; ?></dd>
                                <dt>Funds Raised:</dt>
                                <dd><?php echo (get_field('funds_raised')) ? '$' . number_format(get_field('funds_raised')) : ''; ?></dd>
                            </dl>
                            </footer>
                            <?php endif;

                            echo '</article>';
                            echo '</div>';
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Sponsors -->
    <?php if( have_rows('clients', 'option') ): ?>
        <section id="clients" class="container py-5">
            <div class="columns">
                <div class="column col-md-12 col-8 col-mx-auto">
                    <h2 class="text-center">Sponsors</h2>
                    <div class="swiper client-logos-slider">
                        <div class="swiper-wrapper">
                            <?php while( have_rows('clients', 'option') ): the_row(); 
                            $client_logo = get_sub_field('client_logo', 'option');
                            ?>
                            <div class="swiper-slide">
                                <?php echo wp_get_attachment_image( $client_logo['id'], 'full', false, array('class' => 'img-responsive' )); ?>
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
            </div>
        </div>
    <?php endif; ?>

    <!-- Posts -->
    <?php $last_three_posts = new WP_Query(array(
        'post_type' => array('post'),
        'post_status' => array('publish'),
        'posts_per_page' => '3'
    ));
    if ( $last_three_posts->have_posts() ): ?>
        <section class="container py-5">
            <div class="column col-md-12 col-8 col-mx-auto">
                <h2>Recent Posts</h2>
                <?php
                while ( $last_three_posts->have_posts() ) {
                    $last_three_posts->the_post();
                    echo '<article class="post">';
                    echo '<header><h3><a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></h3></header>';

                    echo the_excerpt();
                }
                wp_reset_postdata();
                ?>
            </div>
        </section>
    <?php endif; ?>

    <!-- CTA -->
    <?php
        $cta_heading = get_field('cta_heading', 'option');
        $cta_short_paragraph = get_field('cta_short_paragraph', 'option');
        if ($cta_heading && $cta_short_paragraph) : ?>
            <section id="cta" class="hero bg-success text-white">
                <div class="column col-md-12 col-8 col-mx-auto">
                    <h2><?php echo $cta_heading; ?></h2>
                    <p><?php echo $cta_short_paragraph; ?></p>
                </div>
            </section>
        <?php endif; ?>


</main>


<?php wp_footer(); ?>
<!-- <?php get_footer(); ?> -->