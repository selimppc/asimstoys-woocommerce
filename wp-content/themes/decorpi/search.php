<?php
/**
 * $Desc
 *
 *
 * @package    basetheme
 * @author     moniathemes Team    
 * @copyright  Copyright (C) 2016 Moniathemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */
get_header(); 

decorpi_breadcrumb(); 

?>

<section id="wp-main-content" class="wp-main-content clearfix main-page">
    <div class="container">
        <div class="row">
            <div class="<?php ?>">
                <div id="wp-content" class="wp-content">
                    <?php  if ( have_posts() ) : ?>
                        <div class="post-area padding-30">
                            <?php get_template_part('templates/layout/archive') ?>
                        </div>                    
                    <?php else: ?>
                        <p class="padding-30"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'decorpi' ); ?></p>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
