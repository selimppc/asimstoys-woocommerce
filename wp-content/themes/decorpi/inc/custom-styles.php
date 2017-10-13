<?php
/* Save custom theme styles */
if ( ! function_exists( 'decorpi_custom_styles_save' ) ) :
function decorpi_custom_styles_save() {
	
	// Fonts base
	if ( decorpi_get_option('main_font_source', 0) === '1' ) {
		$main_font = decorpi_get_option('main_font', '');
		if(isset($main_font['font-family']) && $main_font['font-family']){
			$main_font_css = 'body{font-family:' . $main_font['font-family'] . ',sans-serif;}';
		}else{
			$main_font_css = '';
		}
	}	

	// Secondary font
	$secondary_font_enabled = ( decorpi_get_option('secondary_font_source', 0) == 0 ) ? false : true;
	if ( $secondary_font_enabled ) {
		$font_second = decorpi_get_option('secondary_font', '');
		if(isset($font_second['font-family']) && $font_second['font-family']){
			$secondary_font = $font_second['font-family'];
		}
	}

	ob_start();
?>

<?php
echo trim($main_font_css);

if ( $secondary_font_enabled && isset($secondary_font) && $secondary_font ) :
?>
h1,
h2,
h3,
h4,
h5,
h6
{
	font-family:<?php echo esc_attr( $secondary_font ); ?>,sans-serif;
}
<?php endif; ?>


 /* ----- Main Color ----- */
<?php if($style = decorpi_get_option('main_color', '')){ ?>
	body{
		color:<?php echo esc_attr($style) ?>;
	}
<?php } ?>
<?php if(decorpi_get_option('widget_color', '')){ ?>
.widget .widget-title, 
.wpb_single_image .widget-title, 
.wpb_content_element .widget-title{
	color:<?php echo esc_attr( decorpi_get_option('widget_color', '') ); ?> !important;
}
<?php } ?>

/* ----- Background body ----- */
<?php 
	$main_background = decorpi_get_option('main_background_image', '');
	if(isset($main_background['url']) && $main_background['url']){
?>
body{
	<?php if ( strlen( $main_background['url'] ) > 0 ) : ?>
	background-image:url("<?php echo esc_url( $main_background['url'] ); ?>");
	<?php if ( decorpi_get_option('main_background_image_type', '') == 'fixed' ) : ?>
	background-attachment:fixed;
	background-size:cover;
	<?php else : ?>
	background-repeat:repeat;
	background-position:0 0;
	<?php endif; endif; ?>
	background-color:<?php echo esc_attr( decorpi_get_option('main_background_color', '') ); ?>;
}
<?php } ?>


/* ----- Top bar ----- */
<?php if(decorpi_get_option('top_bar_background_color', '')){ ?>
.topbar{
	background:<?php echo esc_attr( decorpi_get_option('top_bar_background_color', '') ); ?> !important;
}
<?php } ?>

<?php if(decorpi_get_option('top_bar_background_color', '')){ ?>
.topbar, .topbar a{
	color: <?php echo esc_attr( decorpi_get_option('top_bar_font_color', '') ); ?> !important;
}
<?php } ?>	

/* ----- Header ---- */
<?php if(decorpi_get_option('header_background_color', '')){ ?>
.header-default, header .header-main{
	background: <?php echo esc_attr( decorpi_get_option('header_background_color', '') ); ?> !important;
}
<?php } ?>	

<?php if(decorpi_get_option('header_font_color', '')){ ?>
.header-default{
	color: <?php echo esc_attr( decorpi_get_option('header_font_color', '') ); ?>;
}
<?php } ?>	

<?php if(decorpi_get_option('header_font_color_link', '')){ ?>
.header-default a{
	color: <?php echo esc_attr( decorpi_get_option('header_font_color_link', '') ); ?>;
}
<?php } ?>	

<?php if(decorpi_get_option('header_font_color_link_hover', '')){ ?>
.header-default a:hover, .header-default a:focus, .header-default a:active{
	color: <?php echo esc_attr( decorpi_get_option('header_font_color_link_hover', '') ); ?>!important;
}
<?php } ?>	

/* ----- Menu ----- */
<?php if(decorpi_get_option('menu_background_color', '')){ ?>
.header-mainmenu{
	background: <?php echo esc_attr( decorpi_get_option('menu_background_color', '') ); ?>!important;
}
<?php } ?>	

<?php if(decorpi_get_option('menu_font_color', '')){ ?>
ul.gva-main-menu{
	color: <?php echo esc_attr( decorpi_get_option('menu_font_color', '') ); ?>;
}
<?php } ?>	

<?php if(decorpi_get_option('menu_font_color_link', '')){ ?>
ul.gva-main-menu > li > a, .menu-light-style .gva-nav-menu > li > a{
	color: <?php echo esc_attr( decorpi_get_option('menu_font_color_link', '') ); ?>!important;
}
<?php } ?>	

<?php if(decorpi_get_option('menu_font_color_link_hover', '')){ ?>
ul.gva-main-menu > li > a:hover, ul.gva-main-menu > li > a:focus, ul.gva-main-menu > li > a:active{
	color: <?php echo esc_attr( decorpi_get_option('menu_font_color_link_hover', '') ); ?>!important;
}
<?php } ?>	

<?php if(decorpi_get_option('menu_sub_background_color', '')){ ?>
ul.navbar-nav.gva-nav-menu > li .submenu-inner, ul.navbar-nav.gva-nav-menu > li ul.submenu-inner {
	background: <?php echo esc_attr( decorpi_get_option('menu_sub_background_color', '') ); ?> !important;
}
<?php } ?>	

<?php if(decorpi_get_option('menu_sub_font_color', '')){ ?>
.megamenu-main .widget, ul.gva-main-menu .sub-menu {
	color: <?php echo esc_attr( decorpi_get_option('menu_sub_font_color', '') ); ?> !important;
}
<?php } ?>	

<?php if(decorpi_get_option('menu_sub_font_color_link', '')){ ?>
ul.navbar-nav.gva-nav-menu > li .submenu-inner li a, 
ul.navbar-nav.gva-nav-menu > li ul.submenu-inner li a{
	color: <?php echo esc_attr( decorpi_get_option('menu_sub_font_color_link', '') ); ?> !important;
}
<?php } ?>	

<?php if(decorpi_get_option('menu_sub_font_color_link_hover', '')){ ?>
ul.gva-main-menu .sub-menu a:hover, ul.gva-main-menu .sub-menu a:active, ul.gva-main-menu .sub-menu a:focus {
	color: <?php echo esc_attr( decorpi_get_option('menu_sub_font_color_link_hover', '') ); ?> !important;
}
<?php } ?>	

/* ----- Main content ----- */
<?php if(decorpi_get_option('content_background_color', '')){ ?>
.content-page-wrap {
	background: <?php echo esc_attr( decorpi_get_option('content_background_color', '') ); ?>!important;
}
<?php } ?>

<?php if(decorpi_get_option('content_font_color', '')){ ?>
.content-page-wrap{
	color: <?php echo esc_attr( decorpi_get_option('content_font_color', '') ); ?>;
}
<?php } ?>

<?php if(decorpi_get_option('content_font_color_link', '')){ ?>
.content-page-wrap a{
	color: <?php echo esc_attr( decorpi_get_option('content_font_color_link', '') ); ?>;
}
<?php } ?>

<?php if(decorpi_get_option('content_font_color_link_hover', '')){ ?>
.content-page-wrap a:hover, .content-page-wrap a:active, .content-page-wrap a:focus {
	background: <?php echo esc_attr( decorpi_get_option('content_font_color_link_hover', '') ); ?>!important;
}
<?php } ?>

/* ----- Footer content ----- */
<?php if(decorpi_get_option('footer_background_color', '')){ ?>
#wp-footer {
	background: <?php echo esc_attr( decorpi_get_option('footer_background_color', '') ); ?>!important;
}
<?php } ?>

