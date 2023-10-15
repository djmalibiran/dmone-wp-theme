<?php get_header(); ?>

<main id="content">
    <article>
        <header>
            <div class="entry-featured-img-wrapper">
                <?php
                if (has_post_thumbnail( $post->ID ) ) {
                    the_post_thumbnail('', array('decoding' => 'sync', 'loading' => 'eager'));
                } else {
                    echo "nah";
                }?>
            </div>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php the_excerpt(); ?>
            <div class="entry-meta-top">
                <span class="entry-author-name"><?php the_author_meta('display_name', $post->post_author); ?></span>
                <span class="entry-published-date"><?php the_time('F j, Y'); ?></span>
            </div>
        </header>
        <?php the_content(); ?>
        <section class="author-bio">
            <h2>About the Author</h2>
            <h3 class="post-author-name"><?php the_author_meta('display_name', $post->post_author); ?></h3>
            <p><?php the_author_meta('description', $post->post_author); ?></p>
        </section>
        <?php the_category(); ?>
    </article>
    <div>
        <?php next_post_link('<h2>Next Post</h2>%link'); ?>
        <?php previous_post_link('<h2>Previous Post</h2>%link'); ?>
    </div>
</main>

<?php wp_footer(); ?>