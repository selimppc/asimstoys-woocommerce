<?php
/**
 * The template for displaying posts in the Video post format
 *
 *
 * @package    basetheme
 * @author     moniathemes Team    
 * @copyright  Copyright (C) 2016 Moniathemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	

	<div class="post-thumbnail">
		<?php if(get_post_meta(get_the_ID(), "decorpi_thumbnail_audio_url", true) !== ""){ ?>
			<div class="blog-audio-holder">
				<?php
				$audiolink = get_post_meta(get_the_ID(), "decorpi_thumbnail_audio_url", true);
				$embed = wp_oembed_get( $audiolink );
				print $embed;
				?>
			</div>
		<?php }else{
			the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
		} ?>
	</div>	

	<div class="post-content">
		<header class="entry-header">
			<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>
			<div class="entry-meta hidden">
				<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'decorpi' ) ); ?></span>
			</div><!-- .entry-meta -->
			<?php
				endif;

				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
			?>

			<div class="entry-meta">
				<span class="post-format hidden">
					<a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'video' ) ); ?>"><?php echo get_post_format_string( 'video' ); ?></a>
				</span>

				<?php decorpi_posted_on(); ?>

				<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
				<span class="comments-link"><i class="mn-icon-271"></i><?php comments_popup_link( esc_html__( 'Leave a comment', 'decorpi' ), esc_html__( '1 Comment', 'decorpi' ), esc_html__( '% Comments', 'decorpi' ) ); ?></span>
				<?php endif; ?>

				<?php edit_post_link( esc_html__( 'Edit', 'decorpi' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-meta -->
			
			
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php if(is_single()){
				the_content( sprintf(
					esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'decorpi' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'decorpi' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			
			}else{
				echo decorpi_limit_words( get_the_excerpt(), decorpi_get_option('blog_excerpt_limit', 30));
			}
			?>
			
		</div><!-- .entry-content -->

	</div>	

	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->
