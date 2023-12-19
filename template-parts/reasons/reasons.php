<?php
$reasons_subtitle = get_field( 'reasons_subtitle' );
$reasons_title    = get_field( 'reasons_title' );
$reasons_text     = get_field( 'reasons_text' );
$reasons_list     = get_field( 'reasons_list' );
if ( ! $reasons_subtitle && ! $reasons_title && ! $reasons_text && ! $reasons_list ) :
	return;
endif
?>

<section class="reasons">
	<div class="container">
		<div class="reasons__container">
			<?php if ( $reasons_subtitle ): ?>
				<div class="section-subtitle">
					<span><?php echo $reasons_subtitle; ?></span>
				</div>
			<?php endif; ?>

			<?php if ( $reasons_title ): ?>
				<div class="reasons__title">
					<h1><?php echo $reasons_title; ?></h1>
				</div>
			<?php endif; ?>

			<?php if ( $reasons_text ): ?>
				<div class="reasons__text">
					<p><?php echo $reasons_text; ?></p>
				</div>
			<?php endif; ?>

			<?php if ( $reasons_list ): ?>
				<ul class="reasons__list">
					<?php foreach ( $reasons_list as $item ):
						$icon = $item['icon'] ?? null;
						$title = $item['title'] ?? null;
						if ( ! $icon && ! $title ) :
							continue;
						endif; ?>
						<li>
							<?php if ( $icon ): ?>
								<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>"
								     role="presentation">
							<?php endif; ?>
							<?php echo $title; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</section>
