<?php
/**
 * Template padrão (blog / arquivos).
 *
 * @package felix-idiomas
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main class="fx-page">
	<div class="fx-wrap fx-narrow">
		<?php if ( have_posts() ) : ?>
			<h1><?php echo esc_html( get_the_archive_title() ? wp_strip_all_tags( get_the_archive_title() ) : get_bloginfo( 'name' ) ); ?></h1>

			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article class="fx-card" style="margin-top:28px">
					<h2 style="font-size:24px"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="fx-page-content"><?php the_excerpt(); ?></div>
				</article>
				<?php
			endwhile;

			the_posts_pagination();
		else :
			?>
			<h1><?php esc_html_e( 'Nada encontrado', 'felix-idiomas' ); ?></h1>
			<p class="fx-lead"><?php esc_html_e( 'Nenhum conteúdo foi publicado ainda.', 'felix-idiomas' ); ?></p>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
