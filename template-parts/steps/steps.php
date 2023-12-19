<?php
$steps_title = get_field( 'steps_title' );
$steps_list  = get_field( 'steps_list' );
if ( ! $steps_title && ! $steps_list ) :
	return;
endif; ?>

<section class="steps">
	<div class="container">
		<?php if ( $steps_title ): ?>
			<div class="section-title">
				<h2><?php echo $steps_title; ?></h2>
			</div>
		<?php endif; ?>

		<?php if ( $steps_list ): ?>
			<div class="steps__container">
				<?php foreach ( $steps_list as $item ):
					$icon = $item['icon'] ?? null;
					$title = $item['title'] ?? null;
					$text = $item['text'] ?? null;
					if ( ! $icon && ! $title && ! $text ) : continue; endif; ?>
					<article class="steps__item">
						<?php if ( $icon ): ?>
							<div class="steps__item-ico">
								<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>"
								     role="presentation">
							</div>
						<?php endif; ?>

						<?php if ( $title || $text ): ?>
							<div class="steps__item-text">
								<?php if ( $title ): ?>
									<div class="steps__item-title">
										<h3><?php echo $title; ?></h3>
									</div>
								<?php endif; ?>
								<?php if ( $text ): ?>
									<p><?php echo $text; ?></p>
								<?php endif; ?>
							</div>
						<?php endif; ?>

						<div class="steps__item-num"></div>
						<div class="steps__item-steps-side">
							<img src="<?php echo get_theme_file_uri() . '/assets/img/steps-side.svg'; ?>" alt="steps-side" role="presentation">
						</div>
						<div class="steps__item-steps-bottom">
							<img src="<?php echo get_theme_file_uri() . '/assets/img/steps-bottom.svg'; ?>" alt="steps-bottom" role="presentation">
						</div>
						<div class="steps__item-steps-mobile">
							<img src="<?php echo get_theme_file_uri() . '/assets/img/steps-mobile.svg'; ?>" alt="steps-mobile" role="presentation">
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
