<?php
$services_title = get_field( 'services_title' );
$services_list  = get_field( 'services_list' );
if ( ! $services_title && ! $services_list ) :
	return;
endif;
?>

<section class="services" id="services">
	<div class="container">
		<?php if ( $services_title ): ?>
			<div class="section-title">
				<h2><?php echo $services_title; ?></h2>
			</div>
		<?php endif; ?>

		<?php if ( $services_list ): ?>
			<div class="services__container">
				<?php foreach ( $services_list as $item ):
					$icon = $item['icon'] ?? null;
					$title = $item['title'] ?? null;
					$text = $item['text'] ?? null;
					if ( ! $icon && ! $title && ! $text ) :
						continue;
					endif;
					?>
					<article class="services__item">
						<div class="services__item-head">
							<?php if ( $icon ): ?>
								<div class="services__item-ico">
									<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>"
									     role="presentation">
								</div>
							<?php endif; ?>

							<?php if ( $title ): ?>
							<div class="services__item-title">
								<h3><?php echo $title; ?></h3>
							</div>
						</div>
						<?php endif; ?>

						<?php if ( $text ): ?>
							<div class="services__item-text">
								<p><?php echo $text; ?></p>
							</div>
						<?php endif; ?>

						<div class="services__item-link">
							<a href="openPopup-form-popup"><?php _e( 'Send a request', 'theme' ); ?></a>
						</div>
					</article>
				<?php
				endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
