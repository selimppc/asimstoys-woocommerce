<?php
/**
 *
 *
 * @package    basetheme
 * @author     moniathemes Team    
 * @copyright  Copyright (C) 2016 Moniathemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */
?>

<?php
if ( have_posts() ) : the_post(); ?>

    <div <?php post_class( 'clearfix' ); ?> id="<?php the_ID(); ?>">

        <?php do_action( 'decorpi_page_content_before' ); ?>
        
          <div class="post-items">
            <?php if ( have_posts() ) : ?>
              <?php
                 // Start the Loop.
                 while ( have_posts() ) : the_post();

                    /*
                     * Include the post format-specific template for the content. If you want to
                     * use this in a child theme, then include a file called called content-___.php
                     * (where ___ is the post format) and that will be used instead.
                     */
                      get_template_part( 'content', get_post_format() );

                 endwhile;
                 // Previous/next page navigation.         

              else :
                 // If no content, include the "No posts found" template.
                 get_template_part( 'content', 'none' );

              endif;
            ?>
          </div>

         <div class="pagination">
            <?php echo decorpi_pagination(); ?>
         </div>
        <?php do_action( 'decorpi_page_content_after' ); ?>

    </div>

<?php endif; ?>
 
