<?php
/**
 * Página 404.
 *
 * @package felix-idiomas
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main class="fx-page">
	<div class="fx-wrap fx-narrow fx-center">
		<p class="fx-eyebrow"><?php esc_html_e( 'Erro 404', 'felix-idiomas' ); ?></p>
		<h1><?php esc_html_e( 'Página não encontrada', 'felix-idiomas' ); ?></h1>
		<p class="fx-lead"><?php esc_html_e( 'O endereço que você tentou acessar não existe ou foi movido.', 'felix-idiomas' ); ?></p>
		<div class="fx-btn-row" style="justify-content:center">
			<a class="fx-btn fx-btn-gold" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Voltar para a página inicial', 'felix-idiomas' ); ?></a>
		</div>
	</div>
</main>

<?php
get_footer();
