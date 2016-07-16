<?php get_header(); ?>

<div class="post-container">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php
      $thumbnail_id = get_post_thumbnail_id(); 
      $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
      $thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);                
    ?>

    <div class="post-top-image">
      <?php if ( has_post_thumbnail() ) : ?>
      <?php the_post_thumbnail( 'original' ); ?>
        <?php else : ?>
          <p id="post-image-warning">Set a featured image for this post. Once you do that, the layout will look normal.</p>
          <p id="post-image-warning">Recommended size: 1000px (or more) in width and 600px (or more) in height.</p>
      <?php endif; ?>

    <div class="post-text-overlay">
      <div class="post-header">
        <h1><?php the_title(); ?></h1>

        <p><em>
        By <?php the_author(); ?>
        on <?php echo the_time('F jS, Y');?>
        with <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
        </em></p>
      </div> 
    </div> 

    </div> 

    <?php the_content(); ?>

    <?php
        $defaults = array(
          'before'           => '<p>' . __( 'Pages:', 'magazazz-free' ),
          'after'            => '</p>',
          'link_before'      => '',
          'link_after'       => '',
          'next_or_number'   => 'number',
          'separator'        => ' ',
          'nextpagelink'     => __( 'Next page', 'magazazz-free' ),
          'previouspagelink' => __( 'Previous page', 'magazazz-free' ),
          'pagelink'         => '%',
          'echo'             => 1
        );

        wp_link_pages( $defaults );
    ?>

    <hr>

    <p><em>
      Posted in <?php the_category( ', ' ); ?>.  
      <?php the_tags( 'Tagged with: ', ', ', '<br />' ); ?>
    </em></p>

    <hr>

    <?php if ( ! dynamic_sidebar( 'end-post') ): ?>
    <?php endif; ?>

    <br><br>

    <?php comments_template(); ?>
    <?php paginate_comments_links() ?>

    <?php endwhile; else: ?>

    <div class="page-header">
      <h1>Oh no!</h1>
    </div>

    <p>No content is appearing for this page!</p>

  <?php endif; ?>

</div>

<?php get_footer(); ?>