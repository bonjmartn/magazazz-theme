<?php get_header(); ?>


<?php if( get_theme_mod( 'magazazz_headline_text' ) != "" ): ?>
    <h1 id="site-headline"><?php echo get_theme_mod( 'magazazz_headline_text' ); ?></h1>
<?php endif; ?>


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

                <p class="author-text">Posted on <?php echo the_time('F jS, Y');?> by <?php the_author_posts_link(); ?> </p>            

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

<div class="feature-wrap">

    <div class="page-container">

        <div class="section group">

            <div class="col span_6_of_12 featured-home">
                <?php if ( ! dynamic_sidebar( 'open-1') ): ?>
                  <h3>Open Content Setup</h3>
                  <p>Add widgets to this footer section by going to Appearance > Widgets and adding widgets to the "Home Open Content Left" section.</p>
                <?php endif; ?>
            </div>

            <div class="col span_6_of_12 featured-home">
                <?php if ( ! dynamic_sidebar( 'open-2') ): ?>
                  <h3>Open Content Setup</h3>
                  <p>Add widgets to this footer section by going to Appearance > Widgets and adding widgets to the "Home Open Content Right" section.</p>
                <?php endif; ?>
            </div> 

        </div>

</div>

</div>

<?php get_footer(); ?>