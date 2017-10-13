<?php

if ( have_posts() ) : the_post(); ?>

    <div <?php post_class( 'clearfix' ); ?> id="<?php the_ID(); ?>">

        <?php do_action( 'decorpi_page_content_before' ); ?>

        <?php the_content(); ?>

        <div class="link-pages"><?php wp_link_pages(); ?></div>
        <div class="container">
           <?php
               // If comments are open or we have at least one comment, load up the comment template.
              if ( comments_open() || get_comments_number() ) {
                  comments_template();
              }          
            ?>
         </div>
        <?php do_action( 'decorpi_page_content_after' ); ?>

    </div>

<?php endif; ?>