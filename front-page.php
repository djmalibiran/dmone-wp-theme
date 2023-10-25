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
    <?php
    $feature_headline = get_field('feature_headline');
    if ($feature_headline): ?>
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
</main>


<?php wp_footer(); ?>
<?php get_footer(); ?>