<?php 

add_editor_style( array( 'style.css', get_template_directory(), 'style.css' ) );
/*
**  Set default width content
*/
if ( ! isset( $content_width ) ) $content_width = 900;

/*
** Add support in theme
*/
add_theme_support( 'post-thumbnails' ); 
add_theme_support( 'automatic-feed-links' );
add_image_size('decorpi_post_thumbnails', 500, 335, true);

/*
**	Add list post formats
*/
add_theme_support( 'post-formats', array(
	'gallery', 'video', 'audio', 'quote', 'link'
));

// Set Global Theme Options
if(!function_exists('decorpi_theme_option')){
    function decorpi_theme_option(){
       global $decorpi_theme_options;
       // Get theme options
       $decorpi_theme_options = get_option( 'decorpi_theme_options' );
    }
}    
add_action('wp_head', 'decorpi_theme_option', 99);



if(!function_exists('decorpi_admin_scripts')){
    function decorpi_admin_scripts() {
       wp_register_style('admin-styles', DECORPI_THEME_URL . '/inc/assets/css/admin.css');
       wp_enqueue_style('admin-styles');
    }
}    
add_action('admin_enqueue_scripts', 'decorpi_admin_scripts');

/*
**  Customize header
*/
if(!function_exists('decorpi_custom_header_setup')){
    function decorpi_custom_header_setup() {
      add_theme_support( 'custom-header', apply_filters( 'decorpi_custom_header_args', array(
        'default-text-color'     => 'fff',
        'width'                  => 1260,
        'height'                 => 240,
        'flex-height'            => true,
        'wp-head-callback'       => 'decorpi_header_style',
        'admin-head-callback'    => 'decorpi_admin_header_style',
        'admin-preview-callback' => 'decorpi_admin_header_image',
      ) ) );
    }
    add_action( 'after_setup_theme', 'decorpi_custom_header_setup' );
}

if(!function_exists('decorpi_header_style')){
    function decorpi_header_style(){
        $text_color = get_header_textcolor();
        $image = get_header_image();
        if($image){
            ?>
                <style>header{ background: url('<?php echo esc_url($image) ?>')!important; }</style>
            <?php
        }
    }
}

add_theme_support( 'custom-background', apply_filters( 'decorpi_custom_background_args', array(
    'default-color' => 'f5f5f5',
) ) );

add_theme_support( 'title-tag' );

/*
**	Registry menu
*/
register_nav_menus( array(
    'primary'      => esc_html__( 'Main menu', 'decorpi' ),
	'vertical'     => esc_html__( 'Vertical Menu', 'decorpi' ),
));

if ( ! function_exists( 'decorpi_posted_on' ) ) :
/**
 * Print HTML with meta information for the current post-date/time and author.
 */
function decorpi_posted_on() {
    if ( is_sticky() && is_home() && ! is_paged() ) {
        echo '<span class="featured-post">' . esc_html__( 'Sticky', 'decorpi' ) . '</span>';
    }

    // Set up and print post meta information.
    printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><i class="mn-icon-1126"></i><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author"><i class="mn-icon-579"></i>%5$s</a></span></span>',
        esc_url( get_permalink() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date(get_option( 'date_format' )) ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        get_the_author()
    );
}
endif;

if(!function_exists('decorpi_pagination')){
    function decorpi_pagination( $query = false ){
        global $wp_query;   
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );

        if( ! $query ) $query = $wp_query;
        
        $translate['prev'] =  esc_html__('Prev page', 'decorpi');
        $translate['next'] =  esc_html__('Next page', 'decorpi');
        $translate['load-more'] = esc_html__('Load more', 'decorpi');
        
        $query->query_vars['paged'] > 1 ? $current = $query->query_vars['paged'] : $current = 1;  
        
        if( empty( $paged ) ) $paged = 1;
        $prev = $paged - 1;                         
        $next = $paged + 1;
        
        $end_size = 1;
        $mid_size = 2;
        $show_all = false;
        $dots = false;

        if( ! $total = $query->max_num_pages ) $total = 1;
        
        $output = '';
        if( $total > 1 ){   
            $output .= '<div class="column one pager_wrapper">';
                $output .= '<div class="pager">';
                    
                    if( $paged >1 && !is_home()){
                        $output .= '<a class="prev_page" href="'. previous_posts(false) .'"><i class="icon-left-open"></i>'. $translate['prev'] .'</a>';
                    }
            
                    $output .= '<div class="paginations">';
                        for( $i=1; $i <= $total; $i++ ){
                            if ( $i == $current ){
                                $output .= '<a href="'. get_pagenum_link($i) .'" class="page-item active">'. $i .'</a>';
                                $dots = true;
                            } else {
                                if ( $show_all || ( $i <= $end_size || ( $current && $i >= $current - $mid_size && $i <= $current + $mid_size ) || $i > $total - $end_size ) ){
                                    $output .= '<a href="'. get_pagenum_link($i) .'" class="page-item">'. $i .'</a>';
                                    $dots = true;
                                } elseif ( $dots && ! $show_all ) {
                                    $output .= '<span class="page-item">...</span>';
                                    $dots = false;
                                }
                            }
                        }
                    $output .= '</div>';
                    
                    if( $paged < $total && !is_home()){
                        $output .= '<a class="next_page" href="'. next_posts(0,false) .'">'. $translate['next'] .'<i class="icon-right-open"></i></a>';
                    }
                    
                $output .= '</div>';
            $output .= '</div>'."\n";    
        }
        return $output;
    }
}


