<?php
/**
 * Rodapé do site.
 *
 * @package felix-idiomas
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$felix_phone_display = felix_opt( 'felix_whats_phone', '556291618508' );
?>

<footer class="fx-footer">
	<div class="fx-wrap">
		<div class="fx-footer-grid">
			<div>
				<h4><?php echo esc_html( felix_opt( 'felix_brand', 'Félix Idiomas' ) ); ?></h4>
				<p><?php echo esc_html( felix_opt( 'felix_footer_about', 'Inglês de alto nível para quem quer trabalhar, viajar e liderar em qualquer lugar do mundo.' ) ); ?></p>
			</div>

			<div>
				<h4><?php esc_html_e( 'Navegue', 'felix-idiomas' ); ?></h4>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'rodape',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => 'felix_fallback_menu',
					)
				);
				?>
			</div>

			<div>
				<h4><?php esc_html_e( 'Contato', 'felix-idiomas' ); ?></h4>
				<ul>
					<li><a href="<?php echo esc_url( felix_whats_link() ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'WhatsApp', 'felix-idiomas' ); ?>: <?php echo esc_html( $felix_phone_display ); ?></a></li>
					<li><a href="mailto:<?php echo esc_attr( felix_contact_email() ); ?>"><?php echo esc_html( felix_contact_email() ); ?></a></li>
					<li><?php echo esc_html( felix_opt( 'felix_footer_local', 'Goiânia - GO' ) ); ?></li>
				</ul>
				<p style="margin-top:18px">
					<a class="fx-btn fx-btn-ghost" href="<?php echo felix_calendar_link(); ?>" target="_blank" rel="noopener">
						<?php esc_html_e( 'Agendar avaliação', 'felix-idiomas' ); ?>
					</a>
				</p>
			</div>
		</div>

		<p class="fx-copy">
			&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( felix_opt( 'felix_footer_copy', 'Félix Idiomas. Todos os direitos reservados.' ) ); ?>
		</p>
	</div>
</footer>

<a class="fx-whats" href="<?php echo esc_url( felix_whats_link() ); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e( 'Falar no WhatsApp', 'felix-idiomas' ); ?>">
	<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17.5 14.4c-.3-.2-1.8-.9-2-1-.3-.1-.5-.2-.7.1s-.8 1-.9 1.2c-.2.2-.3.2-.6.1-1.7-.8-2.8-1.5-3.9-3.4-.3-.5.3-.5.8-1.5.1-.2 0-.4 0-.5s-.7-1.6-.9-2.2c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1.1 2.9 1.2 3.1c.1.2 2.1 3.2 5.1 4.5 1.9.8 2.6.9 3.5.7.6-.1 1.8-.7 2-1.4.3-.7.3-1.3.2-1.4-.1-.2-.3-.2-.6-.3zM12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2zm0 18.2c-1.6 0-3.1-.4-4.4-1.2l-.3-.2-3 .8.8-2.9-.2-.3A8.2 8.2 0 1 1 12 20.2z"/></svg>
	<span>WhatsApp</span>
</a>

<?php wp_footer(); ?>
</body>
</html>
