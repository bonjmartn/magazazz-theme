<?php get_header(); ?>

      <div class="archives-header">
        <h1>Posts by <?php wp_title(''); ?></h1>
      </div>

<div class="author-container">

  <div class="section group">

    <div class="col span_3_of_12">

        <?php
            $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
        ?>

        <p id="author-name"><?php echo $curauth->display_name; ?></p>
        <p id="author-avatar"><?php $user_id = $curauth; echo get_avatar( $user_id, 256 ); ?></p>
        <p id="author-website"><a href="<?php $authorDesc = the_author_meta('url'); echo $authorDesc; ?>" target="_blank"><?php $authorDesc = the_author_meta('url'); echo $authorDesc; ?></a></p>
        <p id="author-desc"><?php echo $curauth->description; ?></p>

    </div>

    <div class="col span_9_of_12">

        <ul class="archives-grid-wrap">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <li class="archives-grid-item">

                    <p>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
                        <?php endif; ?>
                    </p>

                    <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <p class="author">Posted on <?php echo the_time('F jS, Y');?> by <?php the_author_posts_link(); ?> </p>            

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

        <p>&nbsp;</p>
            
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
        
    </div>
      
  </div>

</div>

<?php get_footer(); ?>