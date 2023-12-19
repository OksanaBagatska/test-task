<?php

add_role( 'customer', __( 'Замовник' ), array(
	'read' => true,
) );

add_action( 'wp_ajax_process_form', 'process_form_data' );
add_action( 'wp_ajax_nopriv_process_form', 'process_form_data' );

function process_form_data() {

	$name      = sanitize_text_field( $_POST['name'] );
	$tel       = sanitize_text_field( $_POST['tel'] );
	$email     = sanitize_email( $_POST['email'] );
	$address   = sanitize_text_field( $_POST['address'] );
	$service   = sanitize_text_field( $_POST['service'] );
	$square    = sanitize_text_field( $_POST['square'] );
	$bedrooms  = absint( $_POST['bedrooms'] );
	$bathrooms = absint( $_POST['bathrooms'] );


	$request_count      = wp_count_posts( 'request' );
	$new_request_number = $request_count->publish + 1;

	$post_data = array(
		'post_title'  => 'Request ' . $new_request_number,
		'post_status' => 'publish',
		'post_type'   => 'request',
	);

	$post_id = wp_insert_post( $post_data );
	if ( function_exists( 'get_field' ) ) {
		update_field( 'form_request_name', $name, $post_id );
		update_field( 'form_request_phone', $tel, $post_id );
		update_field( 'form_request_email', $email, $post_id );
		update_field( 'form_request_address', $address, $post_id );
		update_field( 'form_request_service', $service, $post_id );
		update_field( 'form_request_square', $square, $post_id );
		update_field( 'form_request_bedrooms', $bedrooms, $post_id );
		update_field( 'form_request_bathrooms', $bathrooms, $post_id );
	}

	$to      = get_option( 'admin_email' );
	$subject = 'New request from ' . esc_html( $name );
	$message = "Name: $name\nPhone: $tel\nEmail: $email";
	$headers = array( 'Content-Type: text/plain; charset=UTF-8' );

	wp_mail( $to, $subject, $message, $headers );

	$user_exists = email_exists( $email );

	$user_id = ! $user_exists ? wp_create_user( $email, wp_generate_password(), $email ) :
		$user_exists;

	$user = new WP_User( $user_id );
	$user->set_role( 'customer' );

	update_user_meta( $user_id, 'billing_address', $address );
	update_user_meta( $user_id, 'billing_phone', $tel );


	if ( $user_id ) {
		echo json_encode( array( 'success' => true, 'message' => 'Form data processed successfully.' ) );
	} else {
		echo json_encode( array( 'success' => false, 'message' => 'Error processing form data.' ) );
	}

	wp_die();
}


