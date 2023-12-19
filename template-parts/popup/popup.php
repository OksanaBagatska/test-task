<?php
$popup_form_subtitle = get_field( 'popup_form_subtitle', 'option' );
$popup_title         = get_field( 'popup_title', 'option' );
$popup_text          = get_field( 'popup_text', 'option' );
$success_popup_title = get_field( 'success_popup_title', 'option' );
$success_popup_text  = get_field( 'success_popup_text', 'option' );
?>

<div style="display: none">
	<div class="popup" id="form-popup">
		<div class="promo__form">
			<div class="promo__form-head">
				<?php if ( $popup_title ): ?>
					<div class="promo__form-title">
						<h2><?php echo $popup_title; ?></h2>
					</div>
				<?php endif; ?>
				<?php if ( $popup_text ): ?>
					<div class="promo__form-text">
						<p><?php echo $popup_text; ?></p>
					</div>
				<?php endif; ?>
			</div>
			<?php get_template_part( 'template-parts/form/form', '', array(
				'id'            => 'popup_form',
				'form_subtitle' => $popup_form_subtitle
			) ); ?>
		</div>
	</div>
	<div class="popup" id="success-popup">
		<div class="popup__inner">
			<div class="popup__ico">
			</div>
			<?php if ( $success_popup_title ): ?>
				<div class="popup__title">
					<p><?php echo $success_popup_title; ?></p>
				</div>
			<?php endif; ?>
			<?php if ( $success_popup_text ): ?>
				<div class="popup__text">
					<p><?php echo $success_popup_text; ?></p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
