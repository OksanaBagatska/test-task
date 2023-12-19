<?php

function custom_post_type() {
	register_post_type('request',
		array(
			'labels'    => array('name' => __('Form Request')),
			'public'    => false,
			'show_ui'   => true,
			'supports'  => array('title'),
			'exclude_from_search' => true,
		)
	);
}

add_action('init', 'custom_post_type');
