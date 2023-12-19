<?php
$promo_bg_image        = get_field( 'promo_bg_image' );
$promo_bg_image_mobile = get_field( 'promo_bg_image_mobile' );
$promo_subtitle        = get_field( 'promo_subtitle' );
$promo_title           = get_field( 'promo_title' );
$promo_text            = get_field( 'promo_text' );
$promo_form_title      = get_field( 'promo_form_title' );
$promo_form_text       = get_field( 'promo_form_text' );
$promo_form_subtitle   = get_field( 'promo_form_subtitle' );
if ( ! $promo_subtitle && ! $promo_title && ! $promo_text && ! $promo_form_title ) :
	return;
endif
?>
<section class="promo">
	<?php if ( $promo_bg_image || $promo_bg_image_mobile ): ?>
		<div class="promo__bg">
			<picture>
				<?php if ( $promo_bg_image_mobile ): ?>
					<source media="(max-width: 768px)" srcset="<?php echo $promo_bg_image_mobile; ?>"/>
				<?php endif; ?>
				<?php if ( $promo_bg_image ): ?>
					<source media="(min-width: 769px)" srcset="<?php echo $promo_bg_image; ?>"/>
				<?php endif; ?>
				<img src="<?php echo get_theme_file_uri() . '/assets/img/promo.png'; ?>" alt="promo"
				     role="presentation"/>
			</picture>
		</div>
	<?php endif; ?>

	<div class="container">
		<div class="promo__container">
			<div class="promo__content">
				<?php if ( $promo_subtitle ): ?>
					<div class="section-subtitle">
						<span><?php echo $promo_subtitle ?></span>
					</div>
				<?php endif; ?>
				<?php if ( $promo_title ): ?>
					<div class="promo__title">
						<h1><?php echo $promo_title ?></h1>
					</div>
				<?php endif; ?>
				<?php if ( $promo_text ): ?>
					<div class="promo__text">
						<p><?php echo $promo_text ?></p>
					</div>
				<?php endif; ?>
			</div>
			<div class="promo__form">
				<?php if ( $promo_form_title || $promo_form_text ): ?>
					<div class="promo__form-head">
						<?php if ( $promo_form_title ): ?>
							<div class="promo__form-title">
								<h2><?php echo $promo_form_title ?></h2>
							</div>
						<?php endif; ?>
						<?php if ( $promo_form_text ): ?>
							<div class="promo__form-text">
								<p><?php echo $promo_form_text ?></p>
							</div>
						<?php endif; ?>
					</div>
					<?php get_template_part( 'template-parts/form/form', '', array(
						'id'            => 'form_promo',
						'form_subtitle' => $promo_form_subtitle
					) ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
