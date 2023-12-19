<?php
/**
 * @param $number
 *
 * @return string
 */
function generateRatingClass( $number ): string {
	$integerPart = floor( $number );
	$decimalPart = $number - $integerPart;

	$classes = $integerPart >= 1 ? "rating-" . $integerPart : '';

 	if ( $decimalPart == 0.5 ) {
		$classes .= " rating-half";
	}
	return $classes;
}
