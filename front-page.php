<?php
/**
 * This file adds the Home Page to the Altitude Pro Theme.
 *
 * @author StudioPress
 * @package Altitude
 * @subpackage Customizations
 */
add_action( 'genesis_meta', 'altitude_front_page_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function altitude_front_page_genesis_meta() {
	if ( is_active_sidebar( 'front-page-1' ) || is_active_sidebar( 'front-page-2' ) || is_active_sidebar( 'front-page-3' ) || is_active_sidebar( 'front-page-4' ) || is_active_sidebar( 'front-page-5' ) || is_active_sidebar( 'front-page-6' ) || is_active_sidebar( 'front-page-7' ) ) {
		//* Enqueue scripts
		add_action( 'wp_enqueue_scripts', 'altitude_enqueue_altitude_script' );
		function altitude_enqueue_altitude_script() {
			wp_enqueue_script( 'localScroll', CHILD_URL . '/js/jquery.localScroll.min.js', array( 'scrollTo' ), '1.2.8b', true );
			wp_enqueue_script( 'scrollTo', CHILD_URL . '/js/jquery.scrollTo.min.js', array( 'jquery' ), '1.4.5-beta', true );
			wp_enqueue_script( 'altitude-script', CHILD_URL . '/js/home.js', array( 'jquery' ), '1.0.0', true );
		}
		//* Add front-page body class
		add_filter( 'body_class', 'altitude_body_class' );
		function altitude_body_class( $classes ) {
   			$classes[] = 'front-page';
			if ( wp_is_mobile() ) {
				$classes[] = 'touch';
			}
  			return $classes;
		}
		//* Force full width content layout
		add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
		//* Remove breadcrumbs
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
		//* Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );
		//* Add homepage widgets
		add_action( 'genesis_loop', 'altitude_front_page_widgets' );
		//* Add featured-section body class
		if ( is_active_sidebar( 'front-page-1' ) ) {
			//* Add image-section-start body class
			add_filter( 'body_class', 'altitude_featured_body_class' );
			function altitude_featured_body_class( $classes ) {
				$classes[] = 'featured-section';
				return $classes;
			}
		}
	}
}
//* Add markup for front page widgets
function altitude_front_page_widgets() {
	// genesis_widget_area( 'front-page-1', array(
	// 	'before' => '<div id="front-page-1" class="front-page-1"><div class="image-section"><div class="flexible-widgets widget-area' . altitude_widget_area_class( 'front-page-1' ) . '"><div class="wrap">',
	// 	'after'  => '</div></div></div></div>',
	// ) );
	?>

	<div id="front-page-1" class="front-page-1">
		<div class="video-container">

			<div class="filter"></div>

			<video autoplay loop class="fillWidth">
				<source src="<?php echo get_bloginfo( 'url' ); ?>/videos/Working-Space.mp4" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
				<source src="<?php echo get_bloginfo( 'url' ); ?>/videos/Working-Space.webm" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
				<source src="<?php echo get_bloginfo( 'url' ); ?>/videos/Working-Space.ogv" type="video/ogg" />Your browser does not support the video tag. I suggest you upgrade your browser.
				<source src="<?php echo get_bloginfo( 'url' ); ?>/videos/30sec-Taxi-2004.flv" type="video/flv" />Your browser does not support the video tag. I suggest you upgrade your browser.
			</video>

			<div class="poster hidden">
				<img src="<?php echo get_stylesheet_directory_uri( 'url' ); ?>videos/Leaves-white.jpg" alt="">
			</div>

			<?php genesis_widget_area( 'front-page-1' ); ?>

		</div>
	</div>

	<?php
	genesis_widget_area( 'front-page-2', array(
		'before' => '<div id="front-page-2" class="front-page-2"><div class="solid-section"><div class="flexible-widgets widget-area' . altitude_widget_area_class( 'front-page-2' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );
	genesis_widget_area( 'front-page-3', array(
		'before' => '<div id="front-page-3" class="front-page-3"><div class="image-section"><div class="flexible-widgets widget-area' . altitude_widget_area_class( 'front-page-3' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );
	genesis_widget_area( 'front-page-4', array(
		'before' => '<div id="front-page-4" class="front-page-4"><div class="solid-section"><div class="flexible-widgets widget-area' . altitude_widget_area_class( 'front-page-4' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );
	genesis_widget_area( 'front-page-5', array(
		'before' => '<div id="front-page-5" class="front-page-5"><div class="image-section"><div class="flexible-widgets widget-area' . altitude_widget_area_class( 'front-page-5' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );
	genesis_widget_area( 'front-page-6', array(
		'before' => '<div id="front-page-6" class="front-page-6"><div class="solid-section"><div class="flexible-widgets widget-area' . altitude_widget_area_class( 'front-page-6' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );
	genesis_widget_area( 'front-page-7', array(
		'before' => '<div id="front-page-7" class="front-page-7"><div class="image-section"><div class="flexible-widgets widget-area' . altitude_widget_area_class( 'front-page-7' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );
}
genesis();