/**
 * Display navigation to next/previous post when applicable.
**/
if(!function_exists('decorpi_post_nav')){
    function decorpi_post_nav() {
      $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
      $next     = get_adjacent_post( false, '', false );

      if ( ! $next && ! $previous ) {
        return;
      }

      ?>
      <nav class="navigation post-navigation" role="navigation">
        <h1 class="screen-reader-text"><?php echo esc_html__( 'Post navigation', 'decorpi' ); ?></h1>
        <div class="nav-links">
          <?php
          if ( is_attachment() ) :
            previous_post_link( '%link', '<span class="meta-nav">'. esc_html__('Published In', 'decorpi') .'</span><span class="title">%title</span>' );
          else :
            previous_post_link( '%link', '<span class="meta-nav prev"><i class="mn-icon-158"></i>'.esc_html__('Previous Post', 'decorpi') .'</span><span class="title prev">%title</span>' );
            next_post_link( '%link', '<span class="meta-nav next">'.esc_html__('Next Post', 'decorpi') .'<i class="mn-icon-159"></i></span><span class="title next">%title</span>' );
          endif;
          ?>
        </div>
      </nav>
      <?php
    }
}

/*
**  Get ajax url
*/
function decorpi_ajax_url(){
    echo '<script> var ajaxurl = "' . admin_url('admin-ajax.php') . '";</script>';
}
add_action('wp_head', 'decorpi_ajax_url');

/*
**  Share box
*/
if(!function_exists('decorpi_share_box')){
    function decorpi_share_box($args=array() ){
        $default = array(
            'position' => 'top',
            'animation' => 'true'
        );
        $args = wp_parse_args( (array) $args, $default );
        $tpl = get_template_directory() . '/templates/other/sharebox.php';
        if( is_file($tpl) ){
            require_once($tpl);
        }
    }
}

/*
**  Get comment form
*/
if(!function_exists('decorpi_comment')){
    function decorpi_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);
        if ( 'div' == $args['style'] ) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        } ?>
        <?php echo '<'. $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">       
            <?php if ( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
            <?php endif; ?>
                <div class="comment-author vcard">
                    <?php echo get_avatar( $comment, 60 ); ?>
                    <?php printf(esc_html__('<strong class="fn">%s</strong>', 'decorpi'), get_comment_author_link()) ?>
                    <span class="sep"> / </span>
                    <time class="comment-meta commentmetadata"><?php echo get_comment_date(); ?></time>
                    <?php edit_comment_link('<i class="icon-pencil"></i>','  ','' ); ?>
                </div>
                <div class="comment-content">
                    <?php comment_text() ?>
                </div>
                <div class="reply">
                <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<i class="icon-reply"></i> Reply'))) ?>
                </div>        
                <?php if ($comment->comment_approved == '0') : ?>
                    <div class="comment-awaiting-moderation alert alert-info"><?php echo esc_html__('Your comment is awaiting moderation.', 'decorpi') ?></div>
                <?php endif; ?>
            <?php if ( 'div' != $args['style'] ) : ?>
            </div>
            <?php endif; ?>
    <?php
    }
}

/*
**  Get list comments
*/
if(!function_exists('decorpi_theme_comment')){
    function decorpi_theme_comment($comment, $args, $depth){
        if(is_file(get_template_directory().'/templates/list_comments.php')){
            get_template_part(get_template_directory().'/templates/list_comments.php');
        }
    }
}

/*
** Load custom css, js
*/
if(!function_exists('decorpi_custom_style')){
    function decorpi_custom_style(){
        $css = trim(decorpi_get_option('customize-css', '') );
        $js = trim(decorpi_get_option('customize-js', '') );
        if(!empty($css)){
            print "<style>$css</style>\n";
        }
        if(!empty($js)){
            print "<script>$js</script>\n";
        }
    }
}
add_action('wp_head', 'decorpi_custom_style', 99);

