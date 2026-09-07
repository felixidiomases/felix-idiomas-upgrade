<?php
/**
 * Template de página.
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
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<h1><?php the_title(); ?></h1>
			<div class="fx-page-content"><?php the_content(); ?></div>
			<?php
		endwhile;
		?>
	</div>
</main>

<?php
get_footer();