<?php if(decorpi_get_option('footer_font_color_title', '')){ ?>
#wp-footer .widget .widget-title, 
#wp-footer .widget .widgettitle{
	color: <?php echo esc_attr( decorpi_get_option('footer_font_color_title', '') ); ?>;
}
<?php } ?>

<?php if(decorpi_get_option('footer_font_color', '')){ ?>
#wp-footer {
	color: <?php echo esc_attr( decorpi_get_option('footer_font_color', '') ); ?>;
}
<?php } ?>

<?php if(decorpi_get_option('footer_font_color_link', '')){ ?>
#wp-footer a{
	color: <?php echo esc_attr( decorpi_get_option('footer_font_color_link', '') ); ?>;
}
<?php } ?>

<?php if(decorpi_get_option('footer_font_color_link_hover', '')){ ?>
#wp-footer a:hover, #wp-footer a:active, #wp-footer a:focus {
	background: <?php echo esc_attr( decorpi_get_option('footer_font_color_link_hover', '') ); ?>!important;
}
<?php } ?>

<?php if(decorpi_get_option('custom_css', '')){ echo decorpi_get_option('custom_css', ''); } ?>


<?php
	$styles = ob_get_clean();
	
    $styles = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $styles );
	
	$styles = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '   ', '    ' ), '', $styles );
		
	update_option( 'decorpi_theme_custom_styles', $styles, true );
}
endif;

add_action( 'redux/options/decorpi_theme_options/saved', 'decorpi_custom_styles_save' );


/* Make sure custom theme styles are saved */
function decorpi_custom_styles_install() {
	if ( ! get_option( 'decorpi_theme_custom_styles' ) && get_option( 'decorpi_theme_options' ) ) {
		decorpi_custom_styles_save();
	}
}

add_action( 'redux/options/decorpi_theme_options/register', 'decorpi_custom_styles_install' );
