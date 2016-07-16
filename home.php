<?php get_header(); ?>

<div class="home-background">

    <ul class="home-grid-wrap">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <li class="home-grid-item">

                <p>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
                    <?php endif; ?>
                </p>

                <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                <p class="author-text">Posted on <?php echo the_time('F jS, Y');?> by <?php the_author(); ?></p>            

                <?php the_excerpt(); ?>

                <?php endwhile; ?>
                <?php endif; ?>

            </li>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
         
    </ul>

    <div class="pagination-wrap">
        <div class="pagination">

            <?php the_posts_pagination( array( 
            'mid_size' => 2,
            'type' => 'list',
            )); ?>

        </div>
    </div>

</div>

<?php get_footer(); ?>