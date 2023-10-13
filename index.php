<?php get_header(); ?>

<main id="main-content">

    <?php
    // If the front page is set to display a static page, load its content.
    if ( have_posts() ) : while ( have_posts() ) : the_post();
    ?>
    
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
            
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
            
        </article>

    <?php endwhile; endif; ?>

    <!-- Optional: Display latest posts, if you want a combination homepage -->
    <section id="latest-posts">
        <h2>Latest Posts</h2>
        
        <?php
        $recent_posts = new WP_Query(array('posts_per_page' => 5)); // Adjust number as needed
        while ($recent_posts->have_posts()) : $recent_posts->the_post();
        ?>
            <article id="post-<?php the_ID(); ?>">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php the_excerpt(); ?></p>
            </article>
        <?php endwhile; wp_reset_postdata(); ?>
        
    </section>

</main>

<?php get_footer(); ?>
