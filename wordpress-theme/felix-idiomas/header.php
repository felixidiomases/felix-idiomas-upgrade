<?php
/**
 * Cabeçalho do site.
 *
 * @package felix-idiomas
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="fx-header">
	<div class="fx-wrap fx-header-inner">
		<div class="fx-brand">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php
					$brand = felix_opt( 'felix_brand', 'Félix Idiomas' );
					$parts = explode( ' ', $brand, 2 );
					echo esc_html( $parts[0] );
					if ( isset( $parts[1] ) ) {
						echo ' <span class="fx-gold">' . esc_html( $parts[1] ) . '</span>';
					}
					?>
				</a>
			<?php endif; ?>
		</div>

		<nav class="fx-nav" aria-label="<?php esc_attr_e( 'Menu principal', 'felix-idiomas' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'principal',
					'container'      => false,
					'depth'          => 1,
					'fallback_cb'    => 'felix_fallback_menu',
				)
			);
			?>
			<a class="fx-btn fx-btn-gold" href="<?php echo felix_calendar_link(); ?>" target="_blank" rel="noopener">
				<?php esc_html_e( 'Agendar avaliação', 'felix-idiomas' ); ?>
			</a>
		</nav>

		<button class="fx-burger" type="button" aria-label="<?php esc_attr_e( 'Abrir menu', 'felix-idiomas' ); ?>" aria-expanded="false" data-fx-burger>
			<span></span><span></span><span></span>
		</button>
	</div>

	<div class="fx-mobile-nav" data-fx-mobile-nav>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'principal',
				'container'      => false,
				'depth'          => 1,
				'fallback_cb'    => 'felix_fallback_menu',
			)
		);
		?>
		<a class="fx-btn fx-btn-gold" href="<?php echo felix_calendar_link(); ?>" target="_blank" rel="noopener">
			<?php esc_html_e( 'Agendar avaliação', 'felix-idiomas' ); ?>
		</a>
	</div>
</header>
