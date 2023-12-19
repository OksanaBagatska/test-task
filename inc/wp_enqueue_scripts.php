<?php

add_action( 'wp_enqueue_scripts', function () {

	wp_enqueue_script( 'inputmask', get_template_directory_uri() . '/assets/scripts/libs/jquery.inputmask.min.js', array(), null, true );
	wp_enqueue_script( 'validate', get_template_directory_uri() . '/assets/scripts/libs/jquery.validate.min.js', array(), null, true );
	wp_enqueue_script( 'additional', get_template_directory_uri() . '/assets/scripts/libs/additional-methods.min.js', array(), null, true );
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/scripts/libs/jquery.fancybox.min.js', array(), null, true );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/scripts/libs/swiper.js', array(), null, true );
	wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/dist/js/scripts.js', array(), null, true );

	wp_localize_script(
		'app',
		'ajax_object',
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
		)
	);

	wp_enqueue_style( 'critical', get_template_directory_uri() . '/assets/dist/css/critical.min.css', array(), null );
	wp_enqueue_style( 'app-css', get_template_directory_uri() . '/assets/dist/css/app.min.css', array(), null );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/assets/styles/libs/jquery.fancybox.min.css', array(), null );

} );
